<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementApiController extends Controller
{
    /**
     * Get all currently active announcements
     */
    public function index()
    {
        try {
            $announcements = \Illuminate\Support\Facades\Schema::hasTable('announcements') 
                ? Announcement::active()->get() 
                : collect();
        } catch (\Throwable $e) {
            $announcements = collect();
        }

        return response()->json([
            'success' => true,
            'count' => $announcements->count(),
            'data' => $announcements,
        ]);
    }
}
