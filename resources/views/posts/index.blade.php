@extends('layouts.app')
@section('content')
<div class="container">
  <div class="titlebar">
    @if (@Auth::user()->admin == '1')
      <a class="btn btn-secondary float-end mt-3" href="{{ route('posts.create') }}" role="button">Add Category</a>
    @endif
    <h1>Mini post list</h1>
  </div>
    
  <hr>
  <!-- Message if a post is posted successfully -->
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
    <p>{{ $message }}</p>
  </div>
  @endif
        @if (count($posts) > 0)
    @foreach ($posts as $post)
      <div class="row">
        <div class="col-12">
          <div class="row">
            <div class="col-2">
              <img class="img-fluid" style="max-width:50%;" src="{{ asset('images/'.$post->image)}}" alt="">
            </div>
            <div class="col-10">
              <h4>{{$post->title}}</h4>
            </div>
          </div>
          <p>{{$post->description}}</p>
          @php
          $valor=$post->id;
          $propietario=$post->user_id;
          @endphp

          <a href="{{ route('comments.index',['post' => $valor]) }}" class="btn btn-primary">View Comments</a>
          <a href="" class="btn btn-secondary">View Profile</a>
          <hr>
        </div>
      </div>
    @endforeach
  @else
    <p>No Posts found</p>
  @endif
</div>
@endsection