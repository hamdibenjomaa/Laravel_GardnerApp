@extends('frontOffice.skander')

@section('content') 
    <h1>Modifier laResponse</h1>

    <form action="{{ route('reclamations.responses.update', [$reclamation_id, $response->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" required>{{ $response->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
@endsection
