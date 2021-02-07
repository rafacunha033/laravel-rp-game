@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Escolha sua nação</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.game') }}">
                        @csrf

                        @foreach($countries as $country)
                            <div class="card mt-2">
                                <div class="card-body">
                                    <a class="stretched-link text-secondary text-decoration-none" href="">{{ $country->name }}</a>   
                                </div>               
                            </div>   
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection