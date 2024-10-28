@extends('layouts.website')
@section('content')
<div class="m-5">
    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-title">
                        <h4><i class="fa fa-star os-text"></i> {{ __('التقييم') }}</h4>
                    </div>
                </div>
                <div class="card-body rtl" dir='rtl'>
                    <x-account.rating :RatingCount='$RatingCount' :Rating='$Rating' />
                </div>
            </div>
        </div>
    </div>

</div>
 @endsection
