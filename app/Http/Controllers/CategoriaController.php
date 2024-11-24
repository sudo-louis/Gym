<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['categorias']=Categoria::paginate(5);
        return view('categoria.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria.create');
        return view('categoria.create', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:100',
        ]);

        $datosCategoria = $request->except('_token');

        Categoria::create($datosCategoria);

        return redirect()->route('categoria.index')->with('success', 'Categoría registrada con éxito.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:100',
        ]);

        $datosCategoria = $request->except(['_token', '_method']);

        Categoria::where('ID', '=', $id)->update($datosCategoria);

        return redirect()->route('categoria.index')->with('success', 'Categoría actualizada con éxito.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categoria::where('ID','=',$id)->delete();
        return redirect('categoria');
    }
}
