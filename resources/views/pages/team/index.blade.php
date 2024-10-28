@extends('layouts.website')
@section('content')
<div class="col-12 text-center">
    <h2>{{ __('تواصل مع فريق المبيعات الآن') }}</h2>
    <p>{{ __('تواصل مع أحد مندوبينا لتحصل على خصومات أكثر و تزيد ربحك') }}</p>
</div>
<div class="row px-2 text-center mb-5">
    <div class="col-md-6 col-12">
        <x-city />
    </div>
    <div class="col-md-6 col-12">
        <x-category />
    </div>
</div>
<div class="row px-2 text-center mt-5 mb-2">
    @foreach ($Teams as $Team)
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <img @if($Team->picture != null) src="{{ e($Team->picture) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" width="100">
                <br>
                <h5>{{ e($Team->name) }}</h5>
                <p>{{ __('جميع الأقسام') }}</p>
                <a href="tel:{{ e($Team->phone) }}" class="btn btn-primary" dir="ltr"><i class="fa fa-phone"></i> {{ e($Team->phone) }}</a>
            </div>
        </div>
    </div>
    @endforeach
    <div class="col-md-3 col-sm-6 col-12">
        <div class="card">
            <div class="card-body">
                <img src="/uploads/categories/no_profile.png"  alt="avatar" width="100">
                <br>
                <h5>{{ __('فريق المبيعات') }}</h5>
                <p>{{ __('جميع الأقسام') }}</p>
                <a href="https://api.whatsapp.com/send/?phone={{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }}&text&type=phone_number&app_absent=0" class="btn btn-success" dir="ltr"><i class="fab fa-whatsapp"></i> {{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }}</a>
            </div>
        </div>
    </div>

</div>
@endsection
