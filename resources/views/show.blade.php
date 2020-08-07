@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="uk-section uk-section-large uk-padding-remove-vertical uk-margin-large-top">
    <div class="uk-container  ">
        <!-- game showcase -->
        <div class="uk-child-width-1-1 uk-grid-medium" uk-grid>
            <div class='uk-width-2-3@s' id='left'>
                {{-- todo view for mobile --}}

                <h1 class="uk-heading-small uk-margin-remove-bottom text-white uk-text-capitalize">Game Title</h1>
                <hr class="uk-divider-small primary-divider">
                <p class='uk-text-break'>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente provident
                    voluptatum quos nobis enim voluptate facere consequatur modi sed numquam vitae qui nostrum
                    assumenda, vero labore quis magnam libero quidem asperiores eum officiis ad hic! Aliquid,
                    consequuntur voluptas quas veniam incidunt quisquam inventore enim necessitatibus eos, sunt
                    laudantium magnam voluptatem. </p>

                <h4 class="uk-h3 uk-text-bold text-white">Watch Trailer</h4>
                <div class='uk-inline-clip uk-margin-bottom uk-light' uk-lightbox>
                    <a href="image.jpg" data-poster="image.jpg" data-caption="YouTube" data-type="video">
                        <img data-src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/co29i4.jpg" alt=""
                            width='889' height='500' uk-img>

                        <div class="uk-position-center">
                            <span uk-icon="icon: play-circle; ratio: 2"></span>
                        </div>
                    </a>
                </div>

                <h6 class="uk-h2 uk-margin-remove-top uk-margin-small-bottom text-white">Storyline</h6>
                <hr class="uk-divider-small primary-divider">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur doloremque ab ut impedit, velit
                    illo eius, exercitationem quis et facilis quod nulla, sit numquam repellat! Sunt, voluptates omnis
                    commodi necessitatibus quidem, autem totam sit, optio minus natus fuga est vel. Cupiditate ad
                    accusamus commodi officiis laborum! Laborum quasi esse, provident ullam quos aliquid pariatur iusto
                    quia ea nostrum ratione perferendis, qui repudiandae ab officia aliquam in illum. Dolore ipsa
                    voluptas magnam officia suscipit, distinctio dignissimos soluta, labore provident reprehenderit, et
                    eveniet quidem! Facere ex beatae repellat suscipit labore laudantium, distinctio enim. Asperiores
                    error saepe repellendus distinctio laborum sunt iste tempore.</p>

                <h6 class="uk-h2 uk-margin-remove-top uk-margin-small-bottom text-white">Screenshots</h6>
                <hr class="uk-divider-small primary-divider">
                <div uk-grid uk-lightbox="animation: scale"
                    class="uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1 uk-grid-medium uk-grid-match uk-grid">

                    <div>
                        <a class="uk-inline"
                            href="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgn.jpg"
                            data-caption="Screenshot 1">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgn.jpg"
                                alt="Screenshot" uk-img=""
                                src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgn.jpg"
                                width="1920 " height="1080">
                        </a>
                    </div>

                    <div>
                        <a class="uk-inline"
                            href="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgo.jpg"
                            data-caption="Screenshot 2">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgo.jpg"
                                alt="Screenshot" uk-img=""
                                src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgo.jpg"
                                width="1920 " height="1080">
                        </a>
                    </div>

                    <div class="">
                        <a class="uk-inline"
                            href="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgp.jpg"
                            data-caption="Screenshot 3">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgp.jpg"
                                alt="Screenshot" uk-img=""
                                src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/sc8bgp.jpg"
                                width="1920 " height="1080">
                        </a>
                    </div>

                </div>
            </div>
            <aside class='uk-width-1-3@s' id="right">
                <div class="uk-panel">
                    <a href="#modal-media-image" uk-toggle>
                        <img data-src="https://images.igdb.com/igdb/image/upload/t_720p/co29i4.jpg"
                            alt="Paradise Lost cover image" uk-img="" width="1244" height="700">
                    </a>
                    <h4 class="uk-h3 uk-margin-small-bottom">Details</h4>
                    <hr class="uk-divider-small">
                    <ul class="uk-list uk-list-large">
                        <li>
                            <div class="uk-grid-small uk-child-width-expand@m uk-grid" uk-grid="">
                                <div class="uk-width-small@m uk-text-break uk-first-column">
                                    <h4 class="uk-h5">Genre</h4>
                                </div>
                                <div class="uk-panel">
                                    <p>Adventure, Indie</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-light">
                                <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="world"></a>
                                <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
                                <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
                                <a href="" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
                            </div>
                        </li>

                    </ul>
                </div>
            </aside>
        </div>
        <!-- end of game showcase -->

        <!-- similar games -->

        <div class="uk-margin-medium-top uk-position-relative " uk-slider="finite: true">
            <h4 class="uk-h2 uk-heading-bullet">You might also like</h4>
            <ul
                class="uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid uk-grid-small">
                <li>
                    <div class="uk-panel">
                        <a href="# " class="uk-link-reset">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt=""
                                width="" height="" uk-img>
                            <h5 class="uk-margin-small-top">Some Title</h5>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt=""
                                width="" height="" uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt=""
                                width="" height="" uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt=""
                                width="" height="" uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt=""
                                width="" height="" uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt="" width="" height=""
                                uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt="" width="" height=""
                                uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt="" width="" height=""
                                uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
                <li>
                    <div class="uk-panel">
                        <a href="# ">
                            <img data-src="https://images.igdb.com/igdb/image/upload/t_cover_big/co1r66.jpg" alt="" width="" height=""
                                uk-img>
                            <div class="uk-position-bottom uk-panel">
                                <h3>Game Title</h3>
                            </div>
                        </a>
                    </div>
                </li>
            </ul>
            <a class="uk-position-center-left uk-background-primary uk-padding-small uk-hidden-hover uk-icon uk-slidenav-previous uk-slidenav text-white"
                href="#" uk-slidenav-previous="" uk-slider-item="previous"> </a>
            <a class="uk-position-center-right uk-background-primary uk-padding-small uk-hidden-hover   text-white"
                href="#" uk-slidenav-next="" uk-slider-item="next"> </a>
        </div>
        <!-- end of similar games -->

        <!-- modal -->
        <div id="modal-media-image" class="uk-flex-top" uk-modal>
            <div class="uk-modal-dialog uk-width-auto uk-margin-auto-vertical">
                <button class="uk-modal-close-outside" type="button" uk-close></button>
                <img src="https://images.igdb.com/igdb/image/upload/t_screenshot_big/co29i4.jpg" alt="">
            </div>
        </div>
        <!-- end of modal -->
    </div>
</section>
@endsection
