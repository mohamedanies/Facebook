<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use App\User;
use Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function store(Request $request,$post)
    {
        $this->validate($request,[
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back();
    }
    
    // public function store(Request $request){
        

    //     $comment = new Comment;
    //     $comment->comment = $request->comment;
    //     $comment->user_id = Auth::user()->id;
    //     $comment->post_id = $request->post_id;
    //     $comment->save();

        
    //     // Comment::create([

    //     //     'comment' => request('comment'),
    //     //     'post_id' => request($post->id),
    //     //     'user_id' => request($user->id)y

    //     // ]);

    // }
}
