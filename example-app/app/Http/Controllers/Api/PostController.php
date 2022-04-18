<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return $posts;
        return  PostResource::collection($posts);
    }
    
    public function store(StorePostRequest $request){
        $data = request()->all();
        // $title = request()->title;
        $path = Storage::putFile('public', request()->file('image'));
        $url = Storage::url($path);
        //store the request data in the db
        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'user_id' => $data['postCreator'],
            'image_url' => $url,
        ]);
        return $post;

    }
    public function show($id)
    {
       
             //select * from posts where id = 1
             $dbPost = Post::where('id', $id)->first();
             $dbUser = User::where('id', $dbPost->user_id)->first();
             return new PostResource($dbPost);
    }
}
