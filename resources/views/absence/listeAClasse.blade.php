@extends('layouts.page')

@section('title', 'Liste des Classes')

@section('content')

<div class="container">
    <h2>Liste des Classes</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Nom de la Classe</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classes as $classe)
            <tr>
                <td>{{ $classe->nomClasse }}</td>
                <td>
                    <a href="{{ route('sousclasses.index', ['classe_id' => $classe->id]) }}" class="btn btn-primary">Voir Sous-Classes</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
