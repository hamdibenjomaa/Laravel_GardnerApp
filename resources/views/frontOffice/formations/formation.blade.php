@extends('frontOffice.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">{{ $formation->name }}</h2>
    
    <div class="card">
        @if($formation->image)
            <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->name }}" class="card-img-top" style="height: 300px; object-fit: cover;">
        @else
            <img src="https://via.placeholder.com/300" alt="No Image Available" class="card-img-top" style="height: 300px; object-fit: cover;">
        @endif

        <div class="card-body">
            <p class="card-text">{{ $formation->description }}</p>
            <p><strong>Starting Date:</strong> {{ \Carbon\Carbon::parse($formation->starting_date)->format('F j, Y') }}</p>
            <a href="{{ route('forms') }}" class="btn btn-secondary">Back to Formations</a>
        </div>
    </div>
</div>
@endsection
