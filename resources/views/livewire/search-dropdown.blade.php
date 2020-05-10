<div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
    <input wire:model.debounce.500ms="search" type="text"
        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:shadow-outline"
        placeholder="Search" x-ref="search" @keydown.window="
        if(event.keyCode === 191){
            event.preventDefault();
            $refs.search.focus();
        }
    " @focus="isOpen = true" @keydown="isOpen = true" @keydown.escape.window="isOpen = false"
        @keydown.shift.tab="isOpen = false">
    <div class="absolute top-0">
        <svg class="fill-current w-4 text-gray-500 mt-2 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path d="M310 190c-5.52 0-10 4.48-10 10s4.48 10 10 10 10-4.48 10-10-4.48-10-10-10z" />
            <path
                d="M500.281 443.719l-133.48-133.48C388.546 277.485 400 239.555 400 200 400 89.72 310.28 0 200 0S0 89.72 0 200s89.72 200 200 200c39.556 0 77.486-11.455 110.239-33.198l36.895 36.895.016.016 96.568 96.568C451.276 507.838 461.319 512 472 512c10.681 0 20.724-4.162 28.278-11.716C507.837 492.731 512 482.687 512 472s-4.163-20.731-11.719-28.281zm-194.745-97.992l-.002.002C274.667 368.149 238.175 380 200 380c-99.252 0-180-80.748-180-180S100.748 20 200 20s180 80.748 180 180c0 38.175-11.851 74.667-34.272 105.535a180.872 180.872 0 01-40.192 40.192zm20.98 9.066a200.674 200.674 0 0028.277-28.277l28.371 28.371a242.733 242.733 0 01-28.277 28.277l-28.371-28.371zm159.623 131.346c-3.78 3.78-8.801 5.861-14.139 5.861s-10.359-2.081-14.139-5.861l-88.795-88.795a262.775 262.775 0 0028.277-28.277l88.798 88.798A19.846 19.846 0 01492 472a19.856 19.856 0 01-5.861 14.139z" />
            <path
                d="M200 40c-88.225 0-160 71.775-160 160s71.775 160 160 160 160-71.775 160-160S288.225 40 200 40zm0 300c-77.196 0-140-62.804-140-140S122.804 60 200 60s140 62.804 140 140-62.804 140-140 140z" />
            <path
                d="M312.065 157.073c-8.611-22.412-23.604-41.574-43.36-55.413C248.479 87.49 224.721 80 200 80c-5.522 0-10 4.478-10 10s4.478 10 10 10c41.099 0 78.631 25.818 93.396 64.247a10.003 10.003 0 009.337 6.416 9.978 9.978 0 003.584-.668c5.155-1.981 7.729-7.766 5.748-12.922z" />
            </svg>
    </div>

    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

    @if(strlen($search) >= 2 )
    <div class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" x-show.transition.opacity="isOpen">
        @if ($searchResults->count() > 0 )
        <ul>
            @foreach ($searchResults as $result)
            <li class="border-b border-gray-700">
                <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 
                    flex items-center px-3 py-3" @if ($loop->last) @keydown.tab="isOpen = false" @endif
                    >
                    @if ($result['poster_path'])
                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-8">
                    @else
                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                    @endif
                    <span class="ml-4">{{ $result['title'] }}</span>
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <div class="px-3 py-3">No results for "{{$search}}"</div>
        @endif
    </div>
    @endif
</div>