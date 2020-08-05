<div wire:init="fetch" class="uk-child-width-1-2@s uk-child-width-1-1 uk-grid-medium uk-grid-match uk-grid" uk-grid>
    @forelse ($mostAnticipatedGames as $game)
    <div>
        <x-game-article-card :game="$game"></x-game-article-card>
    </div>
    @empty
        @foreach (range(1,6) as $item)
        <div>
            <x-skeleton-game-article-card></x-skeleton-game-article-card>
        </div>
        @endforeach
    @endforelse
</div>
