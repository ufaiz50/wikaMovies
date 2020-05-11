@extends('layouts.main')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-actors">
            <h2 class="uppercase tracking-wider text-pink-500 text-lg font-semibold">Popular Actors</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="actor mt-8">
                    <a href="">
                        <img src="/images/faiz.jpg" alt="actors">
                    </a>
                    <div>
                        <a href="#" class="text-lg hover:text-gray-300">Faiz</a>
                        <div class="text-sm truncate text-gray-400">Umar Faiz</div>
                    </div>
                </div>
            </div>
        </div> <!-- end popular actors  -->
    </div>

@endsection