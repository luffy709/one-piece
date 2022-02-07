<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\ForumSubCategory;
use App\Models\ForumTopic;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function show(ForumSubCategory $subCategory, ForumTopic $topic): View
    {
        return view('forum.topic.show')->with([
            'answers' => $topic->forumAnswers,
            'subCategory' => $subCategory,
            'topic' => $topic,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $topic = new ForumTopic;

        $topic->title = $request->title;
        $topic->body = $request->body;
        $topic->forum_sub_category_id = $request->sub_category_id;
        $topic->user_id = auth()->user()->id;

        $topic->save();

        return redirect()->back();
    }
}
