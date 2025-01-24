<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['clientes']=Cliente::paginate(5);
        return view('cliente.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cliente = new Cliente(); // Objeto vacío
        return view('cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'telefono' => 'required|numeric',
            'correo' => 'required|email|unique:clientes,correo',
            'fecha_registro' => 'required|date',
            'status' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048'
        ]);

        $datosCliente = request()->except('_token');
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosCliente['foto'] = $nombreImagen;
        }

        Cliente::insert($datosCliente);
        return redirect()->route('cliente.index')->with('success', 'Cliente registrado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $request->validate([
            'nombre' => 'string|max:50',
            'apellido' => 'string|max:50',
            'telefono' => 'numeric',
            'correo' => 'email',
            'fecha_registro' => 'date',
            'status' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:2048'
        ]);

        $datosCliente = request()->except(['_token', '_method']);
        $imagen = $request->file('foto');
        if ($imagen && $imagen->isValid()) {
            $rutaCarpeta = 'storage/uploads';
            $nombreImagen = $imagen->getClientOriginalName();
            $request->file('foto')->move($rutaCarpeta, $nombreImagen);
            $datosCliente['foto'] = $nombreImagen;
        }

        Cliente::where('id','=',$id)->update($datosCliente);
        $cliente = Cliente::findOrFail($id);
        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cliente::where('id','=',$id)->delete();
        return redirect('cliente');
    }
}
