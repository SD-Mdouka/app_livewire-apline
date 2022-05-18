<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    public function __construct($tvshow)
    {
        //
        $this->tvshow=$tvshow;
    }
    public function tvshow()
    {
       return collect($this->tvshow)->merge([
             'poster_path'  => $this->tvshow['poster_path']
                     ? 'https://image.tmdb.org/t/p/w500/' . $this->tvshow['poster_path']
                     :'https://via.placeholder.com/300x450',
             'vote_average' =>$this->tvshow['vote_average'] * 10 . '%',
             'first_air_date' =>Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
             'genres'       => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
             'crew'         => collect($this->tvshow['credits']['crew'])->take(2),
             'cast'         => collect($this->tvshow['credits']['cast'])->take(5)->map(function($cast){
                 return collect($cast)->merge([
                     'profile_path'=>$cast['profile_path']
                     ? 'https://image.tmdb.org/t/p/w300'.$cast['profile_path']
                     :'https://via.placeholder.com/300x450',
                 ]);
             }),
             'images'         => collect($this->tvshow['images']['backdrops'])->take(9),
           ])->only([
               'poster_path','vote_average','first_air_date','genres','id','name','genre_ids','overview','crew','cast','images','credits','videos','created_by','profile_path'
           ]);
    }
}