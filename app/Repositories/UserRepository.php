<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{

    function model(): string
    {
        return "App\\Models\\User";
    }
}