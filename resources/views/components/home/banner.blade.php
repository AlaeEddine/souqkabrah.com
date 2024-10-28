@props(['BannerAds'])
<div class="gray pt-4 pb-4 d-none d-sm-block">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="text-center">
                    <h2>{{ __('صوّر') }} . {{ __('أعلن') }} . {{ __('بيع') }}</h2>
                    <img src="{{url('/assets/images')}}/homeBanner-1.webp" class="img-responsive" style="width:90%" alt="">
                    <a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('ads.create') }}" @endif class="btn btn-warning text-white px-4"><h2>{{ __('أضف إعلانك الآن') }}</h2></a>

                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h1>60 {{ __('مليون') }}</h1>
                        <h6>{{ __('مستخدم عربي') }}</h6>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-body text-center">
                        <h1>{{ __('أفضل الأسعار') }}</h1>
                        <h6>{{ __('أضف إعلانك وابدأ في جني الأموال') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="text-center">
                    <h2 class="text-primary">{{ __('ابحث') }} . {{ __('اتصل') }} . {{ __('اشتري') }}</h2>
                    <img src="{{url('/assets/images')}}/homeBanner-2.webp" class="img-responsive" style="width:90%" alt="">
                    <a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="/الأقسام" @endif class="btn btn-primary text-white px-4"><h2>{{ __('إشتري الآن') }}</h2></a>
                </div>
            </div>
        </div>
    </div>
</div>

{{--
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @foreach($BannerAds as $BannerAd)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-banner rtl">
                    <img src="{{ e($BannerAd->picture1) }}" alt="{{ e($BannerAd->title) }}" class="opacity-75">
                    <div class="content rtl text-center">
                        <p>{!! Purifier::clean($BannerAd->title) !!}</p>
                        <h3>{!! Purifier::clean($BannerAd->description) !!}</h3>
                        <a href="{{ e($BannerAd->link) }}" >{{ __('إستفد الآن') }}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
 --}}
