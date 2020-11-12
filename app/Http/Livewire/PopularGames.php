<?php

namespace App\Http\Livewire;

use App\IGDB;
use Livewire\Component;
use App\Helpers\FormatGames;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
	use FormatGames;

	public array $popularGames = [];

	public function fetch()
	{
		$before = now()->subMonths(6)->timestamp;

		$rawGames = Cache::remember(
			'livewire.popularGames',
			now('Africa/Nairobi')->addHours(6),
			fn () => collect(
				Http::withHeaders([
					'Client-ID' => env('TWITCH_APP_ID'),
				])->withToken(IGDB::auth())
					->withBody(
						 sprintf(
						'fields id, slug, name, genres.name, platforms.abbreviation,cover.url, rating;
                        where platforms = (49,48,130,6,167,169)
                        & first_release_date > %s & first_release_date < %s
                        & cover.url != null & themes.name != ("Erotic");
                        sort popularity desc;
                        limit 10;',
							$before,
							now()->timestamp
						), 'text'
					 )
					->post('https://api.igdb.com/v4/games')
					->json()
			)
		);

		$this->popularGames = $this->format($rawGames, 'cover_big', true);


		collect($this->popularGames)->filter(function ($game) {
			return $game['rating'];
		})->each(function ($game) {
			$this->emit('popularGamesWithRating', [
				'slug' => $game['slug'],
				'rating' => $game['rating'] / 100
			]);
		});
	}

	public function render()
	{
		return view('livewire.popular-games');
	}

	// private function format(Collection $games)
	// {
	// 	return $this->formatGamesTrait($games)->map(fn ($game) => $game->merge([
	// 		'rating' => isset($game['total_rating']) ? round($game['total_rating']) : null,
	// 	]))->toArray();
	// }
}
