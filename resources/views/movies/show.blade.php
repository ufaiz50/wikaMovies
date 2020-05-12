@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <img src="{{ $movie['poster_path'] }}" alt="poster" class="w-40 sm:w-48 md:w-64 lg:w-96">
        <div class="md:ml-24">
            <h2 class="text-4xl semi-bold">{{ $movie['title'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <svg height="8pt" viewBox="0 -10 511.986 511" width="8pt" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M499.574 188.504c-3.199-9.922-11.988-16.938-22.398-17.899L335.82 157.762 279.926 26.926a26.019 26.019 0 00-23.934-15.766c-10.433 0-19.82 6.207-23.937 15.809l-55.89 130.816-141.38 12.84a25.938 25.938 0 00-22.379 17.879 26.028 26.028 0 007.617 27.648l106.86 93.696L95.37 448.62a26.055 26.055 0 0010.137 26.879 25.655 25.655 0 0015.23 4.992c4.63 0 9.239-1.234 13.356-3.71l121.898-72.895 121.875 72.875a25.959 25.959 0 0028.61-1.239 26.059 26.059 0 0010.132-26.882l-31.507-138.77 106.859-93.7a26.046 26.046 0 007.613-27.667zm0 0"
                        fill="#ffc107" />
                    <path
                        d="M114.617 491.137a27.161 27.161 0 01-15.957-5.184c-8.855-6.398-12.992-17.43-10.582-28.094l32.938-145.066L9.312 214.828a27.196 27.196 0 01-7.976-28.906 27.228 27.228 0 0123.402-18.73l147.82-13.419 58.41-136.746C235.279 6.98 245.09.492 255.993.492c10.903 0 20.715 6.488 25.024 16.512l58.41 136.77 147.797 13.417c10.882.98 20.054 8.344 23.425 18.711 3.372 10.387.254 21.739-7.98 28.907l-111.68 97.941 32.938 145.066c2.414 10.668-1.727 21.696-10.578 28.094-8.813 6.38-20.567 6.914-29.891 1.324l-127.465-76.16-127.445 76.203a27.021 27.021 0 01-13.93 3.86zm141.375-112.871c4.844 0 9.64 1.3 13.953 3.859l120.278 71.938-31.086-136.942a27.191 27.191 0 018.62-26.516l105.473-92.523-139.543-12.672a27.099 27.099 0 01-22.593-16.469L255.992 39.895 200.844 168.96c-3.903 9.238-12.563 15.531-22.59 16.43l-139.52 12.671 105.47 92.52c7.554 6.594 10.839 16.77 8.62 26.54l-31.082 136.94 120.278-71.937c4.328-2.559 9.128-3.86 13.972-3.86zM171.406 156.44v.02zm169.153-.066v0zm0 0" />
                </svg>
                <span class="ml-1">{{ $movie['vote_average'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['release_date'] }}</span>
                <span class="mx-2">|</span>
                <span>{{ $movie['genres'] }}</span>
            </div>
            <p class="text-gray-300 mt-8">
                {{ $movie['overview']}}
            </p>
            <div class="mt-12">
                <h4 class="text-white font-semibold">Featured Cast</h4>
                <div class="flex mt-4">
                    @foreach($movie['crew'] as $crew)
                    <div class="mr-8">
                        <div>{{ $crew['name'] }}</div>
                        <div class="text-sm text-gray-400">{{ $crew['job'] }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div x-data="{ isOpen: false }">
                @if(count($movie['videos']['results']) > 0 )
                <div class="mt-12">
                    <button @click="isOpen = true" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5
                            py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                        <svg height="12pt" width="12pt" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path
                                d="M256 0C114.833 0 0 114.844 0 256s114.833 256 256 256 256-114.844 256-256S397.167 0 256 0zm0 490.667C126.604 490.667 21.333 385.396 21.333 256S126.604 21.333 256 21.333 490.667 126.604 490.667 256 385.396 490.667 256 490.667z" />
                            <path
                                d="M357.771 247.031l-149.333-96c-3.271-2.135-7.5-2.25-10.875-.396A10.653 10.653 0 00192 160v192c0 3.906 2.125 7.49 5.563 9.365a10.68 10.68 0 005.104 1.302c2 0 4.021-.563 5.771-1.698l149.333-96c3.042-1.958 4.896-5.344 4.896-8.969s-1.854-7.01-4.896-8.969zm-144.438 85.427V179.542L332.271 256l-118.938 76.458z" />
                            </svg>
                        <span class="ml-2">Play Trailer</span>
                    </button>
                </div>
                @endif

                <div style="background-color: rgb(0, 0, 0, .5);"
                    class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
                    x-show.transition.opacity="isOpen">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pr-4 pd-2">
                                <button @click=" isOpen= false"
                                    class="text-3xl leading-none hover:text-gray-300">&times;
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <!--kontens -->
                                <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                    <iframe width="560" height="315"
                                        class="responsive-iframe absolute top-0 left-0 w-full h-full"
                                        src="https://www.youtube.com/embed/{{ $movie['videos']['results'][0]['key'] }}"
                                        style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end Movie Info -->

<div class="movie-cast border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Cast</h2>
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-7 gap-8 mb-8">
            @foreach($movie['cast'] as $cast)
            <div class="mb-4">
                <a href="{{ route('actors.show', $cast['id']) }}">
                    <img src="{{ $cast['profile_path'] }}" alt="actor"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                </a>
                <div class="mt-2">
                    <a href="#" class="text-lg mt-2 hover:text-gray-300">{{ $cast['name'] }}</a>
                    <div class="text-sm text-gray-400">
                        {{ $cast['character'] }}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div> <!-- end Movie Cast -->

<div class="movie-images" x-data="{ isOpen: false, image:'' }">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Images</h2>
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-4 lg:grid-cols-4 gap-8 mb-8">
            @foreach($movie['images'] as $image)
            <div class="mb-4">
                <button @click.prevent="
                            isOpen = true
                            image='{{ 'https://image.tmdb.org/t/p/original/'.$image['file_path'] }}'">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$image['file_path'] }}" alt="actor"
                        class="hover:opacity-75 transition ease-in-out duration-150">
                </button>
            </div>
            @endforeach
        </div>
        <div style="background-color: rgb(0, 0, 0, .5);"
            class="fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto"
            x-show.transition.opacity="isOpen">
            <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                <div class="bg-gray-900 rounded">
                    <div class="flex justify-end pr-4 pd-2">
                        <button @click=" isOpen= false" @keydown.escape.window=" isOpen= false"
                            class="text-3xl leading-none hover:text-gray-300">&times;
                        </button>
                    </div>
                    <div class="modal-body px-8 py-8">
                        <img :src="image" alt="poster">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end Movie Images -->

@endsection