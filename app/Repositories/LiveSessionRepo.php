<?php

namespace App\Repositories;

use App\Models\LiveSession;
use App\Models\Section;

class LiveSessionRepo
{
    public function all()
    {
        return LiveSession::with(['batch.my_class'])->orderBy('session_date', 'desc')->get();
    }

    public function find($id)
    {
        return LiveSession::with(['batch.my_class', 'batch.teacher'])->find($id);
    }

    public function create($data)
    {
        return LiveSession::create($data);
    }

    public function update($id, $data)
    {
        return LiveSession::find($id)->update($data);
    }

    public function delete($id)
    {
        return LiveSession::destroy($id);
    }

    public function getUpcomingForBatch($section_id, $limit = 10)
    {
        return LiveSession::where('section_id', $section_id)
            ->where('session_date', '>=', now()->toDateString())
            ->orderBy('session_date', 'asc')
            ->take($limit)
            ->get();
    }

    public function getPastRecordingsForBatch($section_id)
    {
        return LiveSession::where('section_id', $section_id)
            ->whereNotNull('recording_url')
            ->orderBy('session_date', 'desc')
            ->get();
    }

    public function getUpcomingForStudent($student_id)
    {
        // Find batch IDs from enrollments
        $batchIds = \App\Models\Enrollment::where('student_id', $student_id)
            ->where('status', 'active')
            ->pluck('section_id')
            ->filter();

        return LiveSession::whereIn('section_id', $batchIds)
            ->with(['batch.my_class'])
            ->orderBy('session_date', 'asc')
            ->get();
    }
}
