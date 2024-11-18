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
        $userId = $request->input('user_id');
        $companyId = $request->input('company_id');

        if (!$userId && !$companyId) {
            return response()->json(['error' => 'User ID or Company ID is required'], 400);
        }

        $like = Like::where('daily_post_id', $postId)
            ->where(function($query) use ($userId, $companyId) {
                if ($userId) {
                    $query->where('user_id', $userId);
                } else if ($companyId) {
                    $query->where('company_id', $companyId);
                }
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
