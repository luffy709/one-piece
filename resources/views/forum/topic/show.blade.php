@extends('layouts.app')

@section('content')
    <div class="topic min-vh-100 py-4">
        <div class="container">
            <div class="topic__back_link">
                <a href="{{ route('forum.index') }}">Forum</a> - <a href="{{ route('forum.sub_category.show', ['sub_category' => $topic->forumSubCategory]) }}">{{ $topic->forumSubCategory()->first()->title }}</a>
            </div>
            <div class="card mb-4 topic__sujet">
                <div class="card-header topic__sujet__header">
                    <h3 class="card-title m-0 topic__sujet__header__title">
                        {{ $topic->title }}
                    </h3>
                </div>

                <div class="card-body topic__sujet__body">
                    <p class="card-text topic__sujet__body__text">
                        {{ $topic->body }}
                    </p>
                </div>

                <div class="card-footer topic__sujet__footer">
                    @include('components.form_answer_modal')
                </div>
            </div>

            <div class="topic__answers">
                @foreach($answers as $answer)
                    <div class="topic__answers__answer">
                        <div class="topic__answers__answer__author">
                            <h3 class="topic__answers__answer__author__name">
                                {{ $answer->user->name }}
                            </h3>

                            <h4 class="topic__answers__answer__author__created_at">
                                {{ $answer->created_at }}
                            </h4>
                        </div>

                        <div class="topic__answers__answer__body">
                            <p class="topic__answers__answer__body__message">
                                {{ $answer->body }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('content2')
    <div class="container">
        <a href="{{ route('forum.sub_category.show', $topic->forumSubCategory) }}">Retour</a>

        <div class="card mb-5">
            <div class="card-header">
                <h3 class="card-title">{{ $topic->title }}</h3>
            </div>

            <div class="card-body">
                <p class="card-text">
                    {{ $topic->body }}
                </p>
            </div>
        </div>

        @include('components.form_answer_modal')

        @foreach($answers as $answer)
            <div class="card mb-3">
                <div class="card-header">
                    <div class="flex h-100 justify-content-between">
                        <h4 class="card-title">
                            {{ $answer->user->name }}
                        </h4>

                        <p>
                            {{ $answer->created_at }}
                        </p>
                    </div>
                </div>

                <div class="card-body">
                    <p class="card-text">
                        {{ $answer->body }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/topic.css') }}">
@endpush
