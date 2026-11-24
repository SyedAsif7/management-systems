<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LiveSession;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LiveClassApiController extends Controller
{
    /**
     * Get live session details for a specific batch / room
     */
    public function batchLive($room_id)
    {
        $session = LiveSession::where('live_room_id', $room_id)
            ->orWhereHas('section', function ($q) use ($room_id) {
                $q->where('live_room_id', $room_id);
            })
            ->with(['section.my_class', 'section.teacher'])
            ->latest('session_date')
            ->first();

        if (!$session) {
            // Check if section exists with this room id
            $section = Section::where('live_room_id', $room_id)->with(['my_class', 'teacher'])->first();
            if ($section) {
                return response()->json([
                    'success' => true,
                    'is_live' => false,
                    'batch' => [
                        'id' => $section->id,
                        'name' => $section->name,
                        'course' => $section->my_class ? $section->my_class->name : 'General Course',
                        'teacher' => $section->teacher ? $section->teacher->name : 'Ustadh',
                        'timing' => $section->class_timing,
                        'room_id' => $section->live_room_id,
                        'join_url' => url("/join/{$section->live_room_id}"),
                    ],
                    'session' => null,
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'No active Halqa found for room ' . $room_id,
            ], 404);
        }

        return response()->json([
            'success' => true,
            'is_live' => ($session->status === 'live' || $session->session_date->isToday()),
            'session' => [
                'id' => $session->id,
                'title' => $session->title,
                'session_date' => $session->session_date->toDateString(),
                'start_time' => $session->start_time,
                'end_time' => $session->end_time,
                'status' => $session->status,
                'effective_room_id' => $session->effective_room_id,
                'effective_meeting_url' => $session->effective_meeting_url,
                'recording_url' => $session->recording_url,
                'notes_pdf_url' => $session->notes_pdf_url,
                'join_url' => url("/join/{$session->effective_room_id}"),
            ],
            'batch' => $session->section ? [
                'id' => $session->section->id,
                'name' => $session->section->name,
                'course' => $session->section->my_class ? $session->section->my_class->name : null,
                'teacher' => $session->section->teacher ? $session->section->teacher->name : null,
            ] : null,
        ]);
    }

    /**
     * Get upcoming and live halqas for student
     */
    public function studentHalqas(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            // Return public featured upcoming sessions
            $sessions = LiveSession::with(['section.my_class', 'section.teacher'])
                ->orderBy('session_date', 'asc')
                ->take(10)
                ->get();
        } else {
            // User enrollments
            $sectionIds = \App\Models\Enrollment::where('student_id', $user->id)
                ->pluck('section_id')
                ->filter()
                ->toArray();

            $sessions = LiveSession::where(function ($q) use ($sectionIds) {
                if (!empty($sectionIds)) {
                    $q->whereIn('section_id', $sectionIds);
                }
                $q->orWhere('status', 'live');
            })
            ->with(['section.my_class', 'section.teacher'])
            ->orderBy('session_date', 'asc')
            ->take(15)
            ->get();
        }

        $formatted = $sessions->map(function ($s) {
            return [
                'id' => $s->id,
                'title' => $s->title,
                'course' => $s->section && $s->section->my_class ? $s->section->my_class->name : 'AL-TAQWA Program',
                'teacher' => $s->section && $s->section->teacher ? $s->section->teacher->name : 'Institute Scholar',
                'session_date' => $s->session_date ? $s->session_date->toDateString() : null,
                'start_time' => $s->start_time,
                'end_time' => $s->end_time,
                'status' => $s->status,
                'join_url' => url("/join/{$s->effective_room_id}"),
                'recording_url' => $s->recording_url,
            ];
        });

        return response()->json([
            'success' => true,
            'count' => $formatted->count(),
            'data' => $formatted,
        ]);
    }
}
