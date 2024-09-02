<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('can:admin.permisos.index')->only('index');
        $this->middleware('can:admin.permisos.edit')->only('edit', 'update');
        $this->middleware('can:admin.permisos.create')->only('create','store');
        $this->middleware('can:admin.permisos.delete')->only('destroy');
    }
    public function index()
    {
        $permisos = Permission::all();
        return view('admin.user.permisos', compact('permisos'));
    }

    public function create() {}

    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // Verificar si el permiso ya existe
        $existingPermission = Permission::where('name', $request->input('name'))->first();

        if ($existingPermission) {
            // Si el permiso ya existe, redirigir con un mensaje de error
            return redirect()->back()->with('error', 'El permiso con el nombre "' . $request->input('name') . '" ya existe.');
        }

        // Crear el permiso si no existe
        $permission = Permission::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('admin.permisos.index')->with('mensaje', 'Permiso creado correctamente');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $id,
            'description' => 'nullable|string'
        ]);

        try {
            DB::beginTransaction();

            $permission = Permission::findOrFail($id);
            $permission->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
            ]);

            DB::commit();

            return redirect()->route('admin.permisos.index')->with('mensaje', 'Permiso actualizado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al actualizar el permiso: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy(string $id) 
    {
        try {
            DB::beginTransaction();

            $permission = Permission::findOrFail($id);
            $permission->delete();

            DB::commit();

            return redirect()->route('admin.permisos.index')->with('mensaje', 'Permiso eliminado correctamente');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al eliminar el permiso: '. $e->getMessage());
        }
    }
}