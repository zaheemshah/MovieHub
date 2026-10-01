<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $movie['title'] ?? 'Movie Details' }} - MovieHub</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #070707;
            color: white;
        }

        .navbar {
            height: 70px;
            background: #111;
            border-bottom: 1px solid #252525;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 6%;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            font-size: 25px;
            font-weight: 900;
            letter-spacing: 2px;
        }

        .logo span {
            color: #e50914;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a,
        .logout-btn {
            color: #ddd;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 15px;
            font-weight: 600;
        }

        .nav-links a:hover,
        .logout-btn:hover {
            color: #e50914;
        }

        .backdrop {
            min-height: 650px;
            position: relative;
            background-size: cover;
            background-position: center;
        }

        .backdrop::before {
            content: "";
            position: absolute;
            inset: 0;
            background:
                linear-gradient(90deg, #070707 5%, rgba(7,7,7,.88) 38%, rgba(7,7,7,.55) 70%, #070707 100%);
        }

        .backdrop::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, #070707 0%, transparent 30%);
        }

        .content {
            position: relative;
            z-index: 2;
            min-height: 650px;
            display: flex;
            align-items: center;
            gap: 45px;
            max-width: 1200px;
            margin: auto;
            padding: 70px 30px;
        }

        .poster {
            width: 300px;
            min-width: 300px;
            border-radius: 10px;
            box-shadow: 0 25px 60px rgba(0,0,0,.8);
            border: 1px solid rgba(255,255,255,.1);
        }

        .info {
            max-width: 700px;
        }

        .label {
            color: #e50914;
            text-transform: uppercase;
            letter-spacing: 3px;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 12px;
        }

        h1 {
            font-size: 52px;
            line-height: 1.05;
            margin-bottom: 18px;
        }

        .meta {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            color: #bbb;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .rating {
            color: #ffc107;
            font-weight: bold;
        }

        .overview {
            color: #ccc;
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            padding: 13px 22px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        .primary {
            background: #e50914;
            color: white;
        }

        .primary:hover {
            background: #b20710;
        }

        .secondary {
            background: #222;
            color: white;
            border: 1px solid #444;
        }

        .secondary:hover {
            border-color: #e50914;
            color: #e50914;
        }

        .favorite-form {
            display: inline;
        }

        .favorite-form button {
            border: 0;
        }

        footer {
            border-top: 1px solid #222;
            padding: 25px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 800px) {
            .content {
                flex-direction: column;
                text-align: center;
                padding: 55px 20px;
            }

            .poster {
                width: 230px;
                min-width: 230px;
            }

            h1 {
                font-size: 38px;
            }

            .meta,
            .actions {
                justify-content: center;
            }

            .backdrop {
                min-height: auto;
            }

            .content {
                min-height: auto;
            }
        }

        @media (max-width: 550px) {
            .navbar {
                padding: 0 4%;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a,
            .logout-btn {
                font-size: 12px;
            }

            .poster {
                width: 200px;
                min-width: 200px;
            }

            h1 {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">
        MOVIE<span>HUB</span>
    </div>

    <div class="nav-links">

        <a href="{{ route('home') }}">Home</a>

        @auth

            <a href="{{ route('favorites') }}">
                Favorites
            </a>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf

                <button type="submit" class="logout-btn">
                    Logout
                </button>
            </form>

        @else

            <a href="{{ route('login') }}">
                Login
            </a>

            <a href="{{ route('register') }}">
                Register
            </a>

        @endauth

    </div>

</nav>


@php
    $backdrop = !empty($movie['backdrop_path'])
        ? 'https://image.tmdb.org/t/p/original' . $movie['backdrop_path']
        : '';
@endphp


<div
    class="backdrop"
    @if($backdrop)
        style="background-image: url('{{ $backdrop }}');"
    @endif
>

    <div class="content">

        @if(!empty($movie['poster_path']))

            <img
                class="poster"
                src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                alt="{{ $movie['title'] ?? 'Movie' }}"
            >

        @endif


        <div class="info">

            <div class="label">
                Movie Details
            </div>

            <h1>
                {{ $movie['title'] ?? 'Unknown Movie' }}
            </h1>


            <div class="meta">

                @if(!empty($movie['release_date']))
                    <span>
                        {{ substr($movie['release_date'], 0, 4) }}
                    </span>
                @endif

                <span class="rating">
                    ★ {{ number_format($movie['vote_average'] ?? 0, 1) }}
                </span>

                @if(!empty($movie['runtime']))
                    <span>
                        {{ $movie['runtime'] }} min
                    </span>
                @endif

            </div>


            <p class="overview">
                {{ $movie['overview'] ?? 'No overview available for this movie.' }}
            </p>


            <div class="actions">

                @auth

                    <form
                        action="{{ route('favorite.add', $movie['id']) }}"
                        method="POST"
                        class="favorite-form"
                    >
                        @csrf

                        <button class="btn primary" type="submit">
                            ♥ Add to Favorites
                        </button>
                    </form>

                @endauth


                <a
                    class="btn secondary"
                    target="_blank"
                    href="https://www.youtube.com/results?search_query={{ urlencode(($movie['title'] ?? 'movie') . ' trailer') }}"
                >
                    ▶ Watch Trailer
                </a>


                <a
                    href="{{ route('home') }}"
                    class="btn secondary"
                >
                    ← Back Home
                </a>

            </div>

        </div>

    </div>

</div>


<footer>
    MovieHub &copy; {{ date('Y') }} — Powered by TMDB
</footer>

</body>
</html>