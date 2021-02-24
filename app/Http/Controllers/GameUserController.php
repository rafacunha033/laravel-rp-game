<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Country;
use App\Models\Map;
use App\Models\Provinces;
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

        return view('game/myGames', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($game_id)
    {
        $user = Auth::user();
        $userGames = array();
        foreach($user->countries as $country) {            
            array_push($userGames, $country->game_id);
        }

        if(in_array($game_id, $userGames)) {
            return abort(403, 'Não Autorizado! Verifique se já não está na partida');
        }

        $countries = Country::where('game_id', $game_id)->get();
        $free = array();
        foreach($countries as $country) {           
            if($country->users->first() == null) {
                $newArray = array( 
                    'id'   => $country->id,
                    'name' => $country->name,
                ); 
                array_push($free, $newArray); 
            }
        }            
        
        return view('game/choose', [
            'game_id'   => $game_id,
            'countries' => $free,
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
        $game_id = $request->game_id;
        $country_id = $request->id;
        $user_id = Auth::user()->id;

        $country = Country::find($country_id);
        $country->users()->attach($user_id);

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
        $user = Auth::user();
        $country = $user->countries->where('game_id', $game_id)->first();
        $provinces = $country->provinces;
        
        

        return view('game/round', [
            'country' => $country,
            'user' => $user,
            'provinces' => $provinces,
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