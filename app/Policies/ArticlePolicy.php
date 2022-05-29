<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    public function create(User $user): bool
    {
        return $user->role == User::ROLE_ADMIN;
    }

    public function comment(User $user, Article $article): bool
    {
        return $article->comment_status == Article::COMMENT_ENABLE;
    }

    public function update(User $user, Article $article): bool
    {
        return $user->id == User::ROLE_ADMIN || $user->id == $article->user->id;
    }

    public function delete(User $user, Article $article): bool
    {
        return $user->role == User::ROLE_ADMIN && $user->id == $article->user->id;
    }
}
