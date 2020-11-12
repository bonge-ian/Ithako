<?php

namespace App\Http\Livewire;

use App\IGDB;
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
                Http::withHeaders([
                    'Client-ID' => env('TWITCH_APP_ID'),
                ])->withToken(IGDB::auth())
                    ->withBody(
                        sprintf(
                        'fields game.name, game.cover.url, game.slug, game.genres.name,
                            game.platforms.abbreviation; where game.platforms = (6,48,49,130,167,169)
                            & date > %s & game.themes != (42);
                            sort date asc;',
                            now('Africa/Nairobi')->addMonth()->timestamp,
                        ),
                        'text'
                    )
                    ->post('https://api.igdb.com/v4/release_dates')
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
