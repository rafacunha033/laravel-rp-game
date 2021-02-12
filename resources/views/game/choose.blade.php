@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-primary">{{ __('Escolha sua nação') }}</div>

                <div class="card-body">                        
                        <div class="accordion" id="accordionExample">
                        @foreach($countries as $country)
                            <form action="{{ route('store.round') }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $country->id }}">
                            <input type="hidden" name="game_id" value="{{ $game_id }}">
                                <!-- <div class="card mt-1">
                                    <div class="card-body">
                                        <a class="text-secondary text-decoration-none stretched-link" href="">
                                            <img src="../images/{{ $country->img_slug }}" alt="Bandeira da Prussia" width="40" height="30">
                                            {{ $country->name }}
                                        </a>
                                    </div>
                                </div>         -->
                                <div class="card">
                                    <div class="card-header" id="heading{{ $country->id }}">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left text-secondary text-decoration-none" type="button" data-toggle="collapse" data-target="#collapse{{ $country->id }}" aria-expanded="false" aria-controls="collapse{{ $country->id }}">
                                            {{ $country->name }}
                                        </button>
                                    </h2>
                                    </div>

                                    <div id="collapse{{ $country->id }}" class="collapse" aria-labelledby="heading{{ $country->id }}" data-parent="#accordionExample">
                                        <div class="card-body d-flex justify-content-end">
                                            <button class="submit btn btn-primary">
                                                Entrar
                                            </button>    
                                        </div>
                                    </div>
                                </div>        
                            </form>                
                        @endforeach
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 