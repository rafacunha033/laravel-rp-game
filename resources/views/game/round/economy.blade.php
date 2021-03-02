<div class="row d-flex justify-content-center">
    <div class="container row">
        @foreach($country->resources as $resource)
            <div class="col bg-white mt-2 d-flex justify-content-center">
                <div class='resource-card border border-secondary'>
                    <img src='/images/{{ $resource->name }}.png' width='40' height='40'>           
                </div>
                <div class='resource-card border border-secondary'>
                    {{ $resource->pivot->quantity }} 
                </div>
            </div>        
        @endforeach
    </div>
</div>

<div class="row d-flex justify-content-center">
Taxas
</div>

<div class="row d-flex justify-content-center">
Mercado
</div>