@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase tracking-wider text-pink-500 text-lg font-semibold">Popular Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-7 gap-8">

                @foreach ($popularMovies as $movie)
                    <x-movie-card :movie="$movie" :genres="$genres"/>
                @endforeach

            </div>
        </div> <!-- end popular movies -->

        <div class="now-playing-movies py-24">
            <h2 class="uppercase tracking-wider text-pink-500 text-lg font-semibold">Now Playing Movies</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-7 gap-8">
                @foreach ($nowPlayingMovies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div><!-- end now playing movies -->
    </div>

@endsection