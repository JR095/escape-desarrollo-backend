<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Post_place;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$ratings = Rating::with('post_place')->get();
        return response()->json($ratings);*/
        $ratings = Rating::select(
            'ratings.id',
            'ratings.post_place_id',
            'ratings.user_id',
            'ratings.rating',
            'post_places.id as post_place_id',
            'post_places.company_id as post_place_company_id',
            'post_places.average_rating as post_place_average_rating',
        )->join('post_places', 'ratings.post_place_id', '=', 'post_places.id')->get();
        return response()->json($ratings);
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
     */ //'post_place_average_rating' => 'required|decimal:1',

     public function store(Request $request) { 

        \Log::info('Método store llamado', ['request' => $request->all()]); // Validar los datos de entrada 
        $validator = Validator::make($request->all(), [ 
            'user_id' => 'required|exists:users,id', 
            'post_place_id' => 'required|exists:post_places,id', 
            'rating' => 'required|integer|min:1|max:5',
            'post_place_average_rating' => 'required',
        ]); 
        if ($validator->fails()) { \Log::warning('Validación fallida', 
            ['errors' => $validator->errors()]); return response()->json(['error' => $validator->errors()], 422); 
        } 

        // Verificar si el usuario ya ha calificado el lugar 
        $existingRating = Rating::where('user_id', $request->input('user_id')) 
        ->where('post_place_id', $request->input('post_place_id')) 
        ->first(); 
        if ($existingRating) { 

            //Actualizar el rating existente
            $existingRating->update(['rating' => $request->input('rating')]); 

            //Actualizar el rating promedio en la tabla post_place 
            $postPlace = Post_place::find($request->input('post_place_id')); 
            $postPlace->average_rating = $request->input('post_place_average_rating'); 
            $postPlace->save();

            return response()->json(['message' => 'Rating updated successfully', 'data' => $existingRating, 'post_place_average_rating' => $postPlace->average_rating], 200); 
        }

        // Crear el nuevo rating en la base de datos
        $rating = Rating::create([
            'user_id' => $request->input('user_id'),
            'post_place_id' => $request->input('post_place_id'),
            'rating' => $request->input('rating'),
        ]);

        //Actualizar el rating promedio en la tabla post_place 
        $postPlace = Post_place::find($request->input('post_place_id')); 
        $postPlace->average_rating = $request->input('post_place_average_rating'); 
        $postPlace->save();

        return response()->json(['message' => 'Rating created successfully', 'data' => $rating, 'post_place_average_rating' => $postPlace->average_rating], 201);

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
    public function update(Request $request, string $id)
    {

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
