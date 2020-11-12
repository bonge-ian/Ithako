<?php

namespace App\Http\Livewire;

use App\IGDB;
use Livewire\Component;
use App\Helpers\FormatGames;
use Illuminate\Support\Facades\Http;

class Search extends Component
{
    use FormatGames;

    public $search = '';
    public $searchResults = [];

    public function fetch()
    {
        $rawGames = collect(
            Http::withHeaders([
                'Client-ID' => env('TWITCH_APP_ID'),
            ])->withToken(IGDB::auth())
                ->withBody(
                      sprintf('
                        fields name, slug, cover.url;
                        search "%s";
                        limit 6;
                    ', $this->search), 'text'
                 )
                ->post('https://api.igdb.com/v4/games/')
                ->json()
        );

        $this->searchResults = $this->format($rawGames, 'thumb', true);
    }

    public function render()
    {
        if (strlen($this->search) >= 3) {
            $this->fetch();
        }
        return view('livewire.search');
    }
}
