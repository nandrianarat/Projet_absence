<!-- resources/views/absences/sous_classe.blade.php -->
@extends('layouts.page')

@section('title', 'Liste des Absents')

@section('content')
<div class="container">
    <h1>Élèves Absents par Sous-Classe</h1>

    @foreach ($sousClasses as $sousClasse)
        <h2>{{ $sousClasse->nomSousClasse }}</h2>
        <ul>
            @php $hasAbsents = false; @endphp
            @foreach ($sousClasse->eleves as $eleve)
                @if ($eleve->absences->isNotEmpty())
                    @php $hasAbsents = true; @endphp
                    <li>
                        {{ $eleve->nom_eleve }} {{ $eleve->prenoms }} :
                        <ul>
                            @foreach ($eleve->absences as $absence)
                                <li>{{ $absence->date_absence instanceof \Carbon\Carbon ? $absence->date_absence->format('d/m/Y') : $absence->date_absence }}
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach

            @if (!$hasAbsents)
                <li>Aucun absent pour l'instant</li>
            @endif
        </ul>
    @endforeach
</div>
@endsection
