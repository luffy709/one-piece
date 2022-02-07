<!-- Button trigger modal -->
@can('write forum')
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nouveau sujet
    </button>
@endcan

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog forum__modal">
        <div class="modal-content forum__modal__content">
            <div class="modal-header forum__modal__content__header">
                <h5 class="modal-title forum__modal__content__header__title" id="exampleModalLabel">Poster un nouveau sujet</h5>
            </div>

            <form action="{{ route('forum.topic.store', $subCategory) }}" method="post">
                @csrf

                <div class="modal-body forum__modal__content__body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Sujet</label>
                        <input type="text" class="form-control" name="title" id="title"/>
                    </div>

                    <div class="mb-3">
                        <label for="body">Message</label>
                        <textarea name="body" id="body" class="form-control no-resize"></textarea>
                    </div>

                    <input type="hidden" name="sub_category_id" id="sub_category_id" value="{{ $subCategory->id }}">
                </div>

                <div class="modal-footer forum__modal__content__footer">
                    <button type="submit" class="btn btn-primary">Poster</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
