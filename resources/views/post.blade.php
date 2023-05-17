@extends('layouts.navigation')

@section('content')

<!DOCTYPE html>
<html>

<head>
  <title>Post Page</title>

  <style>
    .card {
      transition: all 0.3s;
    }

    .card:hover {
      transform: scale(1.05);
    }
  </style>

</head>

<body>
  <div class="container mt-4">
    @can('isAuthor')
    <div class="text-center mb-3">
      <a href="{{ url('/post/create')}}" class="btn btn-primary">create</a>
    </div>
    @endcan

    @foreach ($posts as $post)
    <div class="card bg-dark position-relative mb-4 ">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
      </div>
      <div class="card-footer text-muted">
        {!! $post->user? ($post->user->name) : "<i>(deleted)</i>" !!}
        &emsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
          <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
          <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
        </svg>
        {{$post->view}}
        &nbsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
        </svg>
        {{$post->comments()->count()}}
        <span class="float-end">{{$post->created_at}}</span>
      </div>
      <a href="/posts/{{$post->id}}" class="stretched-link"></a>
    </div>
    @endforeach

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    $(document).ready(function($) {
      $(".clickable-row").click(function() {
        window.location.href = $(this).data("href");
      });
    });
  </script>
</body>

</html>

@endsection