<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Canton;
use App\Models\District;
use App\Models\Company;

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

    public function getItems($idCategory, $idSubCategory, $idCanton, $idDistrict,$id)
    {
       
        $items = Company::select(
            'companies.id',
            'companies.name',
            'companies.phone_number',
            'companies.user_type_id',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.email',
            'companies.description',
            'companies.image',
            'cantons.name as canton_id',
            'districts.name as district_id',
            'companies.latitude',
            'companies.longitude',
            'companies.followers_count',
            'favorite_post_places.id as favorite'
        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->when($idCategory != 0, function($query) use ($idCategory) {
            return $query->where('companies.category_id', $idCategory);
        })
        ->when($idSubCategory != 0, function($query) use ($idSubCategory) {
            return $query->where('companies.sub_categories_id', $idSubCategory);
        })
        ->when($idCanton != 0, function($query) use ($idCanton) {
            return $query->where('companies.canton_id', $idCanton);
        })
        ->when($idDistrict != 0, function($query) use ($idDistrict) {
            return $query->where('companies.district_id', $idDistrict);
        })
        ->leftJoin('favorite_post_places', function($join) use ($id) {
            $join->on('companies.id', '=', 'favorite_post_places.company_id')
                 ->where('favorite_post_places.user_id', '=', $id);
        })
        ->get();

        foreach ($items as $activity) {
            $activity->image = "https://myescape.online/imgs/".$activity->image;
        }
        
         return response()->json($items,200, [], JSON_UNESCAPED_UNICODE);
    }

    public function getFavoriteFilter($idCategory, $idSubCategory, $idCanton, $idDistrict, $user_id)
    {
       
        $items = Company::select(
            'companies.id',
            'companies.name',
            'companies.phone_number',
            'companies.user_type_id',
            'categories.name as category_id',
            'sub_categories.name as sub_category_id',
            'companies.email',
            'companies.description',
            'companies.image',
            'cantons.name as canton_id',
            'districts.name as district_id',
            'companies.latitude',
            'companies.longitude',
            'companies.followers_count',
            'favorite_post_places.id as favorite'
        )
        ->join('categories', 'companies.category_id', '=', 'categories.id')
        ->join('sub_categories', 'companies.sub_categories_id', '=', 'sub_categories.id')
        ->join('cantons', 'companies.canton_id', '=', 'cantons.id')
        ->join('districts', 'companies.district_id', '=', 'districts.id')
        ->join('favorite_post_places', 'companies.id', '=', 'favorite_post_places.company_id')  // Aquí está la corrección

        ->when($idCategory != 0, function($query) use ($idCategory) {
            return $query->where('companies.category_id', $idCategory);
        })
        ->when($idSubCategory != 0, function($query) use ($idSubCategory) {
            return $query->where('companies.sub_categories_id', $idSubCategory);
        })
        ->when($idCanton != 0, function($query) use ($idCanton) {
            return $query->where('companies.canton_id', $idCanton);
        })
        ->when($idDistrict != 0, function($query) use ($idDistrict) {
            return $query->where('companies.district_id', $idDistrict);
        })
        ->where('favorite_post_places.user_id', $user_id)

        ->get();

        foreach ($items as $activity) {
            $activity->image = "https://myescape.online/imgs/".$activity->image;
        }
        
         return response()->json($items,200, [], JSON_UNESCAPED_UNICODE);
    }
}
