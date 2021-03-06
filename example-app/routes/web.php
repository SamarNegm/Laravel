<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //== require
use App\Http\Controllers\CommentController;
use Laravel\Socialite\Facades\Socialite;
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
    // return 'we are in files';
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');;
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create')->middleware('auth');;
Route::get('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');;
Route::post('/posts/updateTable/{post}', [PostController::class, 'updateTable'])->name('posts.updateTable')->middleware('auth');;
Route::get('/posts/destroy/{post}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');;

Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware('auth');;
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/comments/{postId}', [CommentController::class, 'create'])->name('comments.create');
Route::delete('/comments/{postId}/{commentId}', [CommentController::class, 'delete'])->name('comments.delete');
Route::get('/comments/{postId}/{commentId}', [CommentController::class, 'view'])->name('comments.view');
Route::patch('/comments/{postId}/{commentId}', [CommentController::class, 'edit'])->name('comments.update');
Route::get('/auth/redirect/github', function () {
    return Socialite::driver('github')->redirect();
});
Route::get('/auth/redirect/google', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/auth/callback/github', function () {
    $githubUser = Socialite::driver('github')->user();
 
    $user = User::where('github_id', $githubUser->id)->first();
 
    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    }
 
    Auth::login($user);
 
    return redirect('/dashboard');

 
    // $user->token
});

Route::get('/auth/callback/google', function () {
    $googleUser = Socialite::driver('google')->user();
 
    $user = User::where('google_id', $googleUser->id)->first();
 
    if ($user) {
        $user->update([
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
    }
 
    Auth::login($user);
 
    return redirect('/dashboard');

 
    // $user->token
});