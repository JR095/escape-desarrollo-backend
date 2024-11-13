<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follower;
use App\Models\Company;


class FollowerController extends Controller
{
    public function follower(Request $request)
    {
    $request->validate([
     
        'company_id' => 'required',
        'user_id' => 'required',
    ]);

    $company = Company::findOrFail($request->company_id);



    $follow = Follower::where('user_id', $request->user_id)->where('company_id', $request->company_id)->first();
    if ($follow) {
        $follow->delete();
        $company->decrement('followers_count');
        return response()->json([
            'message' => 'Follower removed successfully',
            'isFollowing' => false
        ], 200);
    } else {
        $follow = Follower::create([
            'user_id' => $request->user_id,
            'company_id' => $request->company_id,
        ]);
        $company->increment('followers_count');
        return response()->json([
            'message' => 'Follower registered successfully',
            'isFollowing' => true
        ], 201);    }

    
}


}
