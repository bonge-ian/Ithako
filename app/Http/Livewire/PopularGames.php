<?php

namespace App\Http\Livewire;

use App\Helpers\FormatGames;
use Illuminate\Support\Collection;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class PopularGames extends Component
{
	use FormatGames {
		format as formatGamesTrait;
	}

	public array $popularGames = [];

	public function fetch()
	{
		$before = now()->subMonths(6)->timestamp;

		$rawGames = Cache::remember(
			'livewire.popularGames',
			now('Africa/Nairobi')->addHours(6),
			fn() => collect(
				Http::withHeaders(config('services.igdb'))
					->withOptions([
						'body' => sprintf(
							'fields id, slug, name, genres.name, platforms.abbreviation,cover.url, total_rating;
                        where platforms = (49,48,130,6)
                        & first_release_date > %s & first_release_date < %s
                        & cover.url != null & themes.name != ("Erotic");
                        sort popularity desc;
                        limit 10;',
							$before,
							now()->timestamp
						),
					])
					->get('https://api-v3.igdb.com/games')
					->json()
			)
		);

		$this->popularGames = $this->format($rawGames);

		collect($this->popularGames)->filter(fn($game) => $game['rating'])
			->each(fn($game) => $this->emit('addRating', [
				'rating' => $game['rating'] / 100,
				'slug' => $game['slug']
			]));
	}

	public function render()
	{
		return view('livewire.popular-games');
	}

	private function format(Collection $games)
	{
		return $this->formatGamesTrait($games)->map(fn($game) => $game->merge([
			'rating' => isset($game['total_rating']) ? round($game['total_rating']) : null,
		]))->toArray();
	}

}
