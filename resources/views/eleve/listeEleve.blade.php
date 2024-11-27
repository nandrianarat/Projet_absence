@extends('layouts.page')

@section("title")
        Liste des Elèves
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

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Elèves</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénoms</th>
                                <th>Date de Naissance</th>
                                <th>Sexe</th>
                                <th>Num-M</th>
                                <th>Classe P</th>
                                <th>Classe</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eleves as $eleve)
                                <tr>
                                    <td>{{ $eleve->nom_eleve }}</td>
                                    <td>{{ $eleve->prenoms }}</td>
                                    <td>{{ $eleve->date_de_naissance }}</td>
                                    <td>{{ $eleve->sexe }}</td>
                                    <td>{{ $eleve->numeroMatricule }}</td>
                                    <td>{{ $eleve->classePrecedente->nomSousClasse ?? 'Aucune' }}</td>
                                    <td>{{ $eleve->sousClasse->nomSousClasse ?? 'Aucune' }}</td>
                                    <td>{{ $eleve->statut }}</td>
                                    <td>
                                        <a href="/editer_eleve/{{$eleve->id}}" class = "btn btn-outline-dark btn-sm"><i class="fas fa-edit fa-sm"></i></a>
                                        <a href="/supprimer_eleve/{{$eleve->id}}" type="submit" class = "btn btn-rounded btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette année scolaire ?')">Supprimer</a>                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $eleves->links() }}
                    <a href="/go_eleve" class = "btn btn-rounded btn-primary">Créer un nouvel élève</a>
                    {{-- <a href="/gestion_eleve" class="btn btn-primary">Retour</a> --}}
                </div>
            </div>
        </div>
    </div>

@endsection