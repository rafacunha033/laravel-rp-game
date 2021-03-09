<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\CountriesImport;
use App\Imports\ProvincesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Game;
use App\Models\User;
use App\Models\Country;
use App\Models\Province;
use App\Models\Storage;
use App\Models\Treasury;
use App\Models\Resource;
use App\Models\Budget;
use Gate;
use Auth;

class GameController extends Controller
{    
    public function index(Game $games)
    {      
        if(!Auth::check()) {
            return abort(403, 'Não Autorizado');
        }
        
        $games = Game::orderByDesc('created_at')->get();
        return view('game/listGames', [
            'games' => $games,
        ]);
    }

    
    public function create() 
    {
        if(Gate::denies('create-game')) {
            return abort(403, 'Não Autorizado');
        }        
        return view('game/create');
    }


    public function store(User $user, Game $game, Request $request)
    {
        if(Gate::denies('create-game')) {
            return abort(403, 'Não Autorizado');
        }

        // Game
        $game = new Game();
        $game->user_id  = Auth::user()->id;
        $game->name     = $request->name;
        $game->password = Hash::make($request->password);
        $game->save();        

        // Countries
        $excelCountries = (new CountriesImport)->toArray(storage_path('countries.xlsx'));
        $countries = array();

        foreach($excelCountries[0] as $key => $row){
            array_push($countries, $row[0]);   
        }

        $excelProvinces = (new ProvincesImport)->toArray(storage_path('provinces.xlsx'));
        foreach($countries as $key => $country) {
            
            $newCountry = new Country();
            $newCountry->game_id  = $game->id;
            $newCountry->name     = $country;
            $newCountry->save(); 
            
            // Country-Storage
            $resources = Resource::all();

            foreach($resources as $resource) {
                $newTreasury = new Treasury();
                $newTreasury->country_id = $newCountry->id;
                $newTreasury->resource_id = $resource->id;
                $newTreasury->quantity = 0;
                $newTreasury->save();
            }

            // Country budget
            $budget = new Budget;
            $budget->country_id = $newCountry->id;
            $budget->tax = 10;
            $budget->tariff = 10;
            $budget->save();

            // Provinces
            foreach($excelProvinces[0] as $key => $province){
                if($province[1] == $country) {
                    $newProvince = new Province;
                    $newProvince->country_id = $newCountry->id;
                    $newProvince->name = $province[0];
                    $newProvince->artisans = $province[5];
                    $newProvince->farmers = $province[6];
                    $newProvince->laborers = $province[7];
                    $newProvince->population = ($province[5]+$province[6]+$province[7])*1.1;
                    $newProvince->save();
                    
                    // Resources
                    $storage = new Storage;
                    $storage->province_id = $newProvince->id;
                    $storage->resource_id = $province[2];
                    $storage->amount = 2000;
                    $storage->save();
                    
                    $storage = new Storage;
                    $storage->province_id = $newProvince->id;
                    $storage->resource_id = $province[3];
                    $storage->amount = 2000;
                    $storage->save();
                    
                    $storage = new Storage;
                    $storage->province_id = $newProvince->id;
                    $storage->resource_id = $province[4];
                    $storage->amount = 2000;
                    $storage->save();
                }
            }
        }
        return redirect()->route('home');

    }   


    public function show() 
    {    
        // 
    }
}
