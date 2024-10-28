<hr>
<section id="description" class="mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4>أسرع - أسهل - مجانا</h4>
                <h3><b>حمل تطبيق {{$Setting->title}} مجانا</b></h3>
                <div class="row">
                    <div class="col-4">
                        <img src="{{ url('/assets/images/appStore.webp') }}" width="100%" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{ url('/assets/images/googlePlay.webp') }}" width="100%" alt="">
                    </div>
                    <div class="col-4">
                        <img src="{{ url('/assets/images/appGallery.webp') }}" width="100%" alt="">
                    </div>
                </div>
            </div>
            <div class="col-md-6" style="background-image:url('/assets/images/diagonal-ar.webp'); background-size:contain;background-repeat:no-repeat">
                امسح الكود
                <br>
                <img src="{{ url('/assets/images/qrOpenSooq.webp') }}" width="20%" alt="">
            </div>
        </div>
    </div>
</section>

<div class="row p-3" style="background-color:#f7f7fd">
    <div class="col-lg-2 col-12 col-xs-12 col-sm-6 mb-3">
        <div class="row">
            <div class="col-3 mt-2 px-1"><span class="icon-container p-3 rounded-circle bg-white shadow"><i class="fa fa-xl fa-envelope align-middle"></i></span></div>
            <div class="col-9"><b>{{ __('البريد الإلكتروني') }}</b>
                <br><a style="font-size: 12px" style="p-0" href="mailto:{{$Setting->emailadmin}}"><b>{{$Setting->emailadmin}}</b></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-12 col-xs-12 col-sm-6 mb-3">
        <div class="row">
            <div class="col-3 mt-2 px-1"><span class="icon-container p-3 rounded-circle bg-white shadow"><i class="fa fa-xl fa-mobile-button align-middle"></i></span></div>
            <div class="col-9"><b>{{__('الهاتف')}}</b>
                <br><a style="font-size: 12px" style="p-0" href="tel:{{$Setting->mobileadmin}}" dir="ltr"><b>{{$Setting->mobileadmin}}</b></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-12 col-xs-12 col-sm-6 mb-3">
        <div class="row">
            <div class="col-3 mt-2 px-1"><span class="icon-container p-3 rounded-circle bg-white shadow"><i class="fab fa-xl fa-whatsapp text-success align-middle"></i></span></div>
            <div class="col-9"><b>{{ __('واتساب') }}</b>
                <br><a style="font-size: 12px" style="p-0" href="tel:{{$Setting->mobileadmin}}" dir="ltr"><b>{{$Setting->mobileadmin}}</b></a>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-12 col-xs-12 col-sm-6 mb-3">
        <div class="row">
            <div class="col-3 mt-2 px-1"><span class="icon-container p-3 rounded-circle bg-white shadow"><i class="fa fa-xl fa-user-tie text-primary align-middle"></i></span></div>
            <div class="col-9"><b>{{ __('تواصل معنا') }}</b>
                <br><a style="font-size: 12px" style="p-0" href="{{ route('contact') }}" dir="ltr"><b>souqkabrah/contact</b></a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 col-xs-12 col-sm-12 text-center" dir="ltr">
        {{ __(' تابعنا على') }}
        <br>
        <div class="row mt-2 text-center">
            @if($Setting->loginsocialmedia == 1)
                <div class="col-1"></div>
                @if($Setting->appstore != null)<div class="col-2">
                    <a href="{{$Setting->appstore}}"><span class="icon-container p-2 rounded bg-white shadow-sm"><i class="fab fa-app-store"></i></span></a>
                </div>@endif
                @if($Setting->googleplay != null)<div class="col-2">
                    <a href="{{$Setting->googleplay}}"><span class="icon-container p-2 rounded bg-white shadow-sm"><i class="fab fa-google-play"></i></span></a>
                </div>@endif
                @if($Setting->twitter != null)<div class="col-2">
                    <a href="{{$Setting->twitter}}"><span class="icon-container p-2 rounded bg-white shadow-sm"><i class="fab fa-twitter"></i></span></a>
                </div>@endif
                @if($Setting->facebook != null)<div class="col-2">
                    <a href="{{$Setting->facebook}}"><span class="icon-container p-2 rounded bg-white shadow-sm"><i class="fab fa-facebook"></i></span></a>
                </div>@endif
                @if($Setting->instagram != null)<div class="col-2">
                    <a href="{{$Setting->instagram}}"><span class="icon-container p-2 rounded bg-white shadow-sm"><i class="fab fa-instagram"></i></span></a>
                </div>@endif
                <div class="col-1"></div>
            @else
                <p class="text-white">{{ __('مواقع التواصل الإجتماعي غير مفعلة') }}</p>
            @endif
        </div>
    </div>
</div>
<footer class="footer gray">
    <div class="px-2">
        <div class="row pt-3 pb-2">
            <div class="col-1 d-none d-md-block"></div>
            <div class="col-md-2 col-sm-6 col-xs-12 mb-3">
                <img src="{{ url('/assets/images/openSooqLogoDesktop.svg') }}" width="80%" alt="">
                <span class="text-muted">
                    <br>{{ __('جميع الحقوق محفوظة') }}<br>
                    {{ __('لموقع') }} {{$Setting->title}} © <?php echo date('Y'); ?>
                </span>
            </div>
            <hr class="d-md-none d-xs-block">
            <div class="col-md-2 col-sm-6 col-xs-12 mb-3">
                <p class="text-center"><b>{{ __('عن') }} {{$Setting->title}}</b><br></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('ما هو موقع') }} {{$Setting->title}} {{__(' ؟')}}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('الخدمات الاعلانية') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('خريطة الموقع') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('دول أخرى') }}</a></p>
            </div>
            <hr class="d-md-none d-xs-block">
            <div class="col-md-2 col-sm-6 col-xs-12 mb-3">
                <p class="text-center"><b>{{ __('الدعم الفني') }}</b><br></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('مساعدة') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('اتصل بنا') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('فريق المبيعات') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('إتفاقية الاستخدام') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('سياسة المحتوى') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('قواعد السلامة') }}</a></p>
            </div>
            <hr class="d-md-none d-xs-block">
            <div class="col-md-2 col-sm-6 col-xs-12 mb-3">
                <p class="text-center"><b>{{ __('أسعار و حاسبات') }}</b><br></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('اسعار ومواصفات السيارات') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('اسعار ومواصفات الموبايل') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('اسعار ومواصفات التابلت') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('اسعار ومواصفات العقارات') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('حاسبة العقارات') }}</a></p>
                <p><a href="" class="black" style="font-weight:normal">{{ __('حاسبة القروض') }}</a></p>
            </div>
            <hr class="d-md-none d-xs-block">
            <div class="col-md-2 col-sm-6 col-xs-12 mb-3">
                <p class="text-center"><b>{{ __('أخرى') }}</b><br></p>
                @foreach (App\Http\Controllers\GeneralController::getFooterPages() as $Page)
                    <a href="{{ route('pages',[ App\Http\Controllers\UserController::slug($Page->url)]) }}">{{ $Page->title }}</a></p>
                @endforeach
            </div>
            <div class="col-1 d-none d-md-block"></div>
        </div>
    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js" integrity="sha512-VK2zcvntEufaimc+efOYi622VN5ZacdnufnmX7zIhCPmjhKnOi9ZDMtg1/ug5l183f19gG1/cBstPO4D8N/Img==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/10.2.0/choices.min.js" integrity="sha512-OrRY3yVhfDckdPBIjU2/VXGGDjq3GPcnILWTT39iYiuV6O3cEcAxkgCBVR49viQ99vBFeu+a6/AoFAkNHgFteg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/js/intlTelInput.min.js" integrity="sha512-nSv4TmHKiFdWKcAEKs+OW4rd9OPo4ZNNVHxhpIQj/dZwLSDrjO8Lq6YJn5AzFeFwqXaA+u9xdVvRbfkfExTkLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ url('/assets/js/plugins') }}/toggle-password.js"></script>
<script>
// footer
@if(Route::is('login') || Route::is('register'))

    var myModal = new bootstrap.Modal(document.getElementById('LoginOrRegister'), {
    keyboard: true
    });
    var modalToggle = document.getElementById('LoginOrRegister') // relatedTarget
    myModal.show(modalToggle)

    $('#LoginOrRegister .modal-dialog').removeClass('modal-lg').addClass('modal-fullscreen');

@endif
    const element = document.querySelector('.city_selector');
    const choices = new Choices(element,{ allowHTML : true, });

    $(document).ready(function() {
        Dropzone.autoDiscover = false;
        window.onbeforeunload = function() {
            return alert("{{e($Setting->msgclose)}}");
        };
        $('.toggle-password').togglePassword({
            show: 'fa-eye',
            hide: 'fa-eye-slash',
            base: 'fa fa-fw toggle-password-button'
        });
        const input = document.querySelector("#phone");
        const button = document.querySelector("#btn");
        const errorMsg = document.querySelector("#error-msg");
        const validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        const errorMap = ["{{ __('رقم الموبايل غير صحيح') }}", "{{ __('رقم البلد غير صحيح') }}", "{{ __('رقم الموبايل قصير جدا') }}", "{{ __('رقم الموبايل طويل جدا') }}", "{{ __('رقم الموبايل غير صحيح') }}"];

        // initialise plugin
        const iti = window.intlTelInput(input, {
            countryOrder:['om'],
            excludeCountries:['il','esh','eh'],
            //initialCountry:'om',
            searchPlaceholder: "بحث",
            separateDialCode:false,
            strictMode: true,
            nationalMode: false,
            initialCountry:"om",
            /*initialCountry: "auto",
            geoIpLookup: callback => {
                $.get( "http://ip-api.com/json/<?php echo $_SERVER['REMOTE_ADDR']; ?>", function( json ) {
                    if(json.status == 'fail'){
                        callback("om");
                    }else{
                        console.log(json.status);
                        callback(json.country_code);
                    }
                });
            },*/
            i18n: {
                om:'عمان',
                ma:'المغرب',
                ps:'فلسطين',
                sa:'المملكة العربية السعودية',
                ae:'الإمارات العربية المتحدة',
                ye:'اليمن',
                bh:'البحرين',
                qa:'قطر',
                dz:'الجزائر',
            },
            hiddenInput: function(telInputName) {
                return {
                phone: "phone_full",
                country: "country_code"
                };
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/js/utils.min.js"
        });

        const reset = () => {
        input.classList.remove("error");
        $("#error-msg").html('');
        $("#error-msg").removeClass("d-block").addClass('d-none');
        $("#valid-msg").removeClass("d-block").addClass('d-none');
        };

        const showError = (msg) => {
        input.classList.add("error");
        //console.log(msg);
        $("#error-msg").html(msg);
        $("#error-msg").removeClass("d-none").addClass('d-block');
        };

        // on click button: validate
        button.addEventListener('click', () => {
        reset();
        if (!input.value.trim()) {
            showError("رقم الهاتف ضروري");
        } else if (iti.isValidNumberPrecise()) {
            // NUMBER SUBMIT (CORRECT)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('traitement.nd') }}",
                type: 'POST',
                data: {
                    country_code: iti.s['dialCode'],
                    country_name: iti.s['name'],
                    nd: iti.a.value,
                    full_nd:iti.getNumber(),
                    full_nd_format:iti.getNumber(intlTelInput.utils.numberFormat.E164),
                },
                success: function(data) {
                    $("#valid-msg").removeClass("d-none").addClass('d-block');
                    //$('#RegisterOrLogin').submit();
                   // AFFECT PHONE TO LINK (OTP FIREBASE FCM) $('.sendotplink').attr('href','/otp/send/phone/'+iti.getNumber(intlTelInput.utils.numberFormat.E164));
                    
                // console.log(iti.getNumber(intlTelInput.utils.numberFormat.E164));
                    $('#RegisterOrLogin').removeClass('d-block').addClass('d-none');
                    $('#LoginOrRegister .modal-dialog').removeClass('modal-lg').addClass('modal-fullscreen');
                    $('#LoginOrRegisterLabel').html('<img src="{{ url("/assets/images/openSooqLogoDesktop.svg") }}" alt="Logo" />');
                    $('.LoginOrRegisterContainer').removeClass('d-block').addClass('d-none');
                    //console.log(data.type);
                    if(data.type == 'register'){
                        $('.RegisterOnly').removeClass('d-none').addClass('d-block');
                    }
                    if(data.type == 'login'){
                        $('.LoginOnly').removeClass('d-none').addClass('d-block');
                    }
                    $('#phone'+data.type).val(iti.getNumber(intlTelInput.utils.numberFormat.E164));
                    $('.phonenumber').html(iti.getNumber(intlTelInput.utils.numberFormat.E164));
                    $('#number').val(iti.getNumber(intlTelInput.utils.numberFormat.E164));
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + xhr.status + " " + error);
                }
            });
        } else {
            const errorCode = iti.getValidationError();
            const msg = errorMap[errorCode] || "الرقم عير صحيح";
            showError(msg);
        }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);
            });

        if($('.notifications-badge').html() == 0){
            $('.notifications-badge').removeClass('d-block').addClass('d-none');
        }else{
            $('.notifications-badge').removeClass('d-none').addClass('d-block');
        }

        if($('.chat-badge').html() == 0){
            $('.chat-badge').removeClass('d-block').addClass('d-none');
        }else{
            $('.chat-badge').removeClass('d-none').addClass('d-block');
        }
</script>
{!! $Setting->footer !!}
