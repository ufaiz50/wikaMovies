<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wika Movies</title>


    <link rel="stylesheet" href="/css/main.css">
    <livewire:styles>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <link rel="shortcut icon" href="/images/favicon.png" class="rounded-full">
</head>

<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800 flex flex-col sm:flex-row justify-between" x-data="{ open: false }">
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
                    <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                        href="#">Genres</a>
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
    <!-- <nav x-data="{ open : false}">
        <header class="border-b border-gray-800 flex flex-col sm:flex-row justify-between">
            <div class="container mx-auto flex items-center justify-between px-4 py-6 ">
                <div>
                    <a href="{{ route('movies.index') }}">
                        <img class=" h-12 w-56 hover:bg-gray-800" src="/images/logo.png" alt="begining">
                    </a>
                </div>
                <div>
                    <button @click="open = !open" class="block sm:hidden">
                        <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path x-show="open" fill-rule="evenodd" clip-rule="evenodd"
                                d="M18.278 16.864a1 1 0 0 1-1.414 1.414l-4.829-4.828-4.828 4.828a1 1 0 0 1-1.414-1.414l4.828-4.829-4.828-4.828a1 1 0 0 1 1.414-1.414l4.829 4.828 4.828-4.828a1 1 0 1 1 1.414 1.414l-4.828 4.829 4.828 4.828z" />
                            <path x-show="!open" fill-rule="evenodd"
                                d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z" />
                        </svg>
                    </button>
                </div>
            </div>
            <div :class="{'hidden': !open }" @click.away="open = false" x-show="false"
            class="px-4 py-6 flex flex-col sm:flex-row">
                <a href="#" class="mt-1 px-2 py-1 block" @click=" open = false">Movies</a>
                <a href="#" class="mt-1 px-2 py-1 block" @click=" open = false">Movies</a>
                <a href="#" class="mt-1 px-2 py-1 block" @click=" open = false">Movies</a>
                <a href="#" class="mt-1 px-2 py-1 block" @click=" open = false">Movies</a>
            </div>
            <div>
                <ul x-show="open" class="sm:flex sm:flex-col sm:items-center sm:flex-row ">
                    <li class="sm:ml-6 md:ml-6 mt-3">
                        <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Movies</a>
                    </li>
                    <li class="sm:ml-6 md:ml-6 mt-3">
                        <a href="{{ route('tv.index') }}" class="hover:text-gray-300">TV Shows</a>
                    </li>
                    <li class="sm:ml-6 md:ml-6 mt-3">
                        <a href="{{route('actors.index') }}" class="hover:text-gray-300">Actors</a>
                    </li>
                    <li class="sm:ml-6 md:ml-6 mt-3">
                        <a href="{{route('actors.index') }}" class="hover:text-gray-300">Genres</a>
                    </li>
                </ul>
            </div> 
            <div class="flex items-center px-4 py-6">
                <livewire:search-dropdown>
                    <div class="block w-12 ml-4 mt-2">
                        <a href="#">
                            <img src="/images/faiz.jpg" alt="avatar" class="rounded-full w-8 h-8">
                        </a>
                    </div>
            </div>
        </header>
    </nav> -->
    @yield('content')
    <livewire:scripts>
    </livewire:scripts>
    @yield('scripts')

</body>

</html>