<div class=" z-40 relative mt-3 md:mt-0" x-data="{ itOpen : false }">
    <button @click="itOpen = !itOpen"
        class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4">Genres
    </button>
    <div class="relative">
        <div class="absolute top-0 bg-gray-800 rounded mt-4" style="width:28rem" 
        @click.away="itOpen = false"
        x-show="itOpen">
            <div class="grid grid-cols-4 gap-5 w-auto px-4 py-6">
                @foreach($genres as $genre)
                <a href="{{ route('genres.show', $genre['id']) }}" class="block hover:text-gray-200 hover:bg-gray-700">{{ $genre['name'] }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>