<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Canton;
use App\Models\District;

class CategoryController extends Controller
{
    public function categories(){

        $categories = Category::select('id', 'name')->get();
        return response()->json($categories,200, [], JSON_UNESCAPED_UNICODE);
    }

    public function show($id)
    {
        $subcategories = SubCategory::select('sub_categories.id', 'sub_categories.name')
        ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
        ->where('categories.id', $id)
        ->get();
         return response()->json($subcategories,200, [], JSON_UNESCAPED_UNICODE);
    }

    public function canton(){
        $canton = Canton::select('id', 'name')->get();
        return response()->json($canton ,200, [], JSON_UNESCAPED_UNICODE);
    }


    public function district($id)
    {
        $district = District::select('districts.id', 'districts.name')
        ->join('cantons', 'districts.canton_id', '=', 'cantons.id')
        ->where('cantons.id', $id)
        ->get();
         return response()->json($district,200, [], JSON_UNESCAPED_UNICODE);
    }
}
