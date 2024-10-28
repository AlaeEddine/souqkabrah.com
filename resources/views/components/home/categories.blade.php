    <div class="row mt-3 mb-3 px-2">
        <div class="col-7"><h3>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ __('سوق')}} {{ e(session('selector.country.name.ar')) }} @else {{ e(session('selector.country.name.en')) }}@endif</h3></div>
        <div class="col-5 @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') text-start @else text-end @endif"><a href="/الأقسام"><h5>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar') شاهد الكل <i class="fa fa-arrow-left"></i> @else View all <i class="fa fa-arrow-right"></i>@endif</h5></a></div>
    </div>

   <div class="row pl-2">
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/متاجر" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/00.webp') }}" style="width:50px" alt="{{ __('متاجر') }}"></span>
                <p style="font-size: 12px"><br>{{ __('متاجر') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/3-{{App\Http\Controllers\UserController::slug('عقارات')}}/15-{{App\Http\Controllers\UserController::slug('عقارات للبيع')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/01.webp') }}" style="width:50px" alt="{{ __('عقارات للبيع') }}"></span>
                <p style="font-size: 12px"><br>{{ __('عقارات للبيع') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/3-{{App\Http\Controllers\UserController::slug('عقارات')}}/16-{{App\Http\Controllers\UserController::slug('عقارات للإيجار')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/02.webp') }}" style="width:50px" alt="{{ __('عقارات للإيجار') }}"></span>
                <p style="font-size: 12px"><br>{{ __('عقارات للإيجار') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/1-{{App\Http\Controllers\UserController::slug('سيارات ومركبات')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/03.webp') }}" style="width:50px" alt="{{ __('مركبات') }}"></span>
                <p style="font-size: 12px"><br>{{ __('مركبات') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/2-{{App\Http\Controllers\UserController::slug('دراجات نارية')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/04.webp') }}" style="width:50px" alt="{{ __('دراجات نارية') }}"></span>
                <p style="font-size: 12px"><br>{{ __('دراجات نارية') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/15-{{App\Http\Controllers\UserController::slug('الخدمات')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/05.webp') }}" style="width:50px" alt="{{ __('الخدمات') }}"></span>
                <p style="font-size: 12px"><br>{{ __('الخدمات') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/11-{{App\Http\Controllers\UserController::slug('ازياء - موضة رجالي')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/06.webp') }}" style="width:50px" alt="{{ __('ازياء - موضة رجالي') }}"></span>
                <p style="font-size: 12px"><br>{{ __('ازياء - موضة رجالي') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/10-{{App\Http\Controllers\UserController::slug('ازياء - موضة نسائية')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/07.webp') }}" style="width:50px" alt="{{ __('ازياء - موضة نسائية') }}"></span>
                <p style="font-size: 12px"><br>{{ __('ازياء - موضة نسائية') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/12-{{App\Http\Controllers\UserController::slug('أطفال وألعاب')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/08.webp') }}" style="width:50px" alt="{{ __('أطفال وألعاب') }}"></span>
                <p style="font-size: 12px"><br>{{ __('أطفال وألعاب') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/7-{{App\Http\Controllers\UserController::slug('وظائف')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/09.webp') }}" style="width:50px" alt="{{ __('وظائف') }}"></span>
                <p style="font-size: 12px"><br>{{ __('وظائف') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/4-{{App\Http\Controllers\UserController::slug('موبايل - تابلت')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/10.webp') }}" style="width:50px" alt="{{ __('موبايل - تابلت') }}"></span>
                <p style="font-size: 12px"><br>{{ __('موبايل - تابلت') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/8-{{App\Http\Controllers\UserController::slug('لابتوب وكمبيوتر')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/11.webp') }}" style="width:50px" alt="{{ __('لابتوب وكمبيوتر') }}"></span>
                <p style="font-size: 12px"><br>{{ __('لابتوب وكمبيوتر') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/14-{{App\Http\Controllers\UserController::slug('تعليم وتدريب')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/12.webp') }}" style="width:50px" alt="{{ __('تعليم وتدريب') }}"></span>
                <p style="font-size: 12px"><br>{{ __('تعليم وتدريب') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/5-{{App\Http\Controllers\UserController::slug('العاب فيديو وملحقاتها')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/13.webp') }}" style="width:50px" alt="{{ __('العاب فيديو وملحقاتها') }}"></span>
                <p style="font-size: 12px"><br>{{ __('العاب فيديو وملحقاتها') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/9-{{App\Http\Controllers\UserController::slug('الكترونيات')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/14.webp') }}" style="width:50px" alt="{{ __('الكترونيات') }}"></span>
                <p style="font-size: 12px"><br>{{ __('الكترونيات') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/17-{{App\Http\Controllers\UserController::slug('رياضة ولياقة بدنية')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/15.webp') }}" style="width:50px" alt="{{ __('رياضة ولياقة بدنية') }}"></span>
                <p style="font-size: 12px"><br>{{ __('رياضة ولياقة بدنية') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/18-{{App\Http\Controllers\UserController::slug('كتب وهوايات')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/16.webp') }}" style="width:50px" alt="{{ __('كتب وهوايات') }}"></span>
                <p style="font-size: 12px"><br>{{ __('كتب وهوايات') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/16-{{App\Http\Controllers\UserController::slug('حيوانات')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/17.webp') }}" style="width:50px" alt="{{ __('حيوانات') }}"></span>
                <p style="font-size: 12px"><br>{{ __('حيوانات') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/19-{{App\Http\Controllers\UserController::slug('شركات - معدات مهنية')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/18.webp') }}" style="width:50px" alt="{{ __('شركات - معدات مهنية') }}"></span>
                <p style="font-size: 12px"><br>{{ __('شركات - معدات مهنية') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/6-{{App\Http\Controllers\UserController::slug('منزل وحديقة')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/19.webp') }}" style="width:50px" alt="{{ __('منزل وحديقة') }}"></span>
                <p style="font-size: 12px"><br>{{ __('منزل وحديقة') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام/13-{{App\Http\Controllers\UserController::slug('طعام وغذاء')}}" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/20.webp') }}" style="width:50px" alt="{{ __('طعام وغذاء') }}"></span>
                <p style="font-size: 12px"><br>{{ __('طعام وغذاء') }}</p>
            </a>
        </div>
        <div class="col-md-2 col-4 text-center my-3">
            <a href="/الأقسام" class="black"><span class="gray rounded-circle pt-3 pb-4 px-2 shadow-sm"><img src="{{ url('/uploads/home/21.webp') }}" style="width:50px" alt="{{ __('جميع الاقسام') }}"></span>
                <p style="font-size: 12px"><br>{{ __('جميع الاقسام') }}</p>
            </a>
        </div>
    </div>
