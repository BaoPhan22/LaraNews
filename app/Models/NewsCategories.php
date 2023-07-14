<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NewsCategories extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'lang', 'isVisible', 'order'];

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }
}
