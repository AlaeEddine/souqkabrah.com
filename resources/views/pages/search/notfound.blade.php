@extends('layouts.website')
@section('content')
<div class="m-5">
        @if(isset($ADS_RESULT_TITLE) && $ADS_RESULT_TITLE != null) {{ $ADS_RESULT_TITLE }} @endif
        <h5 class="mb-3 mt-3"><i class="fa fa-search os-text"></i>  {{ __('بحث') }} : (0)</h5>
        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <x-ads.search />
        <h2 class="text-center m-5">{{ __('لا توجد نتائج بحث') }}</h2>
        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <div class="row text-center">
            <i class="fa fa-search" style="font-size:200px"></i>
        </div>
</div>
@endsection
