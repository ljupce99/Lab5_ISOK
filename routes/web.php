<?php

use App\Http\Controllers\CategoryRecipeController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('recipe', RecipeController::class);
Route::resource('categoryRecipe', CategoryRecipeController::class);
