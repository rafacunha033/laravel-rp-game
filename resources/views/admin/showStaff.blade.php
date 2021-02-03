@extends('layouts.app')
@section('content')

<div class="container-lg">
    <a class="btn btn-primary" href="{{ route('index.user') }}">Usuários</a>

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
        @foreach($admins as $admin)        
            <tr>
                <td> {{ $admin["Name"] }}</td>
                <td>
                    <a href="{{ route('show.user', ['user' => $admin['Id']]) }}" class= "btn btn-primary">Detalhes</a>    
                </td>
            </tr>  
        @endforeach
        </tbody>
    </table>
</div>

@endsection
