<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Helpers\FormatGames;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class UpcomingGamesThisYear extends Component
{
    use FormatGames;

    public array $upcomingGamesThisYear = [];

    public function fetch()
    {
        $rawGames = Cache::remember(
            'upcoming-this-year',
            now()->addHours(6),
            fn () => collect(
                Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields game.name, game.cover.url, game.slug, game.genres.name,
                            game.platforms.abbreviation; where game.platforms = (6,48,49,130)
                            & date > %s & game.themes != (42);
                            sort date asc;',
                        now('Africa/Nairobi')->addMonth()->timestamp,
                    )
                ])
                    ->get('https://api-v3.igdb.com/release_dates')
                    ->json()
            )->pluck('game')
        );

        $this->upcomingGamesThisYear = $this->format($rawGames)->unique()->take(15)->toArray();
    }

    public function render()
    {
        return view('livewire.upcoming-games-this-year');
    }
}
