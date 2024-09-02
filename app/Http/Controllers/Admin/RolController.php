<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RolController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:admin.roles.index')->only('index');
        $this->middleware('can:admin.roles.edit')->only('edit', 'update');
        $this->middleware('can:admin.roles.create')->only('create','store');
        $this->middleware('can:admin.roles.delete')->only('destroy');
                     
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin.user.roles', compact('roles'));
    }

    public function create() {}

    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        // Verificar si el rol ya existe
        $existingRole = Role::where('name', $request->input('name'))->first();

        if ($existingRole) {
            // Si el rol ya existe, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El rol con el nombre "' . $request->input('name') . '" ya existe.');
        }

        // Crear el nuevo rol
        $role = Role::create(['name' => $request->input('name')]);

        return redirect()->route('admin.roles.index')->with('mensaje', 'Rol creado exitosamente');
    }
    
    public function edit(Role $role)
    {
        $permisos = Permission::all();
        return view('admin.user.rolePermiso', compact('role', 'permisos'));
    }

    public function update(Request $request, Role $role)
    {
        // Validar los datos de entrada
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permisos' => 'array'
        ]);

        // Actualizar el nombre del rol
        $role->update(['name' => $request->input('name')]);

        // Sincronizar los permisos
        $role->permissions()->sync($request->input('permisos', []));

        return redirect()->route('admin.roles.index')->with('mensaje', 'Rol y permisos actualizados exitosamente');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('mensaje', 'Rol eliminado exitosamente');
    }
}