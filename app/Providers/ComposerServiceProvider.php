<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function($view){
            $categories = Category::all();
            $data = [];

            foreach ($categories as $category) {
                $data[] = [
                    'name' => $category->name,
                    'slug' => $category->slug,
                    'newsCount' => (is_null($category->news) ? 0 : count($category->news)),
                ];
            }

            $view->with('categoriesList', $data);
        });
    }

    public function register()
    {
        //
    }
}
