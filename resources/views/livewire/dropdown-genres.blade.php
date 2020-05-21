<div x-data="{ itOpen : false }">
    <button @click="itOpen = !itOpen"
        class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Genres
    </button>
    <div class="relative mt-5 md:mt-0 mt-5" style="width:28rem">
        <ul class="absolute  bg-gray-800 rounded top-0 grid grid-cols-4 gap-5 w-auto px-4 py-6" 
            :class="{ 'hidden': !itOpen }" @click.away="itOpen = false"
            x-show="itOpen">
            @foreach($genres as $genre)
            <li>
                <a href="{{ route('genres.show', $genre['id']) }}"
                    class="block hover:text-gray-200 hover:bg-gray-700">{{ $genre['name'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>