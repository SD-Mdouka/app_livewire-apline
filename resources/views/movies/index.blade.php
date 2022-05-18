@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-6">
        <div class="popular-movies">
            <div class="card-body">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibolde">Papular Movies</h2>
            </div>
            <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$Genres" />
                @endforeach

            </div>
        </div>

    </div>
    <div class="container mx-auto px-4 py-6">
        <div class="card-body">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibolde">New Playes Movies</h2>
        </div>
        <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($newPlayingMovies as $Playing)
                <x-movie-card :movie="$Playing" />
            @endforeach
        </div>
    </div>
@endsection
