<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class AsignarController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:admin.asignar.index')->only('index');
        $this->middleware('can:admin.asignar.edit')->only('edit', 'update');
        $this->middleware('can:admin.asignar.create')->only('create','store');
        $this->middleware('can:admin.asignar.delete')->only('destroy');
    }    
    public function index()
    {
        $users = User::all();
        $user = $users->first();
        $roles = Role::all();
        return view('admin.user.listaUser', compact('users', 'user', 'roles'));
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.userRol', compact('user', 'roles'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.asignar.index', $user)->with('mensaje', 'Rol Asignado correctamente al usuario');
    }

    public function destroy(string $id)
    {
        
    }
}