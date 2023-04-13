
<title>Homepage</title>

@extends('layouts.navigation')
@section('content')
<style>
    body {
        background-image: url('{{ asset("/img/monsterhunterbackground.jpg") }}');
        background-color: rgba(46, 50, 54, 0.7);
        background-blend-mode: multiply;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        font-family: "Marcellus SC";
    }

    .content {
        position: relative;
        bottom: 50px;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        padding-left: 130px;
        padding-right: 130px;
        padding-top: 80px;
        font-size: 1.3rem;
        color: white;
        border-radius: 10px;
    }

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100%;
    }

    .image {
        max-width: 400px;
        max-height: 400px;
        display: block;
        margin: 0 auto;
    }
</style>
<div class="image-container">
    <img class="image" src="{{ asset('/img/homepageimg.jpg') }}" alt="My Image">
</div>

<div class="content">
    <h3>About The Game<h3>
            <p>Welcome to a new world! In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.</p>
</div>
@endsection
