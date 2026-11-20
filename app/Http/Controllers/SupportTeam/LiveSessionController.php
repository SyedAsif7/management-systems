<?php

namespace App\Http\Controllers\SupportTeam;

use App\Helpers\Qs;
use App\Http\Controllers\Controller;
use App\Models\LiveSession;
use App\Models\Section;
use App\Repositories\LiveSessionRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveSessionController extends Controller
{
    protected $liveRepo;

    public function __construct(LiveSessionRepo $liveRepo)
    {
        $this->liveRepo = $liveRepo;
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->user_type === 'student') {
            $sessions = $this->liveRepo->getUpcomingForStudent($user->id);
            $pastRecordings = LiveSession::whereNotNull('recording_url')->orderBy('session_date', 'desc')->take(20)->get();
            $sections = [];
        } else {
            $sessions = $this->liveRepo->all();
            $pastRecordings = LiveSession::whereNotNull('recording_url')->orderBy('session_date', 'desc')->get();
            $sections = Section::with('my_class')->get();
        }

        return view('pages.support_team.live_sessions.index', compact('sessions', 'pastRecordings', 'sections'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'section_id' => 'required|exists:sections,id',
            'title' => 'required|string|max:255',
            'session_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'live_room_id' => 'nullable|string',
            'meeting_url' => 'nullable|url',
        ]);

        $section = Section::find($data['section_id']);
        if (empty($data['live_room_id']) && $section) {
            $data['live_room_id'] = $section->live_room_id ?: 'altaqwa-room-' . $section->id;
        }

        $this->liveRepo->create($data);

        return Qs::jsonStoreOk();
    }

    public function join($id)
    {
        $session = $this->liveRepo->find($id);
        if (!$session) {
            return redirect()->route('live_sessions.index')->with('flash_danger', 'Session not found.');
        }

        return view('pages.support_team.live_sessions.room', compact('session'));
    }

    public function updateRecording(Request $request, $id)
    {
        $data = $request->validate([
            'recording_url' => 'required|url',
            'notes_pdf_url' => 'nullable|url',
        ]);

        $data['status'] = 'completed';
        $this->liveRepo->update($id, $data);

        return back()->with('flash_success', 'Session recording updated successfully!');
    }

    public function destroy($id)
    {
        $this->liveRepo->delete($id);
        return back()->with('flash_success', 'Session deleted successfully!');
    }
}
