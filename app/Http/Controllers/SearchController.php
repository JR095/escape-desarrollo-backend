<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Search_history;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SearchController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'search_term' => 'required|string|max:255',
            'user_id' => 'nullable|exists:users,id',
            'company_id' => 'nullable|exists:companies,id'
        ]);

        $search = new Search_history();
        $search->search_term = $request->input('search_term');
        $search->searched_at = now();
        $search->save();

        if ($request->user_id) {
            $search->user_id = $request->user_id;
        } elseif ($request->company_id) {
            $search->company_id = $request->company_id;
        } else {
            return response()->json(['error' => 'User ID or Company ID is required'], 400);
        }

        $search->save();

        return response()->json(['message' => 'Search term stored successfully'], 200);
    }

    public function recent(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'company_id' => 'nullable|exists:companies,id'
        ]);

        $userId = $request->query('user_id');
        $companyId = $request->query('company_id');

        if ($userId) {
            $recentSearches = Search_history::where('user_id', $userId)
                ->orderBy('searched_at', 'desc')
                ->take(4)
                ->select('id', 'search_term')
                ->get();
        } elseif ($companyId) {
            $recentSearches = Search_history::where('company_id', $companyId)
                ->orderBy('searched_at', 'desc')
                ->take(4)
                ->select('id', 'search_term')
                ->get();
        }
        else {
            return response()->json([],404);
        }

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
