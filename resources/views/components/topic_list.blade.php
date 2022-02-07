<div class="list-group-item forum__body__topics__item">
    <a class="h-100 w-100 d-flex align-items-center"
       href="{{ route('forum.topic.show', ['sub_category' => $subCategory, 'topic' => $topic]) }}">
        {{ $topic->title }}
    </a>
</div>
