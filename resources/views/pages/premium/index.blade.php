@extends('layouts.website')
@section('content')
<form action="{{ route('premium.next') }}" method="GET">
    <div class="row m-2">
        <div class="col-md-9 col-sm-12 col-12 form-section">
                <x-premium.premium />
                <button type="submit" class="premiumsubmit btn btn-primary col-md-6 col-12 my-2 position-relative p-3" disabled>
                    <span style="right:10px !important" class="top-50  p-2 translate-middle position-absolute badge bg-white text-dark countorders">0</span>
                    {{ __('التالي') }} <i class="fa fa-arrow-left"></i>
                    <span  style="left:50px !important" class="top-50  p-2 translate-middle pricecontainer position-absolute ">
                        <span class="priceorders"><b>0.00</b>
                    </span> {{ __('ريال') }}</span>
                </button>
        </div>
        <div class="col-md-3 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                <h5>{{ __('هل تحتاج إلى مساعدة؟') }}</h5>
                    <p><small>{{ __('تواصل معنا الآن') }}</small></p>
                    <center><a class="btn btn-outline-success form-control" href="https://api.whatsapp.com/send/?phone={{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }}&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp text-success"></i>  {{ __('واتساب') }}</a>
                    <br><br>
                    <a class="btn btn-outline-dark form-control" dir="ltr" href="tel:{{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }}">{{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }} <i class="fa fa-phone text-primary"></i></a></center>
                </div>
            </div>
            <button type="submit" class="premiumsubmit btn btn-primary form-control d-none d-md-block my-2 position-relative p-3" disabled>
                <span style="right:10px !important" class="top-50  p-2 translate-middle position-absolute badge bg-white text-dark countorders">0</span>
                {{ __('التالي') }} <i class="fa fa-arrow-left"></i>
                <span  style="left:50px !important" class="top-50  p-2 translate-middle pricecontainer position-absolute ">
                    <span class="priceorders"><b>0.00</b>
                </span> {{ __('ريال') }}</span>
            </button>
            <br>
        </div>
    </div>
</form>

@endsection
