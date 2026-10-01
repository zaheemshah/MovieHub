<!DOCTYPE html>
<html>
<head>
    <title>My Favorites</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            margin:0;
            background:#0b1220;
            color:white;
            font-family:'Poppins',sans-serif;
            padding:30px;
        }

        .top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        h1{
            font-size:28px;
        }

        .back{
            color:#38bdf8;
            text-decoration:none;
            font-weight:600;
        }

        .container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(180px,1fr));
            gap:20px;
        }

        .card{
            background:#1e293b;
            border-radius:15px;
            overflow:hidden;
            transition:0.3s;
            box-shadow:0 10px 20px rgba(0,0,0,0.3);
        }

        .card:hover{
            transform:scale(1.05);
        }

        .card img{
            width:100%;
            height:260px;
            object-fit:cover;
        }

        .card h3{
            padding:10px;
            font-size:14px;
        }

        .meta{
            padding:0 10px 10px;
            font-size:12px;
            color:#94a3b8;
        }

        .btn{
            width:100%;
            background:red;
            color:white;
            border:none;
            padding:10px;
            cursor:pointer;
            font-size:13px;
            font-weight:600;
        }

        .btn:hover{
            opacity:0.8;
        }

        .empty{
            text-align:center;
            margin-top:50px;
            color:#94a3b8;
        }
    </style>
</head>

<body>

<<div class="top">
    <a href="/" class="back">← Back Home</a>

    <h1>❤️ My Favorites ({{ count($movies) }})</h1>
</div>

@if(count($movies) == 0)

    <div class="empty">
        No favorite movies yet 😢
    </div>

@else

<div class="container">

@foreach($movies as $movie)

<div class="card">

    <a href="/movie/{{ $movie['id'] }}">
        <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}">
    </a>

    <h3>{{ $movie['title'] }}</h3>

    <div class="meta">
        ⭐ {{ $movie['vote_average'] }} <br>
        📅 {{ $movie['release_date'] }}
    </div>

    <form action="{{ route('favorite.remove', $movie['id']) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn">
            ❌ Remove
        </button>
    </form>

</div>

@endforeach

</div>

@endif

</body>
</html>