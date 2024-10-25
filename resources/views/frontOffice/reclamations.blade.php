@extends('frontOffice.template')

@section('content')
    <h1>Reclamations</h1>
    <a href="{{ route('reclamations.add') }}" class="btn btn-primary">Add Reclamation</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->title }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>
                        <a href="{{ route('reclamations.edit', $reclamation->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('reclamations.destroy', $reclamation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <a href="{{ route('reclamations.responses.index', $reclamation->id) }}" class="btn btn-info">View Responses</a>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
