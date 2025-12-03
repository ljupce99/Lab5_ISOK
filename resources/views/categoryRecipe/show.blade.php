@extends('layout')

@section('content')
    <h1>{{ $categoryRecipe->name }}'s Details</h1>



    <h2>Recipes</h2>
    <table border="1">
        <thead>
        <tr>
            <th>Title</th>

        </tr>
        </thead>
        <tbody>
        @foreach ($recipes as $recipe)
            <tr>
                <td>
                    <a href="{{ route('recipe.show', $recipe->id) }}">
                        {{ $recipe->title }}
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    <a href="{{ route('categoryRecipe.index') }}">Back to Category Recipe</a>
@endsection
