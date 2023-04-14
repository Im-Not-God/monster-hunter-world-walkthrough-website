@extends('layouts.navigation')

@section('content')

<!DOCTYPE html>
<html>

<head>
  <title>Post Page</title>

  <style>
    /* th {
      border-left: 1px solid black;
      border-right: 1px solid black;
    }

    td {
      border-left: 1px solid black;
      border-right: 1px solid black;
    } */
    thead {
      border-bottom: 1px solid white;
    }

    tbody tr:hover {
      cursor: pointer;
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
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th style="width: 70%;">Title</th>
          <th style="width: 15%;">Author</th>
          <th style="width: 15%;">Posted Date</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($posts as $post)
        <tr class='clickable-row' data-href='/post/{{$post->id}}'>
          <td style="text-align:left;">{{$post->title}}</td>
          <td style="text-align:left;">{{$post->user->name}}</td>
          <td style="text-align:left;">{{$post->created_at}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
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