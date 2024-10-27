<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daily_post;
use App\Models\Post_File;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DailyPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id();

        $posts = Daily_post::with([
            'files:id,daily_post_id,file_path,file_type', 
            'company:id,name,canton_id,district_id,category_id',
            'company.canton:id,name',
            'company.district:id,name',
            'company.category:id,name',
        ])
        ->select('id', 'description', 'company_id')
        ->withCount('likes')
        ->get()
        ->map(function ($post) use ($userId) {
            $post->liked = $userId ? $post->likes()->where('user_id', $userId)->exists() : false;
            return $post;
        });

    return response()->json($posts);
    }

    public function getCompanyPosts()
    {
        if (!Auth::guard('company')->check()) {
            return response()->json(['error' => 'No está autenticado como compañía.'], 401);
        }

        $companyId = Auth::guard('company')->id();

        $posts = Daily_post::with([
            'files:id,daily_post_id,file_path,file_type',
            'company:id,name,canton_id,district_id,category_id',
            'company.canton:id,name',
            'company.district:id,name',
            'company.category:id,name',
        ])
        ->where('company_id', $companyId)
        ->select('id', 'description', 'company_id')
        ->withCount('likes')
        ->get()
        ->map(function ($post) use ($companyId) {
            $post->liked = $companyId ? $post->likes()->where('company_id', $companyId)->exists() : false;
            return $post;
        });

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
        if (!Auth::guard('company')->check()) {
            return response()->json(['error' => 'No tiene permisos para crear una publicación.'], 403);
        }
        
        $request->validate([
            'description' => 'required|string',
            'files.*' => 'nullable|file|mimes:jpeg,png,jpg,mp4,mov,avi,gif|max:20480',
        ]);

        try {
            $companyId = Auth::guard('company')->id();

            $post = Daily_post::create([
                'description' => $request->description,
                'company_id' => $companyId,
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

        if (Auth::guard('company')->id() !== $post->company_id) {
            return response()->json(['error' => 'No tiene permisos para actualizar esta publicación.'], 403);
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

        if (!Auth::guard('company')->check() || Auth::guard('company')->id() !== $post->company_id) {
            return response()->json(['error' => 'No tiene permisos para eliminar esta publicación.'], 403);
        }
        
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
