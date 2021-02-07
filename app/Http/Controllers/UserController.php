<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Gate;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        
        if(Gate::denies('view-user')) {
            return abort(403, 'Não Autorizado');
        }
        
        return view('admin/showUsers', [
            'users' => $users,
        ]);
    }

    public function show($user)
    {
        if(Gate::denies('view-user')) {
            return abort(403, 'Não Autorizado');
        }

        $user = User::where('id', $user)->first();        
        return view('admin/details', [
            'user' => $user,
        ]);
    }

    public function showRole()
    {
        // if(Gate::denies('view-admin')) {
        //     return abort(403, 'Não Autorizado');
        // }
        $users = User::all();

        $admins = array();
        foreach($users as $user) {
            foreach($user->roles as $role) {
                if($role->pivot->role_id == 1) {
                    $newAdmin = array(
                        "Id"   => $user->id,
                        "Name" => $user->name,
                        "Role" => $role->name,
                    );

                    array_push($admins, $newAdmin);
                }
            }
        }

        return view('admin/showStaff', [
            'admins' => $admins,
        ]);
    }

    public function destroy(User $user)
    {
        if(Gate::denies('delete-user')) {
            return abort(403, 'Não Autorizado');
        }
        
        $user->delete();
        return redirect()->route('show.users');
    }
}
