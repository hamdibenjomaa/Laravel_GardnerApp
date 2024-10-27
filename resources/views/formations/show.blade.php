@extends('backOffice.template')

@section('content')
<div class="container mt-5">
    <h2>{{ $formation->name }}</h2>

    @if ($formation->image)
        <div class="mb-3">
            <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->name }}" class="img-fluid" />
        </div>
    @endif

    <div class="mb-3">
        <strong>Description:</strong>
        <p>{{ $formation->description }}</p>
    </div>

    <div class="mb-3">
        <strong>Starting Date:</strong>
        <p>{{ \Carbon\Carbon::parse($formation->starting_date)->format('F j, Y') }}</p>
    </div>

    <div class="mb-3">
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Back to Formations</a>
        <a href="{{ route('formations.edit', $formation->id) }}" class="btn btn-warning">Edit Formation</a>

        <!-- Delete Form -->
        <form action="{{ route('formations.destroy', $formation->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this formation?')">Delete Formation</button>
        </form>
    </div>
</div>
@endsection
