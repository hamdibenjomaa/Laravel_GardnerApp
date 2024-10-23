@extends('backOffice.template')
@section('create')      
            <div class="container d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <form action="{{ route('jardinier.store') }}" method="POST" class="p-5 bg-light shadow-lg rounded">
                        @csrf
        
                        <h2 class="text-center mb-4">Ajouter un nouveau Jardinier</h2>
        
                        <!-- Nom -->
                        <div class="form-group mb-4">
                            <label for="nom" class="form-label">Nom du jardinier</label>
                            <input type="text" id="nom" name="nom" class="form-control form-control-lg" placeholder="Entrez le nom" >
                        </div>
        
                        <!-- Prenom -->
                        <div class="form-group mb-4">
                            <label for="prenom" class="form-label">Prénom du jardinier</label>
                            <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" placeholder="Entrez le prénom" >
                        </div>
        
                        <!-- Telephone -->
                        <div class="form-group mb-4">
                            <label for="telephone" class="form-label">Téléphone du jardinier</label>
                            <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" placeholder="Entrez le numéro de téléphone" >
                        </div>
        
                        <!-- localisation -->
                        <div class="form-group mb-4">
                            <label for="localisation" class="form-label">Localisation</label>
                            <input type="localisation" id="localisation" name="localisation" class="form-control form-control-lg" placeholder="Entrez la localisation">
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="horaire">horaire</label>
                            <input type="time" id="horaire" name="horaire" class="form-control form-control-lg" >
                        </div>
        
                        <!-- cout -->
                        <div class="form-group mb-4">
                            <label for="cout" class="form-label">Cout</label>
                            <input id="cout" name="cout" class="form-control form-control-lg" placeholder="Entrez le cout">
                        </div>
        
                        <div class="form-group mb-4">
                            <label for="specialite">Specialite</label>
                            <select id="specialite" name="specialite" class="custom-select" required>
                                <option value="Paysagiste">Paysagiste</option>
                                <option value="Jardinier d’entretien">Jardinier d’entretien</option>
                                <option value="fleuriste">fleuriste</option>
                                <option value="Jardinier horticole">Jardinier horticole</option>
                                <option value="Arboriculteur">Arboriculteur</option>
                            </select>
                        </div>
        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Ajouter le jardinier</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection