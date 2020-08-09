<?php


namespace App\Helpers;


use Illuminate\Support\Collection;
use Illuminate\Support\Str;

trait FormatGames
{
	/**
	 * Format games in a representable way for views
	 *
	 * @param Collection $games
	 * @param string $coverImageSize
	 * @param bool $toArray
	 * @return array|Collection
	 */
	public function format(Collection $games, string $coverImageSize = 'cover_big', bool $toArray = false)
	{
		$formattedGames = $this->defaults($games, $coverImageSize);

		return ($toArray) ? $formattedGames->toArray() : $formattedGames;
	}

	/**
	 * Format games with the default app required options
	 *
	 * @param Collection $games
	 * @param string $coverImageSize
	 * @return Collection
	 */
	protected function defaults(Collection $games, string $coverImageSize = 'cover_big')
	{
		return $games->map(fn($game) => collect($game)->merge([
			'altText' => $game['name'] . ' Cover Image',
			'coverImageUrl' => isset($game['cover'])
				? 'https:' . Str::replaceFirst('thumb', $coverImageSize, $game['cover']['url'])
				: 'https://ui-avatars.com/api?size=264&name=%s' . $game['name'],
			'genres' => isset($game['genres'])
				? (collect($game['genres'])->pluck('name')->implode(', '))
				: null,
			'platforms' => isset($game['platforms'])
				? collect($game['platforms'])->pluck('abbreviation')->implode(' | ')
				: null,
		])->except('cover'));
	}
}