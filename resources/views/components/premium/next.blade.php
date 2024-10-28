@if(Auth::check())
    @if(session('premium.price') == 0 || session('premium.price') == null)
    <script>
        window.location.href ="/premium";
    </script>
    @else
        <div class="card">
            <div class="card-body">
                <h5 class="mb-5"><i class="fa fa-hourglass-half text-warning"></i> {{ __('مدد الآن') }}</h5>
                <h4>{{ __('مدد فترة إعلانك.') }}</h4>
                <h4 class="d-none">{{ __('الخدمة التي قمت بإختيارها تتجاوز مدة صلاحية الإعلان.') }}</h4>
                <a href="">({{ __('معرفة المزيد') }})</a>
                <h6  class="mt-3">{{ __('اختر الباقة الأفضل للحصول على المزيد من الزبائن') }}</h6>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 52%</span>
                        <div class="card gray">
                            <div class="card-body plan7 border border-white">
                                <h5 class="text-center text-primary opacity-0"><br></h5>
                                <h4>{{ __('فعال') }} 30 {{ __('يوم') }}</h4>
                                <h6 class="text-muted mt-4">0.08/{{ __('يوم') }}</h6>
                                <h5>{{ __('المجموع') }} 2.45 {{ __('ريال') }}</h5>
                                <a href="{{ route('premium.submit',7) }}" class="btn btn-primary form-control p-2 text-center mt-2"><b>{{ __('إختر') }}</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 35%</span>
                        <div class="card gray">
                            <div class="card-body plan8 border border-white">
                                <h5 class="text-center text-primary opacity-0"><br></h5>
                                <h4>{{ __('فعال') }} 14 {{ __('يوم') }}</h4>
                                <h6 class="text-muted mt-4">0.12/{{ __('يوم') }}</h6>
                                <h5>{{ __('المجموع') }} 1.63 {{ __('ريال') }}</h5>
                                <a href="{{ route('premium.submit',8) }}" class="btn btn-primary form-control p-2 text-center mt-2"><b>{{ __('إختر') }}</b></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" style="cursor: pointer">
                        <div class="card gray">
                            <div class="card-body plan9 border border-white">
                                <h5 class="text-center text-primary">{{ __('الأكثر مبيعاً') }}</h5>
                                <h4>{{ __('فعال') }} 7 {{ __('يوم') }}</h4>
                                <h6 class="text-muted mt-4">0.18/{{ __('يوم') }}</h6>
                                <h5>{{ __('المجموع') }} 1.22 {{ __('ريال') }}</h5>
                                <a href="{{ route('premium.submit',9) }}" class="btn btn-primary form-control p-2 text-center mt-2"><b>{{ __('إختر') }}</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 69%</span>
                        <div class="card gray">
                            <div class="card-body plan10 border border-white">
                                <h5 class="text-center text-primary opacity-0"><br></h5>
                                <h4>{{ __('فعال') }} 60 {{ __('يوم') }}</h4>
                                <h6><i class="fa fa-plus text-success"></i> 2 {{ __('إعادة نشر') }}</h6>
                                <h6>({{ __('التحديث الى الأعلى كل 20 يومًا') }})</h6>
                                <h6 class="text-muted mt-4">0.06/{{ __('يوم') }}</h6>
                                <h5>{{ __('المجموع') }} 3.68 {{ __('ريال') }}</h5>
                                <a href="{{ route('premium.submit',10) }}" class="btn btn-primary form-control p-2 text-center mt-2"><b>{{ __('إختر') }}</b></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 70%</span>
                        <div class="card gray">
                            <div class="card-body plan11 border border-white">
                                <h5 class="text-center text-primary">{{ __('أفضل قيمة') }}</h5>
                                <h4>{{ __('فعال') }} 90 {{ __('يوم') }}</h4>
                                <h6><i class="fa fa-plus text-success"></i> 4 {{ __('إعادة نشر') }}</h6>
                                <h6>({{ __('التحديث الى الأعلى كل 20 يومًا') }})</h6>
                                <h6 class="text-muted mt-4">0.06/{{ __('يوم') }}</h6>
                                <h5>{{ __('المجموع') }} 5.32 {{ __('ريال') }}</h5>
                                <input type="hidden" name="price" id="price11" value="5.32">
                                <a href="{{ route('premium.submit',11) }}" class="btn btn-primary form-control p-2 text-center mt-2"><b>{{ __('إختر') }}</b></a>
                            </div>
                        </div>
                    </div>
                </div>
                <p>* جميع الأسعار تشمل الضريبة</p>
            </div>
        </div>
    @endif
@else
    <script>
        window.location.href ="/login";
    </script>
@endif
@section('scripts')
@parent
<script type="text/javascript">
    function selectplan1(plan){
        if($('.checked'+plan).attr('src') == '/uploads/categories/checked.png'){
            $(".plan1").removeClass('border border-primary').addClass('border border-white');
            $(".plan2").removeClass('border border-primary').addClass('border border-white');
            $(".plan3").removeClass('border border-primary').addClass('border border-white');

            $('.checked1').attr('src', '/uploads/categories/unchecked.png');
            $('.checked2').attr('src', '/uploads/categories/unchecked.png');
            $('.checked3').attr('src', '/uploads/categories/unchecked.png');
            sendrequest(plan,0);
        }else{
            $(".plan1").removeClass('border border-primary').addClass('border border-white');
            $(".plan2").removeClass('border border-primary').addClass('border border-white');
            $(".plan3").removeClass('border border-primary').addClass('border border-white');

            $('.checked1').attr('src', '/uploads/categories/unchecked.png');
            $('.checked2').attr('src', '/uploads/categories/unchecked.png');
            $('.checked3').attr('src', '/uploads/categories/unchecked.png');
            $(".plan"+plan).removeClass('border border-white').addClass('border border-primary');
            $('.checked'+plan).attr('src', '/uploads/categories/checked.png');
            $('.jauge').attr('src', '/uploads/categories/jauge'+plan+'.png');
            sendrequest(plan,1);
        }
    }
    function selectplan2(plan){
        if($('.checked'+plan).attr('src') == '/uploads/categories/checked.png'){
            $(".plan4").removeClass('border border-primary').addClass('border border-white');
            $(".plan5").removeClass('border border-primary').addClass('border border-white');
            $(".plan6").removeClass('border border-primary').addClass('border border-white');

            $('.checked4').attr('src', '/uploads/categories/unchecked.png');
            $('.checked5').attr('src', '/uploads/categories/unchecked.png');
            $('.checked6').attr('src', '/uploads/categories/unchecked.png');
            sendrequest(plan,0);
        }else{
            $(".plan4").removeClass('border border-primary').addClass('border border-white');
            $(".plan5").removeClass('border border-primary').addClass('border border-white');
            $(".plan6").removeClass('border border-primary').addClass('border border-white');

            $('.checked4').attr('src', '/uploads/categories/unchecked.png');
            $('.checked5').attr('src', '/uploads/categories/unchecked.png');
            $('.checked6').attr('src', '/uploads/categories/unchecked.png');
            $(".plan"+plan).removeClass('border border-white').addClass('border border-primary');
            $('.checked'+plan).attr('src', '/uploads/categories/checked.png');
            $('.jauge').attr('src', '/uploads/categories/jauge'+plan+'.png');
            sendrequest(plan,1);
        }
    }
    function sendrequest(plan,removeoradd) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('calculate.price.premium') }}",
            type: 'POST',
            data: {
                plan: plan,
                removeoradd: removeoradd,
                checked1: $('.checked1').attr('src'),
                checked2: $('.checked2').attr('src'),
                checked3: $('.checked3').attr('src'),
                checked4: $('.checked4').attr('src'),
                checked5: $('.checked5').attr('src'),
                checked6: $('.checked6').attr('src'),
            },
            success: function(data) {
                //alert(data.totalprice);
                //console.log(data.count);
                //console.log(data.orderID);
                $('.priceorders').html(data.totalprice);
                $('.countorders').html(data.count);
                if(data.count == 0){
                    $('.premiumsubmit').attr('disabled', 'disabled');
                }else{
                    $('.premiumsubmit').removeAttr('disabled');
                }
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    }
</script>
@endsection
