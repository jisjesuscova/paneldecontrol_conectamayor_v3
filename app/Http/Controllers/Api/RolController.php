<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\RolPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateRolRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rols = Rol::select('id', 'rol')
             ->orderByDesc('id')
             ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $rols
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function get_all()
    {
        $rols = Rol::select('id', 'rol')
             ->orderByDesc('id')
             ->get();

        return response()->json([
            'success' => true,
            'data' => $rols
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rol = Rol::create([
            'rol' => $request->rol
        ]);

        $rol_permissions = RolPermission::create([
            'rol_id' => $rol->id,
            'add_section' => $request->add_section,
            'edit_section' => $request->edit_section,
            'delete_section' => $request->delete_section,
            'copy_section' => $request->copy_section,
            'order_section' => $request->order_section,
            'add_category' => $request->add_category,
            'edit_category' => $request->edit_category,
            'delete_category' => $request->delete_category,
            'copy_category' => $request->copy_category,
            'order_category' => $request->order_category,
            'add_content' => $request->add_content,
            'edit_content' => $request->edit_content,
            'delete_content' => $request->delete_content,
            'copy_content' => $request->copy_content,
            'order_content' => $request->order_content,
            'watch_audit' => $request->watch_audit,
            'add_user' => $request->add_user,
            'edit_user' => $request->edit_user,
            'delete_user' => $request->delete_user,
            'add_rol' => $request->add_rol,
            'edit_rol' => $request->edit_rol,
            'delete_rol' => $request->delete_rol
        ]);

        return response()->json([
            'success' => true,
            'data' => $rol
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        $rol = Rol::find($rol->id);

        return response()->json([
            'success' => true,
            'data' => $rol
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $rol = Rol::find($request->id);

        $rol_permission = RolPermission::where('rol_id', $request->id)->first();

        return response()->json([
            'success' => true,
            'rol' => $rol,
            'rol_permissions' => $rol_permission
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rol = Rol::find($id);
        $rol->rol = $request->rol;
        $rol->save();

        $rol_permission = RolPermission::where('rol_id', $id)->first();
        $rol_permission->add_section = $request->add_section;
        $rol_permission->edit_section = $request->edit_section;
        $rol_permission->delete_section = $request->delete_section;
        $rol_permission->copy_section = $request->copy_section;
        $rol_permission->order_section = $request->order_section;
        $rol_permission->add_category = $request->add_category;
        $rol_permission->edit_category = $request->edit_category;
        $rol_permission->delete_category = $request->delete_category;
        $rol_permission->copy_category = $request->copy_category;
        $rol_permission->order_category = $request->order_category;
        $rol_permission->add_content = $request->add_content;
        $rol_permission->edit_content = $request->edit_content;
        $rol_permission->delete_content = $request->delete_content;
        $rol_permission->copy_content = $request->copy_content;
        $rol_permission->order_content = $request->order_content;
        $rol_permission->watch_audit = $request->watch_audit;
        $rol_permission->add_user = $request->add_user;
        $rol_permission->edit_user = $request->edit_user;
        $rol_permission->delete_user = $request->delete_user;
        $rol_permission->add_rol = $request->add_rol;
        $rol_permission->edit_rol = $request->edit_rol;
        $rol_permission->delete_rol = $request->delete_rol;
        $rol_permission->save();

        return response()->json([
            'success' => true,
            'data' => $rol_permission
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $rol = Rol::find($request->id);
        $rol->delete();

        $rol_permission = RolPermission::where('rol_id', $request->id)->first();
        $rol_permission->delete();

        return response()->json([
            'success' => true,
            'data' => $rol
        ], 200);
    }
}
