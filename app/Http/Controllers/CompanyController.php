<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
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
        //
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

    public function search(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $companies = Company::select(
            'companies.id',
            'companies.name',
            'companies.description',
            'companies.followers_count',
            'companies.image',
            'districts.name as district_name',
        )
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->where('companies.name', 'LIKE', '%' . $request->name . '%')
        ->get();
        
        foreach ($companies as $company) {
            $company->image = "http://localhost/escape-desarrollo-backend/public/imgs/".$company->image;
        }
    
        return response()->json($companies);
    }
}
