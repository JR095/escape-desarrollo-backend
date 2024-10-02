<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_post;
use App\Models\Post_File;

class DailyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Daily_post::select('id', 'description')
            ->with(['files:id,daily_post_id,file_path'])
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
                    $filePath = $file->store('posts', 'public');
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
    public function show(string $id)
    {
        
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

    try {
        $post = Daily_post::findOrFail($id);

        // Actualiza la descripción
        $post->update([
            'description' => $request->description,
        ]);

        // Maneja los archivos
        if ($request->hasFile('files')) {
            // Elimina los archivos existentes
            Post_File::where('daily_post_id', $post->id)->delete();

            // Almacena los nuevos archivos
            foreach ($request->file('files') as $file) {
                $filePath = $file->store('posts', 'public');
                $fileType = $file->getClientMimeType();

                Post_File::create([
                    'daily_post_id' => $post->id,
                    'file_path' => $filePath,
                    'file_type' => strpos($fileType, 'video') !== false ? 'video' : 'image',
                ]);
            }
        }

        return response()->json(['message' => 'Publicación actualizada con éxito.'], 200);
    } catch (\Exception $e) {
        \Log::error('Error al actualizar la publicación: ' . $e->getMessage());
        return response()->json(['error' => 'Error al actualizar la publicación.'], 500);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
