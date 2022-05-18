@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-6">
        <div class="popular-tv">
            <div class="card-body">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibolde">Tv Shows</h2>
            </div>
            <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularTv as $tvshow)
                    <x-tv-card :tvshow="$tvshow" />
                @endforeach

            </div>
        </div>

    </div>
    <div class="container mx-auto px-4 py-6">
        <div class="card-body">
            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibolde">Top Rated Tv </h2>
        </div>
        <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
            @foreach ($topRatedTv as $tvshow)
                <x-tv-card :tvshow="$tvshow" />
            @endforeach
        </div>
    </div>
@endsection
