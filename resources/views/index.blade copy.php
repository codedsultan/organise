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
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
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
                <div class="d-flex align-items-center flex-column flex-lg-row">

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
                    <form class="me-2 mb-2 mb-lg-0">
                    <input type="text" class="form-control form-control-sm" placeholder="Search" />
                    </form>

                </div>
                </div>
            </div>
        </nav>
        <div>
            <h1>Events</h1>


            <div class="row flex">
                @foreach($events as $event)
                <div class="col-sm-3 mb-4">
                    <div class="card h-100">
                        <img src="{{$event->featured_image}}" class="card-img-top" alt="green iguana" />
                        <div class="card-body">
                            <h4>{{$event->title}}</h4>
                                <!-- <p class="card-text text-wrap">
                                   {{$event->description}}
                                </p> -->
                            <!-- <div>
                            <button class="btn btn-primary" type="button">Share</button>
                            <button class="btn btn-link" type="button">Learn More</button>
                            <button class="btn btn-link" type="button">Learn More</button>
                            </div> -->
                        </div>
                        <div class="card-footer">
                        <!-- <button class="btn btn-link" type="button">
                            Learn More
                        </button> -->

                        <a
                            href="{{ route('event.show',$event->id) }}"
                            class="btn btn-primary"
                        >
                            Learn More
                        </a>
                            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                        </div>
                    </div>

                </div>
                @endforeach

            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>

<style>
.row {
    display: flex;
    overflow: hidden;
}
</style>

