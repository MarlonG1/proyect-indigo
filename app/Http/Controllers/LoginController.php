<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroUsuarioRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('inicio');
        }

        return back()->withErrors([
            'email' => 'El correo electronico proporcionado no coincide con nuestros registros.',
        ])->onlyInput('email');

    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(RegistroUsuarioRequest $request): RedirectResponse
    {
        $file = $request->file('image');
        $fileExtension = $file->getClientOriginalExtension();
        $fileName = $request->input('email') . '.' . $fileExtension;
        $file->move(public_path() . '/img/profile-photos/', $fileName);

        User::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'phone' => $request->input('phone'),
            'birth_date' => $request->input('birthDate'),
            'type' => 'Estudiante',
            'dui' => $request->input('dui'),
            'carnet' => $request->input('carnet'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'image' => $fileName,
        ]);

        return redirect('/login');
    }

}