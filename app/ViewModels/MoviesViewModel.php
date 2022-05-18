<?php

namespace App\ViewModels;

use Carbon\Carbon;
use phpDocumentor\Reflection\Types\This;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    public $popularMovies;
    public $Genres;
    public $newPlayingMovies;
    public function __construct($popularMovies,$newPlayingMovies,$genres)
    {
        //
        $this->popularMovies=$popularMovies;
        $this->Genres=$genres;
        $this->newPlayingMovies=$newPlayingMovies;
    }
    public function popularMovies()
    {
       return $this->FormatMovies($this->popularMovies);
    }
    public function newPlayingMovies()
    {
       return $this->FormatMovies($this->newPlayingMovies);
    }
    public function Genres()
    {
       return collect($this->Genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });
    }
    private function FormatMovies($movies)
    {
       return collect($movies)->map(function($movie){
            $genresFormat = collect($movie['genre_ids'])->mapWithKeys(function($value){
            return [$value => $this->Genres()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
             'poster_path'  =>$movie['poster_path']
             ? 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path']
              :'https://via.placeholder.com/300x450',
             'vote_average' =>$movie['vote_average'] * 10 . '%',
             'release_date' =>Carbon::parse($movie['release_date'])->format('M d, Y'),
             'genres'       => $genresFormat,
           ])->only([
               'poster_path','vote_average','release_date','genres','id','title','genre_ids','overview',
           ]);
       });
    }
}