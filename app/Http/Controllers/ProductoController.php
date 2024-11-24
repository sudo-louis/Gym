<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos=Producto::paginate(5);

        $prdb = Proveedor::all();
        $ctdb = Categoria::all();

        return view('producto.index',compact("productos", "prdb", "ctdb"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prdb = Proveedor::all();
        $ctdb = Categoria::all();
        return view('producto.create', compact('prdb', 'ctdb'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'descripcion' => 'required|string|max:255',
            'proveedor' => 'required|exists:proveedores,ID',
            'categoria' => 'required|exists:categorias,ID',
            'cantidad_en_stock' => 'required|numeric',
            'precio' => 'required|numeric',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

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
        $prdb = Proveedor::all();
        $ctdb = Categoria::all();
        $producto = Producto::findOrFail($id);
        return view('producto.edit', compact('producto', 'prdb', 'ctdb'));
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
