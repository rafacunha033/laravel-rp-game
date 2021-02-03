<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Game;
use App\Models\User;
use Gate;
use Auth;

class GameController extends Controller
{
    
    
    public function create() 
    {
        if(Gate::denies('create-game')) {
            return abort(403, 'Não Autorizado');
        }
        
        return view('game.create');
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

        // return redirect()->route('home');
        
        $user = User::find(Auth::user()->id);
        
        $user->games()->attach($game->id);
        return redirect()->route('home');
    }

    public function view()
    {
        $user = Auth::user();

        $games = array();
        foreach($user->games as $game){
            $newGame = array(
                "Id" => $game->id,
                "Name" => $game->name
            );

            array_push($games, $newGame);
        }

        return view('game/myGames', [
            'games' => $games,
        ]);
    }

    public function list(Game $games)
    {        
        if(!Auth::check()) {
            return abort(403, 'Não Autorizado');
        }
        $games = Game::orderByDesc('created_at')->get();
        return view('game/listGames', [
            'games' => $games
        ]);
    }

    public function join($game_id) 
    {
        $game = Game::find($game_id);
        $user = Auth::user();
        $hasUser = $game->users()->where('user_id', $user->id)->exists();
        
        if($hasUser === true) {
            return abort(403, 'Não Autorizado! Verifique se já não está na partida');
        }        
      
        $game->users()->attach($user);
        
        return redirect()->route('show.game', [
            'game_id' => $game_id,
        ]);
    }

    public function show($game_id) 
    {        
        $game = Game::find($game_id);
        // dd($game->users);
        
        $user = Auth::user();
        $hasUser = $game->users()->where('user_id', $user->id)->exists();
        
        if(!$hasUser === true) {
            return abort(403, 'Não Autorizado');
        }

        return view('game/round', [
            'game' => $game,
        ]);
    }
}
