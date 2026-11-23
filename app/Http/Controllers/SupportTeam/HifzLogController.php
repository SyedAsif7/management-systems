<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\HifzLog;
use App\Models\StudentRecord;
use App\Repositories\HifzRepo;
use App\Repositories\StudentRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HifzLogController extends Controller
{
    protected $hifzRepo;
    protected $studentRepo;

    public function __construct(HifzRepo $hifzRepo, StudentRepo $studentRepo)
    {
        $this->hifzRepo = $hifzRepo;
        $this->studentRepo = $studentRepo;
    }

    public function index()
    {
        $user = Auth::user();

        if ($user->user_type === 'student') {
            if (!Qs::isHifzProgressEnabled()) {
                return redirect()->route('dashboard')->with('flash_danger', 'The Hifz Memorization Progress module is currently disabled by institute administration.');
            }
            $logs = $this->hifzRepo->getStudentLogs($user->id, 60);
            return view('pages.support_team.hifz.student_view', compact('logs'));
        }

        $logs = $this->hifzRepo->all();
        $students = StudentRecord::with('user')->get();

        return view('pages.support_team.hifz.index', compact('logs', 'students'));
    }

    public function toggleFeature(Request $request)
    {
        $current = Qs::isHifzProgressEnabled();
        $target = $request->has('enabled') 
            ? ($request->enabled ? '1' : '0') 
            : ($current ? '0' : '1');

        \App\Models\Setting::updateOrCreate(
            ['type' => 'show_hifz_progress'],
            ['description' => $target]
        );

        Qs::clearSettingsCache();

        $statusText = $target === '1' ? 'ENABLED (ON)' : 'DISABLED (OFF)';

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'enabled' => $target === '1',
                'status_text' => $statusText,
                'message' => "My Hifz Memorization Progress has been successfully turned {$statusText} for students.",
            ]);
        }

        return back()->with('flash_success', "My Hifz Memorization Progress has been successfully turned {$statusText} for students.");
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'student_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'sabaq_surah_ayah' => 'required|string|max:255',
            'sabqi_status' => 'required|string',
            'manzil_juz' => 'nullable|string|max:255',
            'attendance_status' => 'required|string',
            'ustadh_remarks' => 'nullable|string',
        ]);

        $data['teacher_id'] = Auth::id();
        $this->hifzRepo->create($data);

        return back()->with('flash_success', 'Hifz record logged successfully!');
    }

    public function destroy($id)
    {
        $this->hifzRepo->delete($id);
        return back()->with('flash_success', 'Hifz record deleted.');
    }
}
