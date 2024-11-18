<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\User;
use App\Models\Daily_post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

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
    public function show($id)
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
            'companies.latitude',
            'companies.longitude',
            'companies.followers_count',
            'favorite_post_places.id as favorite',
            'companies.whatsapp',

        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->leftJoin('favorite_post_places', function($join) use ($id) {
            $join->on('companies.id', '=', 'favorite_post_places.company_id')
                 ->where('favorite_post_places.user_id', '=', $id);
        })
        ->get();

        foreach ($companies as $company) {
            $company->image = "https://myescape.online/imgs/".$company->image;
        }
        
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
            'companies.latitude',
            'companies.longitude',
            'companies.followers_count',
            'companies.whatsapp',
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
            'companies.latitude',
            'companies.longitude',
            'companies.followers_count',
            'companies.whatsapp',

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
            'companies.latitude',
            'companies.longitude',
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


    public function companyShow($id, $user)
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
            'companies.latitude',
            'companies.longitude',
            'companies.followers_count',
            'favorite_post_places.id as favorite',
            'companies.whatsapp',

        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->leftJoin('favorite_post_places', function($join) use ($user) {
            $join->on('companies.id', '=', 'favorite_post_places.company_id')
                 ->where('favorite_post_places.user_id', '=', $user);
        })
        ->where('companies.id', $id)
        ->get();

        $filename = $companies[0]->image;
        $companies[0]->image = "https://myescape.online/imgs/".$filename;
        $count = Daily_post::where('company_id', $id)->count();
        $companies[0]->posts=$count;

        return $companies;
        
    }

    public function companyfollow( $user)
    {
        
        $companies= Company::select(
            'companies.id',
            'companies.name',
            'followers.id as follow',
            'companies.image'
        )
        ->Join('followers', 'companies.id', '=', 'followers.company_id')
        ->where('followers.user_id', $user)
        ->get();
        foreach ($companies as $company) {
            $company->image = "https://myescape.online/imgs/".$company->image;
        }

        return $companies;
        
    }

    public function companyInfo($id, $user)
    {
        
        $companies= Company::select(
            'companies.id',
            'companies.name',
            'sub_categories.name as sub_category_id',
            'companies.description',
            'companies.image',
            'companies.followers_count',
            'followers.id as follow',
        )
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->leftJoin('followers', function($join) use ($user) {
            $join->on('companies.id', '=', 'followers.company_id')
                 ->where('followers.user_id', '=', $user);
        })
        ->where('companies.id', $id)
        ->get();

        $filename = $companies[0]->image;
        $companies[0]->image = "https://myescape.online/imgs/".$filename;
        $count = Daily_post::where('company_id', $id)->count();
        $companies[0]->posts=$count;

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
    public function update(Request $request)
{
    try {
        $validatedData = $request->validate([
            'id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'canton' => 'required|exists:cantons,id', 
            'distrito' => 'required|exists:districts,id', 
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'phone_number' => 'required',
        ]);

        $company = Company::findOrFail($validatedData['id']);

        $imagePath = $company->image;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $finalName = date('His') . $filename;

            //$request->file('image')->storeAs('images/', $finalName, 'public');
            $file->move(public_path('imgs'), $finalName);
            $imagePath = $finalName;
        }

        $company->update([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'canton_id' => $validatedData['canton'], 
            'district_id' => $validatedData['distrito'],
            'image' => $imagePath,
            'description' => $validatedData['description'],
            'phone_number' => $validatedData['phone_number'],
        ]);

        return response()->json(['company' => $company, 'message' => 'Company updated successfully'], 200);
    } catch (\Exception $e) {
        Log::error('Error updating company: ' . $e->getMessage());
        return response()->json(['message' => 'Error updating company'], 500);
    }
}

    public function changePassword(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:companies,id', 
                'old_password' => 'required',
                'new_password' => 'required|min:6|confirmed',
            ]);
    
            $user = Company::findOrFail($validatedData['id']);
    
            if (!Hash::check($validatedData['old_password'], $user->password)) {
                return response()->json(['message' => 'The old password is incorrect.'], 400);
            }
    
            $user->password = Hash::make($validatedData['new_password']);
            $user->save();
    
            return response()->json(['message' => 'Password successfully changed.'], 200);
        } catch (\Exception $e) {
            Log::error('Error changing password: ' . $e->getMessage());
            return response()->json(['message' => 'Error changing password.'], 500);
        }
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
            'companies.email',
            'companies.phone_number',
            'districts.name as district_name',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.whatsapp',

        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->where('companies.name', 'LIKE', '%' . $request->name . '%')
        ->get();
        
        foreach ($companies as $company) {
            $company->image = "https://myescape.online/imgs/".$company->image;
        }
    
        return response()->json($companies);
    }

    public function sendResetLinkEmail(Request $request)
{
    try {
        $request->validate(['email' => 'required|email']);
        $company = Company::where('email', $request->email)->first();

        if (!$company) {
            return response()->json(['message' => __('passwords.user')], 400);
        }

        $status = Password::broker('companies')->sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __('passwords.sent')], 200)
            : response()->json(['message' => __('passwords.user')], 400);
    } catch (\Exception $e) {
        Log::error('Error sending reset link: '.$e->getMessage());
        return response()->json(['message' => 'An error occurred while sending the reset link'], 500);
    }
}

public function reset(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::broker('companies')->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($company, $password) {
            $company->password = Hash::make($password);
            $company->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? response()->json(['message' => __($status)], 200)
        : response()->json(['message' => __($status)], 400);
}

public function showResetForm($token)
{
    return view('auth.reset-company', ['token' => $token]);
}


}
