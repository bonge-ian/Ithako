@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- hero section -->
<section class="uk-section uk-section-muted uk-section-large uk-padding-remove-vertical" id="hero">
    <div class="uk-grid-collapse" uk-grid>
        <div class="uk-width-3-4@l uk-grid-item-match coming-soon">
            <div class="uk-flex">
                <div class="uk-tile uk-width-1-1 uk-flex-bottom uk-flex uk-background-cover uk-background-center-center uk-background-norepeat"
                    data-src="{{ $comingSoonOnPS5['coverImageUrl'] }}" uk-img='width: 1139px;height: 672.4px'>
                    <div class="uk-panel uk-width-1-1">
                        <div
                            class="uk-panel uk-width-large uk-margin uk-overlay uk-padding-small uk-border-rounded desc-overlay">
                            <div class="uk-margin-remove-bottom uk-h4 uk-margin-top ">
                                <h5 class="uk-h6 uk-margin-remove-bottom uk-text-muted uk-text-bold">Coming soon on
                                </h5>
                                <a href="#" class="uk-link-heading  text-primary">PlayStation 5</a>
                            </div>
                            <h2 class="uk-h1 uk-margin-top uk-margin-remove-bottom game-title">
                                <a href="{{ route('games.show', $comingSoonOnPS5['slug']) }}"
                                    class="uk-link-reset  uk-text-bold">
                                    {{ $comingSoonOnPS5['name'] }}
                                </a>
                            </h2>
                            <div class="uk-margin-top">
                                <a href="{{ $comingSoonOnPS5['url'] }}" target="_blank"
                                    class="uk-button game-link uk-border-rounded  button-transparent">Check
                                    details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-1-4@l ">
            <aside class="uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-1@l uk-grid-collapse" uk-grid>
                <div>
                    <div class="uk-inline-clip hero-card">
                        <canvas width="595" height="336"></canvas>
                        <img alt="{{ $latestOnXboxSeries['altText'] }}" uk-img uk-cover
                            data-src="{{ $latestOnXboxSeries['coverImageUrl'] }}">
                        <div
                            class="uk-overlay uk-panel uk-padding uk-position-bottom-left uk-padding-small uk-border-rounded uk-width-2-3 uk-position-medium desc-overlay">
                            <div class="uk-h5 uk-margin-top uk-margin-remove-bottom">
                                <h6 class="uk-h6 uk-margin-remove-bottom uk-text-muted uk-text-bold">Latest on</h6>
                                <a href="{{ route('games.show', $latestOnXboxSeries['slug']) }}"
                                    class="uk-link-heading text-primary" rel="tag">
                                    Xbox Series
                                </a>
                            </div>
                            <h2 class="  uk-h4 uk-margin-small-top uk-margin-remove-bottom game-title">
                                <a href="{{ route('games.show', $latestOnXboxSeries['slug']) }}"
                                    class="uk-link-reset uk-text-bold ">
                                    {{ $latestOnXboxSeries['name'] }}
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip hero-card">
                        <canvas width="595" height="336"></canvas>
                        <img alt="{{ $latestOnPC['altText'] }}" uk-img uk-cover
                            data-src="{{ $latestOnPC['coverImageUrl']}}">
                        <div
                            class="uk-overlay uk-panel uk-padding uk-position-bottom-left uk-padding-small uk-border-rounded uk-width-2-3 uk-position-medium desc-overlay">
                            <div class="uk-h5 uk-margin-top uk-margin-remove-bottom">
                                <h6 class="uk-h6 uk-margin-remove-bottom uk-text-muted">Latest on</h6>
                                <a href="{{ route('games.show', $latestOnPC['slug']) }}"
                                    class="uk-link-heading text-primary" rel="tag">PC</a>
                            </div>
                            <h2 class="uk-h4 uk-margin-small-top uk-margin-remove-bottom game-title">
                                <a href="{{ route('games.show', $latestOnPC['slug']) }}"
                                    class="uk-link-reset uk-text-bold">
                                    {{ $latestOnPC['name'] }}
                                </a>
                            </h2>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
<!-- end of hero -->


<section class="uk-section">
    <div class="uk-container uk-container-expand">
        {{-- Recent Games --}}
        <x-games-showcase>
            <x-slot name='title'>Recent Games</x-slot>
            <livewire:recent-games></livewire:recent-games>
        </x-games-showcase>

        <div class="uk-margin-top"></div>
        <x-games-showcase>
            <x-slot name='title'>Popular Now</x-slot>
            <livewire:popular-games></livewire:popular-games>
        </x-games-showcase>


    </div>
</section>

<section class="uk-section" id="most-anticipated-games">
    <div class="uk-container uk-container-expand">
        <h3 class="uk-h2 text-white">Most Anticipated</h3>
        <hr class="uk-divider-small primary-divider">
        <livewire:most-anticipated-games></livewire:most-anticipated-games>
    </div>
</section>
@endsection
