<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    public const STORAGE = 'public/';
    /**
     * {@inheritdoc}
     */
    protected $table = 'images';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'article_id',
        'url'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
