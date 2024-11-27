@extends('layouts.page')

@section("title")
        Liste des Classes
@endsection

@section('content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Classes</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Année Scolaire</th>
                                <th>Nom de la Classe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $classe)
                                <tr>
                                    <td>{{ $classe->anneeScolaire->annee }}</td>
                                    <td><a style="text-decoration: underline" href="/details_classe/{{$classe->id}}">{{ $classe->nomClasse }}</a></td>
                                    <td>
                                            <a href="/editer_classe/{{$classe->id}}" class = "btn btn-rounded btn-outline-info">Modifier</a>
                                            <a href="/supprimer_classe/{{$classe->id}}" type="submit" class = "btn btn-rounded btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')">Supprimer</a>                                     
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{-- {{ $classes->links() }} <br/> --}}
    @if ($classes->count() < 3)
        <a href="/go_classe" class= 'btn btn-rounded btn-primary'>Créer une nouvelle classe</a>
    @else
        <div class="alert alert-success">Le nombre maximum de classes a été atteint.</div>
    @endif

    {{-- <a href="/gestion_classe" class="btn btn-rounded btn-dark">Retour</a> --}}
@endsection

