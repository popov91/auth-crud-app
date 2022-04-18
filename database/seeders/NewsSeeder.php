<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        News::factory()
            ->count(20)
            ->create();
    }
}
