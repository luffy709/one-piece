<!-- Button trigger modal -->
@can('write forum')
    <button type="button" class="btn btn-primary topic__sujet__footer__button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Répondre
    </button>
@endcan

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog topic__modal">
        <div class="modal-content topic__modal__content">
            <div class="modal-header topic__modal__content__header">
                <h5 class="modal-title topic__modal__content__header__title" id="exampleModalLabel">
                    Poster une réponse
                </h5>
            </div>

            <form action="{{ route('forum.answer.store', ['sub_category' => $topic->forumSubCategory, 'topic' => $topic]) }}" method="post">
                @csrf

                <div class="modal-body topic__modal__content__body">
                    <div class="mb-3">
                        <label for="body">Message</label>
                        <textarea name="body" id="body" class="form-control" rows="15" style="resize: none"></textarea>
                    </div>

                    <input type="hidden" name="topic" id="topic" value="{{ $topic->id }}">
                </div>

                <div class="modal-footer topic__modal__content__footer">
                    <button type="submit" class="btn btn-primary">Poster</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </form>
        </div>
    </div>
</div>
