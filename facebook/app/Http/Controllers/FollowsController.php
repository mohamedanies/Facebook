<?php

namespace App\Http\Controllers;



use App\User;

class FollowsController extends Controller
{
    public function store(User $user){

        
        auth()->user()->toggleFollow($user);
        return back();
    
    }

    // public function getAllFriensds(){

    //   $userid = auth()->user()->id;
    //   $friends = DB::table('follows')
    //   ->where('following_user_id', $userid)->get();

    //   return view('_friends-list', compact(['friends'=>$friends]));
    
    // }

    
}
