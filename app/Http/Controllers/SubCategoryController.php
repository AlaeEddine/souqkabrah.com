<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Ad;

class SubCategoryController extends Controller{
    public function home(Request $request) {
        if($request->SubCategory != null) { $request->SubCategory = e($request->SubCategory); }else{ $request->SubCategory = 0; }
        $SubCategoriesQuery = SubCategory::where([
            ['id','=', e($request->SubCategory)],
            ['removed','=',0]
        ]);
        if($SubCategoriesQuery->count() > 0){
            return view('pages.subcategory.index',[
                'Category' => Category::where('id',e($request->Category))->first(),
                'SubCategory' => $SubCategoriesQuery->first(),
                'SubSubCategories' => SubSubCategory::where([['category','=', e($request->Category)],['subcategory','=', e($request->SubCategory)],['removed','=',0]])->get(),
                'AdsCount' => Ad::where([['id_category','=', e($request->Category)],['id_subcategory','=', e($request->SubCategory)],['valide','=',1],['removed','=',0]])->count(),
                'Ads' => Ad::where([['id_category','=', e($request->Category)],['id_subcategory','=', e($request->SubCategory)],['valide','=',1],['removed','=',0]])->get(),
            ]);
        }else{
            abort('404');
        }
    }
}
