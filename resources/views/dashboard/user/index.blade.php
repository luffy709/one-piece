@extends('layouts.dashboard')

@section('content')
    <div class="dashboard-user">
        <div class="dashboard-user__body">
            <h2>Utilisateurs</h2>

            <div class="dashboard-user__body__users">
                <h2>Joueurs</h2>

                @foreach($users as $user)
                    @if($user->status === \App\Utils\UserStatus::$ACTIVE)
                        @include('dashboard.user.user._active', $user)
                    @endif
                @endforeach
            </div>

            <h2>Joueurs bannis du forum</h2>

            <div class="dashboard-user__body__users">
                @foreach($users as $user)
                    @if($user->status === \App\Utils\UserStatus::$BAN_FORUM)
                        @include('dashboard.user.user._ban-forum', $user)
                    @endif
                @endforeach
            </div>

            <h2>Joueurs bannis du chat</h2>

            <div class="dashboard-user__body__users">
                @foreach($users as $user)
                    @if($user->status === \App\Utils\UserStatus::$BAN_CHAT)
                        @include('dashboard.user.user._ban-chat', $user)
                    @endif
                @endforeach
            </div>

            <h2>Joueurs bannis</h2>

            <div class="dashboard-user__body__users">
                @foreach($users as $user)
                    @if($user->status === \App\Utils\UserStatus::$ARCHIVED)
                        @include('dashboard.user.user._ban', $user)
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard-list.css') }}">
@endpush
