<?php

namespace App\Models;

use App\Events\ArticleDelete;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    public const COMMENT_ENABLE = 1;
    public const COMMENT_DISABLE = 0;

    /**
     * {@inheritdoc}
     */
    protected $table = 'articles';

    /**
     * {@inheritdoc}
     */
    protected $attributes = [
        'title' => '',
    ];

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'title',
        'description',
        'body',
        'user_id',
        'comment_status'
    ];

    protected $dispatchesEvents = [
        'deleting' => ArticleDelete::class,
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
