<!DOCTYPE html>

<head>
    <title>Homepage</title>
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    <style>
        .sideBar .container-fluid {
            background-color: #2E3236 !important;
            color: #333;
        }

        .sideBar {
            padding: 0%;

        }

        .sideBar .nav-link {
            color: #FFF !important;
        }

        .sideBar .active a.nav-link::before {
            content: "";
            width: 0;
            border-top: 7px solid transparent;
            border-bottom: 7px solid transparent;
            border-left: 7px solid gold;
            position: absolute;
            transform: translate(-70px, 2px);
            bottom: 26px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sideBar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column flex-grow-1">
                    <li class="nav-item {{ (Request::is('directory/weapon_list') || Request::is('directory/weapon_tree/*')) ? 'active' : '' }}">
                        <a class="nav-link" href="/directory/weapon_list">Weapon</a>
                    </li>
                    <li class="nav-item {{ (Request::is('directory/armor_list') || Request::is('directory/armor_list/*')) ? 'active' : '' }}">
                        <a class="nav-link" href="/directory/armor_list">Armor</a>
                    </li>
                    <li class="nav-item {{ (Request::is('directory/monster_list')) ? 'active' : '' }}">
                        <a class="nav-link" href="/directory/monster_list">Monster</a>
                    </li>
                    <li class="nav-item {{ (Request::is('directory/skill_list')) ? 'active' : '' }}">
                        <a class="nav-link" href="/directory/skill_list">Skill</a>
                    </li>
                    <li class="nav-item {{ (Request::is('directory/decorations_list')) ? 'active' : '' }}">
                        <a class="nav-link" href="/directory/decorations_list">Decoration</a>
                    </li>
                    <li class="nav-item {{ (Request::is('directory/ailment_list')) ? 'active' : '' }}">
                        <a class="nav-link" href="/directory/ailment_list">Ailment</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</body>

</html>