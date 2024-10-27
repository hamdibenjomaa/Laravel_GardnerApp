@extends('backOffice.template')

@section('content')
<div class="container mt-5">
    <h2>Edit Formation</h2>

    <!-- Error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Edit Formation Form -->
    <form action="{{ route('formations.update', $formation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Laravel CSRF Token -->
        @method('PUT') <!-- Since we're updating, we use PUT method -->

        <div class="mb-3">
            <label for="name" class="form-label">Formation Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $formation->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $formation->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload New Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <!-- Display the current image -->
        @if($formation->image)
            <div class="mb-3">
                <label class="form-label">Current Image:</label><br>
                <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->name }}" width="150" height="150" class="img-thumbnail">
            </div>
        @endif

        <div class="mb-3">
            <label for="starting_date" class="form-label">Starting Date</label>
            <input type="date" class="form-control" id="starting_date" name="starting_date" value="{{ old('starting_date', $formation->starting_date) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Formation</button>
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
