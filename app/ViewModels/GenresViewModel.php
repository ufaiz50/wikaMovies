<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;
use Carbon\Carbon;

class GenresViewModel extends ViewModel
{
    
    public $resultGenres;
    public $genres;
    public $genrenya;


    public function __construct($resultGenres, $genres, $genrenya)
    {
        $this->resultGenres = $resultGenres;
        $this->genres = $genres;
        $this->genrenya = $genrenya;
    }

    public function resultGenres()
    {
        return $this->formatMovies($this->resultGenres);
    }

    public function genres()
    {
        return collect($this->genres)->mapWithKeys(function($genre){
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatMovies($results)
    {

        return collect($results)->map(function($result){
            $genresFormatted = collect($result['genre_ids'])->mapWithKeys(function($value){
                return [$value =>$this->genres()->get($value)];
            })->implode(', ');

            return collect($result)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/'.$result['poster_path'],
                'vote_average' => $result['vote_average'] * 10 .'%',
                'release_date' => Carbon::parse($result['release_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
    }
}
