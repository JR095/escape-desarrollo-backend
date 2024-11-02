<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use App\Models\Daily_post;

class LikesController extends Controller
{

    public function toggleLike(Request $request, $postId)
    {
        $user = Auth::user();
        $company = Auth::guard('company')->user();

        $userId = $user ? $user->id : null;
        $companyId = $company ? $company->id : null;

        $like = Like::where('daily_post_id', $postId)
            ->where(function($query) use ($userId, $companyId) {
                $query->where('user_id', $userId)
                      ->orWhere('company_id', $companyId);
            })
            ->first();

        if ($like) {
            $like->delete();
            $likesCount = Like::where('daily_post_id', $postId)->count();
            return response()->json(['message' => 'Post unliked.', 'likes_count' => $likesCount]);
        } else {
            Like::create([
                'user_id' => $userId,
                'company_id' => $companyId,
                'daily_post_id' => $postId
            ]);

            $likesCount = Like::where('daily_post_id', $postId)->count();
            return response()->json(['message' => 'Post liked.', 'likes_count' => $likesCount]);
        }

        
    }

}
