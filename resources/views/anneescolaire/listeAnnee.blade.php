@extends('layouts.page')

@section("title")
        Gestion des Années Scolaires
@endsection

@section('content')
   
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des Années Scolaires</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Année Scolaire</th>
                                    <th>Début</th>
                                    <th>Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($anneeScolaires as $anneeScolaire)
                                    <tr>
                                        <td>{{ $anneeScolaire->annee }}</td>
                                        <td>{{ $anneeScolaire->date_debut }}</td>
                                        <td>{{ $anneeScolaire->date_fin ?? 'Aucune date de fin pour l\'instant ' }}</td>
                                        <td>
                                            <a href="/editer_annee/{{$anneeScolaire->id}}" class = "btn btn-outline-dark btn-sm"><i class="fas fa-edit fa-sm"></i></a>
                                            <a href="/supprimer_annee/{{$anneeScolaire->id}}" type="submit" class = "btn btn-rounded btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette année scolaire ?')">Supprimer</a>                    
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <a href="/go_annee" class= 'btn btn-rounded btn-primary'>Gérer année scolaire</a> <br/>
                    </div>
                </div>
            </div>
        </div>
@endsection

