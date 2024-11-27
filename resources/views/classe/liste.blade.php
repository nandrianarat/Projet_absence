@extends('layouts.page')

@section("title")
        Gestion des Classes
@endsection

@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Liste des Classes et des Sections</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Année Scolaire</th>
                            <th>Classes</th>
                            <th>Sections</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($classes as $classe)
                            <tr>
                                <td>{{ $classe->anneeScolaire->annee }}</td>
                                <td>{{ $classe->nomClasse }}</td>
                                <td>
                                    @if($classe->sousClasses->isEmpty())
                                        <em>Aucune sous-classe</em>
                                    @else
                                        <ul>
                                            @foreach($classe->sousClasses as $sousClasse)
                                                <li>{{ $sousClasse->nomSousClasse }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="/classe" class= 'btn btn-rounded btn-primary'>Gérer Classe</a>
                <a href="/sous_classe" class="btn btn-rounded btn-dark">Gérer Section</a>
            </div>
        </div>
    </div>
</div>
{{-- {{ $classes->links() }} <br/> --}}

@endsection

