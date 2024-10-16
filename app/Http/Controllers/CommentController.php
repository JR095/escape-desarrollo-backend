<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
            'daily_post_id' => 'required|exists:daily_posts,id',
            'comment' => 'required|string',
        ]);

        $user = Auth::user(); 
        $company = Auth::guard('company')->user(); 

        $comment = new Comment();
        $comment->daily_post_id = $request->daily_post_id;
        $comment->comment = $request->comment;

        if ($user) {
            $comment->user_id = $user->id;
        } elseif ($company) {
            $comment->company_id = $company->id; 
        }

        $comment->save();
        $comment->load('user', 'company');

        return response()->json(['comment' => $comment], 201);
    }


    public function getPostComments($postId)
    {
        $comments = Comment::with([
            'user:id,name', 
            'company:id,name',
            ])
            ->where('daily_post_id', $postId)
            ->get();
        return response()->json($comments);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado.'], 404);
        }

        $comment->comment = $request->input('comment');
        $comment->save();
        $comment->load('user', 'company');

        return response()->json($comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if (!$comment) {
            return response()->json(['message' => 'Comentario no encontrado.'], 404);
        }
        $comment->delete();
        return response()->json(['message' => 'Comentario eliminado con exito.']);
    }

    public function countComments($postId)
    {
        $commentCount = Comment::where('daily_post_id', $postId)->count();
        return response()->json(['comment_count' => $commentCount]);
    }
}
