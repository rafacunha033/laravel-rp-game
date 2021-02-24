<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>W&D</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/d3js/6.5.0/d3.min.js"></script>

    <style>
        .str0 {
            stroke: #FFFF;
            stroke-width: 280
        }
        .fill {
            fill: #84c225
        }
        .hover {
            fill: #196cfc
        }
    </style>

<?php $styleCard = "flex-sm-fill d-flex align-items-center justify-content-center"; ?>
</head>
<body>

<div class="main">
    <div class="accordion" id="navbarSupportedContent">     
        <nav class="nav d-flex justify-content-center flex-wrap bg-dark shadow-sm">

            <div class="<?php $styleCard ?>">
                <button class="btn" type="button" id="optionThree" data-toggle="collapse" data-target="#collapseProvinces"  aria-expanded="false"  
                aria-controls="collapseProvinces">
                    <div class="col bg-light text-left d-flex align-items-center rounded" style="width:200px; height: 100px">
                        <div class="img">
                            <img class="rounded-circle border" src="/images/{{ $country->img_slug }}" width="60" height="60" alt="Imagem do País">
                        </div>
                        
                        <div class="info ml-2">
                            <strong>{{ $country->name }}</strong>
                            <br>
                            <small>{{ $user->name }}</small>
                            <br>
                            
                        </div>
                    </div>
                </button>         
            </div>

            <div class="<?php $styleCard ?>"  id="optionOne">
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseEconomy"  
                aria-expanded="true" aria-controls="collapseEconomy">
                    <div class="col bg-secondary text-left rounded" style="width:200px; height: 100px">
                        <strong>Economia</strong>
                        <br>
                        Produção: 3k/dia
                        <br>
                        Trabalhadores: 20k
                        <br>
                        Renda: 1.2kk
                    </div>
                </button>          
            </div>

            <div class="<?php $styleCard ?>" id="optionThree" >
                <button class="btn" type="button" data-toggle="collapse" data-target="#collapseArmy"  aria-expanded="false"  
                aria-controls="collapseArmy">
                    <div class="col bg-secondary text-left rounded" style="width:200px; height: 100px">
                        <strong>Exército</strong>
                        <br>
                        Produção: 3k/dia
                        <br>
                        Tamanho: 20k
                        <br>
                        Custo: 1.2kk
                    </div>
                </button>          
            </div> 

            <div class="<?php $styleCard ?>">
                <button class="btn" type="button" id="optionFour" data-toggle="collapse" data-target="#collapsePolitics"  aria-expanded="false"  
                aria-controls="collapsePolitics">
                    <div class="col bg-secondary text-left rounded" style="width:200px; height: 100px">
                        <strong>Reformas</strong>
                        <br>
                        Disponiveis: 2
                        <br>
                        Feitas: 0
                        <br>
                        
                    </div>
                </button>         
            </div>

            <div class="<?php $styleCard ?>">
                <button class="btn" type="button" id="optionFive" data-toggle="collapse" data-target="#collapseResearches"  aria-expanded="false"  
                aria-controls="collapseResearches">
                    <div class="col bg-secondary text-left rounded" style="width:200px; height: 100px">
                        <strong>Pesquisas</strong>
                        <br>
                        Disponiveis: 0
                        <br>
                        Feitas: 5
                        <br>                        
                    </div>
                </button>         
            </div>
        </nav>

        <!-- Provinces -->
        <div id="collapseProvinces" class="collapse show" aria-labelledby="optionThree" data-parent="#navbarSupportedContent">
            <div class="card-body">
               @foreach($provinces as $province)
                <strong>{{ $province->name }}</strong> 
               <br>
                População: {{ number_format($province->population, 0, ',', '.') }}
               <br>
                Recursos: <br>
                @foreach($province->resources as $resource)
                    {{ $resource->name }} : {{ $resource->pivot->amount }}/h  <br>
                @endforeach 
               <hr>

               @endforeach
            </div>
        </div> 

        <!-- ECONOMIA -->
        <div id="collapseEconomy" class="collapse" aria-labelledby="optionOne" data-parent="#navbarSupportedContent">
            <div class="card-body">
                Economia    
            </div>
        </div> 
        
        <!-- Exército -->
        <div id="collapseArmy" class="collapse" aria-labelledby="optionTwo" data-parent="#navbarSupportedContent">
            <div class="card-body">
                Exército    
            </div>
        </div>

        <div id="collapsePolitics" class="collapse" aria-labelledby="optionFour" data-parent="#navbarSupportedContent">
            <div class="card-body">
                Politica   
            </div>
        </div>
        
        <div id="collapseResearches" class="collapse" aria-labelledby="optionFive" data-parent="#navbarSupportedContent">
            <div class="card-body">
                Pesquisas   
            </div>
        </div>
    </div>
</div>

</body>
</html>