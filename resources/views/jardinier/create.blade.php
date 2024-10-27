@extends('jardinier.molka')
@section('create')      
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-lg-6 col-md-8 col-sm-12">
            <form action="{{ route('jardinier.store') }}" method="POST" class="p-5 bg-light shadow-lg rounded">
                @csrf

                <h2 class="text-center mb-4">Ajouter un nouveau Jardinier</h2>

                <!-- Nom -->
                <div class="form-group mb-4">
                    <label for="nom" class="form-label">Nom du jardinier</label>
                    <input type="text" id="nom" name="nom" class="form-control form-control-lg" placeholder="Entrez le nom" value="{{ old('nom') }}">
                    @if ($errors->has('nom'))
                        <span class="text-danger">{{ $errors->first('nom') }}</span>
                    @endif
                </div>

                <!-- Prenom -->
                <div class="form-group mb-4">
                    <label for="prenom" class="form-label">Prénom du jardinier</label>
                    <input type="text" id="prenom" name="prenom" class="form-control form-control-lg" placeholder="Entrez le prénom" value="{{ old('prenom') }}">
                    @if ($errors->has('prenom'))
                        <span class="text-danger">{{ $errors->first('prenom') }}</span>
                    @endif
                </div>

                <!-- Telephone -->
                <div class="form-group mb-4">
                    <label for="telephone" class="form-label">Téléphone du jardinier</label>
                    <input type="tel" id="telephone" name="telephone" class="form-control form-control-lg" placeholder="Entrez le numéro de téléphone" value="{{ old('telephone') }}">
                    @if ($errors->has('telephone'))
                        <span class="text-danger">{{ $errors->first('telephone') }}</span>
                    @endif
                </div>

                <!-- Localisation -->
                <div class="form-group mb-4">
                    <label for="localisation" class="form-label">Localisation</label>
                    <input type="text" id="localisation" name="localisation" class="form-control form-control-lg" placeholder="Entrez la localisation" value="{{ old('localisation') }}">
                    @if ($errors->has('localisation'))
                        <span class="text-danger">{{ $errors->first('localisation') }}</span>
                    @endif
                </div>

                <!-- Horaire -->
                <div class="form-group mb-4">
                    <label for="horaire" class="form-label">Horaire</label>
                    <input type="time" id="horaire" name="horaire" class="form-control form-control-lg" value="{{ old('horaire') }}">
                    @if ($errors->has('horaire'))
                        <span class="text-danger">{{ $errors->first('horaire') }}</span>
                    @endif
                </div>

                <!-- Cout -->
                <div class="form-group mb-4">
                    <label for="cout" class="form-label">Cout</label>
                    <input id="cout" name="cout" class="form-control form-control-lg" placeholder="Entrez le cout" value="{{ old('cout') }}">
                    @if ($errors->has('cout'))
                        <span class="text-danger">{{ $errors->first('cout') }}</span>
                    @endif
                </div>

                <!-- Specialite -->
                <div class="form-group mb-4">
                    <label for="specialite" class="form-label">Specialite</label>
                    <select id="specialite" name="specialite" class="custom-select" required>
                        <option value="Paysagiste" {{ old('specialite') == 'Paysagiste' ? 'selected' : '' }}>Paysagiste</option>
                        <option value="Jardinier d’entretien" {{ old('specialite') == 'Jardinier d’entretien' ? 'selected' : '' }}>Jardinier d’entretien</option>
                        <option value="fleuriste" {{ old('specialite') == 'fleuriste' ? 'selected' : '' }}>fleuriste</option>
                        <option value="Jardinier horticole" {{ old('specialite') == 'Jardinier horticole' ? 'selected' : '' }}>Jardinier horticole</option>
                        <option value="Arboriculteur" {{ old('specialite') == 'Arboriculteur' ? 'selected' : '' }}>Arboriculteur</option>
                    </select>
                    @if ($errors->has('specialite'))
                        <span class="text-danger">{{ $errors->first('specialite') }}</span>
                    @endif
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-lg">Ajouter le jardinier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
