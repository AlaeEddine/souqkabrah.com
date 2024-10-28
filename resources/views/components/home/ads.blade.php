<div class="product-area mt-4 mx-4">
    <div class="">
       <div class="row mb-3">
            @foreach(App\Models\Category::where('removed',0)->get() as $Category)
                @if($Category->id != 2)
                <hr>
                    <div class="row mt-3">
                        <div class="col-6 @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') text-end @else text-start @endif"><h6>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar') {!! Purifier::clean($Category->name_1) !!} @else {!! Purifier::clean($Category->name_2) !!} @endif</h6></div>
                        <div class="col-6 @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') text-start @else text-end @endif"><a href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}"><h6>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar') المزيد <i class="fa fa-arrow-left"></i> @else More <i class="fa fa-arrow-right"></i>@endif</h6></a></div>
                    </div>
                    @if($Category->has_sub_category == 1)
                    <div class="row">
                        <div class="col-12">
                            @foreach(App\Models\SubCategory::where('category',e($Category->id))->get()->skip(0)->take(2) as $SubCategory)
                                <a href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}" class="gray btn m-1" style="padding-top:1px;padding-bottom:1px">@if(Illuminate\Support\Facades\App::isLocale('ar')){!! Purifier::clean($SubCategory->name_1) !!}@else{!! Purifier::clean($SubCategory->name_2) !!}@endif</a>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <?php $COMPTEUR_ADS = 0; 
                            if(session('selector.city.id') != null && session('selector.city.id') != 0 && session('selector.city.id') != "0"):
                            $ADSQuery = App\Models\Ad::where([
                                ['valide','=',1],
                                ['id_city','=', e(session('selector.city.id'))],
                                ['banned', '!=',1],
                                ['removed','=',0]
                            ])->get();
                        else:
                            $ADSQuery = App\Models\Ad::where([
                                ['valide','=',1],
                                ['banned', '!=',1],
                                ['removed','=',0]
                            ])->get();
                        endif; ?>
                    <div class="row">
                        
                        @foreach ($ADSQuery as $Ad)
                            @if($Ad->id_category == $Category->id && $COMPTEUR_ADS<4)
                            <?php $COMPTEUR_ADS++; ?>
                                <x-ads.adscard :Ad=$Ad />
                            @endif
                        @endforeach
                    </div>
                    @if($COMPTEUR_ADS ==0)
                        <br><div class="alert alert-primary"><h6><i class="fa fa-circle-info"></i> {{__('لا يوجد أي منتج في هذا القسم')}}</h6></div>
                    @endif
                @endif
            @endforeach
       </div>
       <hr>

       <div class="row">
        <div class="row mt-3">
            <div class="col-6 @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') text-end @else text-start @endif"><h5>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar') جميع الأقسام @else All Categories @endif</h5></div>
            <div class="col-6 @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') text-start @else text-end @endif"><a href="/الأقسام"><h5>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar') المزيد <i class="fa fa-arrow-left"></i> @else More <i class="fa fa-arrow-right"></i>@endif</h5></a></div>
        </div>
        <?php $COMPTEUR_ADS = 0; 
        if(session('selector.city.id') != null && session('selector.city.id') != 0 && session('selector.city.id') != "0"):
            $ADSQuery = App\Models\Ad::where([
                ['valide','=',1],
                ['id_city','=', e(session('selector.city.id'))],
                ['banned', '!=',1],
                ['removed','=',0]
            ])->get();
        else:
            $ADSQuery = App\Models\Ad::where([
                ['valide','=',1],
                ['banned', '!=',1],
                ['removed','=',0]
            ])->get();
        endif; ?>
        @foreach ($ADSQuery as $Ad)
        @if($COMPTEUR_ADS<4)
            <?php $COMPTEUR_ADS++; ?>
                <x-ads.adscard :Ad=$Ad />
            @endif
        @endforeach

       </div>
    </div>
</div>
