<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\User;

class ProfileController extends Controller
{
    public function profile(User $user)
    {           
        $chirpsCount = $user->chirps()->count(); 
        $chirps = $user->chirps()->latest()->get();
        
        return view('profile', compact('user', 'chirps', 'chirpsCount'));
    }
}