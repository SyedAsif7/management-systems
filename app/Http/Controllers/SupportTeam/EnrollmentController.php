<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\MyClass;
use App\Models\Section;
use App\Repositories\PaymentRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    protected $payRepo;

    public function __construct(PaymentRepo $payRepo)
    {
        $this->payRepo = $payRepo;
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->user_type === 'student') {
            $enrollments = $this->payRepo->getStudentEnrollments($user->id);
            return view('pages.support_team.enrollments.my_courses', compact('enrollments'));
        }

        $enrollments = Enrollment::with(['student', 'course', 'batch'])->orderBy('id', 'desc')->paginate(30);
        return view('pages.support_team.enrollments.index', compact('enrollments'));
    }

    /**
     * Razorpay Checkout / Instant Enrollment
     */
    public function checkout(Request $request, $slug)
    {
        $course = MyClass::where('slug', $slug)->with('sections')->firstOrFail();
        $batch = $course->sections->first();

        // If free course, enroll immediately
        if ($course->fee_type === 'free' || $course->selling_price == 0) {
            $user = Auth::user();
            $enrollment = $this->payRepo->processRazorpayEnrollment(
                $user->id,
                $course->id,
                $batch ? $batch->id : null,
                'FREE-' . strtoupper(uniqid()),
                0.00,
                'free'
            );

            return redirect()->route('enrollments.my_courses')->with('flash_success', 'SubhanAllah! You have successfully enrolled in ' . $course->name);
        }

        return view('pages.support_team.enrollments.checkout', compact('course', 'batch'));
    }

    /**
     * Handle Razorpay payment capture callback
     */
    public function captureRazorpay(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:my_classes,id',
            'razorpay_payment_id' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $course = MyClass::find($request->course_id);
        $batch = Section::where('my_class_id', $course->id)->first();
        $user = Auth::user();

        $enrollment = $this->payRepo->processRazorpayEnrollment(
            $user->id,
            $course->id,
            $batch ? $batch->id : null,
            $request->razorpay_payment_id,
            $request->amount,
            $course->fee_type
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Enrollment confirmed!',
            'redirect_url' => route('enrollments.my_courses'),
        ]);
    }

    /**
     * Accountant Refund Queue for refundable deposit courses
     */
    public function refundQueue()
    {
        $pendingRefunds = $this->payRepo->getRefundEligibleEnrollments();
        return view('pages.support_team.enrollments.refund_queue', compact('pendingRefunds'));
    }

    public function processRefund(Request $request, $id)
    {
        $this->payRepo->markRefundProcessed($id);
        return back()->with('flash_success', 'Refund marked as processed successfully!');
    }
}
