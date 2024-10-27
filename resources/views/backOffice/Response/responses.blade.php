@extends('backOffice.Response.index')

@section('content')

<br>
<br>
<br>
    <h2>les responses</h2>
    <a href="{{ route('backOffice.responses.create', $reclamation->id) }}" class="btn btn-success">Ajouter une nouvelle reponse </a>

    @if($reclamation->responses->isEmpty())
        <p>No responses found for this reclamation.</p>
    @else
        <ul class="list-group">

            @foreach($reclamation->responses as $response)
                <li class="list-group-item">
                    <p><strong>Message:</strong> {{ $response->message }}</p>
                    <p><small>Envoyer a: {{ $response->created_at->format('Y-m-d H:i') }}</small></p>
                    <!-- <a href="{{ route('reclamations.responses.edit', [$reclamation->id, $response->id]) }}" class="btn btn-sm btn-warning">Modifier</a> -->
                    <form action="{{ route('backOffice.responses.destroy1', [$reclamation->id, $response->id]) }}" method="POST" style="display:inline;">                        @csrf
                        @method('DELETE')   
                        <button type="submit" class="btn btn-sm btn-danger">supprimer</button>     
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

@endsection