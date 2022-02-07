<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ForumCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(): View
    {
        $categories = ForumCategory::all();

        return view('dashboard.forum.index')->with([
            'categories' => $categories,
        ]);
    }

    public function show(ForumCategory $category): View
    {
        return view('dashboard.forum.show')->with([
            'category' => $category,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $category = new ForumCategory;
        $category->title = $request->title;
        $category->save();

        return redirect()->back();
    }

    public function update(ForumCategory $category, Request $request): RedirectResponse
    {
        $category->title = $request->title;
        $category->save();

        return redirect()->back();
    }

    public function delete(ForumCategory $category): RedirectResponse
    {
        $category->delete();
        return redirect()->back()->with(['message' => 'category.delete.success']);
    }
}
