<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\ForumSubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SubCategoryController extends Controller
{
    public function show(ForumSubCategory $subCategory): View
    {
        $topics = $subCategory->forumTopics()->orderByDesc('created_at')->get();

        return view('forum.sub_category.show')->with([
            "subCategory" => $subCategory,
            "topics" => $topics,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $subCategory = new ForumSubCategory;
        $subCategory->title = $request->title;
        $subCategory->forum_category_id = $request->foreign;
        $subCategory->save();

        return redirect()->back();
    }

    public function update(ForumSubCategory $subCategory, Request $request): RedirectResponse
    {
        $subCategory->title = $request->title;
        $subCategory->save();

        return redirect()->back();
    }

    public function delete(ForumSubCategory $subCategory): RedirectResponse
    {
        $subCategory->delete();

        return redirect()->back();
    }
}
