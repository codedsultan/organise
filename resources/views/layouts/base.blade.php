<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
        @stack('styles')
    </head>
    <body class="container-lg">
        <nav class="navbar navbar-expand-lg">
            <div class="container-lg">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#"><img class="logo" src="{{ url('/logo.png')}}" /></a>
                <div class="collapse navbar-collapse" id="navbarExample">
                <ul class="navbar-nav me-auto mb-0">
                    <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                    @if(Auth::guard('customer')->check())
                        <a class="nav-link" aria-current="page" href="{{ route('user.home') }}">Dashboard</a>
                    @elseif(Auth::guard('organiser')->check())
                        <a class="nav-link" aria-current="page" href="{{ route('organiser.home') }}">Dashboard</a>
                    @endif
                    </li>
                    <!-- <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Team</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Projects</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li> -->
                </ul>
                <div>
                    <form class="me-2 mb-2 mb-lg-0">
                        <input type="text" class="form-control form-control-sm" placeholder="Search" />
                    </form>
                 </div>

                <div>
                    @if (!Auth::guard('customer')->check() && !Auth::guard('organiser')->check()  )
                        <a
                            href="{{ route('user.login') }}"
                            class="btn btn-primary mx-2"
                        >
                            User Log in
                        </a>

                        <a
                            href="{{ route('organiser.login') }}"
                            class="btn btn-primary mx-2"
                        >
                            Organiser Log in
                        </a>
                    @elseif (Auth::guard('customer')->check())

                <!-- <div class="d-flex align-items-center flex-column flex-lg-row"> -->
                        @if(Auth::guard('customer')->check())

                            <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>

                        @else
                            <a
                                href="{{ route('user.login') }}"
                                class="btn btn-primary mx-2"
                            >
                                User Log in
                            </a>
                        @endif


                    @elseif (Auth::guard('organiser')->check())
                        @if(Auth::guard('organiser')->check())
                            <a href="{{ route('organiser.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                            <form action="{{ route('organiser.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>


                        @else
                            <a
                                href="{{ route('organiser.login') }}"
                                class="btn btn-primary mx-2"
                            >
                                Organiser Log in
                            </a>
                        @endif
                    @endif

                </div>


                </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

<style>
/* .logo {
    width: 50px;
    height: 50px;
} */
</style>

