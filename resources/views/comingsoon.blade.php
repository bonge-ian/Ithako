@extends('layouts.app')

@section('title', 'Coming Soon Games')

@section('content')
    <section class="uk-section  ">
        <div class="uk-container">
            <x-games-showcase >
                <x-slot name='title'>Upcoming Games This Week</x-slot>
                <livewire:upcoming-games-this-week></livewire:upcoming-games-this-week>
            </x-games-showcase>

            <x-games-showcase>
                <x-slot name='title'>Upcoming Games This Month</x-slot>
                <livewire:upcoming-games-this-month></livewire:upcoming-games-this-month>
            </x-games-showcase>

            <x-games-showcase>
                <x-slot name='title'>Upcoming Games This Year</x-slot>
                <livewire:upcoming-games-this-year></livewire:upcoming-games-this-year>
            </x-games-showcase>
        </div>
    </section>
@endsection
