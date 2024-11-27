@extends('layouts.page')

@section("title")
        Liste des Sections
@endsection

@section('content')
   
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Liste des Sections</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Nom de la Section</th>
                                <th>Nom de la Classe</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sousClasses as $sousClasse)
                                <tr>
                                    <td>{{ $sousClasse->nomSousClasse }}</td>
                                    <td>{{ $sousClasse->classe->nomClasse ?? 'Aucune classe associée' }}</td>
                                    <td>
                                        <a href="/editer_sous_classe/{{$sousClasse->id}}" class = "btn btn-outline-dark btn-sm"><i class="fas fa-edit fa-sm"></i></a>
                                        <a href="/supprimer_sous_classe/{{$sousClasse->id}}" type="submit" class = "btn btn-rounded btn-outline-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette année scolaire ?')">Supprimer</a>                    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $sousClasses->links() }} <br/>
                    <a href="/go_sous_classe" class="btn btn-rounded btn-primary">Créer une nouvelle section</a>
                    {{-- <a href="/gestion_classe" class="btn btn-rounded btn-dark">Retour</a> --}}
                </div>
            </div>
        </div>
    </div>

@endsection
