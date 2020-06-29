<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PostLikesController extends Controller
{
    public function store(Post $post)
    {
        $post->like(current_user());

        return back();
    }

    public function destroy(Post $post)
    {
        $post->dislike(current_user());

        return back();
    }



    
}
