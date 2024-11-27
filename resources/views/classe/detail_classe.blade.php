@extends('layouts.page')

@section("title")
        Détails Classe
@endsection

@section("content")

<div class="container">


    <div class="card border border-body bg-white">
        <div class="card-header text-body fw-semibold pb-1 fs-5 py-0 my-2">
            <div class="row">
                <div class="col-12 my-2">
                    Sous-classes de {{ $classe->nomClasse }}
                </div>
            </div>
        </div>

        <div class="card-body py-2">
            <div class="row fs-6">
                <div class="col-12 border-body border-end my-2">
                    <div class="mb-4 ms-2">
                        @if($classe->sousClasses->isEmpty())
                            <p>Aucune sous-classe associée.</p>
                        @else
                            @foreach ($classe->sousClasses as $sousClasse)
                                <div class="mb-4">
                                    
                                        {{ $sousClasse->nomSousClasse }}
                                    
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <br/>
<a href="/classe" class="btn btn-primary">Retour</a>

@endsection
