<form class="uk-search uk-search-navbar search-bar">
    <span uk-search-icon uk-icon="ratio: 0.8"></span>
    <input wire:model.debounce.500ms='search' class="uk-search-input uk-padding-small " type="search" id='search'
        placeholder="Search for a game">

    <!-- dropdown -->
    @if (strlen($search) > 3)
    <div id='dropdown' class='uk-drop uk-open uk-drop-boundary uk-drop-bottom-center'
        uk-drop="boundary: .uk-search;position: bottom-center; animation: uk-animation-slide-bottom-small;delay: 200; offset: 15;boundary-align: true">
        <div class="uk-panel uk-width-1-1 search-results uk-background-muted">
            <ul class="uk-list uk-list-divider uk-margin-remove">
                @forelse ($searchResults as $result)
                <li class="uk-margin-remove ">
                    <a href="{{ route('games.show', $result['slug'])}}"
                        class="uk-flex uk-display-block uk-link-reset search-result ">
                        <img data-src="{{ $result['coverImageUrl']}}" alt="{{ $result['altText']}}" width="40"
                            height="40" uk-img>
                        <span
                            class="uk-link-reset text-white uk-margin-small-left uk-text-middle">{{ $result['name']}}</span>
                    </a>
                </li>
                @empty
                <div class="uk-flex search-result uk-margin-remove">
                    No result found for {{ $search }}
                </div>
                @endforelse
            </ul>
        </div>
    </div>
    @endif
</form>
