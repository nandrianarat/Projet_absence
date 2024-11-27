<!-- resources/views/absences/sous_classe.blade.php -->
@extends('layouts.page')

@section('title', 'Liste des Absents')

@section('content')
<div class="container">
    <form action="{{ route('rapport.absences') }}" method="POST">
        @csrf
        <label for="mois">Sélectionner le mois :</label>
        <input type="month" name="mois" required>
        <button type="submit">Générer le Rapport</button>
    </form>
</div>
@endsection
