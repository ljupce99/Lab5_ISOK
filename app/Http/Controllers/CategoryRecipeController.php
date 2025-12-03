<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRecipe\CategoryRecipeStoreRequest;
use App\Http\Requests\CategoryRecipe\CategoryRecipeUpdateRequest;
use App\Models\CategoryRecipe;
use App\Models\Recipe;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Factory|Application
    {
        $categoryRecipe = CategoryRecipe::query()
            ->when($request->has('search'),
                fn ($query) => $query->where('name', 'like', '%'.$request->get('search').'%'))
            ->latest()
            ->paginate(10);

        return view('categoryRecipe/index', compact('categoryRecipe'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Factory|Application
    {
        return view('categoryRecipe/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRecipeStoreRequest $request): RedirectResponse
    {
        CategoryRecipe::query()
            ->create($request->validated());

        return redirect()
            ->route('categoryRecipe.index')
            ->with('success', 'Category Recipe created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryRecipe $categoryRecipe): View|Factory|Application
    {
        $categoryRecipe->loadMissing('recipes');

        return view('categoryRecipe.show', [
            'categoryRecipe' => $categoryRecipe,
            'recipes' => $categoryRecipe->recipes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryRecipe $categoryRecipe)
    {
        return view('categoryRecipe/edit', compact('categoryRecipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRecipeUpdateRequest $request, CategoryRecipe $categoryRecipe): RedirectResponse
    {
        $categoryRecipe->update($request->validated());
        return redirect()
            ->route('categoryRecipe.index')
            ->with('success', 'Category Recipe updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryRecipe $categoryRecipe): RedirectResponse
    {
        $categoryRecipe->recipe()->delete();
        $categoryRecipe->delete();

        return redirect()
            ->route('categoryRecipe.index')
            ->with('success', 'Category Recipe deleted successfully.');
    }
}
