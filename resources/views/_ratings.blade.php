<script>
    @if ($event) window.livewire.on('{{ $event }}', params => { @endif

    @if ($event)
        var progressBarContainer = document.getElementById(params.slug);
    @else
        var progressBarContainer = document.getElementById('{{ $slug }}');
    @endif

    var bar = new ProgressBar.Circle(progressBarContainer, {
        color: '#fefefe',
        strokeWidth: 8,
        trailWidth: 0.2,
        trailColor: '#34c6b0',
        easing: 'easeInOut',
        duration: 2500,
        text: { autoStyleContainer: false },
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

    @if ($event)
    bar.animate(params.rating);
    @else
    bar.animate({{ $rating }} / 100);
    @endif

    @if ($event) }) @endif




</script>
