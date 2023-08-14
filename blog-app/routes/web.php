<?php

use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if (auth() -> check()) {
        // From a user perspective
    $blogs = auth() -> user() -> userBlogs() -> latest() -> get();
    return view('home', ['blogs' => $blogs]);
    }

    // From a blog post perspective
    // $blogs = Blog::where('user_id', auth()->id())->get();
    return view('home');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/logout',[UserController::class, 'logout']);
Route::post('/login',[UserController::class, 'login']);

// Blog post routes in here
Route::post('/create-post',[PostController::class,'blogpost']);
Route::get('edit-blog/{blog}',[PostController::class, 'showEditScreen']);
Route::put('edit-blog/{blog}',[PostController::class, 'actuallyUpdatePost']);