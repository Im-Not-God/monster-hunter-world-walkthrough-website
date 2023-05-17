@extends('layouts.navigation')


@section('content')
<div class="d-flex">
    <div>
        @include('sideNav')
    </div>
    <style>
        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            /* width: 100%; */
            height: max-content;
            margin: calc(35vh/2) 0;
            position: relative;
        }

        .image {
            max-width: 350px;
            max-height: 350px;
            display: block;
            margin: 0 auto;
        }
    </style>
    <div class="container">
        <div class="image-container">
            <img class="image" src="{{ asset('/img/extra/homepageimg.jpg') }}" alt="My Image">
        </div>
    </div>
</div>
@endsection