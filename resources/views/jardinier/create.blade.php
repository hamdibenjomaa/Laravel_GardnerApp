<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-6 col-md-8 col-sm-12">
        <form action="{{ route('jardinier.store') }}" method="POST" class="p-5 bg-light shadow-lg rounded">
            @csrf

            <h2 class="text-center mb-4">Ajouter un nouveau Jardinier</h2>

            <!-- Nom -->
            <div class="form-group mb-4">
                <label for="nom" class="form-label">Nom du jardinier</label>
                <input type="text" id="nom" name="nom" class="form-control form-control-lg" placeholder="Entrez le nom" required>
            </div>

            <!-- Prenom -->
            <div class="form-group mb-4">
                <label for="prenom" class="form-label">Prénom du jardinier</label>
                <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" placeholder="Entrez le prénom" required>
            </div>

            <!-- Telephone -->
            <div class="form-group mb-4">
                <label for="telephone" class="form-label">Téléphone du jardinier</label>
                <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" placeholder="Entrez le numéro de téléphone" required>
            </div>

            <!-- Localisation -->
            <div class="form-group mb-4">
                <label for="localisation" class="form-label">Localisation</label>
                <input type="text" id="localisation" name="localisation" class="form-control form-control-lg" placeholder="Entrez la localisation">
            </div>

            <!-- Horaire -->
            <div class="form-group mb-4">
                <label for="horaire" class="form-label">Horaire</label>
                <input type="text" id="horaire" name="horaire" class="form-control form-control-lg" placeholder="Entrez l'horaire">
            </div>

            <!-- Cout -->
            <div class="form-group mb-4">
                <label for="cout" class="form-label">Coût</label>
                <input type="number" step="0.01" id="cout" name="cout" class="form-control form-control-lg" placeholder="Entrez le coût">
            </div>

            <!-- Specialite -->
            <div class="form-group mb-5">
                <label for="specialite" class="form-label">Spécialité</label>
                <select id="specialite" name="specialite" class="form-select form-select-lg" required>
                    <option value="" selected disabled>Choisir une spécialité</option>
                    <option value="Paysagiste">Paysagiste</option>
                    <option value="Jardinier d’entretien">Jardinier d’entretien</option>
                    <option value="Fleuriste">Fleuriste</option>
                    <option value="Jardinier horticole">Jardinier horticole</option>
                    <option value="Arboriculteur">Arboriculteur</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-lg">Ajouter Jardinier</button>
            </div>
        </form>
    </div>
</div>
