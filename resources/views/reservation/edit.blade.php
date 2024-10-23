@extends('backOffice.template')

@section('show')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
<form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
    @csrf
    <h2 class="text-center mb-4">Modifier Reservation</h2>
    <div class="form-group mb-4">
        <label for="description_service">description_service</label>
        <input type="text" id="description_service" name="description_service" class="form-control form-control-lg" value="{{ $reservation->description_service }}" >
    </div>

    <!-- Prenom -->
    <div class="form-group mb-4">
        <label for="date_réservation">date réservation</label>
        <input type="date" id="date réservation" name="date_réservation" class="form-control form-control-lg" value="{{ $reservation->date_réservation }}">
    </div>

    <!-- Telephone -->
    <div class="form-group mb-4">
        <label for="client">client</label>
        <input type="tel" id="client" name="client" class="form-control form-control-lg" value="{{ $reservation->client }}">
    </div>

    <!-- Horaire -->
    <div class="form-group mb-4">
        <label for="reference">reference</label>
        <input type="text" id="reference" name="reference" class="form-control form-control-lg" value="{{ $reservation->reference }}">
    </div>

    <!-- Cout -->
    <div class="form-group mb-4">
        <label for="jardinier_id">jardinier</label>
        <input id="jardinier_id" name="jardinier_id" class="form-control form-control-lg" value="{{ $reservation->jardinier->nom }}">
    </div>    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection