<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Comment $comment): bool
    {
        return $user->id == User::ROLE_ADMIN || $user->id == $comment->user->id;
    }

    public function delete(User $user): bool
    {
        return $user->role == User::ROLE_ADMIN;
    }
}
