<h1>Edit Category Recipes</h1>

<form action="{{ route('categoryRecipe.update', $categoryRecipe->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $categoryRecipe->name) }}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>


    <div>
        <button type="submit">Update Category Recipe</button>
    </div>
</form>

<a href="{{ route('categoryRecipe.index') }}">Back to Category Recipe</a>
