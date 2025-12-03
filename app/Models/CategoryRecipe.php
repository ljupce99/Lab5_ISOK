<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryRecipe extends Model
{
    protected $fillable = [
        'name',
    ];

    public function recipe(): HasMany
    {
        return $this->hasMany(Recipe::class);
    }
}
