<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'description',
        'ingredients',
        'category_recipes_id'
    ];

    public function category_recipes(): BelongsTo
    {
        return $this->belongsTo(CategoryRecipe::class,'category_recipes_id');
    }
}
