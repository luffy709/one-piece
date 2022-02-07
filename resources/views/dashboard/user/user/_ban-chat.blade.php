<x-dashboard-card :title="$user->name" page="user" :model="$user">
    <div class="dashboard-card__row">
        <div class="dashboard-card__col">
            <form action="{{ route('dashboard.user.activate', $user) }}" method="post">
                @csrf
                @method('get')

                <button type="submit" class="dashboard-card__button dashboard-user__body__users__button--ban-forum">Restaurer</button>
            </form>
        </div>

        <div class="dashboard-card__col">
            <form action="{{ route('dashboard.user.ban_forum', $user) }}" method="post">
                @csrf
                @method('delete')

                <button type="submit" class="dashboard-card__button dashboard-user__body__users__button--ban-forum">Ban forum</button>
            </form>
        </div>
    </div>

    @can('assign moderator role')
        <div>
            <form class="dashboard-card__row" action="{{ route('dashboard.user.update', $user) }}" method="post">
                @csrf

                <x-dashboard-select name="role" :options="$roles" :current="$user->roles->first()"></x-dashboard-select>

                <button class="dashboard-card__button" style="width: 100%;" type="submit">Enregistrer</button>
            </form>
        </div>
    @endcan
</x-dashboard-card>
