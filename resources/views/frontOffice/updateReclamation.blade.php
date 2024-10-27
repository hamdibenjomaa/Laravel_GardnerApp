@extends('frontOffice.skander')

@section('content')
    <h1>Modifier Reclamation</h1>

    <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" class="form-control" value="{{ $reclamation->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $reclamation->description }}</textarea>
        </div>
        <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" class="form-control" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $reclamation->category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
