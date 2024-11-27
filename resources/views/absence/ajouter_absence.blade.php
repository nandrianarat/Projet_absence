@extends('layouts.page')

@section('title', 'Enregistrer une Absence')

@section('content')

<div class="container">
    <h2>Enregistrer une Absence pour la classe {{ $sousClasse->nomSousClasse }}</h2>

    <form action="{{ route('ajouter.absence') }}" method="POST">

        @csrf

        <input type="hidden" name="sous_classe_id" value="{{ $sousClasse->id }}">

        <div class="mb-3">
            <label for="eleve_id" class="form-label">Élève</label>
            <select name="eleve_id" id="eleve_id" class="form-select" required>
                <option value="">Sélectionnez un élève</option>
                @foreach($eleves as $eleve)
                    <option value="{{ $eleve->id }}">{{ $eleve->nom_eleve }} {{ $eleve->prenoms }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="date_absence" class="form-label">Date d'absence</label>
            <input type="date" name="Date_absence" id="date_absence" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-primary">Enregistrer l'absence</button>
        <a href="{{ route('index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>

@endsection
