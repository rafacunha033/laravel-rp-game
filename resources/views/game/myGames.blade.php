@extends('layouts.app')

@section('content')

<div class="container">
    <div class="jumbotron jumbotron-fluid text-dark">
        <div class="container text-center">
            <h2 class="display-5"> A suprema arte da guerra é derrotar o inimigo sem lutar.</h2>
            <p class="lead">Sun Tzu.</p>
        </div>
    </div>
    
    @foreach($user->countries as $country)
        <div class="card mb-3 border" style="max-width: 540px;">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <div>
                    War & Diplomacy 1830
                </div>
                <div>
                    # {{ $country->game_id }}
                </div>
            </div>

            <div class="row no-gutters">
                <div class="col-md-4 ">
                    <img src="../images/{{ $country->img_slug }}" class="img-fluid img-thumbnail" width="500" alt="...">
                </div>
                <div class="col-md-8 text-right">
                    <div class="card-body">
                        <h5 class="card-title">{{ $country->name }}</h5>
                    
                        <p class="card-text">
                            <a class="btn btn-dark text-white" href="{{ route('show.round', ['game_id' => $country->game_id]) }}">Entrar</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection