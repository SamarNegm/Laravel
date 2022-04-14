
@extends('layouts.app')

@section('title') This Is Show Page @endsection

@section('content')
<div  style="margin-top:30px;text-align:center;margin-left:auto;margin-right:auto" class="col-7">
<div class="card" style="margin-top:30px">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title"><span style="font-weight:bold">Title : </span>{{$dbPost->title}}</h5>
    <p class="card-text"><span style="font-weight:bold">Description : </span>{{$dbPost->description}} </p>

  </div>
</div>

<div class="card mt-4">
  <div class="card-header">
    User Info
  </div>
  <div class="card-body">
    <h5 class="card-title"><span style="font-weight:bold">Name : </span>{{$dbUser->name}}</h5>
    <p class="card-text"><span style="font-weight:bold">Email : </span> {{$dbUser->email}} </p>
   
  </div>
  
</div>
<div class='mt-4'>
    @foreach ($dbPost->comments as $comment)
    <div class='my-4 border p-4 rounded-lg'>
        <h2 class='text-lg fw-bold'>{{$comment->user->name}}</h2>
        <p class='text-lg my-2 fs-2'>{{$comment->body}}</p>
        <span class='text-sm'>Last Updated At: {{$comment->updated_at->toDayDateTimeString()}}</span>
        <div class="mt-4  flex">
            <form class="text-center d-inline" method='POST' action={{route('comments.delete', ['postId' => $dbPost['id'], 'commentId' => $comment->id])}}>
                @csrf
                @method('DELETE')
                <button type="sumbit" class='btn btn-lg btn-primary'>Delete</button>
            </form>
            <a class='btn btn-lg btn-success ml-4' href={{route('comments.view', ['postId' => $dbPost['id'], 'commentId' => $comment->id])}}>
                Edit
            </a>
        </div>
    </div>
    @endforeach
    <div class='flex flex-col mt-6  p-4 rounded-lg'>
        <form method="POST" class='flex items-center' action={{route('comments.create', ['postId' => $dbPost['id']])}}>
            @csrf
            <label class="label mr-4">Add comment</label>
            <input class="input flex-1 input-xlg" placeholder="Add comment" type="text" name="comment" id="coment" />
            <button type="sumbit"  class="btn" style="margin: 30px;background-color:#8D8DAA; border-color:#8D8DAA;color: white;">Add</button>
        </form>
    </div>
</div>

<a href="{{ route('posts.index') }}" class="btn" style="margin: 30px;background-color:#8D8DAA; border-color:#8D8DAA;color: white;">Back</a>
</div>
@endsection
