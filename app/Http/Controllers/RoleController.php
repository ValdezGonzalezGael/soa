<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all()->toJson();
        dd($roles);
    }

    public function indexPivot()
    {
        // Trae todos los datos
        $role = Role::with('permissions')
            ->where('key_name', 'superadmin')->first();

        // Sincroniza para traer o quitar información
        $role->permissions()->sync(array(1, 2, 3, 4));
        $roleWithPermissions = $role->toArray();

        // Es como un print de python xd
        dd($roleWithPermissions);
    }

    public function findRole($key_name)
    {
        $role = Role::where('key_name',$key_name)->first()->toJson();
        dd($role);
    }
    public function CreateRole(Request $request)
    {
        Role::Create ([
            'name' => $request->name,
            'key_name' =>$request->name
        ]);
    }

    public function UpdateRole($id)
    {
        $role= Role::find($id);
        $role->update ([
            'name' => 'Tec.Docente',
            'key_name' => 'tec_docente'
        ]);
    }
    public function UpdateRolebyKeyName($key_name)
    {
        $role= Role::where('key_name',$key_name)->first();
        $role->update ([
            'name' => 'Tec.docente',
            'key_name' => 'tec_docente'
        ]);
    }

    public function DeleteRole($key_name)
    {
     $role= Role::where('key_name',$key_name)->first();
     $role->delete();   
    }
}

