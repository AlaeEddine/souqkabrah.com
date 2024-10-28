@extends('layouts.website')
@section('content')
<form action="{{ route('premium.next') }}" method="GET">
    <div class="row m-2">
        <div class="col-md-9 col-sm-12 col-12 form-section">
            <x-premium.next />
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
        </div>
    </div>
</form>

@endsection
