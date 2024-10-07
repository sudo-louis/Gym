<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['empleados']=Empleado::paginate(5);
        return view('empleado.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleado.create');
        return view('empleado.create', compact('empleado'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fecha_contratacion' => 'required|date',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:clientes,correo|max:100',
            'rol' => 'required|string|max:50',
        ]);

        $datosEmpleado = request()->except('_token');
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosEmpleado['foto'] = $nombreImagen;
        }

        Empleado::insert($datosEmpleado);
        return redirect()->route('empleado.index')->with('success', 'Cliente registrado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        return view('empleado.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'fecha_contratacion' => 'required|date',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|max:100',
            'rol' => 'required|string|max:50',
        ]);

        $datosEmpleado = request()->except(['_token', '_method']);
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosEmpleado['foto'] = $nombreImagen;
        }

        Empleado::where('ID','=',$id)->update($datosEmpleado);
        $empleado = Empleado::findOrFail($id);
        return redirect()->route('empleado.index')->with('success', 'Empleado actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Empleado::where('ID','=',$id)->delete();
        return redirect('empleado');
    }
}
