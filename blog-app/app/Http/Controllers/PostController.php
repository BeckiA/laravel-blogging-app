<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function actuallyUpdatePost(Blog $blog, Request $request){

        $incomingField = $request -> validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $incomingField['title'] = strip_tags($incomingField['title']);
        $incomingField['body'] = strip_tags($incomingField['body']);
        $blog -> update($incomingField);
        return redirect('/');
    }
    public function showEditScreen(Blog $blog){
        if (auth() -> user() -> id !== $blog['user_id']) {
          
            return redirect('/');
        }
        return view('edit-blog', ['blog' => $blog]);

    }
    //
    public function blogpost(Request $request){
        $incomingField = $request -> validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $incomingField['title'] = strip_tags($incomingField['title']);
        $incomingField['body'] = strip_tags($incomingField['body']);
        $incomingField['user_id'] = auth() -> id();
        Blog::create($incomingField);
        return redirect('/');
    }
}
