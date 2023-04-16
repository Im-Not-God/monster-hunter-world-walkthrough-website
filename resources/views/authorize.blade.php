@extends('layouts.navigation')

@section('content')

<!DOCTYPE html>
<html>

<head>
  <title>Authorize</title>

  <style>
    thead {
      border-bottom: 1px solid white;
    }

    th,
    td,
    h3 {
      text-align: center;
    }
  </style>

</head>

<body>
  <div class="container mt-4">

    <h3>User List</h3>
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
            <form action="" method="POST">
              <input type="hidden" name="id" value="{{$user->id}}" readonly>
              @csrf
              @if($user->role=='user')
              <button type="submit" name="role" value="author" class="btn btn-primary">Be author</button>
              @else
              <button type="submit" name="role" value="user" class="btn btn-secondary">Be user</button>
              @endif
              @if($isSuperUser && !$user->admin)
              <button type="submit" name="admin" value="add" class="btn btn-warning">Be admin</button>
              @endif
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <h3>Admin List</h3>
    <table class="table table-dark table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          @if($isSuperUser)
          <th>Action</th>
          @endif
        </tr>
      </thead>
      <tbody>

        @foreach ($admins as $admin)
        <tr class='clickable-row'>
          <td>{{$admin->name}}</td>
          <td>{{$admin->email}}</td>
          @if($isSuperUser)
          <td>
            <form action="" method="POST">
              <input type="hidden" name="id" value="{{$admin->id}}" readonly>
              @csrf
              <button type="submit" name="admin" value="remove" class="btn btn-danger">Remove</button>
            </form>
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
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
