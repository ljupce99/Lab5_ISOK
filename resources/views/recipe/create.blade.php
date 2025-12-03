<h1>Create New Recipe</h1>

<form method="POST" action="{{ route('recipe.store') }}">
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}">
        @error('title')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>



    <div>
        <label for="description">description:</label>
        <input type="text" name="description" id="description" value="{{ old('description') }}">
        @error('description')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>


    <div>
        <label for="ingredients">ingredients:</label>
        <input type="text" name="ingredients" id="ingredients" value="{{ old('ingredients') }}">
        @error('ingredients')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="category_recipes_id">Client:</label>
        <select name="category_recipes_id" id="category_recipes_id">
            <option value="">Select Category Recipe</option>
            @foreach ($categoryRecipes as $categoryRecipe)
                <option value="{{ $categoryRecipe->id }}" {{ old('category_recipes_id') == $categoryRecipe->id ? 'selected' : '' }}>
                    {{ $categoryRecipe->name }}
                </option>
            @endforeach
        </select>
        @error('category_recipes_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit">Create Recipe</button>
</form>

<a href="{{ route('recipe.index') }}">Back to Recipe</a>
