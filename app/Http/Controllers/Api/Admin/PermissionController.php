<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PermissionController extends Controller
{
    public static function middleware(){
        return [
            new Middleware(['permission:permissions.index'], ['index', 'all'])
        ];
    }

    public function index(){
        $permissions = Permission::when(request()->search, function($permissions){
            $permissions = $permissions->where('name', 'like', '%' . request()->search() . '%');
        })->latest()->paginate(5);
         $permissions->appends(['search' => request()->search]);

        //return with Api Resource
        return new PermissionResource(true, 'List Data Permissions', $permissions);
    }
     public function all()
    {
        //get permissions
        $permissions = Permission::latest()->get();

        //return with Api Resource
        return new PermissionResource(true, 'List Data Permissions', $permissions);
    }

}
