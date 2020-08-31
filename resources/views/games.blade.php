@extends('layouts.app')

@section('title', 'All Games')

@section('content')
<section class="uk-section">
    <div class="uk-container expand">
        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-medium uk-grid"
            uk-grid uk-height-match="target: > div > a > div > .cover-image">
            @foreach ($games as $game)
            <x-game-card :game="$game"></x-game-card>
            @endforeach
        </div>
        <div class="page-load-status uk-flex uk-flex-center uk-margin-medium-top">
            <div uk-spinner="ratio: 3" class="infinite-scroll-request uk-text-center"></div>

            <p class="infinite-scroll-last">End of content</p>
            <p class="infinite-scroll-error">No more pages to load</p>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
<script>
    // initialize the infinite scroll
    var elem = document.querySelector('.uk-grid');
    var infScroll = new InfiniteScroll( elem, {
        // options
        path: '{{ route('pages.games') }}?page=@{{#}}',
        append: '.game',
        status: '.page-load-status'
    });

    infScroll.on('append', function( response, path, items ) {
        items.forEach(item => {
            let elem = item.querySelector('.rating');

            if (elem) {
                let rating = elem.getAttribute('data-rating');

                var bar = new ProgressBar.Circle(elem, {
                    color: '#fefefe',
                    strokeWidth: 8,
                    trailWidth: 0.2,
                    trailColor: '#34c6b0',
                    easing: 'easeInOut',
                    duration: 2500,
                    text: {
                        autoStyleContainer: false
                    },
                    from: {color: '#34c6b0', width: 8},
                    to: {color: '#34c6b0', width: 8},
                    // Set default step function for all animate calls
                    step: function (state, circle) {
                        circle.path.setAttribute('stroke', state.color);
                        circle.path.setAttribute('stroke-width', state.width);

                        var value = Math.round(circle.value() * 100);
                        if (value === 0) {
                        circle.setText('0%');
                        } else {
                        circle.setText(value + '%');
                        }

                    }
                });
                bar.text.style.fontFamily = 'Varta, sans-serif';
                bar.text.style.fontSize = '1rem';

                bar.animate(rating / 100);
            }

        })
    })
</script>

@endpush
