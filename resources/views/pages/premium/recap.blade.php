@extends('layouts.website')
@section('content')
<form action="{{ route('premium.payment.select') }}" method="POST">@csrf
    <div class="container p-4">
        <h5><a href="{{ route('premium.next') }}" class="black"><i class="fa fa-2xl fa-chevron-right"></i></a></h5>
        <h2>{{ __('عربة التسوق') }}</h2>
        <p class="text-muted"><small>{{ __('رقم الطلب') }}: <b>{{ $OrderID }}</b></small></p>
        @for($i = 1; $i <=11;$i++)
            @if(session('premium.id.'.$i) != 0)
                @if($i == 1 || $i == 2 || $i == 3)
                <hr>
                    <div class="row">
                        <div class="col-6">
                            <h4><i class="fa fa-medal text-warning"></i> {{ __('مميز') }}</h4>
                        </div>
                        <div class="col-6 text-start">
                            <h4>{{ number_format(session('premium.id.'.$i),2) }} {{ __('ريال') }}</h4>
                        </div>
                    </div>
                    <p>{{ __('خدمة إعلان مميّز') }}</p>
                    <p>{{ __('عدد الأيام') }} : @if($i == 1) 3 @endif @if($i == 2) 7 @endif @if($i == 3) 30 @endif</p>
                @endif

                @if($i == 4 || $i == 5 || $i == 6)
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <h4><i class="fa fa-repeat text-primary"></i> {{ __('إعادة النشر') }}</h4>
                        </div>
                        <div class="col-6 text-start">
                            <h4>{{ number_format(session('premium.id.'.$i),2) }} {{ __('ريال') }}</h4>
                        </div>
                    </div>
                    <p>{{ __('خدمة إعادة نشر مرة في اليوم') }}</p>
                    <p>{{ __('عدد الأيام') }} : @if($i == 4) 3 @endif @if($i == 5) 7 @endif @if($i == 6) 30 @endif</p>
                @endif

                @if($i == 7 || $i == 8 || $i == 9 || $i == 10  || $i == 11)
                    @if($i == request('pack'))
                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <h4><i class="fa fa-plus-circle text-primary"></i> {{ __('إعلان إضافي') }}</h4>
                            </div>
                            <div class="col-6 text-start">
                                <h4>{{ number_format(session('premium.id.'.$i),2) }} {{ __('ريال') }}</h4>
                            </div>
                        </div>
                        <p>{{ __('تفعيل إعلان إضافي') }}</p>
                        <p>{{ __('عدد الأيام') }} : @if($i == 7) 30 @endif @if($i == 8) 14 @endif @if($i == 9) 7 @endif @if($i == 10) 60 @endif  @if($i == 11) 90 @endif</p>
                    @endif
                    @if($i == 10)
                        @if(request('pack') == 10)
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <h4><i class="fa fa-repeat text-primary"></i> {{ __('إعادة النشر') }}</h4>
                                </div>
                                <div class="col-6 text-start">
                                    <h4>0.00 {{ __('ريال') }}</h4>
                                </div>
                            </div>
                            <p>{{ __('التحديث إلى الأعلى كل 20 يومًا') }}</p>
                            <p>{{ __('عدد الأيام') }} : 2</p>
                        @endif
                    @endif
                    @if($i == 11)
                        @if(request('pack') == 11)
                            <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <h4><i class="fa fa-repeat text-primary"></i> {{ __('إعادة النشر') }}</h4>
                                    </div>
                                    <div class="col-6 text-start">
                                        <h4>0.00 {{ __('ريال') }}</h4>
                                    </div>
                                </div>
                                <p>{{ __('التحديث إلى الأعلى كل 20 يومًا') }}</p>
                                <p>{{ __('عدد الأيام') }} : 4</p>
                        @endif
                    @endif
                @endif
            @endif
        @endfor
        <hr>
        <h2>{{ __('الكوبون') }}</h2>
        <div class="input-group mb-3 text-center" dir="ltr">
            <button class="btn btn-outline-secondary " type="button" id="button-addon2">{{ __('إستخدم') }}</button>
            <input type="text" class="form-control" placeholder="{{ __('أدخل الكوبون') }}" aria-label="{{ __('أدخل الكوبون') }}" aria-describedby="button-addon2">
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
            <tr>
                <td colspan="2"><button type="submit" class="btn btn-primary text-center"><b>{{ __('إشتري الآن') }}</b></button></td>
            </tr>
        </table>
    </div>

</form>
@endsection
