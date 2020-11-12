<?php

namespace App\Http\Livewire;

use App\IGDB;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Helpers\FormatGames;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MostAnticipatedGames extends Component
{
	use FormatGames {
		format as formatGamesTrait;
	}

	public array $mostAnticipatedGames = [];

	public function fetch()
    {
        $rawGames = Cache::remember(
            'livewire.mostAnticipatedGames',
            now()->addHours(6),
            fn () => collect(
                Http::withHeaders([
                    'Client-ID' => env('TWITCH_APP_ID'),
                ])->withToken(IGDB::auth())
                    ->withBody(
                         sprintf(
                        'fields id, name, cover.url, slug, summary;
                            where first_release_date > %s & platforms = (6,48,49,130,167,169) & themes.name != ("Erotic");
                            sort popularity desc;
                            limit 6;',
                            now()->timestamp
                        )
                        ,'text'
                    )
                    ->post('https://api.igdb.com/v4/games')
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
		return $this->formatGamesTrait($games, 'screenshot_med')->map(fn($game) => $game->merge([
			'summary' => Str::limit($game['summary'], 150),
		]))->toArray();
	}
}
