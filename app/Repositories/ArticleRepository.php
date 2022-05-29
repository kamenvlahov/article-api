<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ArticleRepository extends BaseRepository
{

    function model(): string
    {
        return "App\\Models\\Article";
    }
}
