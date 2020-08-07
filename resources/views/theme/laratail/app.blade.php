<!DOCTYPE html>
<html lang="en" x-data="{nav:false}" :class="{'nav-open':nav}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tailwind Admin Panel</title>
    @yield('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Roboto@100;300;500" rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="stylesheet" href="/dist/css/app.css">
</head>
<style>
    @media screen and (min-width:991px) {
        .image-menu {
            padding-left: .75rem;
            padding-right: .75rem;
        }

        .sidebar-mini .sidebar {
            width: 80px;
        }

        .sidebar-mini .main-content {
            width: calc(100% - 80px);
        }

        .sidebar-mini img.menu-icon {
            padding-left: 0;
            padding-right: 0;
        }

        .sidebar-mini .image-menu {
            margin-left: 0;
            margin-right: 0;
        }

        .sidebar-mini .menu-text {
            transform: translate3d(-25px, 0, 0);
            opacity: 0;
            transition: all .3s linear;
        }

        .sidebar-mini .sidebar:hover {
            width: 20%;
        }

        .sidebar,
        .main-content {
            transition-property: top, bottom, width;
            transition-duration: .2s, .2s, .35s;
            transition-timing-function: linear, linear, ease;
        }

        .sidebar-mini .sidebar:hover .menu-text {
            transform: translateZ(0);
            opacity: 1;
        }
    }

    @media screen and (max-width: 991px) {
        .sidebar {
            width: 260px;
            position: fixed;
            top: 0;
            right: 0;
            transform: translate3d(260px, 0, 0);
            transition: all .33s cubic-bezier(.685, .0473, .346, 1);
        }

        .nav-open .sidebar {
            transform: translateZ(0);
        }

        .main-content {
            transition: all .33s cubic-bezier(.685, .0473, .346, 1);
        }

        .nav-open .main-content {
            left: 0;
            transform: translate3d(-260px, 0, 0);
        }
    }
</style>

<body style="font-family:Roboto">
    <div class="relative h-screen">
        @include('theme.laratail.components.sidebar')
        <div class="main-content min-h-screen bg-gray-300 w-full lg:w-4/5 reltive float-right"
            :class="{'bg-gray-900 bg-opacity-75':nav}">
            @include('theme.laratail.components.navbar')
            <div id="app">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{url(mix('/dist/js/app.js'))}}"></script>
    @include('theme.laratail.components.flash')
    @yield('scripts')
</body>

</html>
