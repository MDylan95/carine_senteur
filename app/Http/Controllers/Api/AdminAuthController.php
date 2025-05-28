<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'name'    => 'required|string',
            'password' => 'required'
        ]);

        $admin = DB::table('admins')->where('name', $request->name)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json(['message' => 'Identifiants invalides'], 401);
        }

        return response()->json([
            'token' => base64_encode($admin->name), // Option simple (tu peux générer un vrai token)
            'admin' => [
                'id' => $admin->id,
                'name' => $admin->name
            ]
        ]);
    }
}
