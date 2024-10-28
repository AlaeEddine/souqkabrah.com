@extends('layouts.website')
@section('content')
<div class="shopping-cart section">
    <div class="container text-center">
        <h4 class="mb-4">{{ __('تم إلغاء العملية') }}</h4>
        @if(session('success'))
        <div class="row mt-4"><div class="alert alert-success">{{e(session('success'))}}</div></div>
    @endif
    @if(session('error'))
        <div class="row mt-4"><div class="alert alert-danger"><i class="fa fa-warning"></i> {{e(session('error'))}}</div></div>
    @endif
    <p><a href="{{ route('premium') }}" class="btn btn-primary">{{ __('الرجوع') }}</a></p>

    </div>
</div>
@endsection
