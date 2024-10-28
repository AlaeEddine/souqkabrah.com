@extends('layouts.website')
@section('content')
<div class="m-5">

        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <x-account.profilebanner :User=$User />
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="card-title text-center"><h2><i class="fa fa-bullhorn os-text"></i> {{ __('إعلانات العضو') }}</h2></div>
                </div>
                <div class="card-body">
                    <x-account.adstable :CountAds=$CountAds :Ads=$Ads />
                </div>
            </div>
        </div>
</div>
@endsection
