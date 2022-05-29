<?php

namespace App\Events;

use App\Models\Article;
use Illuminate\Queue\SerializesModels;

class ArticleDelete
{
    use SerializesModels;

    public Article $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }
}
