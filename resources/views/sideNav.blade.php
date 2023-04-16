<!DOCTYPE html>

<head>
    <title>Homepage</title>
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    <style>
        .container-fluid {
            background-color: #2E3236; !important
            color: #333;
        }
        .navbar{
            padding: 0%;
            
        }
        .nav-link{
            color: #FFF; !important
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link" href="/directory/weapon_list">weapon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/directory/ammor_list">Armor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/directory/monster_list">monster</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/directory/skill_list">Skill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/directory/decorations_list">Decoration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/directory/ailment_list">Ailment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>
