@extends('layout')

@section('content')
    <h1>Recipe</h1>

    <form method="GET" action="{{ route('recipe.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('recipe.create') }}">
        <button>Create Recipe</button>
    </a>

    <table border="1">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Ingredients</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($recipes as $recipe)
            <tr>
                <td>{{ $recipe->title }}</td>
                <td>{{ $recipe->description }}</td>
                <td>{{ $recipe->ingredients }}</td>
                <td>
                    <a href="{{ route('recipe.show', $recipe->id) }}">View</a>

                    <a href="{{ route('recipe.edit', $recipe->id) }}">Edit</a>

                    <form action="{{ route('recipe.destroy', $recipe->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this client?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $recipes->links() }}
    </div>
@endsection
