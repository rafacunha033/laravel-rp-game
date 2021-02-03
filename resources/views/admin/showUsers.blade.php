@extends('layouts.app')

@section('content')

@can('view-user', $users)
<div class="container-lg">
    
    @can('view-admin')
        <a class="btn btn-primary" href="{{ route('showRole.user') }}">Administradores</a>
    @endcan

    <!-- USERS -->
    <table class="table table-striped table-bordered mt-3">
        <caption>Lista de Usuários</caption>
        <thead class="thead-dark">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        
        <tbody class="table">
        @foreach($users as $user)        
            <tr>
                <td> {{ $user->name }}</td>
                <td>
                    <a href="{{ route('show.user', ['user' => $user->id]) }}" class= "btn btn-primary">Detalhes</a>    
                </td>
            </tr>  
        @endforeach
        </tbody>
    </table>
</div>

@endcan


@endsection