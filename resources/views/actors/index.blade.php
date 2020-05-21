@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="popular-actors">
        <h2 class="uppercase tracking-wider text-pink-500 text-lg font-semibold">Popular Actors</h2>
        <div class="loadactor grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6 gap-4">
            @foreach ($popularActors as $actor)
            <div class="actor mt-8">
                <a href="{{ route('actors.show', $actor['id']) }}">
                    <img src="{{ $actor['profile_path'] }}" alt="actors">
                </a>
                <div>
                    <a href="{{ route('actors.show', $actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                    <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div> <!-- end popular actors  -->
    <!--
    <div class="flex justify-between mt-16>
        @if ($previous)
        <a href="/actors/page/{{ $previous }}">Previus</a>
        @else
        <div></div>
        @endif

        @if ($next)
        <a href="/actors/page/{{ $next }}">Next</a>
        @else
        <div></div>
        @endif
    </div>-->
</div>

@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>
var elem = document.querySelector('.loadactor');
var infScroll = new InfiniteScroll(elem, {
    // options
    path: '/actors/page/@{{#}}',
    append: '.actor',
    //history: false,
    status: '.page-load-status',
});
</script>
@endsection