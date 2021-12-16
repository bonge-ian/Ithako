<?php

namespace App\Http\Livewire;

use App\IGDB;
use Livewire\Component;
use App\Helpers\FormatGames;
use Illuminate\Support\Facades\Http;

class Search extends Component
{
    use FormatGames;

    public string $search = '';
    public array $searchResults = [];

    public function fetch()
    {
        $rawGames = Http::withHeaders([
            'Client-ID' => env('TWITCH_APP_ID'),
        ])->withToken(IGDB::auth())
            ->withBody(
                sprintf('
                        fields name, slug, cover.url;
                        search "%s";
                        limit 6;
                    ', $this->search),
                'text'
            )
            ->post('https://api.igdb.com/v4/games/')
            ->collect();

        $this->searchResults = $this->format($rawGames, 'thumb', true);
    }

    public function updatedSearch($value)
    {
        if (strlen($value) > 5 && !empty($value)) {
            $this->fetch();
        }
        return;
    }

    public function render()
    {
        return view('livewire.search');
    }
}
