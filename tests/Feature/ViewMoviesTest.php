<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use Livewire\Livewire;

class ViewMoviesTest extends TestCase
{
    /** @test */
    public function the_main_page_show_correct()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/popular' => $this->fakePopularMovies(),
            'https://api.themoviedb.org/3/movie/popular' => $this->fakeNowPlayingMovies(),
            'https://api.themoviedb.org/3/movie/popular' => $this->fakeGenres(),
        ]);

        $response = $this->get(route('movies.index'));

        $response->assertSuccessful();
        $response->assertSee('Popular Movies');
        $response->assertSee('Fake Movie');
        $response->assertSee('Action, Thriller');
        $response->assertSee('Now Playing');
        $response->assertSee('Now Playing Fake Movie');
    }

    public function the_movie_page_shows_the_correct_info()
    {
        Http::fake([
            'https://api.themoviedb.org/3/movie/*' => $this->fakeSingleMovie(),
        ]);

        $response = $this->get(route('movies.show', 12345));

        $response->assertSee('Fake Ad Astra');

    }

    public function the_search_dropdown_works_correctly()
    {
        Http::fake([
            'https://api,themoviedb.prg/3/search/movie?query=parasite' => $this->fakeSearchMovies(),
        ]);

        Livewire::test('search-dropdown')
            ->assertDontSee('parasite')
            ->set('search', 'parasite')
            ->assertSee('Parasite');    

    }

    private function fakeSearchMovies()
    {
        return Http::response([
            'results' => [
                [
                    "popularity" => 123.561,
                    "vote_count" => 7096,
                    "video" => false,
                    "poster_path" => "\/7IiTTgloJzvGI1TAYymCfbfl3vT.jpg",
                    "id" => 496243,
                    "adult" => false,
                    "backdrop_path" => "\/ApiBzeaa95TNYliSbQ8pJv4Fje7.jpg",
                    "original_language" => "ko",
                    "original_title" => "기생충",
                    "genre_ids"= [
                        35,
                        18,
                        53,
                    ],
                    "title" => "Parasite",
                    "vote_average" => 8.5,
                    "overview" =>"All unemployed, Ki-taek's family takes peculiar interest in the wealthy and glamorous Parks for their livelihood until they get entangled in an unexpected incident.",
                    "release_date" => "2019-05-30",
                ]
            ]
         ], 200);
    }

    private function fakePopularMovies()
    {
        return Http::response([
            'result' =>
            [
                [
                    "popularity" => 499.539,
                    "vote_count" => 3307,
                    "video" => false,
                    "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                    "id" => 419704,
                    "adult" => false,
                    "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                    "original_language" => "en",
                    "original_title" => "Fake Movie",
                    "genre_ids" => [
                        0 => 18,
                        1 => 878,
                    ],
                    "title" => "Fake Movie",
                    "vote_average" => 6,
                    "overview" => "Fake Movie description. The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on pl ▶",
                    "release_date" => "2019-09-17",
                ]
            ]
        ], 200);
    }

    private function fakeNowPlayingMovies()
    {
        return Http::response([
            'result' =>
            [
                [
                    "popularity" => 179.924,
                    "vote_count" => 879,
                    "video" => false,
                    "poster_path" => "/33VdppGbeNxICrFUtW2WpGHvfYc.jpg",
                    "id" => 481848,
                    "adult" => false,
                    "backdrop_path" => "/9sXHqZTet3Zg5tgcc0hCDo8Tn35.jpg",
                    "original_language" => "en",
                    "original_title" => "Fake Movie",
                    "genre_ids" => [
                        0 => 12,
                        1 => 18,
                        2 => 10751,
                    ],
                    "title" => "Fake Movie",
                    "vote_average" => 7.3,
                    "overview" => "Buck is a big-hearted dog whose blissful domestic life is turned upside down when he is suddenly uprooted from his California home and transplanted to the exoti ▶",
                    "release_date" => "2020-02-19",
                ]
            ]
        ], 200);
    }

    private function fakeGenres()
    {
        return Http::response([
            'result' =>
            [
                [
                    "id" => 28,
                    "name" => "Action",
                ],
                [
                    "id" => 12,
                    "name" => "Adventure",
                ],
                [
                    "id" => 16,
                    "name" => "Animation",
                ],
                [
                    "id" => 35,
                    "name" => "Comedy",
                ],
                [
                    "id" => 80,
                    "name" => "Crime",
                ],
                [
                    "id" => 99,
                    "name" => "Documentary",
                ],
                [
                    "id" => 18,
                    "name" => "Drama",
                ],
                [
                    "id" => 10751,
                    "name" => "Family",
                ],
                [
                    "id" => 14,
                    "name" => "Fantasy",
                ],
                [
                    "id" => 36,
                    "name" => "History",
                ],
                [
                    "id" => 27,
                    "name" => "Horror",
                ],
                [
                    "id" => 10402,
                    "name" => "Music",
                ],
                [
                    "id" => 9648,
                    "name" => "Mystery",
                ],
                [
                    "id" => 10749,
                    "name" => "Romance",
                ],
                [
                    "id" => 878,
                    "name" => "Science Fiction",
                ],
            ]
        ], 200);
    }

    private function fakeSingleMovie()
    {
        return Http::response([
            'result' =>
            [
                [
                    "adult" => false,
                    "backdrop_path" => "/5BwqwxMEjeFtdknRV792Svo0K1v.jpg",
                    "belongs_to_collection" => null,
                    "budget" => 87500000,
                    "genres" =>
                    [
                        1,
                        2,
                        3,
                    ],
                    "homepage" => "https://www.foxmovies.com/movies/ad-astra",
                    "id" => 419704,
                    "imdb_id" => "tt2935510",
                    "original_language" => "en",
                    "original_title" => "Fake Ad Astra",
                    "overview" => "The near future, a time when both hope and hardships drive humanity to look to the stars and beyond. While a mysterious phenomenon menaces to destroy life on pl ▶",
                    "popularity" => 499.539,
                    "poster_path" => "/xBHvZcjRiWyobQ9kxBhO6B2dtRI.jpg",
                    "production_companies" => 1,
                    "production_countries" => 1,
                    "release_date" => "2019-09-17",
                    "revenue" => 132807427,
                    "runtime" => 123,
                    "spoken_languages" => 1,
                    "status" => "Released",
                    "tagline" => "The answers we seek are just outside our reach",
                    "title" => "Fake Ad Astra",
                    "video" => false,
                    "vote_average" => 6.0,
                    "vote_count" => 3309,
                ]
            ]
        ], 200);
    }
}
