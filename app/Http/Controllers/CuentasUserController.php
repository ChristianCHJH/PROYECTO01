<?php

namespace App\Http\Controllers;

use App\Models\RoleAssignment;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class CuentasUserController extends Controller
{
    public function index(){


        $users = User::paginate(10);
        $roles = Role::all();

        $roleAssignment = RoleAssignment::all();


        return view('CuentasUser.index', compact('users','roles','roleAssignment'));
    }
    
    public function create(Request $request, User $users){

        $users->roles()->sync($request->rol);



        return redirect()->route('CuenUser.index');
    }

    public function destroy(User $users){

        $users->delete();

        return redirect()->route('CuenUser.index');
    }
}
