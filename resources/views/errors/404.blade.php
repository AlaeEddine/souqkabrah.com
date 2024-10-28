@extends('layouts.website')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 text-center">
            <img src="/assets/images/404.png" class="img-responsive" style="max-width: 100%" alt="404">
        </div>
    </div>
</div>
<div class="col-12">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-white">{{ __('الصفحة التي تبحث عنها غير موجودة') }}</h2>
                <p class="pt-5"><a href="/" class="btn btn-dark text-white">{{ __('الصفحة الرئيسية') }}</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
