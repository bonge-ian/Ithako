<x-games-grid wire:init='fetch'>
    @forelse ($upcomingGamesThisYear as $game)
    <x-game-card :game="$game"></x-game-card>
    @empty
    @foreach (range(1,5) as $item)
    <x-skeleton-game-card></x-skeleton-game-card>
    @endforeach
    @endforelse
</x-games-grid>
