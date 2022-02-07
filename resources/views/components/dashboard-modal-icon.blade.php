<!-- Button trigger modal -->
<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $target->id }}">
    <i class="fas fa-pencil-alt"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="editModal-{{ $target->id }}" tabindex="-1" aria-labelledby="editModalLabel-{{$target->id}}" aria-hidden="true">
    <div class="modal-dialog custom_modal">
        <div class="modal-content custom_modal__content">
            <div class="modal-header custom_modal__content__header">
                <h5 class="modal-title custom_modal__content__header__title" id="editModalLabel-{{ $target->id }}">Modifier - {{ $target->title }}</h5>
            </div>

            <form action="{{ route($route, $target) }}" method="post">
                @csrf
                @method('patch')

                <div class="modal-body custom_modal__content__body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="title" id="title"/>
                    </div>
                </div>

                <div class="modal-footer custom_modal__content__footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
