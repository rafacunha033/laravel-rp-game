<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Country;
use App\Models\GameInstance;
use App\Models\GameUser;
use Illuminate\Http\Request;
use Auth;

class GameUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($game_id)
    {
        $countries = Country::all();
        return view('game/choose', [
            'countries' => $countries,
            'game_id'   => $game_id,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {       

        $country_id = $request->id; 
        $game_id = $request->game_id;

        $game = Game::find($game_id);
        $user = Auth::user();
        $hasUser = $game->users()->where('user_id', $user->id)->exists();
        
        if($hasUser === true) {
            return abort(403, 'Não Autorizado! Verifique se já não está na partida');
        }        
      
        $game->users()->attach($user);
        $game->countries()->attach($country_id);
        
        
        return redirect()->route('show.round', [
            'game_id' => $game_id,
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($game_id)
    {
        $user_game = GameUser::where('game_id', $game_id)->first();

        dd($user_game->country);

        return view('game/round', [
            'game_id' => $game_id,
            // 'game_instance' => $game_instance,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
