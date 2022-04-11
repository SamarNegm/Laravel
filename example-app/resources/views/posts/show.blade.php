
@extends('layouts.app')

@section('title') This Is Show Page @endsection

@section('content')
<div  style="margin-top:30px;text-align:center;margin-left:auto;margin-right:auto" class="col-7">
<div class="card" style="margin-top:30px">
  <div class="card-header">
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title"><span style="font-weight:bold">Title : </span>{{$allPosts[$id]['title']}}</h5>
    <p class="card-text"><span style="font-weight:bold">Description : </span>{{$allPosts[$id]['description']}} </p>

  </div>
</div>

<div class="card mt-4">
  <div class="card-header">
    User Info
  </div>
  <div class="card-body">
    <h5 class="card-title"><span style="font-weight:bold">Name : </span> {{$allPosts[$id]['posted_by']}}</h5>
    <p class="card-text"><span style="font-weight:bold">Created At : </span> {{$allPosts[$id]['created_at']}} </p>
   
  </div>
  
</div>
<a href="{{ route('posts.index') }}" class="btn" style="margin: 30px;background-color:#8D8DAA; border-color:#8D8DAA;color: white;">Back</a>
</div>
@endsection
