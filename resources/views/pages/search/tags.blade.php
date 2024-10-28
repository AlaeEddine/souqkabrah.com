@extends('layouts.website')
@section('content')
<div class="m-5">

        <h2 class="text-center m-5"><i class="fa fa-search os-text"></i> {{ __('نتائج البحث') }} ({{ e($ResultCount) }})</h2>
        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <div class="row" dir="rtl">
            @foreach ($Ads as $Ad)
                <x-ads.adscard :Ad=$Ad />
            @endforeach
        </div>
</div>
@endsection
