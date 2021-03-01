<div class="accordion d-flex justify-content-start" id="accordionProvince">
    <div class="card border-0 shadow p-2 m-2" style='width:330px;'>  
        @foreach($provinces as $province)
            <div class="mt-2 shadow border rounded border-cadet ">
                <div class="card-header btn-block text-left d-flex justify-content-between">
                    <div class="row ml-1">
                        {{ $province->name }} 
                    </div>
                    <div class="row mr-2">
                        {{ $province->population }}k
                    </div>
                </div>

                <div>
                    <div class="d-flex justify-content-center">    
                        @foreach($province->resources as $resource)
                            <img src='/images/{{ $resource->name }}.png' width='30' height='30'> 
                            <!-- {{ $resource->pivot->amount }}   -->
                        @endforeach 
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>