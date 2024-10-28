@props(['Setting'])
<style>
    .choices{
        font-size: 12px !important;
    }
    .city_selector.choices__inner,.city_selector.choices{
        border:0px transparent !important;
    } 
</style>
<?php
$MobileAdminToCall = "";
if(strstr($Setting->mobileadmin,' ')):
    $MobileAdminToCall = str_replace(' ', '', $Setting->mobileadmin);
    $MobileAdminToCall = preg_replace('/[^0-9]/','',$MobileAdminToCall);
    $MobileAdminToCall = "+$MobileAdminToCall";
endif;
?>
<?php
if(session('selector.country.id') != null && session('selector.country.id') != 0):
        $CountryIDToShoose = e(session('selector.country.id'));
else:
    if(App\Http\Controllers\GeneralController::getcountryfromip(Request::ip()) != 0):
        $CountryIDToShoose = e(App\Http\Controllers\GeneralController::getcountryfromip(Request::ip()));
    else:
        $CountryIDToShoose = 2;
    endif;
endif;
session('selector.country.id',$CountryIDToShoose);
session('selector.country.name.ar',App\Models\Country::where('id',$CountryIDToShoose)->get()->first()->name_ar);
session('selector.country.name.en',App\Models\Country::where('id',$CountryIDToShoose)->get()->first()->name_en);
Session::put('selector.country.id',$CountryIDToShoose);
Session::put('selector.country.name.ar',App\Models\Country::where('id',$CountryIDToShoose)->get()->first()->name_ar);
Session::put('selector.country.name.en',App\Models\Country::where('id',$CountryIDToShoose)->get()->first()->name_en);

$CountrySelector = App\Models\Country::where('id',$CountryIDToShoose)->get()->first();?>

<div class="gray">
    <div class="container" >
        <div class="col-12" @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') dir="ltr" @else dir="rtl" @endif>
            <div class="col-md-8 col-xs-6 col-sm-6"></div>
         
            <div class="col-md-4 col-xs-6 col-sm-6 text-secondary">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar')<a href="{{ route('translate',['en']) }}" class="black">English</a>@else <a href="{{ route('translate',['ar']) }}" class="black">عربي</a> @endif | <span dir="ltr"><a href="tel:{{ $MobileAdminToCall }}" class="black"><i class="fa fa-phone text-primary"></i> {{$Setting->mobileadmin}}</a></span></div>
        </div>
    </div>
</div>
<div class="d-none d-md-block">
    <div class="row mt-2 mb-2 align-items-center justify-content-between">
        <div class="col-2 d-sm-none d-md-block text-center">
            <a href="/"><img src="{{url('/assets/images')}}/openSooqLogoDesktop.svg" class="img-fluid" style="max-width:140px; height:auto;" alt="logo"></a>
        </div>
        <div class="col-md-3 text-center">
            <input type="hidden" name="country_selector" value="{{ $CountryIDToShoose }}">
            <select name="city_selector" id="city_selector" class="form-select city_selector"  onchange="redirectToCity()">
                <option value="0" selected>
                    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') 
                        {{ e($CountrySelector->name_ar) }} - {{ __('كل المدن') }}
                    @else  
                        {{ e($CountrySelector->name_en) }} - {{ __('All Cities') }}
                    @endif
                </option>
                
                @foreach(App\Models\City::get() as $City)
                    @if($City->country_id == $CountrySelector->id)
                        <option value="{{ $City->id }}" @if(session('selector.city.id') == $City->id) selected @endif>
                            @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                                {{ e($City->name_ar) }}
                            @else
                                {{ e($City->name_en) }}
                            @endif
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-1 text-center">
            <a class="black" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('account') }}" @endif>
                <i class="fa fa-xl fa-server px-2" style="position:relative"></i>
            </a>
        </div>
        <div class="col-1 text-center">
            <a class="black" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('notification') }}"  @endif>
                <span class="badge bg-danger notifications-badge" style="border-radius:20px;position: absolute;z-index:5;margin-top:-15px">0</span>
                <i class="fa fa-xl fa-bell px-2"></i>
            </a>
        </div>
        <div class="col-1 text-center">
            <a class="black" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('chat') }}"  @endif>
                <span class="badge bg-danger chat-badge" style="border-radius:20px;position: absolute;z-index:5;margin-top:-15px">0</span>
                <i class="fa fa-xl fa-message px-2"></i>
            </a>
        </div>
        <div class="col-2 text-start">
            @if(!Auth::check())
                <a data-bs-toggle="modal" data-bs-target="#LoginOrRegister" class="btn btn-outline-primary">
                    <b><i class="fa fa-user"></i> {{ __('تسجيل الدخول') }}</b>
                </a>
            @else
            
            <div class="dropdown input-control" dir="ltr">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img @if(session('user.picture') != null) src="{{e(session('user.picture'))}}" @else src="/uploads/categories/no_profile.png" @endif alt="" class="w-20 h-20" style="width: 20px; height:20px"> {{ e(session('user.name')) }}
                </button>
                <ul class="dropdown-menu input-control" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="/account">{{__('حسابي')}}</a></li>
                  <li><a class="dropdown-item" href="/chat">{{ __('دردشاتي') }}</a></li>
                  <li><a class="dropdown-item" href="/logout">{{ __('تسجيل الخروج') }}</a></li>
                </ul>
              </div>
            @endif
        </div>
        <div class="col-2 col-md-2 text-center">
            <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('ads.create') }}" @endif class="btn btn-warning text-white">
                <b><i class="fa fa-camera"></i> {{ __('أضف إعلانك الآن') }}</b>
            </a>
        </div>
    </div>
</div>


<div class="d-md-none d-sm-block m-0 p-0">
    <div class="row mt-2 mb-2">
        <div class="col-4 text-center">
            <a href="/"><img src="{{url('/assets/images')}}/openSooqLogoDesktop.svg" class="img-fluid" style="max-width:100px; height:auto;" alt="logo"></a>
        </div>
        
        <div class="col-1 mt-2 text-center">
            <a class="black" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('account') }}" @endif><i class="fa fa-xl fa-server px-2" style="position:relative"></i></a>
        </div>
        <div class="col-1 mt-2 text-center">
            <a class="black" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('notification') }}"  @endif><span class="badge bg-danger notifications-badge" style="border-radius:20px;position: absolute;z-index:5;margin-top:-15px">0</span><i class="fa fa-xl fa-bell px-2"></i></a>
        </div>
        <div class="col-1 mt-2 text-center">
            <a class="black" @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('chat') }}"  @endif><span class="badge bg-danger chat-badge" style="border-radius:20px;position: absolute;z-index:5;margin-top:-15px">0</span><i class="fa fa-xl fa-message px-2"></i></a>
        </div>
        <div class="col-5 text-center text-end"><a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('ads.create') }}" @endif class="btn btn-sm btn-warning text-white mt-2" style="font-size: 12px;"><b><i class="fa fa-camera"></i> {{ __('أضف إعلانك') }}</b></a></div>
    </div>
</div>

<!-- Modal modal-fullscreen -->
<div class="modal fade" id="LoginOrRegister" @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') dir="rtl"  @else dir="ltr" @endif data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="LoginOrRegisterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg modal-fullscreen-sm-down" role="document">
      <div class="modal-content">
        <div class="modal-header">
            @if(!Route::is('login') && !Route::is('register'))
                @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')<button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>@endif
            @else
            @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')<a class="btn-close m-0" href="/" aria-label="Close"></a>@endif
            @endif
          <h5 class="modal-title text-center" id="LoginOrRegisterLabel">{{ __('تسجيل الدخول أو التسجيل') }}</h5>
          <a href="{{ route('contact') }}" style="text-decoration: none"><i class="fa fa-life-ring"></i> {{ __('مساعدة') }}</a>
            @if(!Route::is('login') && !Route::is('register'))
                @if(Illuminate\Support\Facades\App::currentLocale() == 'en')<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>@endif
            @else
            @if(Illuminate\Support\Facades\App::currentLocale() == 'en')<a class="btn-close m-0" href="/" aria-label="Close"></a>@endif

            @endif
        </div>
        <style>
            .iti{
                width: 100%;
            }
        </style>
        <div class="modal-body gray p-0" @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') dir="rtl"  @else dir="ltr" @endif>
            <div class="row mx-0 LoginOrRegisterContainer h-100">
                <div class="col-12 col-md-6 gray p-2 h-100">
                    <div class="col-12 p-4 h-100">
                        <form method="POST" id="RegisterOrLogin">@csrf
                            <label for="phone" class="pb-2"><b>{{ __('رقم الموبايل') }}</b></label>
                            <div class="mb-3 text-center" dir="ltr">
                                <br>
                                {{-- <input type="tel" name="phone" id="phone" class="form-control align-right">
                                <div class="text-danger errorphone"></div>
                                <div class="text-danger errormsg"></div>
                                <div class="text-success validmsg"></div> --}}
                                <input id="phone" type="tel" name="phone" dir="ltr" class="form-control">
                                <div id="valid-msg" class="d-none text-success">✓ {{ __('صحيح') }}</div>
                                <div id="error-msg" class="d-none text-danger">X {{ __('غير صحيح') }}</div>
                            </div>
                            <button class="form-control btn btn-primary" id="btn" type="button">{{ __('التالي') }}</button>
                        </form>
                        <p class="text-center pt-4">{{ __('باستخدامك سوق الكبرة أنت توافق على') }} <br>
                            <a href="/">{{ __('إتفاقية الاستخدام') }}</a> و <a href="/">{{ __('سياسة المحتوى') }}</a>
                        </p>
                    </div>
                  </div>
                  <div class="col-6 p-2 pl-5 bg-white h-100">
                        <div class="col-12 p-4">
                            {{ __('أفضل طريقة') }}<br>
                            <h5>{{ __('لبيع أو شراء أي شيء') }}</h5><br><i class="fa fa-check text-success"></i>
                            {{ __('انضم إلى ملايين الأشخاص على سوق الكبرة') }}<br><i class="fa fa-check text-success"></i>
                            {{ __('تسجيل الدخول يعزز الثقة والأمان') }}<br><i class="fa fa-check text-success"></i>
                            {{ __('أجب على الرسائل و العروض') }}<br><i class="fa fa-check text-success"></i>
                            {{ __('إدارة الإعلانات المفضلة والمحفوظة') }}<br><i class="fa fa-check text-success"></i>
                            {{ __('أضف أي شيء للبيع او للإيجار او وظيفة') }}<br>
                        </div>
                  </div>
            </div>
            <div class="gray LoginOnly d-none h-100">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ __('كلمة المرور') }}</h3>
                        <p>{{ __('الرجاء تعبئة كلمة المرور') }}</p>
                        <form id="LoginOnlyForm" action="{{ route('login.user') }}" method="POST">@csrf
                            <div class="mb-3">
                                <label for="phonelogin">{{ __('رقم الموبايل') }}</label>
                                <input type="text"  id="phonelogin" name="phone" dir="ltr" readonly class="form-control">
                                <div class="text-danger errorphonelogin"></div>
                            </div>
                            <div class="mb-3">
                                <label for="password">{{ __('كلمة المرور') }}</label>
                                <input type="password"  id="password" name="password" dir="ltr" class="form-control toggle-password">
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                        <div class="col-6 text-center">
                                        <input type="hidden" dir="ltr" name="number2" id="number2" @if(session('user.phone') != null) value="{{ session('user.phone') }}" @endif>
                                        <div class="alert alert-success" id="sentSuccess2" style="display: none;"></div>
                                        <div class="alert alert-success" id="successAuth2" style="display: none;"></div>
                                        <div class="alert alert-danger" id="error2" style="display: none;"></div>
                                        <div id="recaptcha-container2" class="mt-2"></div>

                                        <form class="d-none" id="verifysms2">
                                            <input type="text" id="verification2" class="form-control d-none" placeholder="{{__('كود')}}">
                                            <button type="button" id="verification-btn2" class="btn-outline-dark form-control text-center black mt-2 d-none" onclick="verify2(this)"><i class="fa fa-envelope text-warning"></i> {{__('التحقق من الكود')}}</button>
                                        </form>

                                        <a class="forget-code" onclick="sendotplink2(this)">نسيت كلمة المرور؟</a>
                                    </div>
                                    <div class="col-6">
                                        <label for="remember_me" class="inline-flex items-center">
                                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                            <span class="ms-2 text-sm text-gray-600">{{ __('تذكرني') }}</span>
                                        </label>
                                    </div>

                                </div>
                            </div>
                            <button class="form-control btn btn-primary py-2" id="LoginSubmit" disabled><h4>{{ __('التالي') }}</h4></button>

                        </form>
                    </div>
                </div>
                <p class="text-center pt-4">{{ __('باستخدامك سوق الكبرة أنت توافق على') }} <br>
                    <a href="/">{{ __('إتفاقية الاستخدام') }}</a> و <a href="/">{{ __('سياسة المحتوى') }}</a>
                </p>

            </div>
            <div class="gray LoginSuccess d-none h-100 row">
                <div class="card">
                    <div class="card-body gray">
                        <div class="card card-body">
                            <div class="row align-middle">
                                <div class="col-1 align middle"><br><i class="fa fa-circle-check text-success align middle"></i></div>
                                <div class="col-11">
                                    <b>{{ __('تم تسجيل الدخول بنجاح') }}</b><br>{{ __('قم بإضافة إعلان أو تصفح الإعلانات الآن') }}
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-2">
                                <a onclick="location.reload();" class="btn btn-primary form-control mb-2"><b>{{ __('المتابعة') }}</b></a>
                            </div>
                            <div class="col-md-6 col-12 mb-2">
                                <a href="{{ route('ads.create') }}" class="btn btn-warning form-control col-md-6 col-12 mb-2 text-white"><b><i class="fa fa-camera"></i> {{ __('أضف إعلان') }}</b></a>
                            </div>
                        </div>

                    </div>
                </div>
                <p class="text-center pt-4">{{ __('باستخدامك سوق الكبرة أنت توافق على') }} <br>
                    <a href="/">{{ __('إتفاقية الاستخدام') }}</a> و <a href="/">{{ __('سياسة المحتوى') }}</a>
                </p>
            </div>

            <div class="row gray RegisterOnly d-none h-100">
                <div class="col-12">
                <div class="card card-body m-2">
                    <form method="GET" action="@if(session('user.phone') != null){{ route('otp.send',['phone',e(session('user.phone'))]) }}@endif">
                        <h6>{{ __('رمز التحقق') }}</h6>
                        {{ __('لبناء الثقة وحماية المستخدمين بموجب القانون المحلي قم بتوثيق رقم الموبايل') }} <b><span class="phonenumber" dir="ltr"></span></b>
                        <p><br>
                        <input type="hidden" dir="ltr" name="number" id="number" @if(session('user.phone') != null) value="{{ session('user.phone') }}" @endif>
                        <div class="alert alert-danger" id="error" style="display: none;"></div>
                        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                        <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                        
                        {{-- <div id="recaptcha-container"></div><br> --}}
                        <form class="d-none" id="verifysms">
                            <input type="text" id="verification" class="form-control d-none" placeholder="{{__('كود')}}">
                            <button type="button" id="verification-btn" class="btn-outline-dark form-control text-center black mt-2 d-none" onclick="verify(this)"><i class="fa fa-envelope text-warning"></i> {{__('التحقق من الكود')}}</button>
                        </form>
                        <div id="recaptcha-container" class="mt-2"></div>
                        <a class="sendotplink btn-outline-dark form-control text-center black" onclick="sendOTP(this)" id="send-sms"><b><i class="fa fa-envelope text-warning"></i> {{ __('وثق عبر Firebase') }}</b></a>                                        </p>
                        <a class="mt-2 text-center" onclick="resendOTP(this)">{{ __('لم أتوصل بالكود') }}</a>  
                    </form>
                </div>
                </div>
                <p class="text-center pt-4">{{ __('باستخدامك سوق الكبرة أنت توافق على') }} <br>
                    <a href="/">{{ __('إتفاقية الاستخدام') }}</a> و <a href="/">{{ __('سياسة المحتوى') }}</a>
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>
<x-header.navbar />
<x-header.searchbar />
@section('scripts')
@parent
<script>
    $('#password').on('keyup', function(e){
        e.preventDefault();
        if($(this).val() == ''){
            $("#LoginSubmit").attr('disabled', 'disabled');
        }else{
            $("#LoginSubmit").removeAttr('disabled');
        }
    });
    $('#LoginOnlyForm').on('submit', function(f){
        f.preventDefault();
        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('login.user') }}",
                type: 'POST',
                data: $('#LoginOnlyForm').serialize(),
                success: function(data) {
                    // ON SUBMIT LOGIN
                        if(data == 1){
                            $(".LoginOnly").removeClass('d-block').addClass('d-none');
                            $('.LoginSuccess').addClass('d-block').removeClass('d-none');
                        }else{
                            //alert('Not Connected');
                            $('.errorphonelogin').html('رقم الموبايل أو كلمة المرور خاطئة');
                            //console.log(data);
                        }
                },
                error: function(xhr, status, error) {
                   // console.log("An error occurred: " + xhr.status + " " + error);
                }
            });
    });
    /*$('#RegisterOrLogin').on('submit',function(e){
        e.preventDefault();
        var phone = $('#phone').val();
        $('#btn').attr('disabled','disabled');
        if($('#phone').val().length == 0) {
            $('#btn').removeAttr('disabled');
            $('.errorphone').html("{{ __('رقم الموبايل فارغ') }}");
        }else{
            $('.errorphone').html('');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('check') }}",
                type: 'POST',
                data: $('#RegisterOrLogin').serialize(),
                success: function(data) {
                    //console.log(data);
                    $('.sendotplink').each(function() {
                        $(this).attr('href', '/otp/send/phone/' + phone);
                    });                    
                    transformModalTo(data.type);
                    $('#phone'+data.type).val(phone);  
                    $('.phonenumber').html(phone);
                    $('#number').val(phone);
                    $('.sendotplink').each(function() {
                        $(this).attr('href', '/otp/send/phone/' + phone);
                    });
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + xhr.status + " " + error);
                }
            });
        }

    });*/

    ChatCounthasRun = false;
    refreshConversation();
    function refreshConversation(){
        if (!ChatCounthasRun) {
            setInterval(() => {
                ChatCount();
            }, 1000)
            ChatCounthasRun = true;
        }
    }
    NotificationCounthasRun = false;
    refreshNotification();
    function refreshNotification(){
        if (!NotificationCounthasRun) {
            setInterval(() => {
                NotificationCount();
            }, 1000)
            NotificationCounthasRun = true;
        }
    }
</script>

@if(Auth::check() && session('user.id') != null && session('user.id') != 0 && session('user.id') != "0")
<script>
function ChatCount(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{ route('chat.count') }}",
        type: 'POST',
        success: function(data) {
            //alert(data);
            if(data == 0){
                $('.chat-badge').removeClass('d-block').addClass('d-none');
            }else{
                $('.chat-badge').removeClass('d-none').addClass('d-block');
            }
            $('.chat-badge').html(data);
        },
        error: function(xhr, status, error) {
            //console.log("An error occurred: " + xhr.status + " " + error);
        }
    });
}
function NotificationCount(){
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{ route('notification.count') }}",
        type: 'POST',
        success: function(data) {
            //alert(data);
            if(data == 0){
                $('.notifications-badge').removeClass('d-block').addClass('d-none');
            }else{
                $('.notifications-badge').removeClass('d-none').addClass('d-block');
            }
            $('.notifications-badge').html(data);
        },
        error: function(xhr, status, error) {
            //console.log("An error occurred: " + xhr.status + " " + error);
        }
    });
}

</script>
@else
<script>

function ChatCount(){
    return 0;
}
function NotificationCount(){
    return 0;
}
</script>

@endif
<script>
    function redirectToCity() {
        var select = document.getElementById('city_selector');
        var url = select.options[select.selectedIndex].value;
        window.location.href = "/city/select/"+url;
    }
</script>

{{--
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.23.0/firebase-messaging-compat.js"></script>
<script src="{{url('/assets/js')}}/firebase.js"></script>
<script>
    // Vérifier si la permission de notification est accordée
    if (Notification.permission === 'granted') {
        // Enregistrer le Service Worker et récupérer le token
        registerServiceWorkerAndGetToken("{{env('VAPID_FIREBASE')}}","{{ csrf_token() }}");
    } else if (Notification.permission !== 'denied') {
        // Demander la permission si elle n'est ni accordée ni refusée
        Notification.requestPermission().then(permission => {
            if (permission === 'granted') {
                registerServiceWorkerAndGetToken("{{env('VAPID_FIREBASE')}}","{{ csrf_token() }}");
            } else {
                alert('يتوجب عليك قبول الإشعارات');
            }
        });
    } else {
        alert('يتوجب عليك قبول الإشعارات');
    }
</script>--}}
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>

<script src="/firebase.auth.js"></script>
<script src="/firebase.forgot.js"></script>
@endsection
