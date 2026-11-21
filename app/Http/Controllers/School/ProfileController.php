<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function show()
    {
        $profile = Profile::first();
        
        if (!$profile) {
            abort(404, 'Profil sekolah tidak ditemukan');
        }

        return view('school.profiles.show', compact('profile'));
    }
} 