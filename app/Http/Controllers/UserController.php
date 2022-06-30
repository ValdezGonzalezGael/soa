<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Hash;

class UserController extends Controller
{
    //use Hash;
    public function index()
    {
        $lista_permisos = Auth::user()->Role->permissions()->pluck('id')->toArray();
        dd($lista_permisos);
        // si en el array existe 1 en lista permisos
        if (in_array(1, $lista_permisos)) {
            dd('Si existe');
        } else {
            dd('No existe');
        }
        if (Auth::user()->Role->key_name == 'algo'()){
            $usuarios = User::with('Role.permissions')->get();
            foreach ($usuarios as $usuario) {
                // dd($usuario->toArray());
                // dd($usuario->Role->toArray());
                foreach ($usuario->Role->permissions as $permission) {
                    dd($permission->toArray());
                }
            }
        } else {
            dd('No se pudo acceder');
        }
       // dd(Auth::user()->Role->key_name == 'algo'());
    }
    
    public function create()
    {
        User::create([
            'name' => 'Gael', 
            'last_name' => 'Valdez',
            'username' => 'ValdezGonzález',
            'age'=> "20",
            'telephone'=> "6188382822",
            'email'=> 'gael.valdez.is@unipolidgo.edu.mx',
            'password'=> Hash::make('test1234'),
            'role_id'=> 1,
        ]);
    }
    public function login() {
        $credentials = [
            "email"    => 'gael.valdez.is@unipolidgo.edu.mx',
            'password' => 'test1234'
        ];
        if(Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
    }

}
