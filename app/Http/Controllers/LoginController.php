<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController {

    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->back()->withErrors(['Usuário ou senha inválidos']);
        }

        return redirect()->route('series.index')->with('mensagem.sucesso', "Seja bem-vindo!");
    }

    public function destroy()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
