@extends('backOffice.template')

@section('show')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Détails de la Réservation</h3>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{ $reservation->id }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Description du service:</strong> {{ $reservation->description_service }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Date de réservation:</strong> {{ $reservation->date_réservation }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Client:</strong> {{ $reservation->client }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Feedback:</strong> {{ $reservation->feedback }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Référence:</strong> {{ $reservation->reference }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Jardinier ID:</strong> {{ $reservation->jardinier_id }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-edit btn-sm">
                <i class="fas fa-edit"></i> Modifier
            </a>

            <!-- Delete Form/Button -->
            <form action="{{ route('reservation.destroy', $reservation->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-delete btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réservation ?');">
                    <i class="fas fa-trash"></i> Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
