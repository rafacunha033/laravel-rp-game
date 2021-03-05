<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\Country;

class EconomyController extends Controller
{
    public function changeTax(Request $request) 
    {
        $data = $request->validate([
            'id' => 'required',
            'tax' => 'max:20',
            'tariff' => 'max:20'
        ]);
    
        $budget = Budget::where('country_id', $data['id'])->first();
        $budget->tax = $data['tax'];
        $budget->tariff = $data['tariff'];
        $budget->save();
    }

}
