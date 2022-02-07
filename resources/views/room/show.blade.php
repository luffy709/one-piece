@extends('layouts.app')

@section('content')
    <div class="room">
        <div class="room__mobile_nav">
            @include('components.chat_navbar')
        </div>

        <div class="room__sidebar">
            <ul class="list-group room__sidebar__nav">
                @foreach($rooms as $navRoom)
                    <li class="list-group-item room__sidebar__nav__item @if((Route::current()->room ? Route::current()->room->id : 1) === $navRoom->id) active @endif">
                        <a class="h-100 w-100" href="{{ route('room.show', $navRoom) }}">
                            {{ $navRoom->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="room__body">
            <div id="room__body__messages" class="room__body__messages position-relative overflow-auto">
                <ul class="list-group room__body__messages__list">
                    @foreach($room->roomMessages as $roomMessage)
                        <li class="list-group-item border-0 room__body__messages__list__item">
                            <div class="separator"></div>

                            <div class="room__body__messages__list__item__user">
                                {{ $roomMessage->user->name }}
                            </div>

                            <div class="room__body__messages__list__item__body">
                                {{ $roomMessage->body }}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="room__body__post">
                <form action="{{ route('room.store', $room) }}" method="post" class="h-100">
                    @csrf

                    <div class="form-group h-100 d-flex">
                        <input
                            type="text"
                            name="body"
                            id="body"
                            class="form-control flex-grow-1 room__body__post__input"
                            @if(auth()->check() && auth()->user()->can('write chat'))
                                placeholder="Salut ..."
                            @elseif(auth()->check() && !auth()->user()->can('write chat'))
                                placeholder="Vous n'avez pas les droits pour écrire dans ce chat"
                                disabled
                            @else
                                placeholder="Connectez-vous pour pouvoir parler"
                                disabled
                            @endif
                        />

                        @if(auth()->check() && auth()->user()->can('write chat'))
                            <button class="btn btn-secondary">Envoyer</button>
                        @endif
                    </div>

                    <input type="hidden" name="room" value="{{ $room->id }}">
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/room.css') }}">
@endpush


@push('scripts')
    <script defer>
        window.addEventListener('load', function () {
            const element = document.getElementById('room__body__messages')
            element.scrollTop = element.scrollHeight

            document.getElementById('body').focus()
        })
    </script>
@endpush
