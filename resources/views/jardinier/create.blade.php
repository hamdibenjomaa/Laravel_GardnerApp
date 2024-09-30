<form action="{{ route('jardinier.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nom">Nom du jardinier</label>
        <input type="text" id="nom" name="nom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="prenom">prenom du jardinier</label>
        <input type="text" id="prenom" name="prenom" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="telephone">tel du jardinier</label>
        <input type="text" id="telephone" name="telephone" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="localisation">localisation</label>
        <input type="text" id="localisation" name="localisation" class="form-control" >
    </div>
    <div class="form-group">
        <label for="horaire">horaire</label>
        <input type="text" id="horaire" name="horaire" class="form-control" >
    </div>
    <div class="form-group">
        <label for="cout">cout</label>
        <input type="text" id="cout" name="cout" class="form-control" >
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