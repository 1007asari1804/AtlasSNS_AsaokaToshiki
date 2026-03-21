<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Post;


class ProfileController extends Controller
{
    public function profile(){
        return view('profiles.profile');
    }

    public function show(User $user){
    return view('profiles.show', compact('user'));
}
}
