<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $categories = Category::orderBy('id')->get();

        return view('categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('categories.create');
    }

    /**
     * @param Category $category
     * @return Renderable
     */
    public function edit(Category $category): Renderable
    {
            return view('categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * @param CategoryRequest $request
     * @return RedirectResponse
     */
    public function store(CategoryRequest $request): RedirectResponse
    {
        if (Auth::check() && Auth::user()->isAdmin()){
            $validated = $request->validated();
            Category::create($validated);
        }

        return redirect()->route('categories');
    }

    /**
     * @param CategoryRequest $request
     * @param Category $category
     * @return RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        if (Auth::check() && Auth::user()->isAdmin()){
            $validated = $request->validated();
            $category->update($validated);
        }

        return redirect()->route('categories');
    }

    /**
     * @param Category $category
     * @return RedirectResponse
     */
    public function delete(Category $category): RedirectResponse
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            $category->delete();
        }

        return redirect()->route('categories');
    }
}
