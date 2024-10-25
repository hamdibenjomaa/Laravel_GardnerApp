@extends('backOffice.Response.index')

@section('content')

    <h1>Add Response for Reclamation #{{ $reclamation->id }}</h1>

    <form action="{{ route('backOffice.responses.store', $reclamation->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Response Message:</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Response</button>
    </form>
@endsection
