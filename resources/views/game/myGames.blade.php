@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid text-dark">
        <div class="container text-center">
            <h2 class="display-5"> A suprema arte da guerra é derrotar o inimigo sem lutar.</h2>
            <p class="lead">Sun Tzu.</p>
        </div>
    </div>
    
    @foreach($games as $game) 
    <div class="card mb-3 border-0" style="max-width: 540px;">
        <div class="card-header bg-dark text-white d-flex justify-content-between">
            <div>
                War & Diplomacy 1830
            </div>
            <div>
                #{{ $game['Id'] }}
            </div>
        </div>

        <div class="row no-gutters">
            <div class="col-md-4 border-primary">
                <img src="../images/prussia.png" class="img-thumbnail" width="500" alt="...">
            </div>
            <div class="col-md-8 text-right">
                <div class="card-body">
                    <h5 class="card-title">{{ $game['Name'] }}</h5>
                
                    <p class="card-text">
                        <a class="btn btn-dark text-white " href="{{ route('show.round', ['game_id' => $game['Id']]) }}">Entrar</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection