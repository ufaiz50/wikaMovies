<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web update Movies dan Tv show">
    <title>Wika Movies</title>


    <link rel="stylesheet" href="/css/main.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/mainfooter.css">
    <livewire:styles>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <link rel="shortcut icon" href="/images/favicon.png" class="rounded-full">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class=" bg-black-900 border-b border-gray-800 flex flex-col sm:flex-row justify-between" x-data="{ open: false }">
        <div class="flex items-center flex-shrink-0 text-white justify-between px-4 py-6">
            <a href="#">
                <img class=" h-12 w-56 hover:bg-gray-800" src="/images/logo.png" alt="begining">
            </a>
            <button @click="open = !open" type="button"
                class="block sm:hidden px-2 hover:text-white focus:outline-none focus:text-white">
                <svg class="h-12 w-10 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path x-show="open" fill-rule="evenodd" clip-rule="evenodd"
                        d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                    <path x-show="!open" fill-rule="evenodd"
                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                </svg>
            </button>
        </div>

        <div class="w-full flex-grow sm:flex sm:items-center sm:w-auto px-4"
            :class="{ 'block shadow-3xl': open, 'hidden': !open }" @click.away="open = false" x-show="true">

            <ul class="pt-6 lg:pt-0 list-reset sm:flex justify-start flex-1 items-center">
                <li class="mr-3">
                    <a class="py-2 px-4 text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="{{ route('movies.index') }}">Movies</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="{{ route('tv.index') }}">Tv Shows</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="{{route('actors.index') }}">Actors</a>
                </li>
                <li class="mr-3">
                    <livewire:dropdown-genres>
                </li>
            </ul>
        </div>
        <div class="flex items-center justify-start px-4 pb-6">
            <livewire:search-dropdown>
                <div class="block w-12 ml-4 mt-2">
                    <a href="#">
                        <img src="/images/faiz.jpg" alt="avatar" class="rounded-full w-8 h-8">
                    </a>
                </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts>
    @yield('scripts')

    
</body>
</html>
@include('layouts.footer')