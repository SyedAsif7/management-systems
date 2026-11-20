<?php

namespace App\Repositories;

use App\Models\HifzLog;

class HifzRepo
{
    public function all()
    {
        return HifzLog::with(['student', 'teacher'])->orderBy('date', 'desc')->get();
    }

    public function find($id)
    {
        return HifzLog::with(['student', 'teacher'])->find($id);
    }

    public function create($data)
    {
        return HifzLog::create($data);
    }

    public function update($id, $data)
    {
        return HifzLog::find($id)->update($data);
    }

    public function delete($id)
    {
        return HifzLog::destroy($id);
    }

    public function getStudentLogs($student_id, $limit = 30)
    {
        return HifzLog::where('student_id', $student_id)
            ->with('teacher')
            ->orderBy('date', 'desc')
            ->take($limit)
            ->get();
    }

    public function getTodayLogs()
    {
        return HifzLog::where('date', now()->toDateString())
            ->with(['student', 'teacher'])
            ->get();
    }
}
