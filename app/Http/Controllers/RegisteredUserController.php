<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed'],
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'canton_id' => 'required',
            'district_id' => 'required',
            'preferences_1_id' => 'required',
            'preferences_2_id' => 'required',
            'preferences_3_id' => 'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_type_id' => 2,
            'canton_id' => $request->canton_id,
            'district_id' => $request->district_id,
            'preferences_1_id' => $request->preferences_1_id,
            'preferences_2_id' => $request->preferences_2_id,
            'preferences_3_id' => $request->preferences_3_id,
        ]);

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Valida los datos
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => ['nullable', 'confirmed'],
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'canton_id' => 'sometimes|required',
            'district_id' => 'sometimes|required',
            'preferences_1' => 'sometimes|required',
            'preferences_2' => 'sometimes|required',
            'preferences_3' => 'sometimes|required',
        ]);
    
        // Actualiza los datos del usuario
        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'latitude' => $request->latitude ?? $user->latitude,
            'longitude' => $request->longitude ?? $user->longitude,
            'canton_id' => $request->canton_id ?? $user->canton_id,
            'district_id' => $request->district_id ?? $user->district_id,
            'preferences_1' => $request->preferences_1 ?? $user->preferences_1,
            'preferences_2' => $request->preferences_2 ?? $user->preferences_2,
            'preferences_3' => $request->preferences_3 ?? $user->preferences_3,
        ]);
    
        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
