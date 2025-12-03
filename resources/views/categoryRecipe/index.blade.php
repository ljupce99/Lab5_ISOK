@extends('layout')

@section('content')
    <h1>CategoryRecipe</h1>

    <form method="GET" action="{{ route('categoryRecipe.index') }}">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('categoryRecipe.create') }}">
        <button>Create CategoryRecipe</button>
    </a>

    <table border="1">
        <thead>
        <tr>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($categoryRecipe as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categoryRecipe.show', $category->id) }}">View</a>

                    <a href="{{ route('categoryRecipe.edit', $category->id) }}">Edit</a>

                    <form action="{{ route('categoryRecipe.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this category?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div>
        {{ $categoryRecipe->links() }}
    </div>
@endsection
