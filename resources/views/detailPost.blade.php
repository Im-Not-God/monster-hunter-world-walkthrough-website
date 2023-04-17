@extends('layouts.navigation')

@section('content')
<!DOCTYPE html>
<html>

<head>
  <title>Post Example</title>
  <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

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

    .comment-container .tag {
      font-size: small;
    }

    .comment-container p {
      white-space: pre-wrap;
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
          <div class="card-text">{!! $post->content !!}</div>
        </div>

        <div class="card-footer">
          <div style="font-size: 16px;">
            <small class="text-muted">{{$post->created_at}}</small>
            &emsp;
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
              <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
              <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
            </svg>
            {{$post->view}}
          </div>

          @if(Auth::guard('admin')->check() || Auth::guard('superuser')->check() || (auth()->user() && auth()->user()->can('delete', $post)))
          <form action="{{ route('post.delete')}}" method="post">
            @csrf
            <button type="button" data-bs-toggle="modal" data-bs-target="#modal" class="btn btn-danger float-end">delete</button>

            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content bg-dark">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation of action</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="text-danger fw-bold">Caution: Delete action cannot be reversed</div>
                    Delete the post permanently</br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="id" value="{{$post->id}}">Delete</button>
                  </div>
                </div>
              </div>
            </div>

          </form>
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
      <div>
        <span class="card-title fs-5">Comments</span>
        &emsp;
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left" viewBox="0 0 16 16">
          <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
        </svg>
        {{$post->comments()->count()}}
      </div>
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

  <script>
    $(document).ready(function($) {
      var count = 5;
      var timer = setInterval(function() {
        $('#countdown').text(count);
        count--;
        if (count < 0) {
          clearInterval(timer);
          // do something when countdown is finished
          //alert("view");
          $.post('/post/view', {
            post_id: '{{$post->id}}'
          }, function(data) {
            // handle success response from server
          });
        }
      }, 1000);
    });
  </script>

</body>

</html>
@endsection