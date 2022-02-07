@extends('layouts.dashboard')

@section('content')
    <div class="dashboard-category">
        <div class="dashboard-category__body">
            <h2>Forum - {{ $category->title }}</h2>

            <x-dashboard_modal route="dashboard.sub_category.store" foreign="{{ $category->id }}"></x-dashboard_modal>

            <x-dashboard-category :collection="$category->forumSubCategories" page="sub_category" title-target="title"></x-dashboard-category>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard-list.css') }}">
@endpush
