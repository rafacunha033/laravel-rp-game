<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        $countryNames = array("Prussia", "Espanha", "França");
        $countryImg = array("prussia.png", "espanha.png", "franca.png");
        
        $countries = array(
                "name" => array(),
                "img_slug"  => array(),   
        );

        foreach(array_combine($countryNames, $countryImg) as $country => $img) {
            array_push($countries['name'], $country);
            array_push($countries['img_slug'], $img);
        }
        dd($countries);
        foreach($countries as $country) {
            
            dd($country);
            // $newCountry = new Country();
            // $newCountry->game_id  = $game->id;
            // $newCountry->name     = $country['name'];
            // $newCountry->img_slug = $country['img_slug'];
            // $newCountry->save(); 
        }

        return dd($countries);
    }
}
