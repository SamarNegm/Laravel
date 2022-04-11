<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $posts;
    public function __construct() 
    {
        $posts = [
            ['id' => 0, 'title' => 'first post', 'posted_by' => 'ahmed', 'created_at' => '2022-04-11','description'=>'First post description'],
            ['id' => 1, 'title' => 'second post', 'posted_by' => 'mohamed', 'created_at' => '2022-04-11','description'=>'Second post description'],
        ];
        // Fetch the Site Settings object
        $this->posts= $posts;
        // View::share('posts', $this->posts);
    }

    public function index()
    {
      
        // dd($posts); //stop execution and dump the variable
        return view('posts.index',[
            'allPosts' => $this->posts,
        ]);
    
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $description = $request->input('description');
        $postCreator= $request->input('postCreator');
        array_push( $this->posts,['id'=>count($this->posts),'title'=>$name,'description'=>$description,'posted_by'=>$postCreator, 'created_at' => '2022-04-11']);
        return view('posts.index',[
            'allPosts' => $this->posts,
        ]);
        //
    }

    public function show($id)
    {
       
        
       
        return     view('posts.show',[
            'allPosts' =>  $this->posts,
            'id' =>$id

        ]);
    }
    public function update()
    {
        return view('posts.update');
    }
}
