<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
    public $popularGames =  [];

    public function fetch()
    {
        $before = now()->subMonths(6)->timestamp;

        $rawGames = Cache::remember(
            'livewire.popularGames',
            now('Africa/Nairobi')->addHours(6),
            fn () => collect(
                Http::withHeaders(config('services.igdb'))
                    ->withOptions([
                        'body' => sprintf(
                            'fields id, name, genres.name, platforms.name,cover.url, total_rating;
                        where platforms = (49,48,130,6)
                        & first_release_date > %s & first_release_date < %s
                        & cover.url != null;
                        sort popularity desc;
                        limit 10;',
                            $before,
                            now()->timestamp
                        )
                    ])
                    ->get('https://api-v3.igdb.com/games')
                    ->json()
            )
        );


        $this->popularGames = $this->format($rawGames);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    /**
     * Format Raw Game Data
     *
     * @param \Illuminate\Support\Collection $games
     *
     * @return void
     */
    private function format(Collection $games)
    {
        return $games->map(function ($game) {
            return collect($game)->merge([
                'altText' => sprintf('%s Cover Image', $game['name']),
                'coverImageUrl' => isset($game['cover']['url'])
                    ? 'https:' . Str::replaceFirst('thumb', 'cover_big', $game['cover']['url'])
                    : sprintf('https://ui-avatars.com/api?size=264&name=%s', $game['name']),
                'platforms' => isset($game['platforms'])
                    ? collect($game['platforms'])->pluck('name')->implode('| ')
                    : null,
                'genres' => isset($game['genres'])
                    ? collect($game['genres'])->pluck('name')->implode(', ')
                    : null,
                'rating' => isset($game['total_rating']) ? round($game['total_rating']) : null,
            ])->only('id', 'altText', 'name', 'platforms', 'genres', 'coverImageUrl', 'rating');
        })->toArray();
    }
}
