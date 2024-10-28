@extends('layouts.website')
@section('content')
    <div class="container p-4">
        <h5><a href="{{ route('premium.next') }}" class="black"><i class="fa fa-2xl fa-chevron-right"></i></a></h5>
        <h2>{{ __('إختر طريقة الدفع') }}</h2>
        <p class="text-muted"><small>{{ __('رقم الطلب') }}: <b>{{ $OrderID }}</b></small></p>
        <div class="row">
            @foreach (App\Models\PaymentGateway::where('id',1)->get() as $Gateway)
                <div class="col-12 text-center">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('paypal') }}" method="POST">
                                @csrf
                                <input type="hidden" name="price" value="{{ e(session('premium.price')) }}">
                                <input type="hidden" name="product_name" value="SouqkArbah">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary"><i class="{{ e($Gateway->icon) }}"></i> {{ __('الدفع عن طريق') }} {{ e($Gateway->name) }}</button>
                            </form>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <h2>{{ __('ملخص الشراء') }}</h2>
        <table class="table table-responsive align-middle text-center">
            <tr>
                <td class="text-end">{{ __('المجموع الفرعي') }}</td>
                <td class="text-start">{{ number_format(session('premium.price'),2) }} {{ __('ريال ') }}</td>
            </tr>
            <tr>
                <td class="text-end">{{ __('الخصم') }}</td>
                <td class="text-start">0.00 {{ __('ريال ') }}</td>
            </tr>
            <tr>
                <th class="text-end"><b>{{ __('المجموع') }}</b></th>
                <th class="text-start"><b>{{ number_format(session('premium.price'),2) }} {{ __('ريال ') }}</b></th>
            </tr>
        </table>
    </div>
@endsection
