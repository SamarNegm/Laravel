<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    protected $posts;
    public function __construct() 
    {
        $posts = Post::all();
        // Fetch the Site Settings object
        $this->posts= $posts;
        // View::share('posts', $this->posts);
    }

    public function index()
    {
      
       //we need a model class that retrieves data from posts table
       $posts = Post::all();
       return view('posts.index',[
           'allPosts' => $posts,
       ]);
    }

    public function create()
    {
        $users = User::all();

        //query to get all users
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        $data = request()->all();
        // $title = request()->title;

        //store the request data in the db
        Post::create([
            'title' => $data['name'],
            'description' => $data['description'],
            'user_id' => $data['postCreator'],
            'some_column' => 'some value',
            'x' => 'asd',
            'y' => 'askdhjashd',
        ]);

        //redirect to /posts
        return to_route('posts.index');

        //
    }

    public function show($id)
    {
       
             //select * from posts where id = 1
             $dbPost = Post::where('id', $id)->first();
             $dbUser = User::where('id', $dbPost->user_id)->first();
             return view('posts.show',[
                'dbPost' => $dbPost,
                'dbUser' => $dbUser,
            ]);
    }
    public function update($id)
    {
        $dbPost = Post::where('id', $id)->first();
        // dd($dbPost);
        $users = User::all();
        return view('posts.update',[
            'post' =>  $dbPost ,
            'users' => $users
        ]);
    }
    public function updateTable($id)
    {
        // dd($id);
        $data = request()->all();
        $post = Post::find($id);
        $post->title= $data['name'];
        $post->description= $data['description'];
        $post->user_id= $data['postCreator'];
        $post->save();
     
 
     
        //redirect to /posts
        return to_route('posts.index');

    }
    public function destroy($id)
    {

        $post = Post::find($id);
 
        $post->delete();
        return to_route('posts.index');

    }
}
