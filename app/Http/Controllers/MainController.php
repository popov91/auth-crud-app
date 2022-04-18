<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Contracts\Support\Renderable;

class MainController extends Controller
{
    /**
     * @return Renderable
     */
    public function index(): Renderable
    {
        $news = News::orderByDesc('id')->get();

        return view('main', [
            'news' => $news,
        ]);
    }

    /**
     * @return Renderable
     */
    public function getNewsByCategory(string $slug): Renderable
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $news = News::where('category_id', $category->id)->orderBy('id')->get();

        return view('main', [
            'news' => $news,
        ]);
    }
}
