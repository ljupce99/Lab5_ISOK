<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recipe\RecipeStoreRequest;
use App\Http\Requests\Recipe\RecipeUpdateRequest;
use App\Models\CategoryRecipe;
use App\Models\Recipe;


use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Factory|Application
    {
        $recipes = Recipe::query()
            ->with('category_recipes')
            ->when(
                $request->get('status') !== null,
                fn ($query) => $query->where('status', $request->get('status'))
            )
            ->latest()
            ->paginate(10);

        return view('recipe/index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View|Factory|Application
    {
        $categoryRecipes = CategoryRecipe::query()->get();
        return view('recipe/create',compact('categoryRecipes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecipeStoreRequest $request): RedirectResponse
    {
        Recipe::query()
            ->create($request->validated());

        return redirect()
            ->route('recipe.index')
            ->with('success', 'Recipe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe): View|Factory|Application
    {
        $recipe->loadMissing('category_recipes');
        return view('recipe.show', compact('recipe'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe): View|Factory|Application
    {
        $categoryRecipes = CategoryRecipe::query()
            ->get();

        return view('recipe/edit', compact('recipe', 'categoryRecipes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RecipeUpdateRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->update($request->validated());
        return redirect()
            ->route('recipe.index')
            ->with('success', 'Recipe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();
        return redirect()
            ->route('recipe.index')
            ->with('success', 'Recipe deleted successfully.');
    }
}





