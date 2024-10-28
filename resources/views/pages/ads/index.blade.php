@extends('layouts.website')
@section('content')

<div class="row">
    <div class="col-4 col-md-2">
        @if($Ad->id_subsubcategory != 0 && $Ad->id_subsubcategory != null )
        <a href="/الأقسام/{{ $Ad->id_category }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}/{{ $Ad->id_subcategory }}-{{ App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1) }}/{{ $Ad->id_subsubcategory }}-{{ App\Http\Controllers\UserController::slug(App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_1) }}" class="black"><i class="fa fa-arrow-right"></i> {{ __('الرجوع إلى البحث') }}</a>
        @elseif($Ad->id_subcategory != 0 && $Ad->id_subcategory != null )
        <a href="/الأقسام/{{ $Ad->id_category }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}/{{ $Ad->id_subcategory }}-{{ App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1) }}" class="black"><i class="fa fa-arrow-right"></i> {{ __('الرجوع إلى البحث') }}</a>
        @elseif($Ad->id_category != 0 && $Ad->id_category != null )
        <a href="/الأقسام/{{ $Ad->id_category }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}" class="black"><i class="fa fa-arrow-right"></i> {{ __('الرجوع إلى البحث') }}</a>
        @endif
    </div>
    <div class="col-8 col-md-8">
        <a href="" class="black" style="font-weight: normal">{{ App\Models\City::where('id',e($Ad->id_city))->get()->first()->name_ar }}</a> /
        @if($Ad->id_category != 0 && $Ad->id_category != null )
        <a href="/الأقسام/{{ $Ad->id_category }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}" class="black" style="font-weight: normal">{{ App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1 }}</a>
        @endif
        @if($Ad->id_subcategory != 0 && $Ad->id_subcategory != null )
        / <a href="/الأقسام/{{ $Ad->id_category }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}/{{ $Ad->id_subcategory }}-{{ App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1) }}" class="black" style="font-weight: normal">{{ App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1 }}</a>
        @endif
        @if($Ad->id_subsubcategory != 0 && $Ad->id_subsubcategory != null )
        / <a href="/الأقسام/{{ $Ad->id_category }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}/{{ $Ad->id_subcategory }}-{{ App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1) }}/{{ $Ad->id_subsubcategory }}-{{ App\Http\Controllers\UserController::slug(App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_1) }}" class="black" style="font-weight: normal">{{ App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_1 }}</a>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-12">
        <h2 class="mt-4 mb-4">{{ e($Ad->title) }}</h2>

        <div class="col-12">
            @if(session('success'))
                <div class="mt-4"><div class="m-2 alert alert-success">{{e(session('success'))}}</div></div>
            @endif
            @if(session('error'))
                <div class="mt-4"><div class="m-2 alert alert-danger"><i class="fa fa-warning"></i> {{e(session('error'))}}</div></div>
            @endif
            @if($Ad->valide != 1)
            <div class="mt-4">
                <div class="m-2 alert alert-info"><i class="fa fa-info-circle"></i> {{ __('الإعلان قيد المراجعة من طرف الإدارة. سيتم تفعيله إن توافق مع شروط الإستخدام') }}</div>
            </div>
            @endif
            <div class="col-12">
                <a data-bs-toggle="modal" data-bs-target="#ShareAds" class="btn btn-outline-dark p-2 m-2"><i class="fa fa-arrow-up-from-bracket"></i> {{ __('شارك الإعلان') }}</a>
                @if(Auth::check() && session('user.id') != null && $Ad->id_owner == session('user.id'))
                    <a href="{{ route('premium') }}" target="_BLANK" class="btn btn-outline-dark p-2 m-2"><i class="fa fa-chart-line text-primary"></i> {{ __('تمييز الإعلان') }}</a>
                    <a href="{{ route('premium') }}" target="_BLANK" class="btn btn-outline-dark p-2 m-2"><i class="fa fa-repeat text-primary"></i> {{ __('إعادة نشر الإعلان') }}</a>
                @else 
                <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('likes.add',[$Ad->id]) }}" @endif class="btn btn-outline-dark p-2 m-2"><i class="fa-regular text-danger fa-heart"></i> {{ __('أضف إلى المفضلة') }}</a>
                @endif
            </div>
                <div class="modal fade" dir="ltr" id="ShareAds" tabindex="-1" aria-labelledby="ShareAdsLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ShareAdsLabel">{{ __('شارك الإعلان') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center" dir="rtl">
                                <div class="col-md-3 col-12 text-center mb-3" style="cursor: pointer" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}','_blank')"><br>
                                    <h1 class="mb-2"><i class="fab fa-facebook fa-2xl" style="color:#1877F2"></i></h1><br>
                                    <p class="black">{{ __('فيسبوك') }}</p>
                                </div>
                                <div class="col-md-3 col-12 text-center mb-3" style="cursor: pointer" onclick="window.open('https://twitter.com/intent/tweet?text={{ url()->current() }}','_blank')"><br>
                                    <h1 class="mb-2"><i class="fab fa-twitter fa-2xl" style="color:#46C1F6"></i></h1><br>
                                    <p class="black">{{ __('تويتر') }}</p>
                                </div>
                                <div class="col-md-3 col-12 text-center mb-3" style="cursor: pointer" onclick="window.open('https://wa.me/?text={{ url()->current() }}','_blank')"><br>
                                    <h1 class="mb-2"><i class="fab fa-whatsapp fa-2xl" style="color:#25D366"></i></h1><br>
                                    <p class="black">{{ __('واتساب') }}</p>
                                </div>
                                <div class="col-md-3 col-12 text-center mb-3" style="cursor: pointer" onclick="window.open('mailto:{{ e(session('user.email')) }}?subject={{ url()->current() }}','_blank')"><br>
                                    <h1 class="mb-2"><i class="fa fa-envelope fa-2xl" style="color:#e1306c"></i></h1><br>
                                    <p class="black">{{ __('البريد الإلكتروني') }}</p>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="input-group field mb-3">
                                    <input type="text" class="form-control input" readonly value="{{ url()->current() }}">
                                    <button class="copy btn btn-outline-secondary">{{ __('انسخ الرابط') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-sm-6 col-12"></div>
    <div class="col-md-2 col-sm-6 col-12 text-muted text-end" dir="rtl">{{date('d/m/Y',strtotime($Ad->created_at))}}</div>
</div>
<hr>
<div class="row">
    <div class="col-lg-8 col-12 ">
        @if($Ad->cover != null || $Ad->picture1 != null  || $Ad->picture2 != null || $Ad->picture3 != null || $Ad->picture4 != null || $Ad->picture5 != null || $Ad->picture6 != null || $Ad->picture7 != null || $Ad->picture8 != null || $Ad->picture9 != null || $Ad->picture10 != null || $Ad->picture11 != null || $Ad->picture12 != null || $Ad->picture13 != null || $Ad->picture14 != null || $Ad->picture15 != null || $Ad->picture16 != null || $Ad->picture17 != null || $Ad->picture18 != null || $Ad->picture19 != null || $Ad->picture20 != null || $Ad->picture21 != null || $Ad->picture22 != null || $Ad->picture23 != null || $Ad->picture24 != null || $Ad->picture25 != null || $Ad->picture26 != null || $Ad->picture27 != null || $Ad->picture28 != null || $Ad->picture29 != null || $Ad->picture30 != null )
        <div id="carouselExampleRide" class="carousel gray carousel-dark slide" data-bs-ride="true">
            <div class="carousel-inner">
                <?php $CompteurPictures = 0; ?>
                @if($Ad->cover != null)
                <?php $CompteurPictures +=1; ?>
                <div class="carousel-item active">
                    <img src="{{ e($Ad->cover) }}" class="d-none d-md-block w-100 img-responsive" style="height:614px" height="614" alt="{{ e($Ad->title) }}">
                    <img src="{{ e($Ad->cover) }}" class="d-md-none d-xs-block w-100 img-responsive" alt="{{ e($Ad->title) }}">
                </div>
                @endif
                @for($i = 1; $i<=30;$i++)
                    @if( $Ad->{'picture'.$i} != null)
                    <?php $CompteurPictures +=1; ?>
                    <div class="carousel-item">
                        <img src="{{ $Ad->{'picture'.$i} }}" class="d-none d-md-block w-100 img-responsive" alt="{{ e($Ad->title) }}" style="height:614px" height="614">
                        <img src="{{ $Ad->{'picture'.$i} }}" class="d-md-none d-xs-block w-100 img-responsive" alt="{{ e($Ad->title) }}">
                    </div>
                    @endif
                @endfor
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <span class="badge bg-dark"><i class="fa fa-image"></i> {{ $CompteurPictures }}</span>
        @endif
        <div class="card mt-2 mb-2 mx-2">
            <h4>{{ __('المعلومات') }}</h4>
            <div class="row">
                <?php
                $COUNTRY_NAME = e(App\Models\Country::where('id',e($Ad->id_country))->get()->first()->name_ar);
                $COUNTRY_NAME_URL = App\Http\Controllers\UserController::slug($COUNTRY_NAME);
                $CITY_NAME = e(App\Models\City::where('id',e($Ad->id_city))->get()->first()->name_ar);
                $CITY_NAME_URL = App\Http\Controllers\UserController::slug($CITY_NAME);
                if($Ad->id_village != null && $Ad->id_village != 0):
                    $VILLAGE_NAME = " - ".e(App\Models\Village::where('id',e($Ad->id_village))->get()->first()->name_ar);
                    $VILLAGE_NAME_URL = App\Http\Controllers\UserController::slug($VILLAGE_NAME);
                else:
                    $VILLAGE_NAME = "";
                    $VILLAGE_NAME_URL = "";
                endif;
            ?>
                @if($Ad->shipping != null)
                    <div class="col-md-3 col-sm-6 col-6"><b>{{ __('هل لديك خدمة توصيل؟') }}</b></div>
                    <div class="col-md-3 col-sm-6 col-6">@if($Ad->shipping == 1) {{ __('نعم') }}@else{{ __('لا') }}@endif</div>
                @endif
                @if($Ad->hala != null)
                    <div class="col-md-3 col-sm-6 col-6"><b>{{ __('الحالة') }}</b></div>
                    <div class="col-md-3 col-sm-6 col-6">@if($Ad->hala == 1) {{ __('جديد') }}@else{{ __(('مستعل')) }}@endif</div>
                @endif
                <div class="col-md-3 col-sm-6 col-6"><b>{{ __('القسم الرئيسي') }}</b></div>
                <div class="col-md-3 col-sm-6 col-6">
                    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                        {{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}
                    @else
                        {{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_2) }}
                    @endif
                </div>
                @if($Ad->id_subcategory != 0 && $Ad->id_subcategory != null )
                    <div class="col-md-3 col-sm-6 col-6"><b>{{ __('القسم الفرعي') }}</b></div>
                    <div class="col-md-3 col-sm-6 col-6">
                        @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                            {{ App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1) }}
                        @else
                            {{ App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_2) }}
                        @endif
                    </div>
                @endif
                @if($Ad->id_subsubcategory != 0 && $Ad->id_subsubcategory != null )
                    <div class="col-md-3 col-sm-6 col-6"><b>{{ __('القسم الفرعي الثانوي') }}</b></div>
                    <div class="col-md-3 col-sm-6 col-6">
                        @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                            {{ App\Http\Controllers\UserController::slug(App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_1) }}
                        @else
                            {{ App\Http\Controllers\UserController::slug(App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_2) }}
                        @endif
                    </div>
                @endif
                <div class="col-md-3 col-sm-6 col-6"><b>{{ __('المدينة') }}</b></div>
                <div class="col-md-3 col-sm-6 col-6">{{ e($CITY_NAME)}}</div>
                @if($VILLAGE_NAME != '')
                <div class="col-md-3 col-sm-6 col-6"><b>{{ __('الحي / المنطقة') }}</b></div>
                <div class="col-md-3 col-sm-6 col-6">{{ str_replace('-','',$VILLAGE_NAME)}}</div>
                @endif
                @if($Ad->id_category == 1)
                   @if(App\Models\CarsData::where('id_ads',$Ad->id)->count() >0)
                        <?php $CAR_DATA = App\Models\CarsData::where('id_ads',$Ad->id)->get()->first(); ?>
                        @if($CAR_DATA->new_or_not != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('جديد أو قديم') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">@if($CAR_DATA->new_or_not == 1) {{ __('جديد') }} @else {{ __('قديم') }} @endif</div>
                        @endif
                        @if($CAR_DATA->id_brand != null && App\Models\CarsBrand::where('id',$CAR_DATA->id_brand)->count()>0)
                            <?php $CAR_BRAND = App\Models\CarsBrand::where('id',$CAR_DATA->id_brand)->get()->first(); ?>
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('النوع') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_BRAND->name_ar}}</div>
                        @endif
                        @if($CAR_DATA->model != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('موديل') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->model}}</div>
                        @endif
                        @if($CAR_DATA->submodel != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('الفئة') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->submodel}}</div>
                        @endif
                        @if($CAR_DATA->year != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('سنة الصنع') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->year}}</div>
                        @endif
                        @if($CAR_DATA->submodel != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('مواصفات إقليمية') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->submodel}}</div>
                        @endif
                        @if($CAR_DATA->etat != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('الحالة') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->etat}}</div>
                        @endif
                        @if($CAR_DATA->km != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('الكيلومترات') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->km}}</div>
                        @endif
                        @if($CAR_DATA->painting != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('الدهان') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->painting}}</div>
                        @endif
                        @if($CAR_DATA->chassis_condition != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('حالة الهيكل') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->chassis_condition}}</div>
                        @endif
                        @if($CAR_DATA->manual_or_automatic != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('نوع ناقل الحركة') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->manual_or_automatic}}</div>
                        @endif
                        @if($CAR_DATA->gazoil_or_not != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('نوع الوقود') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->gazoil_or_not}}</div>
                        @endif
                        @if($CAR_DATA->motor_cc != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{__('سعة المحرك (سي سي)')}}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->motor_cc}}</div>
                        @endif
                        @if($CAR_DATA->battery_size != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('سعة البطارية') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->battery_size}}</div>
                        @endif
                        @if($CAR_DATA->battery_life != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('مدى البطارية') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->battery_life}}</div>
                        @endif
                        @if($CAR_DATA->color_external != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('اللون الخارجي') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->color_external}}</div>
                        @endif
                        @if($CAR_DATA->color_internal != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('اللون الداخلي') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->color_internal}}</div>
                        @endif
                        @if($CAR_DATA->chassis_number != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('رقم الشاصي') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->chassis_number}}</div>
                        @endif
                        @if($CAR_DATA->technical_details != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('مواصفات  تقنية') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->technical_details}}</div>
                        @endif
                        @if($CAR_DATA->chairs_number != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('عدد المقاعد') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->chairs_number}}</div>
                        @endif
                        @if($CAR_DATA->bodywork != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('نوع الهيكل') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->bodywork}}</div>
                        @endif
                        @if($CAR_DATA->details_external != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('مواصفات  خارجية') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->details_external}}</div>
                        @endif
                        @if($CAR_DATA->details_internal != null)
                            <div class="col-md-3 col-sm-6 col-6"><b>{{ __('مواصفات  داخلية') }}</b></div>
                            <div class="col-md-3 col-sm-6 col-6">{{$CAR_DATA->details_internal}}</div>
                        @endif
                    @endif
                    
                    
                @endif





            </div>
        </div>
        <h4>{{ __('الوصف') }}</h4>
        <hr>
        <p>{!!  Purifier::clean($Ad->details) !!}</p>
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        {{ __('إعلان رقم') }} : {{ $Ad->id }}
                    </div>
                    <div class="col-6 text-start">
                        <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('report.ads',[$Ad->id]) }}" @endif class="text-danger" style="text-decoration:none;"><i class="fa fa-flag text-danger"></i> {{ __('بلغ عن إساءة') }}</a>
                    </div>
                </div>
            </div>
         </div>
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <?php $ADS_BEFORE = App\Models\Ad::where('id',($Ad->id-1)); $ADS_AFTER = App\Models\Ad::where('id',($Ad->id+1)); ?>
                        @if($ADS_BEFORE->count()>0)
                        <?php if($ADS_BEFORE->get()->first()->id_category == 0):
                            $ProductUrlBefore = route('ads.show',[($Ad->id-1), App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->title)]);
                        else:
                            if($ADS_BEFORE->get()->first()->id_subcategory == 0):
                                $ProductUrlBefore = route('ads.with.category.show',[$ADS_BEFORE->get()->first()->id_category, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->name_category),$ADS_BEFORE->get()->first()->id, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->title)]);
                            else:
                                if($ADS_BEFORE->get()->first()->id_subsubcategory == 0):
                                    $ProductUrlBefore = route('ads.with.subcategory.show',[$ADS_BEFORE->get()->first()->id_subcategory, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->name_subcategory),$ADS_BEFORE->get()->first()->id_category, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->name_category),$ADS_BEFORE->get()->first()->id, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->title)]);
                                else:
                                    $ProductUrlBefore = route('ads.with.subsubcategory.show',[$ADS_BEFORE->get()->first()->id_subsubcategory, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->name_subsubcategory),$ADS_BEFORE->get()->first()->id_subcategory, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->name_subcategory),$ADS_BEFORE->get()->first()->id_category, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->name_category),$ADS_BEFORE->get()->first()->id, App\Http\Controllers\UserController::slug($ADS_BEFORE->get()->first()->title)]);
                                endif;
                            endif;
                        endif; ?>
                        <a href="{{ $ProductUrlBefore }}" class="black" style="font-weight: normal"><b><i class="fa fa-angle-right"></i></b> {{ __('الإعلان السابق') }}</a>
                        @else
                        <a class="black" style="font-weight: normal"><b><i class="fa fa-angle-right"></i></b> {{ __('الإعلان السابق') }}</a>
                        @endif
                    </div>
                    <div class="col-6 text-start">
                        <?php $ADS_AFTER = App\Models\Ad::where('id',($Ad->id-1)); $ADS_AFTER = App\Models\Ad::where('id',($Ad->id+1)); ?>
                        @if($ADS_AFTER->count()>0)
                        <?php if($ADS_AFTER->get()->first()->id_category == 0):
                            $ProductUrlAfter = route('ads.show',[($Ad->id-1), App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->title)]);
                        else:
                            if($ADS_AFTER->get()->first()->id_subcategory == 0):
                                $ProductUrlAfter = route('ads.with.category.show',[$ADS_AFTER->get()->first()->id_category, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->name_category),$ADS_AFTER->get()->first()->id, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->title)]);
                            else:
                                if($ADS_AFTER->get()->first()->id_subsubcategory == 0):
                                    $ProductUrlAfter = route('ads.with.subcategory.show',[$ADS_AFTER->get()->first()->id_subcategory, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->name_subcategory),$ADS_AFTER->get()->first()->id_category, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->name_category),$ADS_AFTER->get()->first()->id, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->title)]);
                                else:
                                    $ProductUrlAfter = route('ads.with.subsubcategory.show',[$ADS_AFTER->get()->first()->id_subsubcategory, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->name_subsubcategory),$ADS_AFTER->get()->first()->id_subcategory, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->name_subcategory),$ADS_AFTER->get()->first()->id_category, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->name_category),$ADS_AFTER->get()->first()->id, App\Http\Controllers\UserController::slug($ADS_AFTER->get()->first()->title)]);
                                endif;
                            endif;
                        endif; ?>
                        <a href="{{ $ProductUrlAfter }}" class="black" style="font-weight: normal">{{ __('الإعلان التالي') }} <b><i class="fa fa-angle-left"></i></b></a>
                        @else
                        <a class="black" style="font-weight: normal">{{ __('الإعلان التالي') }} <b><i class="fa fa-angle-left"></i></b></a>
                        @endif
                    </div>
                </div>
            </div>
         </div>
         <h4 class="mt-4">{{ __('إسأل صاحب الإعلان') }}</h4>
         <hr>
        @foreach (App\Models\Automessage::where('removed',0)->get() as $AutoMessage)
            <a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('chat.send.automessage',[$Ad->id,$AutoMessage->id]) }}" @endif style="text-decoration: none"><span class="badge bg-info p-2 text-dark" style="font-weight: normal">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar') {{ e($AutoMessage->message_1) }} @else {{ e($AutoMessage->message_2) }} @endif </span></a>
        @endforeach
         <h4 class="mt-4">{{ __('إعلانات مشابهة') }}</h4>
         <div class="row container">
            @if($Ad->id_category != 0 && $Ad->id_category != null )
                <?php $CONDITIONS_SAME_ADS = [
                    ['banned', '!=',1],
                    ['removed','=',0],
                    ['id','!=', e($Ad->id)],
                    ['id_category', '=', e($Ad->id_category)],
                    ['title', 'LIKE', '%'.e($Ad->title).'%'],
                ];
                $URL_SAME_ADS = "/الأقسام/$Ad->id_category-".App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1); ?>
            @endif
            @if($Ad->id_subcategory != 0 && $Ad->id_subcategory != null )
                <?php $CONDITIONS_SAME_ADS = [
                    ['banned', '!=',1],
                    ['removed','=',0],
                    ['id','!=', e($Ad->id)],
                    ['id_subcategory', '=', e($Ad->id_subcategory)],
                    ['title', 'LIKE', '%'.e($Ad->title).'%'],
                ];
                $URL_SAME_ADS = "/الأقسام/$Ad->id_category-".App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1)."/$Ad->id_subcategory-".App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1); ?>
            @endif
            @if($Ad->id_subsubcategory != 0 && $Ad->id_subsubcategory != null )
                <?php $CONDITIONS_SAME_ADS = [
                    ['banned', '!=',1],
                    ['removed','=',0],
                    ['id','!=', e($Ad->id)],
                    ['id_subsubcategory', '=', e($Ad->id_subsubcategory)],
                    ['title', 'LIKE', '%'.e($Ad->title).'%'],
                ];
                $URL_SAME_ADS = "/الأقسام/$Ad->id_category-".App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1)."/$Ad->id_subcategory-".App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1)."/$Ad->id_subsubcategory-".App\Http\Controllers\UserController::slug(App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_1); ?>
            @endif

            @foreach(App\Models\Ad::where($CONDITIONS_SAME_ADS)->limit(6)->where('removed',0)->get() as $SameAds)
                <x-ads.adscard :Ad=$SameAds />
            @endforeach
        </div>
        <div class="row container">
            <a href="{{ $URL_SAME_ADS }}" style="font-weight: bold">{{ __('شاهد المزيد') }} <i class="fa fa-caret-down"></i></a>
        </div>
        <h4 class="mt-4">{{ __('إعلانات مقترحة') }}</h4>
        <div class="row container">
            @if($Ad->id_category != 0 && $Ad->id_category != null )
                <?php $CONDITIONS_SUGGESTIONS = [
                    ['banned', '!=',1],
                    ['removed','=',0],
                    ['id','!=', e($Ad->id)],
                    ['id_category', '=', e($Ad->id_category)]
                ];
                $URL_SUGGESTED = "/الأقسام/$Ad->id_category-".App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1); ?>
            @endif
            @if($Ad->id_subcategory != 0 && $Ad->id_subcategory != null )
                <?php $CONDITIONS_SUGGESTIONS = [
                    ['banned', '!=',1],
                    ['removed','=',0],
                    ['id','!=', e($Ad->id)],
                    ['id_subcategory', '=', e($Ad->id_subcategory)]
                ];
                $URL_SUGGESTED = "/الأقسام/$Ad->id_category-".App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1)."/$Ad->id_subcategory-".App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1); ?>
            @endif
            @if($Ad->id_subsubcategory != 0 && $Ad->id_subsubcategory != null )
                <?php $CONDITIONS_SUGGESTIONS = [
                    ['banned', '!=',1],
                    ['removed','=',0],
                    ['id','!=', e($Ad->id)],
                    ['id_subsubcategory', '=', e($Ad->id_subsubcategory)]
                ];
                $URL_SUGGESTED = "/الأقسام/$Ad->id_category-".App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1)."/$Ad->id_subcategory-".App\Http\Controllers\UserController::slug(App\Models\SubCategory::where('removed',0)->where('id',e($Ad->id_subcategory))->get()->first()->name_1)."/$Ad->id_subsubcategory-".App\Http\Controllers\UserController::slug(App\Models\SubSubCategory::where('removed',0)->where('id',e($Ad->id_subsubcategory))->get()->first()->name_1); ?>
            @endif
            @foreach(App\Models\Ad::where($CONDITIONS_SUGGESTIONS)->limit(6)->where('removed',0)->get() as $SuggestedAds)
                <x-ads.adscard :Ad=$SuggestedAds />
            @endforeach
        </div>
        <div class="row container">
            <a href="{{ $URL_SUGGESTED }}" style="font-weight: bold">{{ __('شاهد المزيد') }} <i class="fa fa-caret-down"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="text-danger"><b>
                    @if($Ad->price != null && $Ad->price !=0)
                        {{ number_format($Ad->price,0) }} {{ $Ad->name_currency }}
                    @else
                        {{ __('غير محدد') }}
                    @endif </b></h4>
                <h4 class="text-center"><a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('chat.ask.low.price',[$Ad->id]) }}" @endif>{{ __('أخبرني عندما يقل السعر') }}</a></h4>
                @if($User == null)
                <?php 
                    $User = App\Models\User::where('id',e($Ad->id_owner))->get()->first();
                ?>
                @endif
                <div class="phonebtn ">                    
                <?php
                    $UserID = e($Ad->id_owner);
                    if($User == null){
                        $UserInfos = App\Models\User::where('id',e($UserID))->get()->first();
                        if(App\Models\User::where('id',e($UserID))->count()>0):
                            $User = $UserInfos;
                        endif;
                    }
                ?> 
                    <a 
                        @if(!Auth::check()) 
                            data-bs-toggle="modal" data-bs-target="#LoginOrRegister" 
                        @else 
                            @if($User != null && $User->phone != null) 
                                onclick="getphonenumber('<?php echo e($User->phone) ?> ')" 
                            @endif 
                        @endif 
                        class="position-relative shineEffect btn btn-primary form-control mt-2 p-2 mb-2" dir="ltr"> 
                            <span class="phone">
                                @if($User->phone != null) 
                                    {{ e(substr($User->phone,0,-3)) }}XXX 
                                @else 
                                    {{__('غير محدد')}} 
                                @endif
                            </span> <i class="fa fa-phone"></i>
                    </a>
                </div>
                <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else data-bs-toggle="modal" data-bs-target="#ChatNew" @endif class="btn btn-outline-primary form-control mt-2 p-2 mb-2" dir="ltr">{{ __('دردش') }} <i class="fa fa-comments "></i></a>
                <div class="modal fade" dir="ltr" id="ChatNew" tabindex="-1" aria-labelledby="ChatNewLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ChatNewLabel">{{ __('التواصل مع صاحب الإعلان') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" dir="rtl">
                            <form action="{{ route('chat.new',[$Ad->id]) }}" method="POST">@csrf
                                <div class="form-floating">
                                    <input type="hidden" name="id_to" value="{{e($Ad->id_owner)}}">
                                    <textarea class="form-control border-primary" placeholder="{{ __('اترك رسالتك') }}" rows="3" name="message" id="floatingTextarea"></textarea>
                                    <label for="floatingTextarea">{{ __('الرسالة') }}</label>
                                </div>
                                <button type="submit" class="btn btn-outline-primary form-control mt-2"><i class="fa fa-comments "></i> {{ __('دردش') }}</button>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>
                <p><b>{{ __('نصائح عامة') }}</b></p>
                <ul>
                    <li>{{ __('اجتمع في الأماكن العامة فقط') }}</li>
                    <li>{{ __('لا تقم بإرسال المال مسبقاً') }}</li>
                    <li>{{ __('قم بتفقد المنتج جيداً قبل شرائه') }}</li>
                </ul>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <h4>{{ __('صاحب الإعلان') }}</h4>
                @if($User->link !=null)<a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('account.profile.page',[e($User->link) ]) }}" @endif class="black" style="text-decoration: none;font-weight:normal">@endif
                    <div class="row">
                        <div class="col-4 text-center">
                            <img @if($User->picture != null) src="{{ e($User->picture) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" class="img-responsive" style="width:80px">
                        </div>
                        <div class="col-8">
                            <b class="text-primary">{{ $User->name }}</b><br>
                            <span class="text-muted" dir="rtl">{{ __('عضو منذ') }} {{ date('Y-m-d',strtotime(e($User->created_at))) }} <br>
                                {{ __('وقت التجاوب خلال يوم') }}</span>
                        </div>
                    </div>
                    @if($User->link !=null)</a>@endif
                <b><a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('likes.add',[$Ad->id]) }}" @endif class="mx-4"><i class="fa fa-plus"></i> {{ __('تابع') }}</a></b>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <?php
                    $COUNTRY_NAME = e(App\Models\Country::where('id',e($Ad->id_country))->get()->first()->name_ar);
                    $COUNTRY_NAME_URL = App\Http\Controllers\UserController::slug($COUNTRY_NAME);
                    $CITY_NAME = e(App\Models\City::where('id',e($Ad->id_city))->get()->first()->name_ar);
                    $CITY_NAME_URL = App\Http\Controllers\UserController::slug($CITY_NAME);
                    if($Ad->id_village != null && $Ad->id_village != 0):
                        $VILLAGE_NAME = " - ".e(App\Models\Village::where('id',e($Ad->id_village))->get()->first()->name_ar);
                        $VILLAGE_NAME_URL = App\Http\Controllers\UserController::slug($VILLAGE_NAME);
                    else:
                        $VILLAGE_NAME = "";
                        $VILLAGE_NAME_URL = "";
                    endif;
                ?>
                <a href="{{ route('ads.by.city',[e($Ad->id_country),e($COUNTRY_NAME_URL),e($Ad->id_city),e($CITY_NAME_URL) ]) }}" class="black"><h4>{{ __('الموقع') }}</h4>

                    {{ App\Models\City::where('id',e($Ad->id_city))->get()->first()->name_ar }} {{ e($VILLAGE_NAME) }}
                </a>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('premium') }}" target="_BLANK"  @endif class="black"><h4>{{ __('هل تريد مشاهدات أكثر لاعلانك ؟') }}</h4>
                <i class="fa fa-repeat text-primary"></i> <i class="fa fa-medal text-warning"></i> <i class="fa fa-rocket text-danger"></i> {{ __('ميز وأعد نشر إعلانك') }}</a>
            </div>
        </div>
        <div class="card mb-2">
            <div class="card-body">
                <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('ads.create') }}" @endif class="black"><h4>{{ __('هل تود اضافة اعلان مماثل ؟') }}</h4>
                <i class="fa fa-camera text-warning"></i> {{ __('أضف إعلانك الآن') }}</a>
            </div>
        </div>
        <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('ads.create') }}" @endif class="black"><img src="/uploads/categories/pub.png" alt="pub"></a>
    </div>
    <x-home.pub />
    <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('ads.create') }}" @endif class="text-center"><img src="/uploads/categories/pub.jpeg" class="img-responsive" alt="Pub" style="max-width: 100%"></a>

</div>
@section('scripts')
@parent
    <script type="text/javascript">
        function getphonenumber(phone){
            $('.phonebtn a').attr('href', `tel:${phone}`);

            // Optionally update the visible phone number (if needed)
            $('.phone').text(phone);
    }
        const field = $(".field"),
        input = $(".input"),
        copy = $(".copy");
        $(".copy").click(function(e){
            input.select(); //select input value
            if(document.execCommand("copy")){ //if the selected text is copied
                field.addClass('active');
                copy.html("{{ __('تم النسخ') }}");
                setTimeout(()=>{
                window.getSelection().removeAllRanges(); //remove selection from page
                field.removeClass('active');
                copy.html("{{ __('انسخ الرابط') }}");
                }, 3000);
            }

        });

    </script>
@endsection
@endsection
