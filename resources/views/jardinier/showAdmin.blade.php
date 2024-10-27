@extends('backOffice.template')

@section('show')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Détails du Jardinier</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $jardinier->id }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Nom:</strong> {{ $jardinier->nom }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Prénom:</strong> {{ $jardinier->prenom }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Téléphone:</strong> {{ $jardinier->telephone }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Localisation:</strong> {{ $jardinier->localisation }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Horaire:</strong> {{ $jardinier->horaire }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Coût:</strong> {{ $jardinier->cout }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Spécialité:</strong> {{ $jardinier->specialite }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('jardinier.edit', $jardinier->id) }}" class="btn btn-edit btn-sm">
                <i class="fas fa-edit"></i>Edit
            </a>

            <!-- Delete Form/Button -->
            <form action="{{ route('jardinier.destroy', $jardinier->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Are you sure you want to delete this jardinier?');">
                    <i class="fas fa-trash"></i>Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
