<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    // HOME PAGE (Trending Movies)
    public function index(TMDBService $tmdb)
    {
        $movies = $tmdb->getTrendingMovies();
        return view('home', compact('movies'));
    }

    // SEARCH MOVIES
    public function search(Request $request, TMDBService $tmdb)
    {
        $query = $request->movie;
        $movies = $tmdb->searchMovies($query);

        return view('home', [
            'movies' => $movies,
            'search' => $query
        ]);
    }

    // MOVIE DETAILS
    public function show($id, TMDBService $tmdb)
    {
        $movie = $tmdb->getMovieDetails($id);
        return view('movie', compact('movie'));
    }

    // ADD TO FAVORITES (DATABASE)
    public function favorite($id)
    {
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'movie_id' => $id
        ]);

        return redirect()->back();
    }

    // SHOW FAVORITES (DATABASE)
    public function favorites(TMDBService $tmdb)
    {
        $favoriteIds = Favorite::where('user_id', Auth::id())
            ->pluck('movie_id');

        $movies = [];

        foreach ($favoriteIds as $id) {
            $movies[] = $tmdb->getMovieDetails($id);
        }

        return view('favorites', compact('movies'));
    }

    // REMOVE FROM FAVORITES
    public function removeFavorite($id)
    {
        Favorite::where('user_id', Auth::id())
            ->where('movie_id', $id)
            ->delete();

        return redirect()->back();
    }
}