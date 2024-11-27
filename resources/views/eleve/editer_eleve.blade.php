@extends('layouts.page')

@section("title")
    Éditer Élève
@endsection

@section('content')
    <h3>Éditer un Élève</h3>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('traitement_eleve', $eleve->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Indique que c'est une mise à jour -->
        <input type="text" name= "id" style= "display: none;" value="{{$eleve->id}}" required>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="nomEleve" name="NomEleve" value="{{ old('NomEleve', $eleve->nom_eleve) }}" placeholder="nom élève" required>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Prénoms</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="prenoms" name="Prenoms" value="{{ old('Prenoms', $eleve->prenoms) }}" placeholder="prénoms" required>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date de Naissance</label>
            <div class="col-sm-12 col-md-10">
                <input type="date" class="form-control" id="date_de_naissance" name="Date_de_naissance" value="{{ old('Date_de_naissance', $eleve->date_de_naissance) }}" placeholder="date de naissance" required>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Sexe</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="sexe" name="Sexe" required>
                    <option value="">Sélectionnez le sexe</option>
                    <option value="M" {{ $eleve->sexe == 'M' ? 'selected' : '' }}>Masculin</option>
                    <option value="F" {{ $eleve->sexe == 'F' ? 'selected' : '' }}>Féminin</option>
                </select>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Numéro Matricule</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="numeroMatricule" name="NumeroMatricule" value="{{ old('NumeroMatricule', $eleve->numeroMatricule) }}" placeholder="numéro matricule" required>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Classe Actuelle</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="sous_classe_id" name="sous_classe_id" required>
                    <option value="">Sélectionnez la classe actuelle</option>
                    @foreach($sousClasses as $sousClasse)
                        <option value="{{ $sousClasse->id }}" {{ $sousClasse->id == $eleve->sous_classe_id ? 'selected' : '' }}>
                            {{ $sousClasse->nomSousClasse }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Classe Précédente</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="classe_precedente_id" name="classe_precedente_id">
                    <option value="">Sélectionnez la classe précédente</option>
                    @foreach($sousClasses as $sousClasse)
                        <option value="{{ $sousClasse->id }}" {{ $sousClasse->id == $eleve->classe_precedente_id ? 'selected' : '' }}>
                            {{ $sousClasse->nomSousClasse }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div> <br/>

        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="statut" name="Statut" required>
                    <option value="">Sélectionnez le statut</option>
                    <option value="Passant" {{ $eleve->statut == 'Passant' ? 'selected' : '' }}>Passant</option>
                    <option value="Redoublant" {{ $eleve->statut == 'Redoublant' ? 'selected' : '' }}>Redoublant</option>
                </select>
            </div>
        </div> <br/>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="/eleve" class="btn btn-info">Retour</a>
    </form>
@endsection
