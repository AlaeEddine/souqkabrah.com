@extends('layouts.website')
@section('content')
{{-- <x-home.slider :AdsHome="$AdsHome" /> --}}
<img src="/assets/images/homeBannerMobileOne-{{ Illuminate\Support\Facades\App::currentLocale() }}.webp" width="1200px" class=" d-none d-md-block col-12" style="" height="260" alt="">
<img src="/assets/images/homeBannerMobileOne-{{ Illuminate\Support\Facades\App::currentLocale() }}.webp" class="d-xs-block d-sm-block d-md-none col-12" style="" alt="">
<x-home.categories />
<x-home.banner />
<x-home.ads />
<x-home.pub />
<section id="cars mb-3 mt-3">
<div class="container gray pb-3 pt-3 mt-3">
    <h4><b>{{ __('سيارات للبيع  في ') }}{{ e(session('selector.country.name.'.Illuminate\Support\Facades\App::currentLocale())) }}</b></h4>
    <ul class="nav nav-tabs pb-3 mt-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="brand-car-tab" data-bs-toggle="tab" data-bs-target="#brand-car" type="button" role="tab" aria-controls="brand-car" aria-selected="true">{{ __('الماركة') }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="city-car-tab" data-bs-toggle="tab" data-bs-target="#city-car" type="button" role="tab" aria-controls="city-car" aria-selected="false">{{ __('المدن') }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="year-car-tab" data-bs-toggle="tab" data-bs-target="#year-car" type="button" role="tab" aria-controls="year-car" aria-selected="false">{{ __('سنةالصنع') }}</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="brand-car" role="tabpanel" aria-labelledby="brand-car-tab">
            <div class="row">
                @foreach(App\Models\CarsBrand::where('id',27)->orWhere('id',97)->orWhere('id',82)->orWhere('id',91)->get() as $CarBrand)
                {{-- 27 TOYOTA // 97 Nissan // 82 Lexus // 91 Mercedes --}}
                <?php
                $CARBRAND_NAME = App\Http\Controllers\UserController::slug($CarBrand->name_ar);
                ?>
                <div class="col-md-2 col-12 col-sm-6 mb-2">
                    <p class="text-center"><a href="{{ route('ads.by.brand',[$CarBrand->id,$CARBRAND_NAME]) }}" class="black"><b>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $CarBrand->name_ar }}@else{{ $CarBrand->name_en }}@endif</b></a></p>
                    @if($CarBrand->id == 27)
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'كامري']) }}">{{ __('كامري') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'كورولا']) }}">{{ __('كورولا') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'راف-فور']) }}">{{ __('راف فور') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'لاند-كروزر']) }}">{{__('لاند كروزر')}}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'افالون']) }}">{{ __('افالون') }}</a><br>
                    @endif
                    @if($CarBrand->id == 97)
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'التيما']) }}">{{ __('التيما') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'باترول']) }}">{{ __('باترول') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'باثفايندر']) }}">{{ __('باثفايندر') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'مكسيما']) }}">{{ __('مكسيما') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'روج']) }}">{{ __('روج') }}</a><br>
                    @endif
                    @if($CarBrand->id == 82)
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'ES']) }}">{{__('ES')}}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'IS']) }}">{{__('IS')}}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'RX']) }}">{{__('RX')}}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'LX']) }}">{{__('LX')}}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'LS']) }}">{{__('LS')}}</a><br>
                    @endif
                    @if($CarBrand->id == 91)
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'الفئة-E']) }}">{{ __('الفئة-E') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'الفئة-C']) }}">{{ __('الفئة-C') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'الفئة-S']) }}">{{ __('الفئة-S') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'الفئة-GLC']) }}">{{ __('الفئة-GLC') }}</a><br>
                        <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[$CarBrand->id,$CARBRAND_NAME,$CarBrand->id,'الفئة-A']) }}">{{ __('الفئة-A') }}</a><br>
                    @endif
                </div>
                @endforeach
                <div class="col-md-3 col-12 col-sm-6 mb-2">
                    <p class="text-center"><b>{{ __('اكثر رواجا') }}</b></p>
                                    {{-- 27 TOYOTA // 97 Nissan // 82 Lexus // 91 Mercedes --}}
                <?php
                $TOYOTA = App\Http\Controllers\UserController::slug(App\Models\CarsBrand::where('id',27)->get()->first()->name_ar);
                $NISSAN = App\Http\Controllers\UserController::slug(App\Models\CarsBrand::where('id',97)->get()->first()->name_ar);
                $LEXUS = App\Http\Controllers\UserController::slug(App\Models\CarsBrand::where('id',82)->get()->first()->name_ar);
                $MERCEDES = App\Http\Controllers\UserController::slug(App\Models\CarsBrand::where('id',91)->get()->first()->name_ar);
                $HYUNDAI = App\Http\Controllers\UserController::slug(App\Models\CarsBrand::where('id',104)->get()->first()->name_ar);
                ?>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[27,$TOYOTA,27,'كامري']) }}"> {{$TOYOTA}} {{__('كامري')}}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[97,$NISSAN,97,'التيما']) }}">{{ $NISSAN }} {{ __('التيما') }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[82,$LEXUS,82,'ES']) }}">{{ $LEXUS }} {{ __('ES') }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[91,$MERCEDES,91,'الفئة-E']) }}">{{ $MERCEDES }} {{ __('الفئة-E') }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model',[104,$HYUNDAI,104,'النترا']) }}">{{ $HYUNDAI }} {{ __('النترا') }}</a><br>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="city-car" role="tabpanel" aria-labelledby="city-car-tab">
            <div class="row">
                @foreach (App\Models\City::where('country_id',e(session('selector.country.id')))->skip(0)->take(4)->get() as $City)
                <div class="col-md-3 col-12 col-sm-6 mb-2">
                    <p><b>{{ __('سيارات للبيع') }} {{ __('في') }} {{ $City->name_ar }}</b></p>
                    <?php
                        $COUNTRY_NAME = App\Http\Controllers\UserController::slug(App\Models\Country::where('id',e(session('selector.country.id')))->get()->first()->name_ar);
                        $CITY_NAME = App\Http\Controllers\UserController::slug(e($City->name_ar));
                    ?>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model.and.city',[$City->country_id,$COUNTRY_NAME,$City->id, $CITY_NAME, 27,$TOYOTA,27,'كامري']) }}">{{ $TOYOTA }} {{ __('كامري') }}  {{ __('في') }} {{ $City->name_ar }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model.and.city',[$City->country_id,$COUNTRY_NAME,$City->id, $CITY_NAME, 97,$NISSAN,97,'التيما']) }}">{{ $NISSAN }} التيما {{ __('في') }} {{ $City->name_ar }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model.and.city',[$City->country_id,$COUNTRY_NAME,$City->id, $CITY_NAME, 82,$LEXUS,82,'ES']) }}">{{ $LEXUS }} {{ __('ES') }} {{ __('في') }} {{ $City->name_ar }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model.and.city',[$City->country_id,$COUNTRY_NAME,$City->id, $CITY_NAME, 91,$MERCEDES,91,'الفئة-E']) }}">{{ $MERCEDES }} {{ __('الفئة-E') }} {{ __('في') }} {{ $City->name_ar }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.model.and.city',[$City->country_id,$COUNTRY_NAME,$City->id, $CITY_NAME, 104,$HYUNDAI,104,'النترا']) }}">{{ $HYUNDAI }} {{ __('النترا') }} {{ __('في') }} {{ $City->name_ar }}</a><br>
                </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="year-car" role="tabpanel" aria-labelledby="year-car-tab">
            <div class="row">
                @for($i=2017;$i<=2020;$i++)
                <div class="col-md-3 col-12 col-sm-6 mb-2">
                    <p><b>{{ __('سيارات') }} {{ $i }}</b></p>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.year',[27,$TOYOTA,27,'كامري',$i]) }}">{{ $TOYOTA }} {{ __('كامري') }} {{ $i }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.year',[97,$NISSAN,97,'التيما',$i]) }}">{{ $NISSAN }} {{ __('التيما') }}  {{ $i }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.year',[82,$LEXUS,82,'ES',$i]) }}">{{ $LEXUS }} {{ __('ES') }}  {{ $i }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.year',[91,$MERCEDES,91,'الفئة-E',$i]) }}">{{ $MERCEDES }} {{ __('الفئة-E') }} {{ $i }}</a><br>
                    <a class="black" style="font-weight:normal" href="{{ route('ads.by.year',[104,$HYUNDAI,104,'النترا',$i]) }}">{{ $HYUNDAI }} {{ __('النترا') }} {{ $i }}</a><br>
                </div>
                @endfor
            </div>
        </div>
      </div>
</div>
</section>

<section id="realestatesell mb-3 mt-3">
    <div class="container gray pb-3 pt-3 mt-3">
        <h4><b>{{ __('عقارات للبيع في ') }}{{ e(session('selector.country.name.'.Illuminate\Support\Facades\App::currentLocale())) }}</b></h4>
        <ul class="nav nav-tabs pb-3 mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="realestate-sell-lands-tab" data-bs-toggle="tab" data-bs-target="#realestate-sell-lands" type="button" role="tab" aria-controls="realestate-sell-lands" aria-selected="true">{{ __('أراضي للبيع') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="realestate-sell-appartments-tab" data-bs-toggle="tab" data-bs-target="#realestate-sell-appartments" type="button" role="tab" aria-controls="realestate-sell-appartments" aria-selected="false">{{ __('شقق للبيع') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="realestate-sell-villas-tab" data-bs-toggle="tab" data-bs-target="#realestate-sell-villas" type="button" role="tab" aria-controls="realestate-sell-villas" aria-selected="false">{{ __('فلل - قصور للبيع') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="realestate-sell-houses-tab" data-bs-toggle="tab" data-bs-target="#realestate-sell-houses" type="button" role="tab" aria-controls="realestate-sell-houses" aria-selected="false">{{ __('بيوت - منازل للبيع') }}</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="realestate-sell-lands" role="tabpanel" aria-labelledby="realestate-sell-lands-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('أراضي للبيع في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('أراضي للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('أراضي للبيع في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('أراضي للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('أراضي للبيع في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('أراضي للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('أراضي للبيع في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('أراضي للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realestate-sell-appartments" role="tabpanel" aria-labelledby="realestate-sell-appartments-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للبيع في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للبيع في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للبيع في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للبيع في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realestate-sell-villas" role="tabpanel" aria-labelledby="realestate-sell-villas-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للبيع في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للبيع في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للبيع في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للبيع في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realestate-sell-houses" role="tabpanel" aria-labelledby="realestate-sell-houses-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('بيوت - منازل للبيع في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('بيوت - منازل للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('بيوت - منازل للبيع في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('بيوت - منازل للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('بيوت - منازل للبيع في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('بيوت - منازل للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('بيوت - منازل للبيع في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('بيوت - منازل للبيع في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
<section id="realestaterent mb-3 mt-3">
    <div class="container gray pb-3 pt-3 mt-3">
        <h4><b>{{ __('عقارات للإيجار في ') }}{{ e(session('selector.country.name.'.Illuminate\Support\Facades\App::currentLocale())) }}</b></h4>
        <ul class="nav nav-tabs pb-3 mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="realestate-rent-lands-tab" data-bs-toggle="tab" data-bs-target="#realestate-rent-lands" type="button" role="tab" aria-controls="realestate-rent-lands" aria-selected="true">{{ __('شقق للإيجار') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="realestate-rent-appartments-tab" data-bs-toggle="tab" data-bs-target="#realestate-rent-appartments" type="button" role="tab" aria-controls="realestate-rent-appartments" aria-selected="false">{{ __('غرف ومشاركة سكن للإيجار') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="realestate-rent-villas-tab" data-bs-toggle="tab" data-bs-target="#realestate-rent-villas" type="button" role="tab" aria-controls="realestate-rent-villas" aria-selected="false">{{ __('فلل - قصور للإيجار') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="realestate-rent-houses-tab" data-bs-toggle="tab" data-bs-target="#realestate-rent-houses" type="button" role="tab" aria-controls="realestate-rent-houses" aria-selected="false">{{ __('مزارع وشاليهات للإيجار') }}</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="realestate-rent-lands" role="tabpanel" aria-labelledby="realestate-rent-lands-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للإيجار في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للإيجار في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للإيجار في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شقق للإيجار في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('شقق للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realestate-rent-appartments" role="tabpanel" aria-labelledby="realestate-rent-appartments-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('غرف ومشاركة سكن للإيجار في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('غرف ومشاركة سكن للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('غرف ومشاركة سكن للإيجار في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('غرف ومشاركة سكن للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('غرف ومشاركة سكن للإيجار في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('غرف ومشاركة سكن للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('غرف ومشاركة سكن للإيجار في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('غرف ومشاركة سكن للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realestate-rent-villas" role="tabpanel" aria-labelledby="realestate-rent-villas-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للإيجار في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للإيجار في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للإيجار في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فلل - قصور للإيجار في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('فلل - قصور للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="realestate-rent-houses" role="tabpanel" aria-labelledby="realestate-rent-houses-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مزارع وشاليهات للإيجار في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('مزارع وشاليهات للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مزارع وشاليهات للإيجار في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('مزارع وشاليهات للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مزارع وشاليهات للإيجار في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('مزارع وشاليهات للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مزارع وشاليهات للإيجار في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('مزارع وشاليهات للإيجار في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>

<section id="job mb-3 mt-3">
    <div class="container gray pb-3 pt-3 mt-3">
        <h4><b>{{ __('وظائف شاغرة في ') }}{{ e(session('selector.country.name.'.Illuminate\Support\Facades\App::currentLocale())) }}</b></h4>
        <ul class="nav nav-tabs pb-3 mt-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="job-find-city-tab" data-bs-toggle="tab" data-bs-target="#job-find-city" type="button" role="tab" aria-controls="job-find-city" aria-selected="true">{{ __('حسب المدينة') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="job-find-job-tab" data-bs-toggle="tab" data-bs-target="#job-find-job" type="button" role="tab" aria-controls="job-find-job" aria-selected="false">{{ __('حسب الوظيفة') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="job-find-category-tab" data-bs-toggle="tab" data-bs-target="#job-find-category" type="button" role="tab" aria-controls="job-find-category" aria-selected="false">{{ __('حسب القطاع') }}</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="job-find-other-tab" data-bs-toggle="tab" data-bs-target="#job-find-other" type="button" role="tab" aria-controls="job-find-other" aria-selected="false">{{ __('اكثر رواجا') }}</button>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="job-find-city" role="tabpanel" aria-labelledby="job-find-city-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('وظائف شاغرة في') }} {{ __('مسقط') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3889)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('وظائف شاغرة في في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('وظائف شاغرة في') }} {{ __('الباطنة') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3891)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('وظائف شاغرة في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('وظائف شاغرة في') }} {{ __('ظفار') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3896)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('وظائف شاغرة في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('وظائف شاغرة في') }} {{ __('الداخلية') }}</b></p>
                        @foreach (App\Models\State::where('city_id',3892)->skip(0)->take(4)->get() as $State)
                            <a class="black" style="font-weight:normal" href="">{{ __('وظائف شاغرة في') }} @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $State->name_ar }}@else{{ $State->name_en }} @endif</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="job-find-job" role="tabpanel" aria-labelledby="job-find-job-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('شيف - طباخ') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('الشرقية') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مندوب مبيعات') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('الشرقية') }}</a><br>
                    </div>

                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('سائق توصيل') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('الشرقية') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('حلاق') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('الشرقية') }}</a><br>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="job-find-category" role="tabpanel" aria-labelledby="job-find-category-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فندقة ومطاعم') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('باريستا') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('موظف تقديم الاطعمة والمشروبات') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('عامل مطبخ') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('فنيين وحرفيين') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('نجار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('فني تنجيد') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('فني تبريد وتكييف') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('فني المنيوم') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مبيعات') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مدير مبيعات') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('كاشير') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('موظف تسويق هاتفي') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('صحة وجمال') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('خبيرة مكياج - ماكيير') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('كوافير - كوافيرة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('عناية الأظافر') }}</a><br>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="job-find-other" role="tabpanel" aria-labelledby="job-find-other-tab">
                <div class="row">
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('مسقط') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('مسقط') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('مسقط') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('الباطنة') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('الباطنة') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('الباطنة') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('ظفار') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('ظفار') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('ظفار') }}</a><br>
                    </div>
                    <div class="col-md-3 col-12 col-sm-6">
                        <p><b>{{ __('الداخلية') }}</b></p>
                        <a class="black" style="font-weight:normal" href="">{{ __('سائق توصيل في') }} {{ __('الداخلية') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('مندوب مبيعات في') }} {{ __('الداخلية') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('شيف - طباخ في') }} {{ __('الداخلية') }}</a><br>
                        <a class="black" style="font-weight:normal" href="">{{ __('حلاق في') }} {{ __('الداخلية') }}</a><br>
                    </div>
                </div>
            </div>
        </div>
</section>

<hr>
<section id="description" class="mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('مرحباً بكم في سوق') }}  {{ e(session('selector.country.name.'.Illuminate\Support\Facades\App::currentLocale())) }}</h3>
                <p>{{App\Models\Setting::first()->title}} {{ __('هو واحد من أهم روّاد المواقع الإلكترونية المتخصصة في مجال الإعلانات المبوبة والتي تمكّن المستخدمين سواء كانوا بائعين أم مشترين من بيع وشراء مختلف السلع والمنتجات والخدمات خلال أقصر وقت ممكن وبأقل جهد يُذكر، وسواء كانت حالة تلك المنتجات جديدة أم مستعملة. وحتى يسهل على المستخدم إيجاد ما يبحث عنه أو الإعلان عمّا يريد بيعه يوجد أقسام رئيسية وفرعية لعرض وتصفّح مختلف أنواع السلع والخدمات المتداولة بينهم وإتاحة التواصل المباشر فيما بينهم بكل سهولة.') }}</p>
            </div>
        </div>
    </div>
</section>
@endsection
