<div class="forum__body__item card mb-3">
    <div class="forum__body__item__header card-header">
        <h2 class="card-title mb-0">
            {{ $category->title }}
        </h2>
    </div>

    <div>
        <ul class="list-group">
            @foreach($category->forumSubCategories as $subCategory)
                <li class="forum__body__item__subcategory list-group-item">
                    <a class="h-100 w-100 d-flex justify-content-start align-items-center" href="{{ route('forum.sub_category.show', $subCategory) }}">
                        {{ $subCategory->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
