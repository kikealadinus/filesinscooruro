<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');        
        $this->middleware('can:admin.user.index')->only('index');
        $this->middleware('can:admin.user.edit')->only('edit', 'update');
        $this->middleware('can:admin.user.create')->only('create','store');
        $this->middleware('can:admin.user.delete')->only('destroy');        
    }    
    public function index()
    {
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $user->image = $request->file('image')->store('usuario_imagen', 'public');
        }

        $user->save();

        return redirect()->route('admin.asignar.index')->with(['mensaje' => 'Usuario creado correctamente.']);
    }

    public function show(string $id)
    {
        
    }

    public function edit(string $id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Actualizar el nombre y correo electrónico del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Verificar si se proporcionó una nueva contraseña y actualizarla si es así
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $user->image);
            $user->image = $request->file('image')->store('usuario_imagen', 'public');
        }
        // Guardar los cambios en la base de datos
        $user->save();

        return redirect()->route('admin.asignar.index')->with('mensaje', 'Usuario actualizado exitosamente.');
    }

    public function destroy(string $id)
    {        
        $user = User::findOrFail($id);
        Storage::delete('public/' . $user->image);
        $user->delete();

        return redirect()->route('admin.asignar.index')->with('mensaje', 'Usuario eliminado exitosamente.');
    }
}