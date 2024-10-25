@extends('frontOffice.template')

@section('content')
<div class="container">
    <h1 class="my-4">Responses for Reclamation: {{ $reclamation->title }}</h1>
    
    <a href="{{ route('reclamations.responses.create', $reclamation->id) }}" class="btn btn-success mb-3">Add Response</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responses as $response)
                <tr>
                    <td>{{ $response->message }}</td>
                    <td>
                    <a href="{{ route('reclamations.responses.edit', ['reclamation' => $reclamation->id, 'response' => $response->id]) }}" class="btn btn-warning">Edit Response</a>
                    <!-- <form action="{{ route('reclamations.responses.destroy', ['reclamation' => $reclamation->id, 'response' => $response->id]) }}" method="POST">
                   @csrf
                   @method('DELETE')
                   <button type="submit" class="btn btn-danger">Delete</button> -->
                   </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
