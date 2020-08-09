<?php

namespace App\Http\Livewire;

use App\Helpers\FormatGames;
use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class RecentGames extends Component
{
	use FormatGames;

	public array $recentGames = [];

    public function fetch()
    {
        $before = now()->subMonths(4)->timestamp;

        $rawGames = Cache::remember(
            'livewire.recentGames',
            now('Africa/Nairobi')->addHours(6),
            fn () => collect(
                Http::withHeaders(config('services.igdb'))
                    ->withOptions([
                        'body' => sprintf('
                        fields id, slug, name, genres.name, platforms.abbreviation,cover.url;
                        where platforms = (49,48,130,6)
                        & first_release_date > %s & first_release_date < %s
                        & cover.url != null & themes.name != ("Erotic");
                        sort first_release_date desc;
                        limit 10;
                    ', $before, now()->timestamp),
                    ])
                    ->get('https://api-v3.igdb.com/games')
                    ->json()
            )
        );

        $this->recentGames = $this->format($rawGames, 'cover_big', true);
    }

    public function render()
    {
        return view('livewire.recent-games');
    }
}
