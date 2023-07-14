<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function news_categories(): BelongsTo
    {
        return $this->belongsTo(NewsCategories::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
