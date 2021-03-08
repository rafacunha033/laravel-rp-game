<div class="d-flex justify-content-center mt-2">
    <div class="bg-white shadow rounded py-3">
        <div class="d-flex justify-content-center">
            <h5>Recursos</h5>
        </div>
        <div class="container d-flex flex-wrap justify-content-center">
            @foreach($country->resources as $resource)
                <div class="bg-white m-2 d-flex justify-content-start" style='max-width:100px;'>
                    <div class='resource-card border border-secondary'>
                        <img src='/images/{{ $resource->name }}.png' width='30' height='30'>           
                    </div>
                    <div class='resource-card border border-secondary' style='width:50px;'>
                        {{ $resource->pivot->quantity }} 
                    </div>
                </div>        
            @endforeach
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-3">
    <div class="container d-flex flex-wrap justify-content-center">
        <div class="bg-white m-1 p-2 shadow  border rounded">
            <form name='formTax'>
                <div class="d-flex justify-content-center">
                    <h5>Imposto</h5>
                </div>

                <input id="country_id" type="hidden" value='{{ $country->id }}' name='id'>

                <div class="d-flex justify-content-center align-items-center">
                    <input type="range" class="form-control-range" id="formControlRange" name='range'
                    value='{{ $budget->tax }}' style='min-width:200px;'>
                    <div class='justify-content-start align-items-center ml-1' id='tax'></div>% 
                </div>
                
                <div class="d-flex justify-content-center mt-2">
                    <h5>Tarifas</h5>
                </div>
                <div class="d-flex justify-content-center align-items-center">    
                    <input type="range" class="form-control-range" id="formControlRange1" name='range1' 
                    value='{{ $budget->tariff }}' style='min-width:200px;'>
                    <div class='justify-content-start align-items-center ml-1' id='tariff'></div>% 
                </div>
                
                <div class="d-flex justify-content-center mt-3">
                    <button class='btn btn-success' type='submit'>Modificar</button>
                </div>
            </form>
        </div>         
    </div>
</div>

<script>
    $(function(){
        $("form[name='formTax']").submit(function(event){
            event.preventDefault();

            $.ajax({
                url: "{{ route('update.economy') }}",
                type: "put",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'country_id': $("#country_id").val(),
                    'tax': $("#formControlRange").val(),
                    'tariff': $("#formControlRange1").val(),
                },
                dataType: 'json'
            })

            $.ajax({
                url: "{{ route('production.economy') }}",
                type: "get",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "country_id": $("#country_id").val(),
                },
                dataType: 'json'
            })
        });
    });

    var slider = document.getElementById("formControlRange");
    var output = document.getElementById("tax");
    
    var slider1 = document.getElementById("formControlRange1");
    var output1 = document.getElementById("tariff");

    output.innerHTML = slider.value;
    output1.innerHTML = slider1.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }

    slider1.oninput = function() {
        output1.innerHTML = this.value;
    }
</script>


<!-- 
<div class="row d-flex justify-content-center">
Mercado
</div> -->