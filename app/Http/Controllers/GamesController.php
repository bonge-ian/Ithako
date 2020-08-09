<?php

namespace App\Http\Controllers;

use App\Helpers\FormatGames;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
	use FormatGames;

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
        $rawGame = collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf('
                        fields id, name, cover.url, summary, storyline, status, first_release_date, status,
                        genres.name, screenshots.url, videos.video_id, websites.category, websites.url, platforms.abbreviation,
                        similar_games.name, similar_games.slug, similar_games.cover.url, themes.name;
                        where slug = "%s";
                        limit 1;
                    ', $slug)
                ])
                ->get('https://api-v3.igdb.com/games/')
                ->json()
        );


        return view('show')->with('game', $this->formatShowGameView(collect($rawGame)));
    }

    private function comingSoonOnPS4()
    {
        $game =  collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields game.id, game.name, game.cover.url, game.slug, game.url;
                        where platform = 48 & date > %s & game.cover.url != null;
                        sort date asc;
                        sort popularity desc;
                        limit 1;',
                        now('Africa/Nairobi')->addMonths(5)->timestamp
                    )
                ])
                ->get('https://api-v3.igdb.com/release_dates/')
                ->json()
        )->pluck('game');

        return Cache::remember(
        	'comingSoonOnPS4',
	        now('Africa/Nairobi')->addHours(6),
	        fn () => $this->format($game, '1080p')->first(),
        );

    }

    private function popularOnXboxOne()
    {
        $game =  collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields id, name, cover.url, slug;
                        where platforms = 49  & rating > 80;
                        sort first_release_date desc;
                        sort popularity desc;
                        limit 1;'
                    )
                ])
                ->get('https://api-v3.igdb.com/games/')
                ->json()
        );

        return Cache::remember(
            'popularOnXboxOne',
            now('Africa/Nairobi')->addHours(6),
            fn () => $this->format(collect($game), '720p')->first()->except('platforms', 'genres')
        );
    }

    private function latestOnPC()
    {
        $game =  collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf(
                        'fields id, name, cover.url, slug;
                        where platforms = 6 &
                        first_release_date > %s & first_release_date < %s;
                        sort first_release_date desc;
                        limit 1;',
                        now('Africa/Nairobi')->subMonths(4)->timestamp,
                        now('Africa/Nairobi')->timestamp
                    )
                ])
                ->get('https://api-v3.igdb.com/games/')
                ->json()
        );


        return Cache::remember(
            'latestOnPC',
            now('Africa/Nairobi')->addHours(6),
            fn () => $this->format(collect($game), '720p')->first()->except('platforms', 'genres')
        );
    }



    private function formatShowGameView(Collection $game)
    {
        return collect($this->format($game, '720p'))->map(function ($game) {
        	return collect($game)->merge([
		        'trailerImage' => Str::replaceFirst('720p', 'screenshot_big', $game['coverImageUrl']),
		        'screenshots' => isset($game['screenshots']) ? collect($game['screenshots'])->map(
			        fn ($screenshot) => [
				        'url' => 'https:' . Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url'])
			        ]
		        )->take(6) : null,
		        'summary' => $game['summary'],
		        'storyline' => isset($game['storyline']) ? $game['storyline'] : null,
		        'release_date' => Carbon::parse($game['first_release_date'])->format('d M, Y'),
		        'themes' => (isset($game['themes'])) ? (collect($game['themes'])->pluck('name')->implode(' | ')) : null,
		        'trailer' => isset($game['videos']) ? 'https://www.youtube-nocookie.com/watch?v=' . $game['videos'][0]['video_id'] : null,
		        'similar_games' => (isset($game['similar_games']))
			        ? (collect($game['similar_games'])->map(function ($similarGame) {
				        return collect($similarGame)->merge([
					        'cover' => isset($similarGame['cover'])
						        ? ('https:' . Str::replaceFirst('thumb', 'cover_big', $similarGame['cover']['url']))
						        : sprintf('https://ui-avatars.com/api?size=264&name=%s', $similarGame['name']),
					        'altText' => $similarGame['name'] . ' Cover',
				        ])->only('id', 'cover', 'name', 'altText', 'slug');
			        })->take(6))
			        : null,
		        'sites' => isset($game['websites']) ? [
			        'website' => collect($game['websites'])->pluck('url')->first(),
			        'facebook' => collect($game['websites'])->filter(function ($website) {
				        return Str::contains($website['url'], 'facebook');
			        })->pluck('url')->first(),
			        'twitter' => collect($game['websites'])->filter(function ($website) {
				        return Str::contains($website['url'], 'twitter');
			        })->pluck('url')->first(),
			        'instagram' => collect($game['websites'])->filter(function ($website) {
				        return Str::contains($website['url'], 'instagram');
			        })->pluck('url')->first(),
		        ] : [
			        'website' => null, 'facebook' => null, 'twitter' => null, 'instagram' => null
		        ],
	        ])->except('videos', 'first_release_date', 'websites');
        })->first();
    }
}
