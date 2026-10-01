<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MovieHub - Discover Movies</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #080808;
            color: #fff;
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
            z-index: 1000;
        }

        .logo {
            font-size: 25px;
            font-weight: 800;
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

        .hero {
            padding: 70px 6% 45px;
            background:
                linear-gradient(90deg, #080808 0%, rgba(8,8,8,.88) 45%, rgba(8,8,8,.45) 100%);
        }

        .hero h1 {
            font-size: 52px;
            line-height: 1.05;
            margin-bottom: 15px;
        }

        .hero h1 span {
            color: #e50914;
        }

        .hero p {
            color: #aaa;
            max-width: 650px;
            font-size: 17px;
            line-height: 1.6;
        }

        .search-area {
            padding: 0 6% 45px;
        }

        .search-form {
            display: flex;
            max-width: 650px;
            gap: 10px;
        }

        .search-form input {
            flex: 1;
            padding: 15px 18px;
            background: #151515;
            border: 1px solid #333;
            border-radius: 6px;
            color: white;
            outline: none;
            font-size: 15px;
        }

        .search-form input:focus {
            border-color: #e50914;
        }

        .search-form button {
            padding: 15px 25px;
            background: #e50914;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
        }

        .search-form button:hover {
            background: #b20710;
        }

        .section {
            padding: 0 6% 60px;
        }

        .section-title {
            font-size: 28px;
            margin-bottom: 25px;
        }

        .section-title span {
            color: #e50914;
        }

        .movie-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(190px, 1fr));
            gap: 25px;
        }

        .movie-card {
            background: #121212;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #222;
            transition: transform .25s ease, border-color .25s ease;
        }

        .movie-card:hover {
            transform: translateY(-7px);
            border-color: #e50914;
        }

        .poster {
            width: 100%;
            height: 285px;
            object-fit: cover;
            display: block;
            background: #222;
        }

        .movie-info {
            padding: 15px;
        }

        .movie-title {
            font-size: 17px;
            margin-bottom: 8px;
            min-height: 40px;
        }

        .rating {
            color: #ffc107;
            margin-bottom: 14px;
            font-size: 14px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .details-btn {
            background: #e50914;
            color: white;
        }

        .details-btn:hover {
            background: #b20710;
        }

        .fav-btn {
            background: #252525;
            color: white;
            border: 1px solid #444;
        }

        .fav-btn:hover {
            border-color: #e50914;
            color: #e50914;
        }

        .trailer {
            background: #1d1d1d;
            color: #ddd;
        }

        .trailer:hover {
            color: white;
            background: #292929;
        }

        .empty {
            color: #999;
            padding: 30px 0;
        }

        footer {
            border-top: 1px solid #222;
            padding: 25px 6%;
            text-align: center;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 0 4%;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a,
            .logout-btn {
                font-size: 13px;
            }

            .hero {
                padding: 50px 4% 35px;
            }

            .hero h1 {
                font-size: 38px;
            }

            .search-area,
            .section {
                padding-left: 4%;
                padding-right: 4%;
            }

            .movie-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            .poster {
                height: 240px;
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


<section class="hero">

    <h1>
        Discover <span>Movies</span>
    </h1>

    <p>
        Explore trending movies, search for your favorites,
        watch trailers and build your personal movie collection.
    </p>

</section>


<section class="search-area">

    <form action="{{ route('search') }}" method="GET" class="search-form">

        <input
            type="text"
            name="movie"
            placeholder="Search for a movie..."
            value="{{ $search ?? '' }}"
            required
        >

        <button type="submit">
            Search
        </button>

    </form>

</section>


<section class="section">

    <h2 class="section-title">

        @if(isset($search) && $search)
            Search Results for "<span>{{ $search }}</span>"
        @else
            Trending <span>Movies</span>
        @endif

    </h2>


    @if(!empty($movies))

        <div class="movie-container">

            @foreach($movies as $movie)

                <div class="movie-card">

                    @if(!empty($movie['poster_path']))

                        <img
                            class="poster"
                            src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                            alt="{{ $movie['title'] ?? 'Movie' }}"
                        >

                    @else

                        <div class="poster"></div>

                    @endif


                    <div class="movie-info">

                        <h3 class="movie-title">
                            {{ $movie['title'] ?? 'Untitled Movie' }}
                        </h3>

                        <div class="rating">
                            ★ {{ number_format($movie['vote_average'] ?? 0, 1) }}
                        </div>


                        <div class="actions">

                            <a
                                href="{{ route('movie.show', $movie['id']) }}"
                                class="btn details-btn"
                            >
                                View Details
                            </a>


                            @auth

                                <form
                                    action="{{ route('favorite.add', $movie['id']) }}"
                                    method="POST"
                                >
                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn fav-btn"
                                    >
                                        Add to Favorites
                                    </button>

                                </form>

                            @endauth


                            <a
                                class="btn trailer"
                                target="_blank"
                                href="https://www.youtube.com/results?search_query={{ urlencode(($movie['title'] ?? 'movie') . ' trailer') }}"
                            >
                                Watch Trailer
                            </a>

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        <p class="empty">
            No movies found.
        </p>

    @endif

</section>


<footer>
    MovieHub &copy; {{ date('Y') }} — Powered by TMDB
</footer>

</body>
</html>