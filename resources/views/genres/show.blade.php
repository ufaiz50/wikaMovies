@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4">
    <div class="popular-movies py-24">
        <h2 class="uppercase tracking-wider text-pink-500 text-lg font-semibold">result for genre {{ $genrenya }}</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-7 gap-8">

            @foreach ($resultGenres as $result)
            <x-genres-card :result=$result :genres=$genres/>
            @endforeach

        </div>
    </div> <!-- end popular movies -->
</div>

@endsection