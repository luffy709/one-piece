@extends('layouts.app')

@section('content')
    <div class="forum min-vh-100 py-4">
        <div class="container">
            <div class="forum__banner">
                <img class="forum__banner__img" src="{{ asset('images/forum_banner.jpg') }}" alt="Forum">
            </div>

            <div class="forum__body">
                @foreach($categories as $category)
                    @include('components.forum_card')
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endpush
