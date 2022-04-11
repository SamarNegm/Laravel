@extends('layouts.app')

@section('title')Create @endsection

@section('content')
<div  class="col-7" style="margin-top:40px;margin-left:auto;margin-right:auto;padding: 90px; background-color: #F7F5F2;
 ">
      <form method="POST" action="{{route('posts.store')}}">
        @csrf
        <div class="mb-4 " style=" margin: '10px';
                                      
                                        width: '50px';
                                        border-radius: '30px';
                                        background-color: '#8D8DAA';
                                        border-color: '#8D8DAA'">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label" >Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" id="description" name="description"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select class="form-control" name="postCreator" id="postCreator">
              <option>Samar</option>
                <option>Ahmed</option>
            </select>
       </div>

          <div class="mb-3" style="margin:auto">
                <button type="submit" class="btn" style="background-color:#8D8DAA; border-color:#8D8DAA;color: white;">Create Post</button>
          </div>
        </form>
        </div>
@endsection
