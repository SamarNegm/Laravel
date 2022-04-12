@extends('layouts.app')

@section('title') This Is Index Page @endsection

@section('content')
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="btn" style="margin: 30px;background-color:#8D8DAA; border-color:#8D8DAA;color: white;">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
            @foreach ( $allPosts as $post)
              <tr>
                <td>{{$post['id']}}</th>
                <td>{{$post['title']}}</td>
                <td>{{$post['posted_by']}}</td>
                <td>{{$post['created_at']}}</td>
                <td>
                    <a href="{{route('posts.show', ['post' => $post['id']])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.update', ['post' => $post['id']])}}" class="btn btn-primary" >Edit</a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('posts.destroy', ['post' => $post['id']])}}" class="btn btn-danger">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
@endsection
