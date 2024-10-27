@extends('backOffice.Response.index')

@section('content')
<br>
<br>
<br>

    <h1>Add Response for Reclamation  {{ $reclamation->title }}</h1>

    <form action="{{ route('backOffice.responses.store', $reclamation->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Reponse Message:</label>
            <textarea name="message" id="message" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer la Response</button>
    </form>
@endsection
