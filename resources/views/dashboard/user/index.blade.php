@extends('layouts.dashboard')

@section('content')
    <div class="dashboard-user">
        <div class="dashboard-user__body">
            <h2>Utilisateurs</h2>

            <div class="dashboard-user__body__users">
                <h2>Joueurs</h2>

                @foreach($activeUsers as $user)
                    @include('dashboard.user.user._active', $user)
                @endforeach
            </div>

            @if(!empty($banForumUsers))
                <h2>Joueurs bannis du forum</h2>

                <div class="dashboard-user__body__users">
                    @foreach($banForumUsers as $user)
                        @include('dashboard.user.user._ban-forum', $user)
                    @endforeach
                </div>
            @endif

            @if(!empty($banChatUsers))
                <h2>Joueurs bannis du chat</h2>

                <div class="dashboard-user__body__users">
                    @foreach($banChatUsers as $user)
                        @include('dashboard.user.user._ban-chat', $user)
                    @endforeach
                </div>
            @endif

            @if(!empty($banUsers))
                <h2>Joueurs bannis</h2>

                <div class="dashboard-user__body__users">
                    @foreach($banUsers as $user)
                        @include('dashboard.user.user._ban', $user)
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard-list.css') }}">
@endpush
