<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::select('id', 'name')
             ->orderByDesc('id')
             ->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'user' => Auth::user(),
                'token' => $token
            ]
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
        $user = new User();
        $user->rol_id = $request->rol_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = User::find($request->id);

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->rol_id = $request->rol_id;
        $user->name = $request->name;
        $user->update();

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);

        $user->delete();

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }
}
