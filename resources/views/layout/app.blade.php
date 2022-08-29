<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

    <style>
        #btn-back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
        }

        .page-load-status {
            padding-top: 20px;
            /* border-top: 1px solid #DDD; */
            text-align: center;
            color: #777;
        }

        .swiper {
            width: 100%;
            height: 100%;
        }

        .img-card,
        .movie-card,
        .star-card,
        .star-detail-card {
            transition: transform 100ms ease-in;
            cursor: pointer;
        }

        .img-card:hover,
        .movie-card:hover,
        .star-card:hover,
        .star-detail-card:hover {
            transform: scale(0.95);
        }

        .carousel .carousel-item {
            height: 500px;
        }

        .rounded {
            border-radius: 0.95rem !important;
        }

        html,
        body {
            width: 100%;
            height: 100%;
        }

        body {
            background: linear-gradient(-45deg, #b82e1f, #28313b, #434343, #2c3e50);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
            font-family: 'Courier New', Courier, monospace;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Large devices (laptops/desktops, 992px and up) */
        @media only screen and (max-width: 992px) {
            .carousel .carousel-item {
                height: 100%;
            }

            .movie-detail-img, .tv-detail-img, .star-detail-img {
                padding: 1rem 0.5rem 0 !important;
            }
            .movie-detail-info, .tv-detail-info, .star-detail-info {
                width: 100%;
                padding: 3rem 0.5rem 1rem !important;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">MV-APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/movies">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tv_shows">TV Shows</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/stars">Stars</a>
                    </li>
                </ul>
                <form class="d-flex" method="post" action="{{ route('search') }}">
                    @csrf
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                        name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
