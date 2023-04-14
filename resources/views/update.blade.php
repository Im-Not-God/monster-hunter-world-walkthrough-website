@extends('layouts.navigation')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark mt-5">
                <div class="card-header">{{ __('Post') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form action="{{ url('/post/update') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$post->id}}" readonly/>
                        <h5 class="card-title">Title</h5>
                        <input type="text" name="title" value="{{$post->title}}"/>
                        </br>
                        </br>
                        <h5 class="card-title">Content</h5>
                        <textarea class="form-control" id="floatingTextarea2" name="content" style="height: 100px">{{$post->content}}</textarea>

                        </br>
                        </br>

                        <button type="submit" class="btn btn-primary">update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection