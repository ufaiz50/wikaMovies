<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DropdownGenres extends Component
{

    public function render()
    {
        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
    
        return view('livewire.dropdown-genres',[
            'genres' => collect($genres),
        ]);
    }
}
