<form action="{{ route('jardinier.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom du jardinier</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nom">prenom du jardinier</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nom">tel du jardinier</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nom">localisation</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nom">horaire</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="nom">cout</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>


    <div class="form-group">
        <label for="specialite">Specialite</label>
        <select id="specialite" name="specialite" class="custom-select" required>
            <option value="Paysagiste">Paysagiste</option>
            <option value="Jardinier d’entretien">Jardinier d’entretien</option>
            <option value="fleuriste">fleuriste</option>
            <option value="Jardinier horticole">Jardinier horticole</option>
            <option value="Arboriculteur">Arboriculteur</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>