<?php

namespace App\Policies;

use App\Models\Image;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ImagePolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->role == User::ROLE_ADMIN;
    }

    public function update(User $user, Image $image): bool
    {
        return $user->id == User::ROLE_ADMIN || $user->id == $image->article->user->id;
    }

    public function delete(User $user, Image $image): bool
    {
        return $user->role == User::ROLE_ADMIN && $user->id == $image->user->id;
    }
}
