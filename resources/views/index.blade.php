@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- hero section -->
<section class="uk-section uk-section-muted uk-section-large uk-padding-remove-vertical" id="hero">
    <div class="uk-grid-collapse" uk-grid >
        <div class="uk-width-3-4@l uk-grid-item-match coming-soon">
            <div class="uk-flex">
                <div class="uk-tile uk-width-1-1 uk-flex-bottom uk-flex uk-background-cover uk-background-center-center uk-background-norepeat"
                    data-src="https://images.igdb.com/igdb/image/upload/t_1080p/co2ecy.jpg" uk-img>
                    <div class="uk-panel uk-width-1-1">
                        <div
                            class="uk-panel uk-width-large uk-margin uk-overlay uk-padding-small uk-border-rounded desc-overlay">
                            <div class="uk-margin-remove-bottom uk-h4 uk-margin-top ">
                                <h5 class="uk-h6 uk-margin-remove-bottom uk-text-muted uk-text-bold">Coming soon
                                    on</h5>
                                <a href="#" class="uk-link-heading  text-primary">PlayStation 4</a>
                            </div>
                            <h2 class="uk-h1 uk-margin-top uk-margin-remove-bottom game-title">
                                <a href=" " class="uk-link-reset  uk-text-bold"> </a>
                            </h2>
                            <div class="uk-margin-top">
                                <a href=" " class="uk-button game-link uk-border-rounded  button-transparent">Check
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
                    <div class="uk-inline-clip hero-card" >
                        <canvas width="595" height="336"></canvas>
                        <img alt=" " uk-img uk-cover
                            data-src="https://images.igdb.com/igdb/image/upload/t_720p/co1wyy.jpg ">
                        <div
                            class="uk-overlay uk-panel uk-padding uk-position-bottom-left uk-padding-small uk-border-rounded uk-width-2-3 uk-position-medium desc-overlay">
                            <div class="uk-h5 uk-margin-top uk-margin-remove-bottom">
                                <h6 class="uk-h6 uk-margin-remove-bottom uk-text-muted uk-text-bold">Popular on</h6>
                                <a href=" " class="uk-link-heading text-primary" rel="tag">Xbox Series</a>
                            </div>
                            <h2 class="  uk-h4 uk-margin-small-top uk-margin-remove-bottom game-title">
                                <a href=" " class="uk-link-reset uk-text-bold "> </a>
                            </h2>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="uk-inline-clip hero-card">
                        <canvas width="595" height="336"></canvas>
                        <img alt=" " uk-img uk-cover
                            data-src="https://images.igdb.com/igdb/image/upload/t_720p/co29i4.jpg ">
                        <div
                            class="uk-overlay uk-panel uk-padding uk-position-bottom-left uk-padding-small uk-border-rounded uk-width-2-3 uk-position-medium desc-overlay">
                            <div class="uk-h5 uk-margin-top uk-margin-remove-bottom">
                                <h6 class="uk-h6 uk-margin-remove-bottom uk-text-muted">Latest on</h6>
                                <a href=" " class="uk-link-heading text-primary" rel="tag">PC</a>
                            </div>
                            <h2 class="  uk-h4 uk-margin-small-top uk-margin-remove-bottom game-title">
                                <a href=" " class="uk-link-reset uk-text-bold  ">ddf</a>
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
        <h3 class="uk-h2 text-white">Recently Reviewed</h3>
        <hr class="uk-divider-small primary-divider">
        <div class="uk-child-width-1-2@s uk-child-width-1-1 uk-grid-medium uk-grid-match" uk-grid>
            @foreach (range(1, 6) as $item)
            <div>
                <article class="uk-child-width-expand uk-grid-column-small uk-grid-row-small" uk-grid>
                    <aside class="uk-width-1-3@m">
                        <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/em1y2ugcwy2myuhvb9db.jpg"
                            alt="" width="400" height="300" uk-img>
                    </aside>
                    <div>
                        <h3 class="el-title uk-h4 uk-margin-remove-top uk-margin-remove-bottom">
                            <a href="https://demo.yootheme.com/themes/wordpress/2020/framerate/?tv_show=breaking-point"
                                class="uk-link-reset">Hometown Season 2 Episode 5 – Breaking Point
                            </a>
                        </h3>
                        <div class="el-content uk-panel uk-margin-small-top">
                            Duis aute irure dolor in reprehenderit in
                            voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Exce...
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
