@extends('layouts.app')

@section('content')


<div class="container d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <div class="card-header text-white bg-dark">
            Detalhes
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
                <div><b>ID</b></div>
                <div>{{ $user->id }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <div><b>Nome</b></div>
                <div>{{ $user->name }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <div><b>Email</b></div>
                <div>{{ $user->email }}</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
                <div><b>Função</b></div>
                <div>
                    @foreach($user->roles as $role)
                        {{ $role->name }}
                    @endforeach
                </div>
            </li>

            <li class="list-group-item d-flex justify-content-end">              
                @if($role->name === 'member')    
                    <a class="btn btn-danger" href="{{ route('destroy.user') }}">Excluir</a>
                @endif

                @can('view-admin')
                    @if($role->name === 'member')    
                        <a class="btn btn-primary text-white mr-2" href="">Promover</a>
                    @endif
                    @if($role->name === 'admin')
                        <a class="btn btn-primary text-white mr-2" href="">Rebaixar</a>
                    @endif
                @endcan                
                
            </li>
        </ul>
    </div>

</div>
@endsection

