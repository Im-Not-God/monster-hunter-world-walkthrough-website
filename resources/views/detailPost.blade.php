@extends('layouts.navigation')

@section('content')
<!DOCTYPE html>
<html>

<head>
  <title>Post Example</title>
  <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    .post-container .card-title {
      font-weight: bold;
      text-transform: uppercase;
    }

    .post-container {
      margin: 20px;
      margin-bottom: 50px;
      border: 2px solid black;
    }

    .comment-container {
      margin: 20px 120px;
    }

    .card-body {
      background-color: #262B31;
    }

    .comment-container .comment {
      border-bottom: 2px solid black;
    }

    .sidebar {
      padding: 10px;
      background-color: #1D1D1D;
    }

    p {
      white-space: pre-wrap;
      font-size: 16px;
      margin: 0;
    }

    button {
      margin-left: 5px;
      margin-bottom: 5px;
    }

    .comment-container button {
      margin-top: 5px;
      margin-left: 0;
      margin-bottom: 0;
    }
    .comment-container .tag{
      font-size: small;
    }
  </style>
</head>

<body>

  <div class="card bg-dark post-container">
    <div class="row g-0">
      <div class="col-md-2 sidebar">
        @if($post->user)
        <p>{{$post->user->name}}</br>
          <small class="text-muted">{{$post->user->email}}</small>
        </p>
        @else
        <p class="text-muted"><i>(delete)</i></p>
        @endif
      </div>
      <div class="col-md-10">
        <div class="card-header">
          <h5 class="card-title">{{$post->title}}</h5>
        </div>
        <div class="card-body">
          <p class="card-text">{{$post->content}}</p>
        </div>

        <div class="card-footer">
          <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
          @if(auth()->user())
          @if(Auth::guard('admin')->check() || Auth::guard('superuser')->check() || auth()->user()->can('delete', $post))
          <form action="{{ route('post.delete')}}" method="post">
            @csrf
            <button type="submit" name="id" value="{{$post->id}}" class="btn btn-danger float-end">delete</button>
          </form>
          @endif
          @endif


          @can('update',$post)
          <a href="/post/edit/{{$post->id}}"><button type="button" name="id" value="{{$post->id}}" class="btn btn-warning float-end">edit</button></a>
          @endcan
        </div>
      </div>

    </div>
  </div>

  <div class="card bg-dark comment-container">

    <div class="card-header">
      <h5 class="card-title">Comments</h5>

    </div>

    <div class="card-body">
      @if(Auth::check() || Auth::guard('admin')->check() || Auth::guard('superuser')->check())
      <form action="/post/comment" method="post">
        @csrf
        <textarea name="comment" class="form-control bg-dark text-white" placeholder="leave a comment"></textarea>
        <button type="submit" name="postId" value="{{$post->id}}" class="btn btn-primary">post</button>
      </form>
      @else
      <a href="/login?redirectUrl={{url()->current()}}"><button type="button" class="btn btn-secondary">login to leave comment</button></a>
      @endif
    </div>
    @foreach($post->comments()->orderBy('created_at', 'asc')->get() as $comment)
    <div class="card-body comment">
      <h5 class="card-title">@if($comment->user)
        <span class="fw-bold">{{$comment->user->name}}</span> 
        @if($post->user_id == $comment->user_id)
        <small class="bg-info rounded-pill tag">author</small>
        @endif
        <small class="text-muted">{{$comment->user->email}}</small></p>
        @else
        <p class="text-muted"><i>(delete)</i></p>
        @endif
      </h5>
      <p class="card-text">{{$comment->content}}</p>
      <p class="card-text mt-3"><small class="text-muted">{{$comment->created_at}}</small></p>
    </div>
    @endforeach

    @if(count($post->comments) === 0)
    <div class="card-body">
      <h5 class="card-title">
        <p class="text-muted"><i>(no any comment)</i></p>
      </h5>
    </div>
    @endif

    <!-- <div class="card-footer">
      @if(auth()->user())
      @if(Auth::guard('admin')->check() || Auth::guard('superuser')->check() || auth()->user()->can('delete', $post))
      <form action="{{ route('post.delete')}}" method="post">
        @csrf
        <button type="submit" name="id" value="{{$post->id}}" class="btn btn-danger float-end">delete</button>
      </form>
      @endif
      @endif


      @can('update',$post)
      <a href="/post/edit/{{$post->id}}"><button type="button" name="id" value="{{$post->id}}" class="btn btn-warning float-end">edit</button></a>
      @endcan
    </div> -->

  </div>

</body>

</html>
@endsection