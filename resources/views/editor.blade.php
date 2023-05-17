@extends('layouts.navigation')

@section('content')

<head>
    <script src="https://cdn.tiny.cloud/1/u095x7lmzuiyahxp36fq3o8ugoxjz48odexbv071wag86bs9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card bg-dark mt-5">
                <div class="card-header">{{ __('Post') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (Request::is('post/create'))
                    <form action="" method="post">
                        @csrf
                        <h5 class="card-title">Title</h5>
                        <input type="text" class="form-control bg-dark text-white" name="title" autofocus/>
                        </br>
                        </br>
                        <h5 class="card-title">Content</h5>
                        <textarea class="form-control bg-dark text-white" id="floatingTextarea2" name="content" style="height: 100px"></textarea>
                        </br>
                        </br>
                        <button type="submit" class="btn btn-primary">create</button>
                    </form>
                    @else
                    <form action="{{ url('/post/update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$post->id}}" readonly />
                        <h5 class="card-title">Title</h5>
                        <input type="text" name="title" class="form-control bg-dark text-white" value="{{$post->title}}" />
                        </br>
                        </br>
                        <h5 class="card-title">Content</h5>
                        <textarea class="form-control bg-dark text-white" id="floatingTextarea2" name="content" style="height: 100px">{{$post->content}}</textarea>

                        </br>
                        </br>

                        <button type="submit" class="btn btn-primary">update</button>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: 'textarea',
        plugins: "anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount",
        toolbar: "undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat",
    });
</script>

@endsection