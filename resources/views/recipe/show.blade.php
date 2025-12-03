<h1>Recipe Details</h1>

<div>
    <strong>Title:</strong> {{ $recipe->title }}
</div>

<div>
    <strong>Category Recipe:</strong>
{{--    <a href="{{ route('categoryRecipe.show', $categoryRecipe->id) }}">--}}
{{--        {{ $categoryRecipe->name }}--}}
{{--    </a>--}}
</div>

<div>
    <strong>Description:</strong> {{ $recipe->description }}
</div>

<div>
    <strong>Ingredients:</strong> {{ $recipe->ingredients }}
</div>


<a href="{{ route('recipe.index') }}">Back to Recipe</a>
