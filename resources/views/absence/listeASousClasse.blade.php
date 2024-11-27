@extends('layouts.page')

@section('title', 'Sous-Classes')

@section('content')

<div class="container">
    <h2>Sous-Classes de la Classe {{ $classeId }}</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nom de la Sous-Classe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sousClasses as $sousClasse)
                <tr>
                    <td>{{ $sousClasse->nomSousClasse }}</td>
                    <td>
                        <a href="{{ route('absence', ['sous_classe_id' => $sousClasse->id]) }}" class="btn btn-primary">Enregistrer Absence</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/index" class="btn btn-primary">Retour</a>

</div>

@endsection
