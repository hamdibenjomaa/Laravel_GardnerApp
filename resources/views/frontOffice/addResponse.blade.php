@extends('frontOffice.skander')

@section('content') 
    <h1>Add Response</h1>

    <form action="{{ route('reclamations.responses.store', $reclamation_id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
@endsection
