<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search_history;
use App\Models\Company;

class SearchController extends Controller
{
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'search_term' => 'required|string|max:255',
            ]);

            $userId = auth()->check() ? auth()->id() : null;

            Search_history::create([
                'search_term' => $request->search_term,
                'user_id' => $userId, 
                'searched_at' => now(),
            ]);

            return response()->json(['message' => 'Search term stored successfully'], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function recent()
    {
        $recentSearches = Search_history::orderBy('searched_at', 'desc')
                      ->take(4)
                      ->select('id', 'search_term')
                      ->get();

    return response()->json($recentSearches);
    }

    public function getSuggestions(Request $request)
    {
        $request->validate([
            'query' => 'required|string|min:1',
        ]);

        $query = $request->input('query');

        $companies = Company::where('name', 'like', '%' . $query . '%')
                            ->take(5)
                            ->pluck('name');

        return response()->json($companies);
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $search = Search_history::find($id);
    
        if ($search) {
            $search->delete();
            return response()->json(['message' => 'Búsqueda eliminada con éxito.'], 200);
        } else {
            return response()->json(['message' => 'Búsqueda no encontrada.'], 404);
        }
    }

}
