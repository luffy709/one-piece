<?php

namespace App\Http\Controllers;

use App\Models\ForumCategory;
use Illuminate\Contracts\View\View;

class ForumController extends Controller
{
    public function index(): View
    {
        $categories = ForumCategory::all();

        return view('forum.index')->with([
            'categories' => $categories,
        ]);
    }
}
