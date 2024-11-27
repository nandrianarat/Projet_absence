@extends('layouts.page')

@section("title")
        Ajouter Section
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
            <h4 class="card-title">Ajouter une Section</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('ajouter_sousClasse') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nom de la Section</label>
                            <input type="text" class="form-control" id="NomSousClasse" name="NomSousClasse" placeholder="nom de la section" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nom de la Classe</label>
                            <select name="classe_id" id="classe_id" class="form-control" required>
                                <option value="">Sélectionner une classe</option>
                                @foreach($classes as $classe)
                                    <option value="{{ $classe->id }}">{{ $classe->nomClasse }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary">Enregistrer</button>
                    <a href="/sous_classe" class="btn btn-rounded btn-dark">Retour</a>
                </form>
            </div>
        </div>
    </div>
    
@endsection
