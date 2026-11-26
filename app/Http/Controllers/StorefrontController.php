<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Models\ClassType;
use App\Models\Enrollment;
use App\Models\MyClass;
use App\Repositories\MyClassRepo;
use Illuminate\Http\Request;

class StorefrontController extends Controller
{
    protected $my_class;

    public function __construct(MyClassRepo $my_class)
    {
        $this->my_class = $my_class;
    }

    /**
     * Public Homepage / Landing page
     */
    public function index()
    {
        try {
            $categories = ClassType::whereIn('code', ['QT', 'IS', 'AU', 'WS'])
                ->with(['my_classes' => function ($q) {
                    $q->where('is_published', true)->whereNotNull('slug');
                }])
                ->get();
        } catch (\Throwable $e) {
            $categories = collect();
        }

        try {
            $featuredCourses = MyClass::where('is_published', true)
                ->whereNotNull('slug')
                ->with(['category', 'sections'])
                ->orderBy('id', 'desc')
                ->take(6)
                ->get();
        } catch (\Throwable $e) {
            $featuredCourses = collect();
        }

        try {
            $announcements = \Illuminate\Support\Facades\Schema::hasTable('announcements')
                ? \App\Models\Announcement::active()->get()
                : collect();
        } catch (\Throwable $e) {
            $announcements = collect();
        }

        return view('pages.storefront.index', compact('categories', 'featuredCourses', 'announcements'));
    }

    /**
     * Public Course Catalog with category filter
     */
    public function courses(Request $request)
    {
        $categoryCode = $request->query('category');
        try {
            $query = MyClass::where('is_published', true)->whereNotNull('slug')->with(['category', 'sections']);

            if ($categoryCode) {
                $cat = ClassType::where('code', $categoryCode)->first();
                if ($cat) {
                    $query->where('class_type_id', $cat->id);
                }
            }

            $courses = $query->orderBy('name', 'asc')->get();
            $categories = ClassType::whereIn('code', ['QT', 'IS', 'AU', 'WS'])->get();
        } catch (\Throwable $e) {
            $courses = collect();
            $categories = collect();
        }

        return view('pages.storefront.courses', compact('courses', 'categories', 'categoryCode'));
    }

    /**
     * Single Course Detail Page
     */
    public function courseDetail($slug)
    {
        try {
            $course = MyClass::where('slug', $slug)
                ->with(['category', 'sections.teacher'])
                ->firstOrFail();

            $relatedCourses = MyClass::where('class_type_id', $course->class_type_id)
                ->where('id', '<>', $course->id)
                ->where('is_published', true)
                ->take(3)
                ->get();
        } catch (\Throwable $e) {
            abort(404, 'Course not found.');
        }

        return view('pages.storefront.course_detail', compact('course', 'relatedCourses'));
    }

    /**
     * Public Certificate Verification
     */
    public function verifyCertificate(Request $request, $code = null)
    {
        $verifyCode = $code ?: $request->query('code');
        $enrollment = null;

        if ($verifyCode) {
            try {
                $enrollment = Enrollment::where('order_id', $verifyCode)
                    ->orWhere('id', Qs::decodeHash($verifyCode) ?: 0)
                    ->with(['student', 'course', 'batch'])
                    ->first();
            } catch (\Throwable $e) {
                $enrollment = null;
            }
        }

        return view('pages.storefront.verify_certificate', compact('verifyCode', 'enrollment'));
    }

    /**
     * Download Official High-Res Sanad Certificate PDF
     */
    public function downloadCertificate(Request $request, $code)
    {
        $enrollment = Enrollment::where('order_id', $code)
            ->orWhere('id', Qs::decodeHash($code) ?: 0)
            ->with(['student', 'course.category', 'batch'])
            ->firstOrFail();

        $logoPath = public_path('assets/images/altaqwa-logo.png');
        $logoBase64 = file_exists($logoPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath)) : '';

        $sealPath = public_path('assets/images/altaqwa-seal.png');
        $sealBase64 = file_exists($sealPath) ? 'data:image/png;base64,' . base64_encode(file_get_contents($sealPath)) : '';

        $certCode = $enrollment->order_id ?: ('ALT-' . str_pad($enrollment->id, 4, '0', STR_PAD_LEFT));
        $issueDate = $enrollment->completed_at ? $enrollment->completed_at->format('F d, Y') : ($enrollment->updated_at ? $enrollment->updated_at->format('F d, Y') : date('F d, Y'));

        $studentName = $enrollment->student ? $enrollment->student->name : 'Syed Asif';
        $rawCourseName = $enrollment->course ? $enrollment->course->name : 'Seerat-un-Nabi Program';
        $courseName = str_replace(["\u{FDFA}", 'ﷺ'], '(PBUH)', $rawCourseName);
        $courseName = preg_replace('/\s+/', ' ', trim($courseName));

        $categoryName = ($enrollment->course && $enrollment->course->category) ? $enrollment->course->category->name : 'Faculty of Islamic Sciences';
        $duration = $enrollment->course ? ($enrollment->course->duration_label ?: '6 Months') : '6 Months';
        $cohort = $enrollment->batch ? $enrollment->batch->name : 'General Community Batch';

        $pdf = \PDF::loadView('pages.certificates.sanad_pdf', compact(
            'enrollment',
            'certCode',
            'issueDate',
            'studentName',
            'courseName',
            'categoryName',
            'duration',
            'cohort',
            'logoBase64',
            'sealBase64'
        ));
        $pdf->setPaper('a4', 'landscape');

        $fileName = 'AL-TAQWA_Sanad_' . preg_replace('/[^A-Za-z0-9_-]/', '', $certCode) . '.pdf';
        return $pdf->download($fileName);
    }
}
