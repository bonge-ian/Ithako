<article class="uk-child-width-expand uk-grid-column-small uk-grid-row-small uk-grid" uk-grid>
    <aside class="uk-width-1-3@m">
        <a href="{{ route('games.show', $game['slug'] ) }}"  >
            <img data-src="{{ $game['coverImageUrl'] }}" alt="{{ $game['altText'] }}" width="534" height="320"
                uk-img="target: ! #most-anticipated-games">
        </a>
    </aside>
    <div>
        <h3 class="uk-h4 uk-margin-remove-top uk-margin-remove-bottom">
            <a href="{{ route('games.show', $game['slug'] ) }}" class="uk-link-reset">{{ $game['name'] }}
            </a>
        </h3>
        <div class="uk-panel uk-margin-small-top ">
            {{ $game['summary'] }}
        </div>
    </div>
</article>
