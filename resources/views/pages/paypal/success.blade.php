@extends('layouts.website')
@section('content')
<div class="shopping-cart section">
    <div class="container text-center">
        <h4 class="mb-4">{{ __('تم الدفع بنجاح') }}</h4>
        <h1 class="text-center">{{ __('شكرا لك') }}</h1>

        @if(session('success'))
        <div class="row mt-4"><div class="alert alert-success">{{e(session('success'))}}</div></div>
    @endif
    @if(session('error'))
        <div class="row mt-4"><div class="alert alert-danger"><i class="fa fa-warning"></i> {{e(session('error'))}}</div></div>
    @endif
    <div class="row">
        <div class="col-12 text-center">
            <a href="{{ route('ads.create') }}" class="btn btn-primary">{{ __('المتابعة') }}</a>
        </div>
    </div>

    </div>
</div>
@endsection
