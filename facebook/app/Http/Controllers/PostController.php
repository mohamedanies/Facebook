<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use App\User;
use File;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{

    public function index()
    {
        // $posts= Post::latest()->get();
        return view('posts.index', [
            'posts' => auth()->user()->timeline()
        ]);
    }




        public function store(Request $request)
        {
            $this->validate($request, [
                'image' => 'image',
                'body' => 'required'
            ]);
            $post = new Post;
            $post->body = $request->body;
            $post->user_id = Auth::user()->id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->getClientOriginalExtension();
                $location = public_path('/images/' . $filename);
                Image::make($image)->resize(800, 600)->save($location);
                $post->image = $filename;
            }
            $post->save();


        return redirect()->route('home');
    }

    

    public function destroy(Post $post, User $user)
    {
        
        if(auth()->user()->id == $post->user_id){
            $post->delete();
            return back();
        }
        else{
            dd(auth()->user()->id);   
        }
        
    }

    public function edit(Post $post){
        
        return view('posts.edit', compact('post'));
    }


    public function update(Request $request, Post $post){
        $this->validate($request, [
            'image' => 'image',
            'body' => 'required|max:255'
        ]);
        $post->user_id = Auth::user()->id;
        $post->body = $request->body;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            Image::make($image)->resize(800, 600)->save($location);
            $post->image = $filename;
        }
        $post->update();

        return redirect(route('home'));


       

    }
    
}
