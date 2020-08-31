@extends('layouts.app')

@section('title', $game['name'])

@section('content')
<section class="uk-section uk-section-large uk-padding-remove-vertical uk-margin-large-top">
    <div class="uk-container  ">
        <!-- game showcase -->
        <div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
            <div class='uk-width-2-3@s' id='left'>
                {{-- todo view for mobile --}}

                <h1 class="uk-heading-small uk-margin-remove-bottom text-white uk-text-capitalize">
                    {{ $game['name']}}
                </h1>
                <hr class="uk-divider-small primary-divider">
                <p class='uk-text-break'>{{ $game['summary'] }}</p>

                <div class="uk-grid small uk-child-width-1-3 uk-grid-match uk-grid uk-flex-middle  " uk-grid>
                    <div>
                        <div class="uk-panel uk-flex uk-flex-middle">
                            <div class="rating  uk-background-secondary uk-border-circle uk-position-relative "
                                data-rating="{{ $game['rating'] }}" id="member-rating" style="bottom: 0; right: 0;">
                                @push('scripts')
                                @include('_ratings', [
                                'slug' => 'member-rating',
                                'rating' => $game['rating'],
                                'event' => null,
                                ])
                                @endpush
                            </div>
                            <div class='uk-margin-small-left'>Member Ratings</div>
                        </div>
                    </div>
                    <div>
                        <div class="uk-panel uk-flex uk-flex-middle">
                            <div class="rating  uk-background-secondary uk-border-circle uk-position-relative"
                                data-rating="{{ $game['criticRating'] }}" id="critic-rating"
                                style="bottom: 0; right: 0;">
                                @push('scripts')
                                @include('_ratings', [
                                'slug' => 'critic-rating',
                                'rating' => $game['criticRating'],
                                'event' => null,
                                ])
                                @endpush
                            </div>
                            <div class='uk-margin-small-left'>Critical Ratings</div>
                        </div>
                    </div>
                </div>

                @if ($game['trailer'])
                <h4 class="uk-h3 uk-text-bold text-white">Watch Trailer</h4>
                <div class='uk-inline-clip uk-margin-bottom uk-light' uk-lightbox>
                    <a class="uk-inline uk-panel uk-link-muted uk-text-center" href="{{ $game['trailer'] }}"
                        data-caption="{{ $game['name'] . ' trailer'}}" data-attrs="width: 1280; height: 720;">
                        <figure>
                            <img src="{{ $game['trailerImage'] }}" alt="" width='889' height='500'>
                        </figure>
                        <div class="uk-position-center">
                            <span uk-icon="icon: play-circle; ratio: 2"></span>
                        </div>
                    </a>

                </div>
                @endif

                @if ($game['storyline'])
                <h6 class="uk-h2 uk-margin-remove-top uk-margin-small-bottom text-white">Storyline</h6>
                <hr class="uk-divider-small primary-divider">
                <p>{{ $game['storyline'] }}</p>
                @endif

                @if ($game['screenshots'])
                <h6 class="uk-h2 uk-margin-remove-top uk-margin-small-bottom text-white">Screenshots</h6>
                <hr class="uk-divider-small primary-divider">
                <div uk-grid uk-lightbox="animation: scale"
                    class="uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-grid-medium uk-grid-match uk-grid">
                    @foreach($game['screenshots'] as $screenshot)
                    <div>
                        <a class="uk-inline" href="{{ $screenshot['url'] }}"
                            data-caption="Screenshot {{ $loop->iteration }}">
                            <img data-src="{{ $screenshot['url'] }}" alt="Screenshot" width="889 " height="500" uk-img>
                        </a>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <aside class='uk-width-1-3@s' id="right">
                <div class="uk-panel">
                    <a href="#modal-media-image" uk-toggle>
                        <img data-src="{{ $game['coverImageUrl'] }}" alt="{{ $game['altText']}}" uk-img width="1244"
                            height="700">
                    </a>
                    <h4 class="uk-h3 uk-margin-small-bottom">Details</h4>
                    <hr class="uk-divider-small">
                    <ul class="uk-list uk-list-large">
                        @if ($game['genres'])
                        <li>
                            <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
                                <div class="uk-width-small@m uk-text-break">
                                    <h4 class="uk-h5">Genre</h4>
                                </div>
                                <div>
                                    <div class="uk-panel">
                                        {{ $game['genres'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($game['platforms'])
                        <li>
                            <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
                                <div class="uk-width-small@m uk-text-break">
                                    <h4 class="uk-h5">Platforms</h4>
                                </div>
                                <div>
                                    <div class="uk-panel">
                                        {{ $game['platforms'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($game['platforms'])
                        <li>
                            <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
                                <div class="uk-width-small@m uk-text-break">
                                    <h4 class="uk-h5">Release Date</h4>
                                </div>
                                <div>
                                    <div class="uk-panel">
                                        {{ $game['release_date'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if ($game['themes'])
                        <li>
                            <div class="uk-grid-small uk-child-width-expand@m" uk-grid>
                                <div class="uk-width-small@m uk-text-break">
                                    <h4 class="uk-h5">Themes</h4>
                                </div>
                                <div>
                                    <div class="uk-panel">
                                        {{ $game['themes'] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        <li>
                            <div class="uk-flex uk-light">
                                @if ($game['sites']['website'])
                                <a href="{{ $game['sites']['website'] }}" class="uk-icon-button uk-margin-small-right"
                                    uk-icon="world"></a>
                                @endif
                                @if ($game['sites']['facebook'])
                                <a href="{{ $game['sites']['facebook'] }}" class="uk-icon-button uk-margin-small-right"
                                    uk-icon="facebook"></a>
                                @endif
                                @if ($game['sites']['twitter'])
                                <a href="{{ $game['sites']['twitter'] }}" class="uk-icon-button uk-margin-small-right"
                                    uk-icon="twitter"></a>
                                @endif
                                @if ($game['sites']['instagram'])
                                <a href="{{ $game['sites']['instagram'] }}" class="uk-icon-button uk-margin-small-right"
                                    uk-icon="instagram"></a>
                                @endif

                            </div>
                        </li>

                    </ul>
                </div>
            </aside>
        </div>
        <!-- end of game showcase -->

        <!-- similar games -->
        @if ($game['similar_games'])
        <div class="uk-margin-medium-top uk-position-relative " uk-slider="finite: false">
            <h4 class="uk-h2 uk-heading-bullet">You might also like</h4>
            <ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid uk-grid-small"
                uk-grid uk-height-match="target: > li > div > a > img">
                @foreach ($game['similar_games'] as $similarGame)
                <li>
                    <div class="uk-panel">
                        <a href="{{ route('games.show', $similarGame['slug']) }}" class="uk-link-reset">
                            <img data-src="{{ $similarGame['cover'] }}" alt="{{ $similarGame['altText'] }}" width="264"
                                height="374" uk-img>
                            <h5 class="uk-margin-small-top">{{ $similarGame['name'] }}</h5>
                        </a>
                    </div>
                </li>
                @endforeach
            </ul>
            <a class="uk-position-center-left uk-background-primary uk-padding-small uk-hidden-hover uk-icon uk-slidenav-previous uk-slidenav text-white"
                href="#" uk-slidenav-previous="" uk-slider-item="previous"> </a>
            <a class="uk-position-center-right uk-background-primary uk-padding-small uk-hidden-hover   text-white"
                href="#" uk-slidenav-next="" uk-slider-item="next"> </a>
        </div>
        @endif
        <!-- end of similar games -->

        <!-- modal -->
        <div id="modal-media-image" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                <button class="uk-modal-close-outside" type="button" uk-close></button>
                <img data-src="{{ $game['coverImageUrl'] }}" alt="{{ $game['altText'] }}" width="700" uk-img>
            </div>
        </div>
        <!-- end of modal -->
    </div>
</section>
@endsection
