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
            'tax' => 'max:20',
            'tariff' => 'max:20'
        ]);
    
        $budget = Budget::find(1);
        $budget->tax = $data['tax'];
        $budget->tariff = $data['tariff'];
        $budget->save();
    }

}
