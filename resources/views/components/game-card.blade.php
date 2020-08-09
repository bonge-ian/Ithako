<div class='game'>
    <a href="{{ route('games.show', $game['slug']) }}" class="uk-panel uk-display-block uk-link-reset ">
        <div class="uk-inline uk-transition-toggle " tabindex="0">
            <img data-src="{{ $game['coverImageUrl'] }}" alt="{{ $game['altText']}}" height="374" width="264" uk-img class='cover-image'>
            <div
                class="uk-transition-fade uk-position-cover uk-overlay uk-flex uk-flex-center uk-flex-middle uk-position-small light-overlay">
            </div>

            @if (array_key_exists('rating', $game) &&  $game['rating'])
                <div class="rating  uk-position-bottom-right uk-background-secondary uk-border-circle"
                     data-rating="{{ $game['rating'] }}"   id="{{ $game['slug'] }}">
                </div>

            @endif
        </div>
        <h3 class="uk-h4 uk-margin-remove-bottom uk-margin-top">{{ $game['name'] }}</h3>
        @if ($game['genres'])
        <div class="text-white">
            {{ $game['genres'] }}
        </div>
        @endif
        <div class="uk-text-meta">
            {{ $game['platforms'] }}
        </div>
    </a>
</div>


