@extends('backOffice.template')

@section('content')
<div class="container mt-5">
    <h2>Formations List</h2>

    <!-- Success message -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('formations.create') }}" class="btn btn-primary">Create New Formation</a>
    </div>

    <!-- Table to display formations -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th> <!-- New column for Image -->
                <th>Name</th>
                <th>Description</th>
                <th>Starting Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formations as $formation)
                <tr>
                    <td>{{ $formation->id }}</td>

                    <!-- Display Image -->
                    <td>
                        @if($formation->image)
                        <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->name }}" width="100" height="100" class="img-thumbnail">

                        @else
                            No Image
                        @endif
                    </td>

                    <td>{{ $formation->name }}</td>
                    <td>{{ $formation->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($formation->starting_date)->format('F j, Y') }}</td>
                    <td>
                        <!-- View Button -->
                        <a href="{{ route('formations.show', $formation->id) }}" class="btn btn-info btn-sm">View</a>

                        <!-- Edit Button -->
                        <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Delete Button -->
                        <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this formation?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
