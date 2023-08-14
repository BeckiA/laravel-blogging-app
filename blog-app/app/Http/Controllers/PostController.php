<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
