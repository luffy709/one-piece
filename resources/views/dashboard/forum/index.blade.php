@extends('layouts.dashboard')

@section('content')
    <div class="dashboard-category">
        <div class="dashboard-category__body">
            <h2>Forum</h2>

            <x-dashboard_modal route="dashboard.forum.store"></x-dashboard_modal>

            <x-dashboard-list :collection="$categories" page="forum" title-target="title"></x-dashboard-list>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard-list.css') }}">
@endpush
