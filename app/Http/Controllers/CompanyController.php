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
    public function show()
    {
        //
        $companies= Company::select(
            'companies.id',
            'companies.name',
            'companies.phone_number',
            'companies.user_type_id',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.email',
            'companies.description',
            'companies.image',
            'cantons.name as canton_id',
            'districts.name as district_id',
            'companies.address',
            'companies.followers_count',
        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->get();
    
        return $companies;
        
    }

    public function categoryFilter($id){
        $companies= Company::select(
            'companies.id',
            'companies.name',
            'companies.phone_number',
            'companies.user_type_id',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.email',
            'companies.description',
            'companies.image',
            'cantons.name as canton_id',
            'districts.name as district_id',
            'companies.address',
            'companies.followers_count',
        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->where('companies.category_id', $id)
        ->get();
    
        return $companies;
    }

    public function subCategoryFilter($id){
        $companies= Company::select(
            'companies.id',
            'companies.name',
            'companies.phone_number',
            'companies.user_type_id',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.email',
            'companies.description',
            'companies.image',
            'cantons.name as canton_id',
            'districts.name as district_id',
            'companies.address',
            'companies.followers_count',
        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->where('companies.sub_categories_id', $id)
        ->get();
    
        return $companies;
    }


    public function filter($id_category, $id_subcategory, $id_canton, $id_district){
        $companies= Company::select(
            'companies.id',
            'companies.name',
            'companies.phone_number',
            'companies.user_type_id',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.email',
            'companies.description',
            'companies.image',
            'cantons.name as canton_id',
            'districts.name as district_id',
            'companies.address',
            'companies.followers_count',
        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->where('companies.category_id', $id_category,'companies.sub_categories_id', $id_subcategory,'companies.district_id','companies.canton_id', $id_canton, $id_district)
        ->get();
    
        return $companies;
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
