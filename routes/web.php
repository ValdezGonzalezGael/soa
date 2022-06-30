<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\RoleController;
use App\Http\controllers\PermissionController;
use App\Http\controllers\GroupController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('welcome');
})-> name('home');

//permission

Route::get('permissions',[PermissionController::class,'index']);
Route::get('permission/{key_name}',[PermissionController::class,'findPermission']);
Route::get('create-permission',[PermissionController::class, 'CreatePermission']);
Route::get('update-permission/{id}',[PermissionController::class, 'UpdatePermission']);
Route::get('update-permission-k/{key_name}',[PermissionController::class, 'UpdatePermissionbyKeyName']);
Route::get('delete-permission/{key_name}',[PermissionController::class, 'DeletePermission']); 

// Groups
Route::get('Groups',[GroupController::class,'index']);
Route::get('Groups/{key_name}',[GroupController::class,'findgGoup']);

// Roles pivot
Route::get('role-pivot',[RoleController::class,'indexPivot']);

Route::get('login',[UserController::class,'login']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('roles',[RoleController::class,'index']);
    Route::get('role/{key_name}',[RoleController::class,'findRole']);
    Route::get('create-role',[RoleController::class, 'CreateRole']);
    Route::get('update-role/{id}',[RoleController::class, 'UpdateRole']);
    Route::get('update-role-k/{key_name}',[RoleController::class, 'UpdateRolebyKeyName']);
    Route::get('delete-role/{key_name}',[RoleController::class, 'DeleteRole']);
    /*Usuarios*/
    Route::get('usuarios',[UserController::class,'index']);
    Route::get('crear-usuario',[UserController::class,'create']);
});

