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
              @if(Auth::guard('superuser')->check() && !$user->admin)
              <button type="submit" name="admin" value="add" class="btn btn-warning">Be admin</button>
              @endif

              @if(Auth::guard('admin')->check() && ($user->id != Auth::guard('admin')->user()->user_id))
              <button type="button" data-bs-toggle="modal" data-bs-target="#modal{{$user->id}}" class="btn btn-danger">Delete</button>
              @elseif(Auth::guard('superuser')->check() && ($user->id != Auth::guard('superuser')->user()->user_id))
              <button type="button" data-bs-toggle="modal" data-bs-target="#modal{{$user->id}}" class="btn btn-danger">Delete</button>
              @endif

              <div class="modal fade" id="modal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content bg-dark">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Confirmation of action</h5>
                      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div class="text-danger fw-bold">Caution: Delete action cannot be reversed</div>
                      Delete the user</br>
                      name: {{$user->name}}&emsp;email: {{$user->email}}
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger" name="delete" value="true">Delete</button>
                    </div>
                  </div>
                </div>
              </div>

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
          @if(Auth::guard('superuser')->check())
          <th>Action</th>
          @endif
        </tr>
      </thead>
      <tbody>

        @foreach ($admins as $admin)
        <tr class='clickable-row'>
          <td>{{$admin->name}}</td>
          <td>{{$admin->email}}</td>
          @if(Auth::guard('superuser')->check())
          <td>
            @if(Auth::guard('superuser')->user()->email!=$admin->email)
            <form action="" method="POST">
              <input type="hidden" name="id" value="{{$admin->id}}" readonly>
              @csrf
              <button type="submit" name="admin" value="remove" class="btn btn-danger">Remove</button>
            </form>
            @endif
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