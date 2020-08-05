<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class MostAnticipatedGames extends Component
{
    public $mostAnticipatedGames = [];

    public function fetch()
    {
        $rawGames = Cache::remember(
            'mostAnticipatedGames',
            now()->timestamp,
            fn () => collect(
                Http::withHeaders(config('services.igdb'))
                    ->withOptions([
                        'body' => sprintf(
                            'fields id, name, cover.url, slug,summary;
                            where first_release_date > %s & platforms = (6,48,49.130);
                            sort popularity desc;
                            limit 6;',
                            now()->timestamp
                        )
                    ])
                    ->get('https://api-v3.igdb.com/games')
                    ->json()
            )
        );


        $this->mostAnticipatedGames = $this->format($rawGames);

    }

    public function render()
    {
        return view('livewire.most-anticipated-games');
    }

    private function format(Collection $games)
    {
        return $games->map(function ($game) {
            return collect($game)->merge([
                'coverImageUrl' => sprintf(
                    'https:%s',
                    Str::replaceFirst('thumb', 'screenshot_med', $game['cover']['url'])
                ),
                'altText' => sprintf('%s Cover Image', $game['name']),
                'name' => $game['name'],
                'slug' => $game['slug'],
                'id' => $game['id'],
                'summary' => Str::limit($game['summary'], 150),
            ])->only('id', 'name', 'slug', 'altText', 'coverImageUrl', 'summary');
        })->toArray();
    }
}
