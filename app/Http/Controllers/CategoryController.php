<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Ad;

class CategoryController extends Controller
{

    public function allcategories(Request $request){
        $CategoriesQuery = Category::where([
            ['removed','=',0]
        ]);
        return view('pages.category.all',[
            'Categories' => $CategoriesQuery->get(),
            'SubCategories' => SubCategory::where([['removed','=',0]])->get(),
            'SubSubCategories' => SubCategory::where([['removed','=',0]])->get(),
            'Ads' => Ad::where([['removed','=',0],['banned', '!=',1]])->get(),
        ]);
    }

    public function home(Request $request) {
        if($request->Category != null) { $request->Category = e($request->Category); }else{ $request->Category = 0; }
        $CategoriesQuery = Category::where([
            ['id','=', e($request->Category)],
            ['removed','=',0]
        ]);
        if($CategoriesQuery->count() > 0){
            return view('pages.category.index',[
                'Category' => $CategoriesQuery->first(),
                'SubCategories' => SubCategory::where([['category','=', e($request->Category)],['removed','=',0]])->get(),
                'AdsCount' => Ad::where([['id_category','=', e($request->Category)],['valide','=',1],['removed','=',0]])->count(),
                'Ads' => Ad::where([['id_category','=', e($request->Category)],['valide','=',1],['removed','=',0]])->get(),
            ]);
        }else{
            abort('404');
        }
    }
}
