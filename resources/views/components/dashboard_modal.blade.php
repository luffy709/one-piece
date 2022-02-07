<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Nouvelle Catégorie
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom_modal">
        <div class="modal-content custom_modal__content">
            <div class="modal-header custom_modal__content__header">
                <h5 class="modal-title custom_modal__content__header__title" id="exampleModalLabel">Créer une nouvelle catégorie</h5>
            </div>

            <form action="{{ route($route) }}" method="post">
                @csrf

                <div class="modal-body custom_modal__content__body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text" class="form-control" name="title" id="title"/>
                    </div>
                </div>

                @isset($foreign)
                    <input type="hidden" name="foreign" value="{{ $foreign }}">
                @endisset

                <div class="modal-footer custom_modal__content__footer">
                    <button type="submit" class="btn btn-primary">Créer</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
