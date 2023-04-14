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

    .post {
      flex: 3;
    }

    .post-title {
      font-size: 2rem;
      font-weight: bold;
      text-transform: uppercase;
      border-bottom: 2px solid #333;
    }

    .post-content {
      font-size: 1.2rem;
      line-height: 1.5;
    }

    .post-container {
      display: flex;
      flex-direction: row;
      margin: 20px;
      border: 2px solid black;
      background-color: #262B31;
      height: auto;
    }

    .sidebar {
      flex: 1;

      border-right: 2px solid black;
      background-color: #1D1D1D;
      max-width: min-content;
      padding: 10px;
    }

    h1 {
      font-size: 24px;
      margin-top: 0;
      text-decoration: underline;
    }

    p {
      font-size: 16px;
      padding: 10px 15px 10px 15px;
      margin: 0;
    }

    .secondary {
      color: #a0a0a0;
      font-size: 13px;
    }
  </style>
</head>

<body>
  <div class="post-container">
    <div class="sidebar">
      <p>{{$post->user->name}}</br><span class="secondary">{{$post->user->email}}</span></p>
    </div>
    <div class="post">
      <div class="post-title" style="background-color: #1E2226;">
        <p>{{$post->title}}</p>
      </div>
      <div class="post-content">
        <p>{{$post->content}}</p>

        @if(Auth::guard('admin')->check() || auth()->user()->can('delete', $post))
        <form action="{{ route('post.delete')}}" method="post">
          @csrf
          <button type="submit" name="id" value="{{$post->id}}" class="btn btn-danger float-end">delete</button>
        </form>
        @endif

        @can('update',$post)
        <a href="/post/edit/{{$post->id}}"><button type="button" name="id" value="{{$post->id}}" class="btn btn-warning float-end">edit</button></a>
        @endcan

      </div>
    </div>
  </div>

  <div class="comment-container">

  </div>
</body>

</html>
@endsection
