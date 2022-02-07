@extends('layouts.app')

@section('content')
    <div class="home">
        <header class="home__header">
            <img src="{{ asset('images/One-Piece-Logo.png') }}" alt="{{ config('app.public_name') }}">
        </header>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush
