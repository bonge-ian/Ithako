<?php

namespace App\Http\Livewire;

use App\Helpers\FormatGames;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Search extends Component
{
    use FormatGames;

    public $search = '';
    public $searchResults = [];

    public function fetch()
    {
        $rawGames = collect(
            Http::withHeaders(config('services.igdb'))
                ->withOptions([
                    'body' => sprintf('
                        fields name, slug, cover.url;
                        search "%s";
                        limit 6;
                    ', $this->search)
                ])
                ->get('https://api-v3.igdb.com/games/')
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
