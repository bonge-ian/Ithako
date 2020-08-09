<?php

namespace App\Http\Controllers;

use App\Helpers\FormatGames;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
	use FormatGames;

    public function games(Request $request)
    {
         $page = $request->get('page') ?? 1;

		abort_if($page > 500, 204);

        $per_page = 20;
        $offset = $per_page * ($page - 1);

        $rawGames = collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf('
                        fields name, cover.url, slug, genres.name, platforms.abbreviation;
                        where platforms = (6, 48, 49, 130) & themes.name != ("Erotic");
                        sort popularity desc;
                        limit %s;
                        offset %s;
                    ', $per_page, $offset)
                ])
                ->get('https://api-v3.igdb.com/games/')
                ->json()
        );

        return view('games')->with('games', $this->format($rawGames, 'cover_big', true));

    }

}
