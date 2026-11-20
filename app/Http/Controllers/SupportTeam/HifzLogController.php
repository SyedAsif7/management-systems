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
            $logs = $this->hifzRepo->getStudentLogs($user->id, 60);
            return view('pages.support_team.hifz.student_view', compact('logs'));
        }

        $logs = $this->hifzRepo->all();
        $students = StudentRecord::with('user')->get();

        return view('pages.support_team.hifz.index', compact('logs', 'students'));
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
