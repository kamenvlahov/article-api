<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * {@inheritdoc}
     */
    protected $table = 'comments';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'comment',
        'article_id',
        'user_id'
    ];

    public function articles(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
