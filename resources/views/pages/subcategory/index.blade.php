@extends('layouts.website')
@section('content')
<div class="m-5">


    <h2 class="mb-3 mt-3">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($SubCategory->name_1) }}@else{{ e($SubCategory->name_2) }} @endif {{  __('في') }}
        <x-getcountryname />
    </h2>

    <x-getcountryname />  /
    <a href="/الأقسام/{{e($SubCategory->category)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}" class="black"><x-getcategoryname :Category=$Category /></a> /
    <a href="/الأقسام/{{e($SubCategory->category)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}" class="black"><x-getsubcategoryname :SubCategory=$SubCategory /></a>
    @if(session('success'))
        <div class="alert alert-success">{{e(session('success'))}}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{e(session('error'))}}</div>
    @endif
        <div class="row mb-5">
            @foreach ($SubSubCategories as $SubSubCategory)
            <div class="col-6 col-sm-6 col-xs-6 col-md-2 p-2 my-2"> <a class="black" href="/الأقسام/{{e($SubSubCategory->category)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}/{{e($SubSubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubSubCategory->name_1))}}">
                <div class="card">
                    <div class="text-center">
                        @if(File::exists(public_path().'/uploads/categories/'.e($SubSubCategory->category).'/'.e($SubSubCategory->subcategory).'/'.($SubSubCategory->id).'.png'))
                        <center><img class="d-block img-responsive text-center" src="{{ url('/uploads/categories') }}/{{ e($SubSubCategory->category) }}/{{ e($SubCategory->id) }}/{{ e($SubSubCategory->id) }}.png" alt="{{ e($SubSubCategory->name_1) }}"></center>
                        @else
                        <center><img class="d-block img-responsive text-center" src="{{ url('/uploads/categories') }}/{{ e($SubSubCategory->category) }}/{{ e($SubCategory->id) }}.png" alt="{{ e($SubSubCategory->name_1) }}"></center>
                        @endif
                        <x-getsubsubcategoryname :SubSubCategory=$SubSubCategory />
                    </div>
                </div></a>
            </div>
            @endforeach
        </div>
        @if($AdsCount > 0)
        <h2 class="text-center m-5"><i class="fa fa-bullhorn os-text"></i> {{ __('إعلانات القسم') }}</h2>
        <div class="row">
            @foreach ($Ads as $Ad)
                <x-ads.adscard :Ad=$Ad />
            @endforeach
        </div>
        @endif
        <hr>
        <div class="row mb-3">
            <h2 class="mb-3 mt-3">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($SubCategory->name_1) }}@else{{ e($SubCategory->name_2) }} @endif {{ __('حسب المدينة') }}</h2>
            @foreach(App\Models\City::where('country_id',e(session('selector.country.id')))->get() as $City)
            <?php
                $COUNTRY_NAME = App\Http\Controllers\UserController::slug(App\Models\Country::where('id',e(session('selector.country.id')))->get()->first()->name_ar);
                $CITY_NAME = App\Http\Controllers\UserController::slug(e($City->name_ar));
                $CATEGORY_NAME = App\Http\Controllers\UserController::slug(e($Category->name_1));
                $SUB_CATEGORY_NAME = App\Http\Controllers\UserController::slug(e($SubCategory->name_1));
            ?>
                <div class="col-6 col-md-3 mb-3"><a href="{{ route('ads.by.subcategory',[$City->country_id,$COUNTRY_NAME,$City->id,$CITY_NAME, $Category->id, $CATEGORY_NAME, $SubCategory->id, $SUB_CATEGORY_NAME ]) }}" class="black">
                    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                        {{ e($SubCategory->name_1) }} {{ __('في') }} {{ e($City->name_ar) }}
                    @else
                        {{ e($SubCategory->name_2) }} {{ __('في') }} {{ e($City->name_en) }}
                    @endif
                </a></div>
            @endforeach
        </div>
        <hr>
        <div class="row mb-3">
            @foreach(App\Models\City::where('country_id',e(session('selector.country.id')))->get() as $City)
            <?php
                $COUNTRY_NAME = App\Http\Controllers\UserController::slug(App\Models\Country::where('id',e(session('selector.country.id')))->get()->first()->name_ar);
                $CITY_NAME = App\Http\Controllers\UserController::slug(e($City->name_ar));
                $CATEGORY_NAME = App\Http\Controllers\UserController::slug(e($Category->name_1));
                $SUB_CATEGORY_NAME = App\Http\Controllers\UserController::slug(e($SubCategory->name_1));
            ?>
            <a href="{{ route('ads.by.subcategory',[$City->country_id,$COUNTRY_NAME,$City->id,$CITY_NAME, $Category->id, $CATEGORY_NAME, $SubCategory->id, $SUB_CATEGORY_NAME ]) }}" class="black col-6 col-md-3 mb-3"><div class="gray rounded-pill py-2 text-center">
                    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                        {{ e($City->name_ar) }}
                    @else
                       {{ e($City->name_en) }}
                    @endif
                </div></a>
            @endforeach
        </div>
</div>
@endsection
