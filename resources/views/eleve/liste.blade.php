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
                                <th>Sexe</th>
                                <th>Num-M</th>
                                <th>Classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eleves as $eleve)
                                <tr>
                                    <td>{{ $eleve->nom_eleve }}</td>
                                    <td>{{ $eleve->prenoms }}</td>
                                    <td>{{ $eleve->sexe }}</td>
                                    <td>{{ $eleve->numeroMatricule }}</td>
                                    <td>{{ $eleve->sousClasse->nomSousClasse ?? 'Aucune' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $eleves->links() }}
                    <a href="/eleve" class = "btn btn-rounded btn-primary">Gérer élève</a>
                </div>
            </div>
        </div>
    </div>

@endsection