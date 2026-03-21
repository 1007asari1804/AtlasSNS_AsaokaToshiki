<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    //
    public function search(Request $request){
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
            $users = User::where('username','like', '%'.$keyword.'%')->get();
        }else{
            $users = User::all();
        }
        return view('users.search', compact('users', 'keyword'));
    }
}
