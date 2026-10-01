<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TMDBService
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
    }

    public function getTrendingMovies()
    {
        $response = Http::get("https://api.themoviedb.org/3/trending/movie/day", [
            'api_key' => $this->apiKey
        ]);

        return $response->json('results') ?? [];
    }

    public function searchMovies($query)
    {
        $response = Http::get("https://api.themoviedb.org/3/search/movie", [
            'api_key' => $this->apiKey,
            'query' => $query
        ]);

        return $response->json('results') ?? [];
    }
    public function getMovieDetails($id)
{
    $response = Http::get("https://api.themoviedb.org/3/movie/{$id}", [
        'api_key' => $this->apiKey
    ]);

    return $response->json();
}
}