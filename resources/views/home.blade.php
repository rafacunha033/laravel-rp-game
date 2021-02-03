@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm mt-3" style="max-width:23rem;">
            <div class="card">
                <div class="card-header"><a class="text-info" href="{{ route('list.game') }}">Entrar em uma Partida</a></div>

                <div class="card-body">
                    Você será redirecionado para uma página e deverá escolher a partida que deseja jogar.   

                </div>
            </div>
        </div>

        <div class="col-sm mt-3" style="max-width:23rem;">
            <div class="card">
                <div class="card-header"><a href="{{ route('view.game') }}">Meus jogos</a></div>

                <div class="card-body">
                    Verifique e entre em todos os jogos que você faz parte.
                </div>
            </div>
        </div>
    </div>
        
    <div class="row justify-content-center">   
    @can('create-game')
        <div class="col-sm mt-3" style="max-width:23rem;">
            <div class="card">
                <div class="card-header"><a href="{{ route('create.game') }}">Criar Partida</a></div>

                <div class="card-body">
                    Escolha as opções disponíveis para o andamento da partida e prossiga para criar.
                </div>
            </div>
        </div>
    @endcan

    @can('view-user')
        <div class="col-sm mt-3" style="max-width:23rem;">
            <div class="card">
                <div class="card-header"><a href="{{ route('index.user') }}">Ver Usuários</a></div>

                <div class="card-body">
                    Visualize o nome e e-mail de todos os jogadores e remova aqueles que desejar. 
                </div>
            </div>
        </div>
    @endcan
    </div>
</div>
@endsection
