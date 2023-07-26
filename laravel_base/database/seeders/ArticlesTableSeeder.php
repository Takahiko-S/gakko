<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++){//データベースにデータがが10個入る
            $article = new Article();
            $article->title = "タイトル" . $i;
            $article->body = "本文" . $i;
            $article->save();
    }
}
}
