<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::class::user()->Role->key_name == 'algo'()){
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
            'password'=> Hash::class::make('test1234'),
            'role_id'=> 1,
        ]);
    }
    public function login() {
        $credentials = [
            "email"    => 'gael.valdez.is@unipolidgo.edu.mx',
            'password' => 'test1234'
        ];
        if(Auth::class::attempt($credentials)) {
            return redirect()->intended('/');
        }
    }
}
