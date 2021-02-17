<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\User;
use App\Models\Country;
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
            'games' => $games
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

        $game = new Game();
        $game->user_id  = Auth::user()->id;
        $game->name     = $request->name;
        $game->password = Hash::make($request->password);
        $game->save(); 

        $countries = array("Prussia", "Espanha", "França", "Império Russo");
        
        foreach($countries as $key => $country) {
            $newCountry = new Country();
            $newCountry->game_id  = $game->id;
            $newCountry->name     = $country;
            $newCountry->img_slug = Str::slug($country).'.png';
            $newCountry->save(); 
        }
        // $user = User::find(Auth::user()->id);
        // $user->games()->attach($game->id);
        return redirect()->route('home');
    }   


    public function show() 
    {    
        // 
    }
}
