<div class="dashboard-sidebar">
    <div class="dashboard-sidebar__brand">
        <h2>
            {{ config('app.public_name') }}
        </h2>
    </div>

    <nav class="dashboard-sidebar__body">
        <div class="dashboard-sidebar__body__list">
            <div class="dashboard-sidebar__body__list__item {{ Request::is('dashboard') ? 'sidebar-active' : '' }}">
                <a href="{{ route("dashboard.index") }}">
                    Accueil
                </a>
            </div>

            @foreach($dashboards as $nav => $title)
                <div class="dashboard-sidebar__body__list__item {{ Request::is('dashboard/' . $nav) ? 'sidebar-active' : '' }}">
                    <a href="{{ route("dashboard.$nav.index") }}">
                        {{ $title }}
                    </a>
                </div>
            @endforeach

            <div class="dashboard-sidebar__body__list__item">
                <a href="{{ route('home.index') }}">
                    Retour au site
                </a>
            </div>
        </div>
    </nav>
</div>
