<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::latest()
            ->paginate(10);
            
        return view('school.announcements', compact('announcements'));
    }
} 