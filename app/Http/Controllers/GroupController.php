<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    // Retorna todo el json de nuestro modelo de migraciones
    public function index()
    {
        $groups = Group::all()->toJson();
        dd($groups);
    }

    // Retorna un json dependiendo el key_name 
    public function findgGoup($key_name)
    {
        $group = Group::where('key_name',$key_name)->first()->toJson();
        dd($group);
    }
}
