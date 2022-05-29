<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class ImageRepository extends BaseRepository
{

    public function model(): string
    {
        return "App\\Models\\Image";
    }
}
