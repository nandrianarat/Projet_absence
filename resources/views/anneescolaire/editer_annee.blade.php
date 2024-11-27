@extends('layouts.page')

@section("title")
        Editer Année
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
                <h4 class="card-title">Modifier une Année</h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="{{ route('traitement_annee') }}" method="POST">
                        @csrf

                        <input type="text" name= "id" style= "display: none;" value="{{$anneeScolaires->id}}" required>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Année Scolaire</label>
                                <input type="text" class="form-control" id="annee" name="Annee" placeholder="entrez une année scolaire" value="{{$anneeScolaires->annee}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date de Début</label>
                                <input type="date" class="form-control" id="date_debut" name="Date_debut" placeholder=" entrez la date de début" value="{{$anneeScolaires->date_debut}}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Date de Fin</label>
                                <input type="date" class="form-control" id="date_fin" name="Date_fin" placeholder="date de fin" value="{{$anneeScolaires->date_fin}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rounded btn-primary">Modifier</button>
                        <a href="/annee_scolaire" class="btn btn-rounded btn-dark">Retour</a>
                    </form>
                </div>
            </div>
        </div>

@endsection
