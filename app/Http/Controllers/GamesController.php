<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    public function index()
    {
        $comingSoonOnPS4 = $this->comingSoonOnPS4();
        $popularOnXboxOne = $this->popularOnXboxOne();
        $latestOnPC = $this->latestOnPC();

        return view('index')->with([
            'comingSoonOnPS4' => $comingSoonOnPS4,
            'popularOnXboxOne' => $popularOnXboxOne,
            'latestOnPC' => $latestOnPC
        ]);
    }

    public function show(string $slug)
    {
        //
    }

    private function comingSoonOnPS4()
    {
        $game =  collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields game.id, game.name, game.cover.url, game.slug, game.url, human;
                        where platform = 48 & date > %s ;
                        sort popularity desc;
                        limit 1;',
                        now('Africa/Nairobi')->addMonths(4)->timestamp
                    )
                ])
                ->get('https://api-v3.igdb.com/release_dates/')
                ->json()
        )->first();

        return Cache::remember(
            'comingSoonOnPS4',
            now('Africa/Nairobi')->addDay(),
            fn () => collect($game)->merge([
                'coverImageUrl' => sprintf(
                    'https:%s',
                    Str::replaceFirst('thumb', '1080p', $game['game']['cover']['url'])
                ),
                'name' => $game['game']['name'],
                'slug' => $game['game']['slug'],
                'id' => $game['game']['id'],
                'releaseDate' => $game['human'],
                'website' => $game['game']['url'],
            ])->only('id', 'slug', 'name', 'releaseDate', 'coverImageUrl', 'website')
        );
    }

    private function popularOnXboxOne()
    {
        $game =  collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields id, name, cover.url, slug;
                        where platforms = 49 & category = 0 & rating > 80;
                        sort release_dates.date desc;
                        sort popularity desc;
                        limit 1;'
                    )
                ])
                ->get('https://api-v3.igdb.com/games/')
                ->json()
        )->first();
        // return $this->format(collect($game));
        return Cache::remember(
            'popularOnXboxOne',
            now('Africa/Nairobi')->addDay(),
            fn () => $this->format(collect($game))
        );
    }

    private function latestOnPC()
    {
        $game =  collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields id, name, cover.url, slug;
                        where platforms = 6 & category = 0 &
                        first_release_date > %s & first_release_date < %s;
                        sort first_release_date desc;
                        limit 1;',
                        now('Africa/Nairobi')->subMonths(4)->timestamp,
                        now('Africa/Nairobi')->timestamp
                    )
                ])
                ->get('https://api-v3.igdb.com/games/')
                ->json()
        )->first();

        // return $this->format(collect($game));
        return Cache::remember(
            'latestOnPC',
            now('Africa/Nairobi')->addDay(),
            fn () => $this->format(collect($game))
        );
    }

    private function format(Collection $game)
    {
        return $game->merge([
            'coverImageUrl' => sprintf(
                'https:%s',
                Str::replaceFirst('thumb', '720p', $game['cover']['url'])
            ),
            'altText' => sprintf('%s Cover Image', $game['name']),
            'name' => $game['name'],
            'slug' => $game['slug'],
            'id' => $game['id'],
        ])->only('id', 'slug', 'name', 'coverImageUrl', 'altText');
    }
}
