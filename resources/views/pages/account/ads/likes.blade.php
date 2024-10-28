@extends('layouts.website')
@section('content')
<x-account.banner />

<div class="m-5">
    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-title">
                        <h4><i class="fa fa-bullhorn os-text"></i> {{ __('الإعلانات المفضلة') }}</h4>
                    </div>
                </div>
                <div class="card-body rtl" dir='rtl'>
                    <x-account.adstable :AdsCount='$AdsCount' :Ads='$Ads' />
                </div>
            </div>
        </div>
    </div>

</div>
 @endsection
