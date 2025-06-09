<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = User::orderBy('created_at', 'desc')->paginate(10);
        return view('mntusuario.index', compact('usuarios'));
    }

    // Mostrar formulario de creación
    public function create()
    {
        return view('mntusuario.create');
    }

    // Guardar nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:admin,editor,viewer', // 👈 validar que el rol sea uno permitido
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role, // 👈 guardar el rol
        ]);

        return redirect()->route('usuarios.index')->with('success', '✅ Usuario creado correctamente');
    }


    // Mostrar formulario de edición
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('mntusuario.edit', compact('user'));
    }

    // Actualizar usuario existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('usuarios.index')->with('success', '✏️ Usuario actualizado correctamente');
    }

    // Eliminar usuario
    public function destroy($id)
    {
        // Evitar que el usuario se elimine a sí mismo
        if (Auth::id() == $id) {
            return redirect()->route('usuarios.index')->with('error', '❌ No puedes eliminar tu propia cuenta.');
        }

        // Buscar el usuario
        $user = User::findOrFail($id);


        $user->delete();

        return redirect()->route('usuarios.index')->with('success', '🗑 Usuario eliminado correctamente');
    }
}
