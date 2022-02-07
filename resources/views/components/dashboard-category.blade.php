<ul class="list-group dashboard-list">
    @foreach($collection as $model)
        <li class="list-group-item dashboard-list__item">
            <div class="dashboard-list__item__title">
                {{ $model->$titleTarget }}
            </div>

            <div class="dashboard-list__item__action">
                <x-dashboard-modal-icon route="dashboard.sub_category.update" :target="$model"></x-dashboard-modal-icon>

                <form action="{{ route("dashboard.$page.delete", $model) }}" method="post">
                    @csrf
                    @method('delete')

                    <button name="delete" id="delete-{{ $model->id }}" class="btn btn-outline-danger" type="submit" value="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </li>
    @endforeach
</ul>
