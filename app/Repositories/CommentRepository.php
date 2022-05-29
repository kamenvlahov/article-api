<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class CommentRepository extends BaseRepository
{

    public function model(): string
    {
        return "App\\Models\\Comment";
    }
}
