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
        $datos['clientes']=Cliente::paginate();
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
    public function store(Request $request)
    {
        $datosCliente = request()->except('_token');
        if ($request->hasFile('foto')) {
            $datosCliente['foto']=$request->file('foto')->store('uploads', 'public');
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
    public function update(Request $request, $id)
    {
        $datosCliente = request()->except(['_token', '_method']);
        if ($request->hasFile('foto')) {
            $cliente = Cliente::findOrFail($id);
            Storage::delete('public/'.$cliente->foto);
            $datosCliente['foto']=$request->file('foto')->store('uploads', 'public');
        }

        Cliente::where('ID','=',$id)->update($datosCliente);
        $cliente = Cliente::findOrFail($id);
        return redirect()->route('cliente.index')->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Cliente::where('ID','=',$id)->delete();
        return redirect('cliente');
    }
}
