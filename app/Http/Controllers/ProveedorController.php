<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['proveedores']=Proveedor::paginate(5);
        return view('proveedor.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('proveedor.create');
        return view('proveedor.create', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'nombre_empresa' => 'required|string|max:100',
            'nombre_contacto' => 'required|string|max:50',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:clientes,correo|max:100',
            'productos_suministrados' => 'required|string',
        ]);

        $datosProveedor = request()->except('_token');
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosProveedor['foto'] = $nombreImagen;
        }

        Proveedor::insert($datosProveedor);
        return redirect()->route('proveedor.index')->with('success', 'proveedor registrado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048',
            'nombre_empresa' => 'required|string|max:100',
            'nombre_contacto' => 'required|string|max:50',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|max:100',
            'productos_suministrados' => 'required|string',
        ]);

        $datosProveedor = request()->except(['_token', '_method']);
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosProveedor['foto'] = $nombreImagen;
        }

        Proveedor::where('id','=',$id)->update($datosProveedor);
        $proveedor = Proveedor::findOrFail($id);
        return redirect()->route('proveedor.index')->with('success', 'proveedor actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Proveedor::where('id','=',$id)->delete();
        return redirect('proveedor');
    }
}
