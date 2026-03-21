<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class FollowsController extends Controller
{
    //
    // public function followList(){
    //     $follows = auth()->user()->following()->get();
    //     return view('follows.followList', compact('follows'));
    // }

    // public function followerList(){
    //     return view('follows.followerList');
    // }

    public function store(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return back();
    }
    public function destroy(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return back();
    }

    public function followList(){
        $user = auth()->user();

        $follows = $user->following()->get();

        $followIds = $user->following()->pluck('users.id');

        $followPosts = Post::with('user')
            ->whereIn('user_id', $followIds)
            ->latest()
            ->get();

        return view('follows.followList', compact('follows', 'followPosts'));
    }

    public function followerList(){
        $user = auth()->user();

        $followers = $user->followed()->get();

        $followerIds = $user->followed()->pluck('users.id');

        $followerPosts = Post::with('user')
            ->whereIn('user_id', $followerIds)
            ->latest()
            ->get();

        return view('follows.followerList', compact('followers', 'followerPosts'));
    }
}
