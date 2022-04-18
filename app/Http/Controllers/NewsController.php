<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $news = News::orderBy('id')->get();

        return view('news.index', [
            'news' => $news,
        ]);
    }

    /**
     * @return Renderable
     */
    public function create(): Renderable
    {
        $categories = Category::all();

        return view('news.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * @param News $news
     * @return Renderable
     */
    public function edit(News $news): Renderable
    {
        $categories = Category::all();

        return view('news.edit', [
            'news'       => $news,
            'categories' => $categories,
        ]);
    }

    /**
     * @param NewsRequest $request
     * @return RedirectResponse
     */
    public function store(NewsRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        News::create($validated);

        return redirect()->route('main');
    }

    /**
     * @param NewsRequest $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(NewsRequest $request, News $news): RedirectResponse
    {
        if (Auth::check() && Auth::user()->id === $news->author_id || Auth::check() && Auth::user()->isAdmin()) {
            $validated = $request->validated();
            $news->update($validated);
        }

        return redirect()->route('main');
    }

    /**
     * @param News $news
     * @return RedirectResponse
     */
    public function delete(News $news): RedirectResponse
    {
        if (Auth::check() && Auth::user()->id === $news->author_id || Auth::check() && Auth::user()->isAdmin()) {
            $news->delete();
        }

        return redirect()->route('main');
    }
}
