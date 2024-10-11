<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
            $user = auth()->user();

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'canton' => 'required|exists:cantons,id', 
                'distrito' => 'required|exists:districts,id', 
            ]);

            $user->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'canton_id' => $validatedData['canton'], 
                'district_id' => $validatedData['distrito'],
            ]);

            return response()->json(['user' => $user], 200);
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

    public function changePassword(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
    
        $user = Auth::user();
    
        if (!Hash::check($request->old_password, $user->password)) {
            return response()->json(['message' => 'The old password is incorrect.'], 400);
        }
    
        $user->password = Hash::make($request->new_password);
        $user->save();
    
        return response()->json(['message' => 'Password successfully changed.']);
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
        return view('auth.reset', ['token' => $token]);
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

    $NewFavorite = Favorite_post_place::create([
        'user_id' => $request->user_id,
        'company_id' => $request->company_id,
    ]);

    return response()->json(['message' => 'User registered successfully'], 201);
}

public function unfavorite(Request $request)
{
    $request->validate([
        'company_id' => 'required',
        'user_id' => 'required',
    ]);

    $favorite = Favorite_post_place::where('user_id', $request->user_id)->where('company_id', $request->company_id)->first();
    if ($favorite) {
        $favorite->delete();
        return response()->json(['message' => 'Favorite removed successfully'], 200);
    } else {
        return response()->json(['message' => 'Favorite not found'], 404);
    }

}

public function getFavorites($user_id)
{
    $favorites = Favorite_post_place::where('user_id', $user_id)->get();
    return response()->json($favorites);

}

}