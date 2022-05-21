<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        if(!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ], 200);
    }

    public function index(): \Illuminate\Database\Eloquent\Collection
    {
        return User::all();
    }

    public function store(UserRequest $request): \Illuminate\Http\JsonResponse
    {
        $user = User::create($request->validated());

        $user->password = bcrypt($user->password);
        $user->save();

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user,
            'status' => 'ok',
        ], 201);
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(UserRequest $request, $id): \Illuminate\Http\JsonResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user,
            'status' => 'ok',
        ], 201);
    }

    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
            'data' => $user,
            'status' => 'ok',
        ], 200);
    }
}
