<ul class="list-group dashboard-list">
    @foreach($collection as $model)
        <li class="list-group-item dashboard-list__item">
          <a href={{ route('dashboard.forum.show', $model) }}>
            <div class="dashboard-list__item__title">
                {{ $model->$titleTarget }}
            </div>
          </a>

            <div class="dashboard-list__item__delete">
                <form action="{{ route("dashboard.$page.delete", $model) }}" method="post">
                    @csrf
                    @method('delete')

                    <label for="delete-{{ $model->id }}">
                        <i class="fas fa-trash-alt"></i>
                    </label>

                    <input name="delete" id="delete-{{ $model->id }}" class="d-none" type="submit" value="Delete" />
                </form>
            </div>
        </li>
    @endforeach
</ul>
