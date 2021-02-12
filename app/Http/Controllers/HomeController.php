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

    public function rolesPermission()
    {      
        $users = User::all();
        foreach ($users as $user) 
        {
            echo $user->name." -> ";
        
            $roles = $user->roles;
            foreach($roles as $role) {
                echo $role->name.", ";
            }
        }
    }
}
