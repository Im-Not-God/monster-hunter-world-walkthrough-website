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

                    <form action="" method="post">
                        @csrf
                        <h5 class="card-title">Title</h5>
                        <input type="text" name="title" />
                        </br>
                        </br>
                        <h5 class="card-title">Content</h5>
                        <textarea class="form-control" id="floatingTextarea2" name="content" style="height: 100px"></textarea>

                        <!-- <div id="summernote">
                            </div> -->
                        </br>
                        </br>

                        <button type="submit" class="btn btn-primary">create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection