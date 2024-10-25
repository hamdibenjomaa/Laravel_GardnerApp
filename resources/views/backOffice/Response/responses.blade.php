@extends('backOffice.Response.index')

@section('content')


    <h2>Responses</h2>
    <a href="{{ route('backOffice.responses.create', $reclamation->id) }}" class="btn btn-success">Add New Response</a>

    @if($reclamation->responses->isEmpty())
        <p>No responses found for this reclamation.</p>
    @else
        <ul class="list-group">

            @foreach($reclamation->responses as $response)
                <li class="list-group-item">
                    <p><strong>Message:</strong> {{ $response->message }}</p>
                    <p><small>Created at: {{ $response->created_at->format('Y-m-d H:i') }}</small></p>
                    <a href="{{ route('reclamations.responses.edit', [$reclamation->id, $response->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('reclamations.responses.destroy', [$reclamation->id, $response->id]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>     
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

@endsection