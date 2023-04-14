@extends('layouts.navigation')

@section('content')

<!DOCTYPE html>
<html>

<head>
  <title>Authorize</title>

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

    th,
    td {
      text-align: center;
    }
  </style>

</head>

<body>
  <div class="container mt-4">

    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        @foreach ($users as $user)
        <tr class='clickable-row'>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->role}}</td>
          <td>
          <form id="logout-form" action="" method="POST">
            @csrf
            @if($user->role=='user')
            <button type="submit" class="btn btn-primary">Be author</button>
            @else
            <button type="submit" class="btn btn-secondary">Be user</button>
            @endif
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script>
    // $(document).ready(function($) {
    //   $(".clickable-row").click(function() {
    //     window.location.href = $(this).data("href");
    //   });
    // });
  </script>
</body>

</html>

@endsection