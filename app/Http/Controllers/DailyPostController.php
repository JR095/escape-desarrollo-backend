<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_post;
use App\Models\Post_File;
use Illuminate\Support\Facades\Storage;

class DailyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Daily_post::select('id', 'description')
            ->with(['files:id,daily_post_id,file_path,file_type'])
            ->get();

        return response()->json($posts);
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
            'description' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi,gif|max:20480',
        ]);

        try {
            $post = Daily_post::create([
                'description' => $request->description,
            ]);

            if ($request->hasFile('files')) {
                    foreach ($request->file('files') as $file) {
                    $originalFileName = str_replace(' ', '_', $file->getClientOriginalName());
                    $timestamp = time();
                    $uniqueFileName = $timestamp . '_' . $originalFileName;

                    $filePath = $file->storeAs('posts', $uniqueFileName, 'public');
                    $fileType = $file->getClientMimeType();

                    Post_File::create([
                        'daily_post_id' => $post->id,
                        'file_path' => $filePath,
                        'file_type' => strpos($fileType, 'video') !== false ? 'video' : 'image',
                    ]);
                }
            }

            return response()->json(['message' => 'Publicación creada con éxito.'], 201);
        } catch (\Exception $e) {
            \Log::error('Error al crear la publicación: ' . $e->getMessage()); 
            return response()->json(['error' => 'Error al crear la publicación.'], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Daily_post::select('id', 'description')
            ->with(['files:id,daily_post_id,file_path,file_type'])
            ->where('id', $id)
            ->first();

        if (!$post) {
            return response()->json(['message' => 'Publicación no encontrada.'], 404);
        }

        return response()->json($post);
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
            'description' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi,gif|max:20480',
        ]);

        $post = Daily_post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Publicación no encontrada.'], 404);
        }

        $post->description = $request->description;
        $post->save();

        if ($request->hasFile('files')) {
            $oldFiles = Post_File::where('daily_post_id', $post->id)->get();

            foreach ($oldFiles as $oldFile) {
                Storage::disk('public')->delete($oldFile->file_path);
                $oldFile->delete();
            }

            foreach ($request->file('files') as $file) {
                $originalFileName = str_replace(' ', '_', $file->getClientOriginalName());
                $timestamp = time();
                $uniqueFileName = $timestamp . '_' . $originalFileName;

                $filePath = $file->storeAs('posts', $uniqueFileName, 'public');
                $fileType = $file->getClientMimeType();

                Post_File::create([
                    'daily_post_id' => $post->id,
                    'file_path' => $filePath,
                    'file_type' => strpos($fileType, 'video') !== false ? 'video' : 'image',
                ]);
            }
        }

        return response()->json([
            'message' => 'Publicación actualizada con éxito.',
            'post' => $post,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Daily_post::find($id);
        if ($post) {
            $files = $post->files;

            foreach ($files as $file) {
                $filePath = public_path('storage/' . $file->file_path);
                if (file_exists($filePath)) {
                    unlink($filePath); 
                }
                $file->delete();
            }
            $post->delete();

            return response()->json(['message' => 'Publicación e imágenes relacionadas eliminadas con éxito.'], 200);
        } else {
            return response()->json(['message' => 'Publicación no encontrada.'], 404);
        }
    }

}
