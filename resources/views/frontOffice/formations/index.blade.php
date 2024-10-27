@extends('frontOffice.template')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Our Formations</h2>

    <div class="row justify-content-center">
        @foreach($formations as $formation)
            <div class="col-md-4 mb-4"> <!-- Adjust the column size as needed -->
                <div class="card">
                    <div class="card-body">
                        <!-- Display Image -->
                        @if($formation->image)
                            <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->name }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="No Image Available" class="card-img-top" style="height: 150px; object-fit: cover;">
                        @endif
                        <h5 class="card-title">{{ $formation->name }}</h5>
                        <p class="card-text">{{ Str::limit($formation->description, 100) }}</p>
                        <p class="mb-1"><strong>Starting Date:</strong> {{ \Carbon\Carbon::parse($formation->starting_date)->format('F j, Y') }}</p>
                        
                        <!-- Button to go to the inscription page -->
                        <a href="{{ route('inscriptions.create', ['formation_id' => $formation->id]) }}" class="btn btn-primary">Inscription</a>
                        
                        <a href="{{ route('frontoffice.formations.show', $formation->id) }}" class="btn btn-link">Learn More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
