<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Post $post){

        $this->validate(request(),['body'=>'required|min:2']);



        $post->Comments()->create([
                'body'=>request('body'),
                'user_id'=>auth()->user()->id
            ]);

        session()->flash('message','your Comment successfully published');
        return back();
    }
}
