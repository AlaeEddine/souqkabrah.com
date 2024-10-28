@if(Auth::check())
<div class="card">
    <div class="card-body">
        <h5 class="mb-5"><i class="fa fa-rocket text-danger"></i> {{ __('احصل على زبائن أكثر') }}</h5>
        <h4>{{ __('زد مشاهداتك ومبيعاتك.') }}</h4>
        <h4>{{ __('بيع وتأجير وتوظيف بشكل أسرع.') }}</h4>
        <a href="">({{ __('معرفة المزيد') }})</a>
        <h6  class="mt-3">{{ __('اختر الباقة الأفضل للحصول على المزيد من المشاهدات') }}</h6>
        <div class="jaugecontainer text-center">
            <img src="/uploads/categories/jauge.png" class="text-center jauge" alt="jauge">
        </div>
        <br>
        <h5 class="text-center mb-5"><a href="" class="black"><i class="fa fa-info-circle"></i> <span class="text-decoration:underline">{{ __('المشاهدات والزبائن') }}</span></a></h5>
        <div class="card mt-2 mb-2">
            <div class="card-body">
                <h1 class="mb-3"><i class="fa fa-medal text-warning"></i> {{ __('مميز') }}</h1>
                <h4 class="text-muted">{{ __('انتقل إلى القسم المميز في أعلى قائمة نتائج البحث و احصل على المزيد من المشاهدات والزبائن مقارنة مع القسم العادي.') }}</h4>
                <h6 class="text-muted"><a href="">({{ __('اعرض مثال') }})</a></h6>
                <h3 class="mt-4 mb-4">{{ __('اختر مدة التمييز') }}</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center" onclick="selectplan1(1);" style="cursor: pointer">
                        <div class="card gray">
                            <div class="card-body plan1 border border-white">
                                <h5 class="text-center text-primary">{{ __('الأكثر مبيعاً') }}</h5>
                                <h1>3</h1>
                                <h5 class="mb-5">{{ __('يوم') }}</h5>
                                <h6 class="text-muted mt-4">0.55/{{ __('يوم') }}</h6>
                                <img src="/uploads/categories/unchecked.png" class="checked1 mt-4" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" onclick="selectplan1(2);" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 13%</span>
                        <div class="card gray ">

                            <div class="card-body plan2 border border-white">
                                <h5 class="text-center text-primary opacity-0"><br></h5>
                                <h1>7</h1>
                                <h5 class="mb-5">{{ __('يوم') }}</h5>
                                <h6 class="text-muted mt-4">0.47/{{ __('يوم') }}</h6>
                                <img src="/uploads/categories/unchecked.png" class="checked2 mt-4" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" onclick="selectplan1(3);" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 42%</span>
                        <div class="card gray">
                            <div class="card-body plan3 border border-white">
                                <h5 class="text-center text-primary">{{ __('أفضل قيمة') }}</h5>
                                <h1>30</h1>
                                <h5 class="mb-5">{{ __('يوم') }}</h5>
                                <h6 class="text-muted mt-4">0.27/{{ __('يوم') }}</h6>
                                <img src="/uploads/categories/unchecked.png" class="checked3 mt-4" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- REPEAT --}}
        <div class="card mt-4 mb-2">
            <div class="card-body">
                <h1 class="mb-3"><i class="fa fa-repeat text-primary"></i> {{ __('إعادة نشر') }}</h1>
                <h4 class="text-muted">{{ __('قم بالتحديث تلقائياً إلى أعلى نتائج البحث كما لو قمت بالنشر مرة أخرى للحصول على المزيد من المشاهدات والزبائن.') }}</h4>
                <h6 class="text-muted"><a href="">({{ __('اعرض مثال') }})</a></h6>
                <h3 class="mt-4 mb-4">{{ __('اختر عدد إعادة النشر') }}</h3>
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center" onclick="selectplan2(4);" style="cursor: pointer">
                        <div class="card gray">
                            <div class="card-body plan4 border border-white">
                                <h5 class="text-center text-primary">{{ __('الأكثر مبيعاً') }}</h5>
                                <h1>3</h1>
                                <h5 class="mb-5">{{ __('إعادة نشر') }}</h5>
                                <h6 class="text-muted mt-4">0.27/{{ __('يوم') }}</h6>
                                <img src="/uploads/categories/unchecked.png" class="checked4 mt-4" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" onclick="selectplan2(5);" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 15%</span>
                        <div class="card gray ">

                            <div class="card-body plan5 border border-white">
                                <h5 class="text-center text-primary opacity-0"><br></h5>
                                <h1>7</h1>
                                <h5 class="mb-5">{{ __('إعادة نشر') }}</h5>
                                <h6 class="text-muted mt-4">0.23/{{ __('يوم') }}</h6>
                                <img src="/uploads/categories/unchecked.png" class="checked5 mt-4" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 p-4 text-center position-relative" onclick="selectplan2(6);" style="cursor: pointer">
                        <span class="badge bg-white text-success border border-success position-absolute start-50 translate-middle" style="z-index:2">{{ __('وفر') }} 40%</span>
                        <div class="card gray">
                            <div class="card-body plan6 border border-white">
                                <h5 class="text-center text-primary">{{ __('أفضل قيمة') }}</h5>
                                <h1>30</h1>
                                <h5 class="mb-5">{{ __('إعادة نشر') }}</h5>
                                <h6 class="text-muted mt-4">0.14/{{ __('يوم') }}</h6>
                                <img src="/uploads/categories/unchecked.png" class="checked6 mt-4" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <p>* جميع الأسعار تشمل الضريبة</p>


    </div>
</div>
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
