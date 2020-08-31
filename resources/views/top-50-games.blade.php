@extends('layouts.app')

@section('title', 'Top 50 Games')

@section('content')
<section class="uk-section uk-padding-remove-top">
    <div class="uk-container  uk-light">
        <div class="uk-width-4-5@m uk-width-1-1 ">
            <table class="uk-table uk-table-middle uk-table-divider">
                <thead>
                    <tr>
                        <th class="uk-table-shrink ">#</th>
                        <th class='w-xsmall'></th>
                        <th class="uk-table-expand">Name</th>
                        <th class="uk-width-small">Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($top50Games as $game)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td class='w-xsmall'>
                            <a href="{{ route('games.show', $game['slug']) }}" class='uk-link-reset'>
                                <img data-src="{{ $game['coverImageUrl'] }}" alt="{{ $game['altText']}}" height="65"
                                    width="43" uk-img class='cover-image'>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('games.show', $game['slug']) }}" class="uk-link-toggle">
                                <span class="uk-link-heading">{{ $game['name'] }}</span>
                            </a>
                        </td>
                        <td>
                            <span class="text-primary">{{ $game['totalRating'] }}</span> / 100
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
