<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-6 col-md-8 col-sm-12">
        <form action="{{ route('reservation.store') }}" method="POST" class="p-5 bg-light shadow-lg rounded">
            @csrf

            <h2 class="text-center mb-4">Ajouter une nouvelle reservation</h2>

            <!-- Nom -->
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
            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Ajouter reservation</button>
            </div>
        </form>
    </div>
</div>
