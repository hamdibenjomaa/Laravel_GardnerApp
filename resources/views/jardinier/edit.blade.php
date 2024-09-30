<form action="{{ route('jardinier.update', $jardinier->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom du jardinier</label>
        <input type="text" id="nom" name="nom" class="form-control" value="{{ $jardinier->nom }}" required>
    </div>
    <div class="form-group">
        <label for="prenom">prenom du jardinier</label>
        <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $jardinier->prenom }}" required>
    </div>
    <div class="form-group">
        <label for="telephone">tel du jardinier</label>
        <input type="text" id="telephone" name="telephone" class="form-control" value="{{ $jardinier->telephone }}" required>
    </div>
    <div class="form-group">
        <label for="localisation">localisation</label>
        <input type="text" id="localisation" name="localisation" class="form-control" value="{{ $jardinier->localisation }}" >
    </div>
    <div class="form-group">
        <label for="horaire">horaire</label>
        <input type="text" id="horaire" name="horaire" class="form-control" value="{{ $jardinier->horaire }}" >
    </div>
    <div class="form-group">
        <label for="cout">cout</label>
        <input type="text" id="cout" name="cout" class="form-control" value="{{ $jardinier->cout }}" >
    </div>


    <div class="form-group">
        <label for="specialite">specialite</label>
        <select id="specialite" name="specialite" class="form-control" required>
            <option value="">Select specialite</option>
            <option value="Paysagiste" {{ old('specialite', $jardinier->specialite) == 'Paysagiste' ? 'selected' : '' }}>Paysagiste</option>
            <option value="Jardinier d’entretien" {{ old('specialite', $jardinier->specialite) == 'Jardinier d’entretien' ? 'selected' : '' }}>Jardinier d’entretien</option>
            <option value="fleuriste" {{ old('specialite', $jardinier->specialite) == 'fleuriste' ? 'selected' : '' }}>fleuriste</option>
            <option value="Jardinier horticole" {{ old('specialite', $jardinier->specialite) == 'Jardinier horticole' ? 'selected' : '' }}>Jardinier horticole</option>
            <option value="Arboriculteur" {{ old('specialite', $jardinier->specialite) == 'Arboriculteur' ? 'selected' : '' }}>Arboriculteur</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>