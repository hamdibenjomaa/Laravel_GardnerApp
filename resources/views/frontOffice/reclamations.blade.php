@extends('frontOffice.template')

@section('content')
    <h1>Reclamations</h1>
    <a href="{{ route('reclamations.add') }}" class="btn btn-primary">Ajouter une Reclamation</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>categorie</th>

                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reclamations as $reclamation)
                <tr>
                    <td>{{ $reclamation->title }}</td>
                    <td>{{ $reclamation->description }}</td>
                    <td>{{ $reclamation->category ? $reclamation->category->name : 'No Category' }}</td>

                    <td>
                        <a href="{{ route('reclamations.edit', $reclamation->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('reclamations.destroy', $reclamation->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                        <a href="{{ route('reclamations.responses.index', $reclamation->id) }}" class="btn btn-info">Voir les Responses</a>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
