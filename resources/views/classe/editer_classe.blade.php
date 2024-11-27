@extends('layouts.page')

@section("title")
        Modifier Classe
@endsection

@section('content')
    <h3>Modifier une Classe</h3>
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
            <h4 class="card-title">Modifier une Classe</h4>
        </div>
        <div class="card-body">
            <div class="basic-form">
                <form action="{{ route('traitement_classe') }}" method="POST">
                    @csrf

                    <input type="text" name= "id" style= "display: none;" value="{{$classes->id}}" required>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Nom de la Classe</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom de la classe" value="{{$classes->nomClasse}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Année Scolaire</label>
                            <select class="form-control" id="annee_scolaire_id" name="annee_scolaire_id" required>
                                <option value="">Sélectionnez l'année scolaire</option>
                                @foreach($anneeScolaires as $anneeScolaire)
                                    <option value="{{ $anneeScolaire->id }}" {{ $anneeScolaire->id == $classes->annee_scolaire_id ? 'selected' : '' }}>
                                        {{ $anneeScolaire->annee }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-primary">Modifier</button>
                    <a href="/classe" class="btn btn-rounded btn-dark">Retour</a>
                </form>
            </div>
        </div>
    </div>

@endsection