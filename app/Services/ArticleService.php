<?php


namespace App\Services;

use App\Exceptions\ArticleNotFoundException;
use App\Models\Article;


class ArticleService
{
    public function findById($id)
    {
        $article = Article::where('id', $id)->first();
        if(!$article) {
            throw new ArticleNotFoundException('Пользователь c id' . $id . 'не найден');
        }

        return $article;
    }
}
