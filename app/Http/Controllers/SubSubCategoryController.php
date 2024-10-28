<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Ad;

class SubSubCategoryController extends Controller{
    public function home(Request $request) {
        if($request->SubSubCategory != null) { $request->SubSubCategory = e($request->SubSubCategory); }else{ $request->SubSubCategory = 0; }
        $SubSubCategoriesQuery = SubSubCategory::where([
            ['id','=', e($request->SubSubCategory)],
            ['removed','=',0]
        ]);
        if($SubSubCategoriesQuery->count() > 0){
            return view('pages.subsubcategory.index',[
                'Category' => Category::where('id',e($request->Category))->first(),
                'SubCategory' => SubCategory::where('id',e($request->SubCategory))->first(),
                'SubSubCategory' => $SubSubCategoriesQuery->first(),
                'AdsCount' => Ad::where([['id_category','=', e($request->Category)],['id_subcategory','=', e($request->SubCategory)],['id_subsubcategory','=', e($request->SubSubCategory)],['valide','=',1],['removed','=',0]])->count(),
                'Ads' => Ad::where([['id_category','=', e($request->Category)],['id_subcategory','=', e($request->SubCategory)],['id_subsubcategory','=', e($request->SubSubCategory)],['valide','=',1],['removed','=',0]])->get(),
            ]);
        }else{
            abort('404');
        }
    }
}
