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
        $announcements = Announcement::active()->get();

        return response()->json([
            'success' => true,
            'count' => $announcements->count(),
            'data' => $announcements,
        ]);
    }
}
