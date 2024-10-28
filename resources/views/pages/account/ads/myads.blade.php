@extends('layouts.website')
@section('content')
<x-account.banner />

<div class="m-5">
    <div class="row">
        <div class="m-2 col-md-12 col-sm-12 text-center"><h2>{{ __('إعلاناتي') }}</h2></div>
        <div class="row col-md-12 col-sm-12">
            <div class="col-md-6 col-sm-12">
                <x-account.myads />
            </div>
            <div class="col-md-6 col-sm-12">
                <x-account.adsdetails />
            </div>
        </div>
    </div>
    <p><br></p>
    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-title">
                        <h4><i class="fa fa-bullhorn os-text"></i> {{ __('إعلاناتي') }}</h4>
                    </div>
                </div>
                <div class="card-body rtl" dir='rtl'>
                    <x-account.adstable :AdsCount=$AdsCount :Ads=$Ads />
                </div>
            </div>
        </div>
    </div>

</div>
 @endsection
