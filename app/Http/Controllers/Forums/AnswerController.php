<?php

namespace App\Http\Controllers\Forums;

use App\Http\Controllers\Controller;
use App\Models\ForumAnswer;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $answer = new ForumAnswer;

        $answer->body = $request->body;

        $answer->forum_topic_id = $request->topic;

        $answer->user_id = auth()->user()->id;

        $answer->save();

        return redirect()->back();
    }
}
