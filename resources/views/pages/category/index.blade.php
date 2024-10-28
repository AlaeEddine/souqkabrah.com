@extends('layouts.website')
@section('content')
<div class="m-5">

        <h2 class="mb-3 mt-3">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }} @endif {{  __('في') }}
            <x-getcountryname />
        </h2>

        <x-getcountryname /> / <a href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}" class="black"><x-getcategoryname :Category=$Category /></a>
        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <div class="row mb-5">
            @foreach ($SubCategories as $SubCategory)
            <div class="col-6 col-sm-6 col-xs-6 col-md-2 p-2 my-2"> <a class="black" href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}">
                <div class="card">
                    <div class="text-center">
                        <center><img class="d-block text-center img-responsive" src="{{ url('/uploads/categories') }}/{{ e($Category->id) }}/{{ e($SubCategory->id) }}.png" alt="{{ e($SubCategory->name_1) }}"></center>
                        <x-getsubcategoryname :SubCategory=$SubCategory />
                    </div>
                </div></a>
            </div>
            @endforeach
        </div>
        @if($Category->id == 1)
        <div class="row mb-3">
            <h2 class="mb-3 mt-3">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }} @endif</h2>
            @foreach(App\Models\CarsBrand::get() as $Brand)
            <?php
                $BRAND_NAME = App\Http\Controllers\UserController::slug(e($Brand->name_ar));
            ?>
                <div class="col-6 col-md-3">
                    <a href="{{ route('ads.by.brand',[$Brand->id,$BRAND_NAME]) }}" class="black">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Brand->name_ar) }}@else{{ e($Brand->name_en) }}@endif</a>
                </div>
            @endforeach
        </div>
        @endif
        <hr>
        <div class="row mb-3">
            <h2 class="mb-3 mt-3">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }} @endif {{ __('حسب المدينة') }}</h2>
            @foreach(App\Models\City::where('country_id',e(session('selector.country.id')))->get() as $City)
                <?php
                    $COUNTRY_NAME = App\Http\Controllers\UserController::slug(App\Models\Country::where('id',e(session('selector.country.id')))->get()->first()->name_ar);
                    $CITY_NAME = App\Http\Controllers\UserController::slug(e($City->name_ar));
                    $CATEGORY_NAME = App\Http\Controllers\UserController::slug(e($Category->name_1));
                ?>
                <div class="col-6 col-md-3 mb-3"><a href="{{ route('ads.by.category',[$City->country_id,$COUNTRY_NAME,$City->id,$CITY_NAME, $Category->id, $CATEGORY_NAME ]) }}" class="black">
                    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                        {{ e($Category->name_1) }} {{ __('في') }} {{ e($City->name_ar) }}
                    @else
                        {{ e($Category->name_2) }} {{ __('في') }} {{ e($City->name_en) }}
                    @endif
                </a></div>
            @endforeach
        </div>
        <hr>
        <div class="row mb-3">
            @foreach(App\Models\City::where('country_id',e(session('selector.country.id')))->get() as $City)
            <?php
                $COUNTRY_NAME = App\Http\Controllers\UserController::slug(App\Models\Country::where('id',e(session('selector.country.id')))->get()->first()->name_ar);
                $CITY_NAME = App\Http\Controllers\UserController::slug(e($City->name_ar));
                $CATEGORY_NAME = App\Http\Controllers\UserController::slug(e($Category->name_1));
            ?>
            <a href="{{ route('ads.by.category',[$City->country_id,$COUNTRY_NAME,$City->id,$CITY_NAME, $Category->id, $CATEGORY_NAME ]) }}" class="black col-6 col-md-3 mb-3"><div class="gray rounded-pill py-2 text-center">
                    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                        {{ e($City->name_ar) }}
                    @else
                       {{ e($City->name_en) }}
                    @endif
                </div></a>
            @endforeach
        </div>
        @if($Category->id == 1)

        <hr>
        <div class="row mb-3">
            <p><h5 class="mb-3 mt-3">{{ __('اكبر سوق لبيع السيارات الجديدة والمستعملة في') }} <x-getcountryname /></h5>
            {{ __('أجل .. إن السيارات والمركبات على اختلاف أنواعها أصبحت بذات الأهمية التي نوليها للأمور الأساسية في حياتنا، خاصة وأنها تعتبر وسيلة النقل الأكثر شيوعاً وانتشاراً من حولنا سواء للمسافات القصيرة أو حتى الطويلة، لذلك فإن تداولها بشكل كبير أمر منطقي مقارنة بنسب الاستخدام والطلب عليها في مختلف أنحاء العالم عموماً.') }}
            {{ __('وعلى إثر ذلك وتماشياً مع دخول عالم الإنترنت والتكنولوجيا الحديثة في كل الأمور حتى أنها طالت التجارة والتسويق، أصبح بالإمكان البيع والشراء عبر مواقع إلكترونية متخصصة كما هو الحال في موقع السوق المفتوح الذين يحتوي على قسم سيارات ومركبات هذا والذي بدوره يعتبر منصة إلكترونية لبيع وشراء جميع أنواع وموديلات واشكال السيارات والمركبات وكل ما يتعلّق بها من أمور.
            ') }}
            </p>
            <p><h5>{{ __('ماذا يقدم قسم السيارات والمركبات للمستخدمين في') }} <x-getcountryname /></h5>
            {{ __('يقدّم هذه القسم للمستخدمين في جميع مناطق دولة ') }} <x-getcountryname /> {{ __(' إمكانية بيع وشراء واستئجار السيارات والشاحنات والدراجات النارية أو ما يُدعى بالدباب، إضافة إلى قطع الغيار والإكسسوارات والإضافات الأخرى ذات الصلة، وذلك من خلال الإعلان أو البحث في هذه الموقع وتحديداً في هذه القسم، قسم السيارات والمركبات') }}.
            {{ __('كمستخدم ستجد أن هذا القسم يحتوي على عدة أقسام فرعية تشتمل على: سيارات للبيع، سيارات للإيجار، لوازم وقطع غيار، دباب، لوحات سيارات، شاحنة - معدات ثقيلة، اطارات - جنوط، قوارب - جت سكي وحراج السيارات أخرى، جميعها تابعة لكل ما يتم تصنيفه ضمن قائمة وسائل النقل وسواء كانت لنقل الركاب أما البضائع وما شابهها.') }}
            </p>

            <p>{{ __('ومن خلال هذه الأقسام الفرعية يمكنك بيع أو شراء ما ترغب بها ممّا هو متعلّق بعالم السيارات والمركبات وبأي حال كانت جديدة أما مستعملة، وبالمواصفات التي تريدها أيضاً بدءاً من النوع والموديل وحتى اللون وطريقة الدفع.') }}</p>
            <p>{{ __('إضافة إلى كل ما ذكر فإن موقع السوق المفتوح يتيح لمستخدميه في قسم حراج السيارات خاصة وجميع الأقسام عامة إمكانية البحث المتقدم التي بدورها تساعد على إظهار النتائج المُرادة بأقل وقت وضمن شروط ومعلومات معينة يتم تحديدها من قبل المستخدم الذي يبحث عن أي شيء متعلّق بالسيارات والمركبات.') }}</p>
            <p>{{ __('ومن أهم الأمور التي ستجدها في هذا القسم هو طرق التواصل المباشر مع صاحب الإعلان من خلال خاصية الدردشة أو التعليق على الإعلان نفسه أو الإتصال مباشرة عبر الهاتف بها للتفاهم.') }}</p>
            <p>{{ __('ولا يقتصر استخدام قسم حراج السيارات على المستهلكين فقط بل يتعدّاه إلى التجار وأصحاب مراكز البيع الذين يرغبون ببيع الأنواع والموديلات الموجودة لديهم، إلى جانب الخدمات التي يقدمونها من قطع غيار وإكسسوارات لكافة أنواع السيارات والشاحنات والدباب وحتى القوارب والجت سكي وما إلى ذلك.') }}</p>
            <p>{{ __('الجدير بالذكر هنا بأنه يمكن لأي مستخدم سواء كانت بائعاً أما مشترياً إن يجدر أمامه عدد كبير من الخيارات المتعلقة بنتيجة بحثه من بحيث النوع والكمّ والمواصفات التي تتضمن الحالة واللون وسنة الصنع والسعر وما إلى ذلك من أمور وتفاصيل تهمّه.') }}</p>
        </div>
        @endif
@endsection
