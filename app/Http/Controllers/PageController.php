<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PageController extends Controller
{
    public function pages(Request $request) {
        $PageQuery = Page::where([
            ['url','=', e($request->url)],
            ['valide','=','1'],
            ['removed','=','0'],
        ]);
        if($PageQuery->count() > 0) {
            return view('pages.pages.index',[
                'Page' => $PageQuery->first(),
            ]);

        }else{
            return redirect(route('error404'));

        }
    }
}
