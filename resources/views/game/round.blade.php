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



</head>
<body>

<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
    
    <a class="navbar-brand text-white" href="{{ url('/home') }}">
        
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar mr-auto">
            <li class="form-inline">
                <button class="btn btn-outline-primary" id="optionOne" data-toggle="collapse" data-target="#collapseEconomy" aria-expanded="true" 
                aria-controls="collapseEconomy">Economia</button>          
            </li>
            <li class="form-inline">
                <button class="btn btn-outline-primary" id="optionTwo" data-toggle="collapse" data-target="#collapseProvinces" aria-expanded="true" 
                aria-controls="collapseProvinces">Provincias</button>          
            </li>
            <li class="form-inline">
                <button class="btn btn-outline-primary" id="optionThree" data-toggle="collapse" data-target="#collapseArmy" aria-expanded="true" 
                aria-controls="collapseArmy">Exército</button>          
            </li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle  text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Opções
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('home') }}">
                        {{ __('Voltar') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="main">
        <!-- COLLAPSE CONTENT -->
        <div id="collapseEconomy" class="collapse show" aria-labelledby="optionOne" data-parent="#navbarSupportedContent">
            <div class="card-body">
                Economia    
            </div>
        </div> 
        
        <div id="collapseArmy" class="collapse" aria-labelledby="optionTwo" data-parent="#navbarSupportedContent">
            <div class="card-body">
                Exército    
            </div>
        </div>

        <div id="collapseProvinces" class="collapse" aria-labelledby="optionTwo" data-parent="#navbarSupportedContent">
            <div class="card-body">
                PROVINCIAS   
            </div>
        </div>
    </div>
</div>

</body>
</html>