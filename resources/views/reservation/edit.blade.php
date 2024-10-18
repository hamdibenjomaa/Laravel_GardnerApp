<form action="{{ route('reservation.update', $reservation->id) }}" method="POST">
    @csrf
    <div class="form-group mb-4">
        <label for="description_service" class="form-label">description_service</label>
        <input type="text" id="description_service" name="description_service" class="form-control form-control-lg" >
    </div>

    <!-- Prenom -->
    <div class="form-group mb-4">
        <label for="date_réservation" class="form-label">date réservation</label>
        <input type="date" id="date réservation" name="date_réservation" class="form-control form-control-lg">
    </div>

    <!-- Telephone -->
    <div class="form-group mb-4">
        <label for="client" class="form-label">client</label>
        <input type="tel" id="client" name="client" class="form-control form-control-lg">
    </div>

    <!-- Localisation -->
    <div class="form-group mb-4">
        <label for="feedback" class="form-label">feedback</label>
        <input type="text" id="feedback" name="feedback" class="form-control form-control-lg">
    </div>

    <!-- Horaire -->
    <div class="form-group mb-4">
        <label for="reference" class="form-label">reference</label>
        <input type="text" id="reference" name="reference" class="form-control form-control-lg">
    </div>

    <!-- Cout -->
    <div class="form-group mb-4">
        <label for="jardinier_id" class="form-label">jardinier</label>
        <select id="jardinier_id" name="jardinier_id" class="custom-select">
            <option value="">Select a jardinier</option>
            @foreach ($jardiniers as $jardinier)
            <option value="{{ $jardinier->id }}">{{ $jardinier->nom }}</option>
            @endforeach
        </select>
    </div>    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>