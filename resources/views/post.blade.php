@extends('layouts.navigation')

@section('content')

<!DOCTYPE html>
<html>

<head>
  <title>Post Page</title>

  <style>

    .card{
      transition: all 0.3s;
    }
    .card:hover{
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
    <div class="card bg-dark position-relative mt-4 ">
      <div class="card-body">
        <h5 class="card-title">{{$post->title}}</h5>
      </div>
      <div class="card-footer text-muted">
      {!! $post->user? ($post->user->name) : "<i>(deleted)</i>" !!}<span class="float-end">{{$post->created_at}}</span>
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