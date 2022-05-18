@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-8 ">
        <div class="popular-actors">
            <div class="card-body">
                <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibolde">Papular Actors</h2>
            </div>
            <div class="grid grid-cols-1 sm: grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @foreach ($popularActors as $actors)
                    <div class="actor mt-8">
                        <a href="{{ route('actors.show', $actors['id']) }}">
                            <img src="{{ $actors['profile_path'] }}" alt="Actors"
                                class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('actors.show', $actors['id']) }}"
                                class="text-lg hover:text-gray-300">{{ $actors['name'] }}</a>
                            <div class="text-sm truncate text-gray-400">
                                {{ $actors['known_for'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="page-load-status mt-8">
                <div class="flex justify-between mt-16">
                    @if ($previous)
                        <a class="py-4" href="/actors/page/{{ $previous }}">Previous</a>
                    @else
                        <a class="py-4 px-6">
                            <p class="infinite-scroll-last">End of content</p>
                        </a>
                    @endif

                    @if ($next)
                        <a class="py-4 px-6" href="/actors/page/{{ $next }}">Next</a>
                    @else
                        <div class="flex justify-between mt-16">
                            <p class="infinite-scroll-request spinner my-8 text-4xl">&nbsp;</p>
                            <p class="infinite-scroll-last">End of content</p>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        let elem = document.querySelector('.grid');
        let infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{ # }}',
            append: '.actor',
            status: '.page-load-status'
        });
    </script>
@endsection
