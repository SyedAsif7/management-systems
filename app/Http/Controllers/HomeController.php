<?php

namespace App\Http\Controllers;

use App\Helpers\Qs;
use App\Models\Enrollment;
use App\Models\HifzLog;
use App\Models\LiveSession;
use App\Models\MyClass;
use App\Models\Section;
use App\Models\StudentRecord;
use App\Repositories\UserRepo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    protected $user;

    public function __construct(UserRepo $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function privacy_policy()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.privacy_policy', $data);
    }

    public function terms_of_use()
    {
        $data['app_name'] = config('app.name');
        $data['app_url'] = config('app.url');
        $data['contact_phone'] = Qs::getSetting('phone');
        return view('pages.other.terms_of_use', $data);
    }

    public function dashboard()
    {
        $d = [];
        $user = Auth::user();

        if (Qs::userIsTeamSA()) {
            // Academic Admin Dashboard Data
            $d['users'] = $this->user->getUserCounts();
            $d['total_courses'] = MyClass::where('is_published', true)->count();
            $d['total_sections'] = Section::count();
            $d['total_enrollments'] = Enrollment::count();
            $d['active_enrollments'] = Enrollment::where('status', 'active')->count();
            $d['completed_certs'] = Enrollment::where('status', 'completed')->count();
            $d['total_revenue'] = Enrollment::sum('amount_paid');
            $d['pending_refunds'] = Enrollment::where('refund_status', 'requested')->count();
            $d['recent_enrollments'] = Enrollment::with(['student', 'course'])->latest()->take(6)->get();
            $d['upcoming_sessions'] = LiveSession::with('section.my_class')->orderBy('session_date', 'asc')->take(5)->get();
            $d['recent_hifz'] = HifzLog::with(['student', 'teacher'])->latest()->take(5)->get();
            $d['top_courses'] = MyClass::where('is_published', true)->withCount('enrollments')->orderBy('enrollments_count', 'desc')->take(4)->get();
        } elseif (Qs::userIsTeacher()) {
            // Ustadh / Teacher Dashboard Data
            $d['my_sections'] = Section::where('teacher_id', $user->id)->with(['my_class', 'live_sessions'])->get();
            $sectionIds = $d['my_sections']->pluck('id')->toArray();
            
            $d['total_students'] = Enrollment::whereIn('section_id', $sectionIds)->distinct('student_id')->count('student_id');
            if ($d['total_students'] == 0) {
                $d['total_students'] = StudentRecord::whereIn('section_id', $sectionIds)->count();
            }
            $d['total_batches'] = $d['my_sections']->count();
            $d['upcoming_sessions'] = LiveSession::whereIn('section_id', $sectionIds)->orderBy('session_date', 'asc')->take(5)->get();
            if ($d['upcoming_sessions']->isEmpty()) {
                $d['upcoming_sessions'] = LiveSession::with('section.my_class')->orderBy('session_date', 'asc')->take(5)->get();
            }
            $d['recent_hifz'] = HifzLog::where('teacher_id', $user->id)->with('student')->latest()->take(6)->get();
            if ($d['recent_hifz']->isEmpty()) {
                $d['recent_hifz'] = HifzLog::with('student')->latest()->take(6)->get();
            }
            $d['published_courses'] = MyClass::where('is_published', true)->take(6)->get();
        } elseif (Qs::userIsStudent()) {
            // Talib-ul-Ilm / Student Dashboard Data
            $d['my_enrollments'] = Enrollment::where('student_id', $user->id)->with(['course', 'section.teacher'])->latest()->get();
            $d['active_courses_count'] = $d['my_enrollments']->where('status', 'active')->count();
            $d['completed_certs'] = $d['my_enrollments']->where('status', 'completed');
            
            $enrolledSectionIds = $d['my_enrollments']->pluck('section_id')->filter()->toArray();
            $d['upcoming_sessions'] = LiveSession::where(function($q) use ($enrolledSectionIds) {
                if (!empty($enrolledSectionIds)) {
                    $q->whereIn('section_id', $enrolledSectionIds);
                }
                $q->orWhere('status', 'live');
            })->with('section.my_class')->orderBy('session_date', 'asc')->take(5)->get();

            if ($d['upcoming_sessions']->isEmpty()) {
                $d['upcoming_sessions'] = LiveSession::with('section.my_class')->orderBy('session_date', 'asc')->take(5)->get();
            }

            $d['my_hifz_logs'] = HifzLog::where('student_id', $user->id)->with('teacher')->latest()->take(6)->get();
            $d['featured_courses'] = MyClass::where('is_published', true)->take(4)->get();
        } else {
            // General fallback
            if (Qs::userIsTeamSAT()) {
                $d['users'] = $this->user->getUserCounts();
            }
        }

        return view('pages.support_team.dashboard', $d);
    }
}
