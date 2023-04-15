<title>Homepage</title>

@extends('layouts.navigation')
@section('content')
<style>
    body {
        background-image: url('{{ asset("/img/extra/monsterhunterbackground.jpg") }}');
        background-color: rgba(46, 50, 54, 0.7);
        background-blend-mode: multiply;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center;
        font-family: "Marcellus SC";
    }

    .content {
        position: relative;
        left: 50%;
        transform: translateX(-50%);
        text-align: center;
        padding-left: 130px;
        padding-right: 130px;
        font-size: 1.3rem;
        color: white;
        border-radius: 10px;
    }

    .image-container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* width: 100%; */
        height: max-content;
        margin: 50px 0;
        position: relative;
    }

    .image {
        max-width: 350px;
        max-height: 350px;
        display: block;
        margin: 0 auto;
    }

    .image-gif {
        position: absolute;
    }

    .image-ign {
        bottom: 0;
        width: 80px;
        position: absolute;
        position: absolute;
        transform: translateX(-110%);
    }
</style>
<div class="image-container">
    <img class="image" src="{{ asset('/img/extra/homepageimg_cleanup.jpg') }}" alt="My Image">
    <img class="image image-gif" src="{{ asset('/img/extra/mhw_icon.gif') }}" alt="My Image">
</div>

<div class="content">
    <h3>Welcome to a new world!</h3></br>
    <p>In Monster Hunter: World, the latest installment in the series, you can enjoy the ultimate hunting experience, using everything at your disposal to hunt monsters in a new world teeming with surprises and excitement.</p>
</div>

<div class="align-items-center d-flex justify-content-center">
    <div class="image-container">
        <img class="image" src="{{ asset('/img/extra/mhw_poster.jpg') }}" alt="My Image">
        <img class="image image-ign" src="{{ asset('/img/extra/ign_rating.png') }}" alt="My Image">
    </div>
    <div class="fs-3">
    <pre style="margin: 0;">
    Game genre       :  Action-adventure
    Game genre       :  Action-adventure
    Game developer   :  CAPCOM
    Game publisher   :  CAPCOM
    Game platforms   :  PC/XboxOne/PS4
    Release dates    :  2018-08-10 (Steam), 2018-01-26 (PS4/XboxOne)
    Official website :  <a href="https://www.monsterhunterworld.com/">Click here to visit</a>
</pre>
    </div>
</div>

@endsection
