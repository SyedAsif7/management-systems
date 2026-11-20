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
        $categories = ClassType::whereIn('code', ['QT', 'IS', 'AU', 'WS'])
            ->with(['my_classes' => function ($q) {
                $q->where('is_published', true)->whereNotNull('slug');
            }])
            ->get();

        $featuredCourses = MyClass::where('is_published', true)
            ->whereNotNull('slug')
            ->with(['category', 'sections'])
            ->orderBy('id', 'desc')
            ->take(6)
            ->get();

        return view('pages.storefront.index', compact('categories', 'featuredCourses'));
    }

    /**
     * Public Course Catalog with category filter
     */
    public function courses(Request $request)
    {
        $categoryCode = $request->query('category');
        $query = MyClass::where('is_published', true)->whereNotNull('slug')->with(['category', 'sections']);

        if ($categoryCode) {
            $cat = ClassType::where('code', $categoryCode)->first();
            if ($cat) {
                $query->where('class_type_id', $cat->id);
            }
        }

        $courses = $query->orderBy('name', 'asc')->get();
        $categories = ClassType::whereIn('code', ['QT', 'IS', 'AU', 'WS'])->get();

        return view('pages.storefront.courses', compact('courses', 'categories', 'categoryCode'));
    }

    /**
     * Single Course Detail Page
     */
    public function courseDetail($slug)
    {
        $course = MyClass::where('slug', $slug)
            ->with(['category', 'sections.teacher'])
            ->firstOrFail();

        $relatedCourses = MyClass::where('class_type_id', $course->class_type_id)
            ->where('id', '<>', $course->id)
            ->where('is_published', true)
            ->take(3)
            ->get();

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
            $enrollment = Enrollment::where('order_id', $verifyCode)
                ->orWhere('id', Qs::decodeHash($verifyCode) ?: 0)
                ->with(['student', 'course', 'batch'])
                ->first();
        }

        return view('pages.storefront.verify_certificate', compact('verifyCode', 'enrollment'));
    }
}
