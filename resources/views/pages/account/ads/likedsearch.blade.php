@extends('layouts.website')
@section('content')
<x-account.banner />

<div class="m-5">
    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-title">
                        <h4><i class="fa fa-searchengin os-text"></i> {{ __('البحوث المفضلة') }}</h4>
                    </div>
                </div>
                <div class="card-body rtl" dir='rtl'>
                    <x-account.searchtable :SearchCount='$SearchCount' :Search='$Search' />
                </div>
            </div>
        </div>
    </div>

</div>
 @endsection
