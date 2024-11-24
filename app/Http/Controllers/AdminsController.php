<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminsController extends Controller {

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect('/admins/index');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function index()
    {
        $datos['admins']=Admins::paginate(5);
        return view('admin.index',$datos);
    }

    public function create()
    {
        return view('admin.create');
        return view('admin.create', compact('admin'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins,email',
            'password' => 'required|string|min:8',
        ]);

        $datosAdmin = $request->except('_token');
        $datosAdmin['password'] = Hash::make($request->password);

        Admins::create($datosAdmin);

        return redirect()->route('admin.index')->with('success', 'Administrador registrado con éxito.');
    }

    public function edit(string $id)
    {
        $admin = Admins::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        $datosAdmin = $request->except(['_token', '_method']);
        $datosAdmin['password'] = Hash::make($request->password);

        Admins::where('id', '=', $id)->update($datosAdmin);

        return redirect()->route('admin.index')->with('success', 'Administrador actualizado con éxito.');
    }

    public function destroy(string $id)
    {
        Admins::where('id','=',$id)->delete();
        return redirect('/admin/index');
    }
}
