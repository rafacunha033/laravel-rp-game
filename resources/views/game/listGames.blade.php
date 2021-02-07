@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row d-flex justify-content-stretch">
        @foreach($games as $game) 
        <div class="mx-3 mt-3">
            <div class="card" style="min-width: 15rem; max-width: 20rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $game->name }}</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Participantes (( 2/10 )) -> Exemplo</li>
                </ul>
            
                <div class="card-body mx-auto">
                    <a class="btn btn-primary" href="{{ route('create.round', ['game_id' => $game->id]) }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                        Entrar
                    </a>
                </div>
            </div>
        </div>

        @endforeach   
    </div>
</div>

@endsection