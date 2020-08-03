<div wire:init="fetch"
    class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-5@m uk-grid-column-medium  uk-grid " uk-grid
    uk-height-match="target: > div > a > div > .cover-image">

    @forelse ($recentGames as $game)
    <x-game-card :game="$game"></x-game-card>

    @empty
    @foreach (range(1, 10) as $item)
    <x-skeleton-game-card></x-skeleton-game-card>
    @endforeach

    @endforelse

</div>
