<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Models\Country;
use Auth;

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

    public function show() 
    {
        $array = (new CountriesImport)->toArray(storage_path('users.xlsx'));
        $new = array();

        foreach($array[0] as $indice => $sheet){
            array_push($new, $sheet[1]);
             
        }
        return dd($new);
         
    }

}
