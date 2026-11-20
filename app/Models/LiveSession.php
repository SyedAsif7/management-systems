<?php

namespace App\Models;

use Eloquent;

class LiveSession extends Eloquent
{
    protected $fillable = [
        'section_id',
        'title',
        'session_date',
        'start_time',
        'end_time',
        'live_room_id',
        'meeting_url',
        'recording_url',
        'notes_pdf_url',
        'status', // scheduled, live, completed
    ];

    protected $casts = [
        'session_date' => 'date',
    ];

    public function batch()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    public function getEffectiveRoomIdAttribute()
    {
        return $this->live_room_id ?: ($this->batch ? $this->batch->live_room_id : 'altaqwa-main-room');
    }

    public function getEffectiveMeetingUrlAttribute()
    {
        if (!empty($this->meeting_url)) {
            return $this->meeting_url;
        }
        $roomId = $this->effective_room_id;
        return "https://meet.jit.si/{$roomId}";
    }
}
