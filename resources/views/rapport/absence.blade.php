@extends('layouts.page')

@section('title', 'Liste des Absents par mois')

@section('content')
        <h1>Rapport d'Absences pour le mois de {{ $mois }}</h1>

        <p>Taux d'Absentéisme : {{ number_format($tauxAbsentisme, 2) }}%</p>

        <table>
            <thead>
                <tr>
                    <th>Nom de l'Élève</th>
                    <th>Date d'Absence</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absences as $absence)
                    <tr>
                        <td>{{ $absence->eleve->nom_eleve }} {{ $absence->eleve->prenoms }}</td>
                        <td>{{ $absence->date_absence instanceof \Carbon\Carbon ? $absence->date_absence->format('d/m/Y') : $absence->date_absence }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @if ($absences->isEmpty())
            <p>Aucune absence enregistrée pour ce mois.</p>
        @endif
@endsection

