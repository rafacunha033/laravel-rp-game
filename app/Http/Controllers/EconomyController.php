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

        // Take the resources and put into array
        foreach($resources as $resource) {
            $newResource = array(
                "id" => $resource->id,
                "quantity" => 20,
            );
            array_push($allResources, $newResource);
        }

        // country and provinces        
        $country = Country::find($data['country_id']);
        $provinces = Province::where('country_id', $data['country_id'])->get();
        
        foreach($provinces as $province) {
            // take the province population 
            $provincePop = $province->population;
            

            // take each province resource
            foreach($province->resources as $resource) {
                
                // search the resource id in the array
                $id = ($resource->id)-1;
                $key = array_search($id, array_column($allResources, 'id'));

                if($key) {
                    $quantity = $allResources[$id]['quantity'];
                    $allResources[$id]['quantity'] = $quantity+10;
                }        
            }
        }
    }

    public function buy()
    {
        
    }

    public function sell()
    {

    }



}
