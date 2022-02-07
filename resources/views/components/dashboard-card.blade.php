<div class="dashboard-card">
    <div class="dashboard-card__header">
        <h3 class="dashboard-card__header__title">
            {{ $title }}
        </h3>

        <div class="dashboard-card__header__delete">
            <form action="{{ route("dashboard.$page.archived", $model) }}" method="post">
                @csrf
                @method('delete')

                <label for="delete-{{ $model->id }}">
                    <i class="fas fa-trash-alt"></i>
                </label>

                <input name="delete" id="delete-{{ $model->id }}" class="btn btn-default d-none" type="submit" value="Delete" />
            </form>
        </div>
    </div>

    <div class="dashboard-card__body">
        {{ $slot }}
    </div>
</div>
