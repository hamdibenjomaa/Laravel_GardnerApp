@extends('frontOffice.template')

@section('content')
    <h1>Add Reclamation</h1>

    <form action="{{ route('reclamations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Titre :</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description : </label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <label for="category">Category:</label> 
       <select name="category_id" required>
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
