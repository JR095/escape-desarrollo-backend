<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;

use App\Models\Favorite_post_place;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
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
    public function update(Request $request)
    {
        try {

            $validatedData = $request->validate([
                'id' => 'required|exists:users,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'canton' => 'required|exists:cantons,id', 
                'distrito' => 'required|exists:districts,id', 
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,|max:2048',
            ]);

            $user = User::findOrFail($validatedData['id']);

            $imagePath = $user->image; 
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $file->getClientOriginalName();
                $finalName = date('His') . $filename;

                $file->move(public_path('imgs'), $finalName);
                $imagePath = $finalName;
            }

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'canton_id' => $validatedData['canton'], 
                'district_id' => $validatedData['distrito'],
                'image' => $imagePath,
            ]);

            return response()->json(['user' => $user, 'message' => 'User updated successfully'], 200);
        } catch (\Exception $e) {
            Log::error('Error updating user: ' . $e->getMessage() . ' - Input: ' . json_encode($request->all()));
            return response()->json(['message' => 'Error updating user'], 500);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getAuthenticatedUser()
    {
        $user = Auth::user(); 
        return response()->json($user);
    }

public function favorite(Request $request)
{
    $request->validate([
     
        'company_id' => 'required',
        'user_id' => 'required',
    ]);

    $request->validate([
        'company_id' => 'required',
        'user_id' => 'required',
    ]);

    $favorite = Favorite_post_place::where('user_id', $request->user_id)->where('company_id', $request->company_id)->first();
    if ($favorite) {
        $favorite->delete();
        return response()->json(['message' => 'Favorite removed successfully'], 200);
    } else {
        $NewFavorite = Favorite_post_place::create([
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
        ]);
    
        return response()->json(['message' => 'Favorite registered successfully'], 201);
    }

    
}



public function getFavorites($user_id)
{
    $favorites = Company::select(
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
        'favorite_post_places.id as favorite'
    )
    ->join('categories', 'companies.category_id', '=', 'categories.id')
    ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
    ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
    ->join('districts', 'companies.district_id', '=', 'districts.id')
    ->join('favorite_post_places', 'companies.id', '=', 'favorite_post_places.company_id')  // Aquí está la corrección
    ->where('favorite_post_places.user_id', $user_id)
    ->get();
    
    foreach ($favorites as $company) {
        $company->image = "https://myescape.online/imgs/".$company->image;
    }

    return response()->json($favorites);

}

    public function changePassword(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'id' => 'required|exists:users,id', 
                'old_password' => 'required',
                'new_password' => 'required|min:6|confirmed',
            ]);
    
            $user = User::findOrFail($validatedData['id']);
    
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

    public function sendResetLinkEmail(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);
            $status = Password::sendResetLink(
                $request->only('email')
            );
            if ($status === Password::RESET_LINK_SENT) {
                return response()->json(['message' => __('passwords.sent')], 200);
            } else {
                return response()->json(['message' => __('passwords.user')], 400);
            }
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
        Log::info('Request received for password reset', $request->all());
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                Log::info('Resetting password for user: ' . $user->email);
                $user->password = Hash::make($password);
                $user->save();
                Log::info('Password reset successfully for user: ' . $user->email);
            }
        );
        Log::info('Password reset status: ' . $status);
        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => __($status)], 200)
            : response()->json(['message' => __($status)], 400);
    }

    public function showResetForm($token)
    {
        try {
            Log::info('Displaying reset form with token: ' . $token);
            return view('auth.reset', ['token' => $token]);
        } catch (\Exception $e) {
            Log::error('Error displaying reset form: ' . $e->getMessage());
            return response()->json(['message' => 'Error displaying reset form'], 500);
        }
    }

}