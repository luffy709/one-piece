@extends('layouts.app')

@section('content')
    <div class="forum min-vh-100 py-4">
        <div class="container">
            <div class="forum__banner">
                <img class="forum__banner__img" src="{{ asset('images/forum_banner.jpg') }}" alt="Forum">
            </div>

            <div class="forum__new_topic">
                <div class="forum__back_link">
                    <a href="{{ route('forum.index') }}">Forum</a>
                </div>

                @include('components.form_topic_modal')
            </div>

            <div class="forum__body">
                <div class="forum__body__topics list-group">
                    @foreach($topics as $topic)
                        @include('components.topic_list')
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content2')
    <div class="container">
        <h1>{{ $subCategory->title }}</h1>
        <a href="{{ route('forum.index') }}">Retour</a>

        @include('components.form_topic_modal')

        @foreach($topics as $topic)
            <h3>
                <a href="{{ route('forum.topic.show', ['sub_category' => $subCategory, 'topic' => $topic]) }}">
                    {{ $topic->title }}
                </a>
            </h3>
        @endforeach
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
@endpush
