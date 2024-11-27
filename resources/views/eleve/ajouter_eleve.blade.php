@extends('layouts.page')

@section("title")
        Ajouter Elève
@endsection

@section('content')
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Ajouter un Elève</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('ajouter_eleve') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nom</label>
                            <input type="text" class="form-control" id="nomEleve" name="NomEleve" placeholder="nom de l'élève" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Année Scolaire</label>
                            <select class="form-control" id="annee_scolaire_id" name="annee_scolaire_id" required>
                                <option value="">Sélectionnez l'année scolaire</option>
                                @foreach($anneeScolaires as $anneeScolaire)
                                    <option value="{{ $anneeScolaire->id }}">{{ $anneeScolaire->annee }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary">Enregistrer</button>
                    <a href="/classe" class="btn btn-rounded btn-dark">Retour</a>
                </form>
            </div>
        </div>
    </div>

    <form action="{{ route('ajouter_eleve') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Nom</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="nomEleve" name="NomEleve" placeholder="nom élève" required>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Prénoms</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="prenoms" name="Prenoms" placeholder="prénoms" required>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Date de Naissance</label>
            <div class="col-sm-12 col-md-10">
                <input type="date" class="form-control" id="date_de_naissance" name="Date_de_naissance" placeholder="date de naissance" required>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Sexe</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="sexe" name="Sexe" required>
                    <option value="">Sélectionnez le sexe</option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Numéro Matricule</label>
            <div class="col-sm-12 col-md-10">
                <input type="text" class="form-control" id="numeroMatricule" name="NumeroMatricule" placeholder="numéro matricule" required>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Classe Actuelle</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="sous_classe_id" name="sous_classe_id" required>
                    <option value="">Sélectionnez la classe actuelle</option>
                    @foreach($sousClasses as $sousClasse)
                        <option value="{{ $sousClasse->id }}">{{ $sousClasse->nomSousClasse }}</option>
                    @endforeach
                </select>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Classe Précédente</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="classe_precedente_id" name="classe_precedente_id">
                    <option value="">Sélectionnez la classe précedente</option>
                    @foreach($sousClasses as $sousClasse)
                        <option value="{{ $sousClasse->id }}">{{ $sousClasse->nomSousClasse }}</option>
                    @endforeach
                </select>
            </div>
        </div> <br/>
        <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Statut</label>
            <div class="col-sm-12 col-md-10">
                <select class="form-control" id="statut" name="Statut" required>
                    <option value="">Sélectionnez le statut</option>
                    <option value="Passant">Passant</option>
                    <option value="Redoublant">Redoublant</option>
                </select>
            </div>
        </div> <br/>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="/eleve" class="btn btn-info">Retour</a>
    </form>
@endsection