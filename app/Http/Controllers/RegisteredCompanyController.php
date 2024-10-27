<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredCompanyController extends Controller
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
            'phone_number' => 'required|string',
            'category_id' => 'required',
            'sub_categories_id' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'description' => 'required|string',
            //'image' => 'required',
            'canton_id' => 'required',
            'district_id' => 'required',
            'address' => 'required',
            //'followers_count' => 'required',
            'password' => ['required', 'confirmed'],
        ]);

        if ($request->category_id == 1) {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20sus%20opciones%20de%20comida%20y%20bebida";
        } elseif ($request->category_id == 2) {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20las%20mejores%20opciones%20para%20compras";
        } elseif ($request->category_id ==3) {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20emocionantes%20actividades%20al%20aire%20libre";
        } elseif ($request->category_id == 4) {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20experiencias%20culturales%20y%20gastronomicas";
        } elseif ($request->category_id == 5) {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20opciones%20de%20entretenimiento";
        } elseif ($request->category_id == 6) {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20sobre%20bienestar%20y%20relajacion";
        } else {
            $message = "?text=Hola!%20Vengo%20de%20Escape%20y%20busco%20informacion%20sobre%20sus%20actividades";
        }

        $whatsapp_url = "https://wa.me/506".$request->phone_number.$message;

        $company = Company::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'user_type_id' => 1,
            'category_id' => $request->category_id,
            'sub_categories_id' => $request->sub_categories_id,
            'email' => $request->email,
            'description' => $request->description,
            //'image' => $request->image,
            'canton_id' => $request->canton_id,
            'district_id' => $request->district_id,
            'address' => $request->address,
            //'followers_count' => $request->followers_count,
            'password' => Hash::make($request->password),
            'whatsapp' => $whatsapp_url
        ]);

        return response()->json(['message' => 'Company registered successfully', 'company' => $company], 201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
