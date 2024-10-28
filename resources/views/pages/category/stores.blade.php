@extends('pages.ads.create')

@section('stores')
<div class="container mb-4 text-center px-2">
    <h2>{{ __('هل تريد زيادة مبيعاتك ؟') }}</h2>
    <br>
    <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('premium') }}" target="_BLANK"  @endif class="btn btn-primary"><i class="fa fa-store"></i> <b>{{ __('أحصل على إعلانات أكثر') }}</b></a>
    <br>
    <div class="row mt-2 mb-2">
        <div class="col-6">
            <center><a class="btn btn-outline-primary text-primary form-control" href="{{ route('team') }}"><i class="fa fa-user-tie text-primary"></i>  {{ __('فريق المبيعات') }}</a>
        </div>
        <div class="col-6">
            <center><a class="btn btn-success text-white form-control" href="https://api.whatsapp.com/send/?phone={{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }}&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp text-white"></i>  {{ __('واتساب') }}</a>
        </div>
    </div>
    <h5>{{ __('متاجر السوق المفتوح') }}</h5>
    <h6><i class="fa fa-check-circle text-success"></i> {{ __('تصفح إعلانات المتاجر حسب القسم') }}</h6>

</div>
@endsection
