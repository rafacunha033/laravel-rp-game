<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Imports\CountriesImport;
use App\Imports\ProvincesImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use App\Http\Controllers\ExcelController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



    public function show(ExcelController $excel) 
    {
        // $excelCountries = (new CountriesImport)->toArray(storage_path('users.xlsx'));
        // $countries = array();

        // foreach($excelCountries[0] as $key => $row){
        //     array_push($countries, $row[0]);                               
        // }

        // $excelProvinces = (new ProvincesImport)->toArray(storage_path('provinces.xlsx'));
        // $provinces = array();
        
        // foreach($excelProvinces[0] as $key => $province){
        //     foreach($countries as $country) {
        //         if($province[1] == $country) {
        //             $value = array(
        //                 'Province' => $province[0],
        //                 'Country' => $country,                     
        //             );
        //             array_push($provinces, $value);   
        //         }
        //     }   
        // }
        // dd($provinces);
        dd($excel);
        
        
    }
}
