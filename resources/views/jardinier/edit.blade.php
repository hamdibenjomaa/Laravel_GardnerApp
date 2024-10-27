@extends('backOffice.template')

@section('edit')
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-lg-6 col-md-8 col-sm-12">
<form action="{{ route('jardinier.update', $jardinier->id) }}" method="POST" class="p-5 bg-light shadow-lg rounded">
    @csrf
    @method('PUT')
    <h2 class="text-center mb-4">Modifier Jardinier</h2>
    <div class="form-group mb-4">
        <label for="nom">Nom du jardinier</label>
        <input type="text" id="nom" name="nom" class="form-control form-control-lg" value="{{ $jardinier->nom }}" >
    </div>
    <div class="form-group mb-4">
        <label for="prenom">prenom du jardinier</label>
        <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" value="{{ $jardinier->prenom }}" >
    </div>
    <div class="form-group mb-4">
        <label for="telephone">tel du jardinier</label>
        <input type="text" id="telephone" name="telephone" class="form-control form-control-lg" value="{{ $jardinier->telephone }}" >
    </div>
    <div class="form-group mb-4">
        <label for="localisation">localisation</label>
        <input type="text" id="localisation" name="localisation" class="form-control form-control-lg" value="{{ $jardinier->localisation }}" >
    </div>
    <div class="form-group mb-4">
        <label for="horaire">horaire</label>
        <input type="time" id="horaire" name="horaire" class="form-control form-control-lg" value="{{ $jardinier->horaire }}" >
    </div>
    <div class="form-group mb-4">
        <label for="cout">cout</label>
        <input type="text" id="cout" name="cout" class="form-control form-control-lg" value="{{ $jardinier->cout }}" >
    </div>


    <div class="form-group mb-4">
        <label for="specialite">specialite</label>
        <select id="specialite" name="specialite" class="custom-select" >
            <option value="Paysagiste" {{ old('specialite', $jardinier->specialite) == 'Paysagiste' ? 'selected' : '' }}>Paysagiste</option>
            <option value="Jardinier d’entretien" {{ old('specialite', $jardinier->specialite) == 'Jardinier d’entretien' ? 'selected' : '' }}>Jardinier d’entretien</option>
            <option value="fleuriste" {{ old('specialite', $jardinier->specialite) == 'fleuriste' ? 'selected' : '' }}>fleuriste</option>
            <option value="Jardinier horticole" {{ old('specialite', $jardinier->specialite) == 'Jardinier horticole' ? 'selected' : '' }}>Jardinier horticole</option>
            <option value="Arboriculteur" {{ old('specialite', $jardinier->specialite) == 'Arboriculteur' ? 'selected' : '' }}>Arboriculteur</option>
        </select>
    </div>

    <div class="text-center">
        <button type="submit" class="btn btn-primary btn-lg">Enregistrer les modifications</button>
    </div>
</form>
</div>
</div>
@endsection