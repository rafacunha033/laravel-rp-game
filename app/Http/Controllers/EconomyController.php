<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Country;
use App\Models\Province;
use App\Models\Treasury;
use App\Models\Resource;

class EconomyController extends Controller
{
    public function changeTax(Request $request) 
    {
        $data = $request->validate([
            'country_id' => 'required',
            'tax' => 'max:20',
            'tariff' => 'max:20'
        ]);
    
        $budget = Budget::where('country_id', $data['country_id'])->first();
        $budget->tax = $data['tax'];
        $budget->tariff = $data['tariff'];
        $budget->save();
    }

    public function production(Request $request)
    {
        $data = $request->validate([
            'country_id' => 'required'
        ]);

        // recursos
        $resources = Resource::all(); 
        $allResources = array();
        foreach($resources as $resource) {
            $newResource = array(
                "id" => $resource->id,
                "quantity" => 0
            );

            array_push($allResources, $newResource);
        }
        

        $country = Country::find($data['country_id']);
        $provinces = Province::where('country_id' ,$data['country_id'])->get();
        
        // provincias
        foreach($provinces as $province) {
            foreach($province->resources as $resource) {                
                $id = ($resource->id)-1;                  

                if($resource->category_id === 1) {                    
                    $production = ($province->farmers) * $resource->pivot->amount; 
                    $quantity = $allResources[$id]['quantity'];
                    $allResources[$id]['quantity'] = $quantity + $production;
                    // echo "<br> [". $province->name ."] [". $resource->name ." : ". $resource->id ."] Quantidade: ".$allResources[$id]['quantity'];
                

                } elseif($resource->category_id === 2) {
                    $production = ($province->artisans) * $resource->pivot->amount;
                    $quantity = $allResources[$id]['quantity'];
                    $allResources[$id]['quantity'] = $quantity + $production;
                    // echo "<br> [". $province->name ."] [". $resource->name ." : ". $resource->id ."] Quantidade: ".$allResources[$id]['quantity'];
                

                } else {
                    $production = ($province->laborers) * $resource->pivot->amount;
                    $quantity = $allResources[$id]['quantity'];
                    $allResources[$id]['quantity'] = $quantity + $production;
                    // echo "<br> [". $province->name ."] [". $resource->name ." : ". $resource->id ."] Quantidade: ".$allResources[$id]['quantity'];
                }
            }

        }

        $treasury = Treasury::where('country_id', $country->id)->get();

        foreach($treasury as $resources) {
            $resources->quantity = 20;
            $resources->save();
        }        
    }

    public function buy()
    {
        
    }

    public function sell()
    {

    }



}
