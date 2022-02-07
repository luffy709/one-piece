<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm mt-2">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Chat - {{ $room->title }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContentChat" aria-controls="navbarSupportedContentChat" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContentChat">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                @foreach($rooms as $navRoom)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('room.show', $navRoom) }}">{{ __($navRoom->title) }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>
