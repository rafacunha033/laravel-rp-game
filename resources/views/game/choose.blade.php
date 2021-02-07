extends(layouts.app)

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Escolher País</div>

                    <div class="card-body">
                        <label for="cars">Choose a car:</label>
                        <form method="POST" action="{{ route('store.game') }}">
                                @csrf
                            <select name="cars" id="cars">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select>                      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


section('content')
endsection 