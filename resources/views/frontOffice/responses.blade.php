@extends('frontOffice.home')

 @section('content') 
<div class="container">
    <h1>Responses for Reclamation: {{ $reclamation->title }}</h1>
    <a href="{{ route('reclamations.responses.create', $reclamation->id) }}" class="btn btn-success mb-3">Add Response</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($responses as $response)
                <tr>
                    <td>{{ $response->id }}</td>
                    <td>{{ $response->message }}</td>
                    <td>
                        <a href="{{ route('reclamations.responses.edit', [$reclamation->id, $response->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('reclamations.responses.destroy', $response->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
