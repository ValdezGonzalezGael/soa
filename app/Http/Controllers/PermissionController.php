<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all()->toJson();
        dd($permissions);
    }

    public function findPermission($key_name)
    {
        $permissions = Permission::where('key_name',$key_name)->first()->toJson();
        dd($permissions);
    }
    public function CreatePermission()
    {
        Permission::Create ([
            'name' => 'T.Docente',
            'key_name' => 'tdocente'
        ]);
    }

    public function UpdatePermission($id)
    {
        $permissions= Permission::find($id);
        $permissions->update ([
            'name' => 'Tec.Docente',
            'key_name' => 'tec_docente'
        ]);
    }
    public function UpdatePermissionbyKeyName($key_name)
    {
        $permissions= Permission::where('key_name',$key_name)->first();
        $permissions->update ([
            'name' => 'Tec.docente',
            'key_name' => 'tec_docente'
        ]);
    }

    public function DeletePermission($key_name)
    {
     $permissions= Permission::where('key_name',$key_name)->first();
     $permissions->delete();   
    }
}
