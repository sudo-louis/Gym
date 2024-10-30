<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['productos']=Producto::paginate(5);
        return view('producto.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('producto.create');
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'nombre' => 'required|string|max:50',
        //     'apellido' => 'required|string|max:50',
        //     'fecha_contratacion' => 'required|date',
        //     'telefono' => 'required|numeric',
        //     'correo' => 'required|email|unique:clientes,correo|max:100',
        //     'rol' => 'required|string|max:50',
        // ]);

        $datosProductos = request()->except('_token');
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosProductos['foto'] = $nombreImagen;
        }

        Producto::insert($datosProductos);
        return redirect()->route('producto.index')->with('success', 'Cliente registrado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        //     'nombre' => 'required|string|max:50',
        //     'apellido' => 'required|string|max:50',
        //     'fecha_contratacion' => 'required|date',
        //     'telefono' => 'required|numeric',
        //     'correo' => 'required|email|max:100',
        //     'rol' => 'required|string|max:50',
        // ]);

        $datosProductos = request()->except(['_token', '_method']);
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosProductos['foto'] = $nombreImagen;
        }

        Producto::where('ID','=',$id)->update($datosProductos);
        $producto = Producto::findOrFail($id);
        return redirect()->route('producto.index')->with('success', 'producto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Producto::where('ID','=',$id)->delete();
        return redirect('producto');
    }
}
