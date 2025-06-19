<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function parametres()
    {
        $admin = auth()->user();

        return view('back.parametres', compact('admin'));
    }

    public function updateParametres(Request $request)
    {
        $admin = auth()->user();


        $request->validate([
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $admin->email = $request->email;

        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();

        return redirect()->route('admin.parametres')->with('success', 'Paramètres mis à jour avec succès.');
    }
}
