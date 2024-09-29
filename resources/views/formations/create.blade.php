@extends('backOffice.template')

@section('content')
<div class="container mt-5">
    <h2>Create New Formation</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('formations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- Laravel CSRF Token -->

        <div class="mb-3">
            <label for="name" class="form-label">Formation Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>

        <div class="mb-3">
            <label for="startingdate" class="form-label">Starting Date</label>
            <input type="date" class="form-control" id="startingdate" name="starting_date" value="{{ old('starting_date') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Formation</button>
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
