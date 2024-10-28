@extends('layouts.website')
@section('content')
<style>
    .form-section{
        display: none;
    }
    .form-section.current{
        display: inline;
    }
    .parsley-errors-list{
        color: red;
    }

</style>
<form action="{{ route('ads.create.submit') }}" method="POST" enctype="multipart/form-data" id="ads-form">@csrf
    <div class="row m-2">
        <h2 class="text-center">{{ __('هل تريد زيادة مبيعاتك ؟') }}</h2>
        {{-- CATEGORY SECTION --}}
        <div class="col-md-8 col-sm-10 col-12 form-section">
            <h5>{{ __('ما الذي تود بيعه او الإعلان عنه؟') }}</h5><br>
            <div class="card">
                <div class="card-body">
                    <h6>{{ __('اختر القسم المناسب لإضافة الإعلان') }}</h6><br>
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="SearchCategory" placeholder="{{ __('إبحث عن قسم') }}..." aria-label="{{ __('إبحث عن قسم') }}..." aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div id="CategoryList">
                        @foreach (App\Models\Category::where('removed',0)->get() as $Category)
                            <button class="row col-12 m-2 align-items-center SelectCategory btn btn-outline-dark"  id="{{ e($Category->id) }}">
                                <div class="col-2 align-items-center"><img src="{{ e($Category->icon) }}" alt="{{ e($Category->name_1) }}" class="w-50"></div>
                                <div class="col-8 align-items-center"><h6>{{ e($Category->name_1) }}</h6></div><div class="col-2"><h2>></h2></div>
                            </button>
                        @endforeach
                        <input type="hidden" name="id_category" id="id_category" value="0">
                    </div>
                    <div class="form-navigation">
                        <button class="btn btn-dark text-white previous">{{ __('الرجوع') }}</button>
                    </div>
                </div>
            </div>
        </div>

        {{--  SUB CATEGORY SECTION --}}
        <div class="col-md-8 col-sm-10 col-12 form-section">
            <h5>{{ __('ما الذي تود بيعه او الإعلان عنه؟') }}</h5><br>
            <div class="card">
                <div class="card-body">
                    <h6>{{ __('اختر القسم المناسب لإضافة الإعلان') }}</h6><br>
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="SearchSubCategory" placeholder="{{ __('إبحث في القسم') }}..." aria-label="{{ __('إبحث في القسم') }}..." aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div id="SubCategoryList">
                        @foreach (App\Models\SubCategory::where('removed',0)->get() as $SubCategory)
                            @if($SubCategory->id != 11)
                            <button class="row col-12 m-2 align-items-center SelectSubCategory btn btn-outline-dark d-none" @if($SubCategory->id == 49) cv="{{ route('account.cv') }}" @endif id="{{ e($SubCategory->id) }}" id-category='{{ e(App\Models\Category::where('id',$SubCategory->category)->first()->id) }}' has-sub-sub-category='{{ e($SubCategory->has_sub_sub_category) }}'>
                                <div class="col-2 align-items-center">
                                    <img src="{{ url('/uploads/categories') }}/{{ e($SubCategory->category) }}/{{ e($SubCategory->id) }}.png" alt="{{ e($SubCategory->name_1) }}" class="w-50">
                                </div><div class="col-8 align-items-center"><h6>{{ e($SubCategory->name_1) }}</h6></div><div class="col-2"><h2>></h2></div>
                            </button>
                            @endif
                        @endforeach
                        <input type="hidden" name="id_sub_category" id="id_sub_category" value="0">
                    </div>
                    <div class="col-12 text-center form-navigation">
                        <button class="btn btn-dark text-white previous">{{ __('الرجوع') }}</button>
                    </div>
                </div>
            </div>
        </div>

        {{--  SUB SUB CATEGORY SECTION --}}
        <div class="col-md-8 col-sm-10 col-12 form-section">
            <h5>{{ __('ما الذي تود بيعه او الإعلان عنه؟') }}</h5><br>
            <div class="card">
                <div class="card-body">
                    <h6>{{ __('اختر القسم المناسب لإضافة الإعلان') }}</h6><br>
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                            <input type="text" class="form-control" id="SearchSubSubCategory" placeholder="{{ __('إبحث في القسم') }}..." aria-label="{{ __('إبحث في القسم') }}..." aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div id="SubSubCategoryList">
                        @foreach (App\Models\SubSubCategory::where('removed',0)->get() as $SubSubCategory)
                            <button class="row col-12 m-2 align-items-center SelectSubSubCategory btn btn-outline-dark d-none"  id="{{ e($SubSubCategory->id) }}" id-category='{{ e(App\Models\Category::where('id',$SubSubCategory->category)->first()->id) }}' id-sub-category='{{ e(App\Models\SubCategory::where('id',$SubSubCategory->subcategory)->first()->id) }}' >
                                <div class="col-2 align-items-center">
                                    @if(File::exists(public_path().'/uploads/categories/'.e($SubSubCategory->category).'/'.e($SubSubCategory->subcategory).'/'.($SubSubCategory->id).'.png'))
                                    <img src="{{ url('/uploads/categories') }}/{{ e($SubSubCategory->category) }}/{{ e($SubSubCategory->subcategory) }}/{{ e($SubSubCategory->id) }}.png" alt="{{ e($SubSubCategory->name_1) }}" class="w-50">
                                    @else
                                        @if(File::exists(public_path().'/uploads/categories/'.e($SubSubCategory->category).'/'.e($SubSubCategory->subcategory).'.png'))
                                        <img src="{{ url('/uploads/categories') }}/{{ e($SubSubCategory->category) }}/{{ e($SubSubCategory->subcategory) }}.png" alt="{{ e($SubSubCategory->name_1) }}" class="w-50">
                                        @endif
                                    @endif
                                </div>
                                <div class="col-8 align-items-center"><h6>{{ e($SubSubCategory->name_1) }}</h6></div><div class="col-2"><h2>></h2></div>
                            </button>
                        @endforeach
                        <input type="hidden" name="id_sub_sub_category" id="id_sub_sub_category" value="0">
                    </div>
                    <div class="col-12 text-center form-navigation">
                        <button class="btn btn-dark text-white previous">{{ __('الرجوع') }}</button>
                    </div>

                </div>
            </div>
        </div>
        {{--  PICTURES SECTION --}}
        <div class="col-md-8 col-sm-10 col-12 form-section">
            <h5>{{ __('اضف صور للاعلان') }}</h5><br>
            <div class="card">
                <div class="card-body">
                    <div class="row alert alert-primary m-4 align-items-center">
                        <div class="col-1 align-items-center">
                            <i class="fa fa-lightbulb text-primary" style="font-size: 30px"></i>
                        </div>
                        <div class="col-11 align-items-center">
                        <ul>
                            <li>• {{ __('يمكن إضافه') }} <b>{{ __('30 صورة') }}</b></li>
                            <li>• {{ __('الصور تزيد عدد المشاهدات') }}</li>
                            <li>• {{ __('نصيحة: يمكنك إعادة ترتيب الصور عن طريق سحبها من مكان لآخر') }}</li>
                        </ul>
                        </div>
                    </div>
                    <center><a class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-info-circle text-primary"></i> {{ __('نصائح لإلتقاط صور جيدة') }}</a>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ __('نصائح لإلتقاط صور جيدة') }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <b>{{ __('نصائح لإلتقاط صور جيدة') }}</b><br>
                                    <p>{{ __('فيما يلي بعض النصائح للمساعدة في جعل إعلاناتك أكثر جاذبية عن طريق تحميل صور عالية الجودة') }}.</p><br>
                                    <b>{{ __('التكبير') }}</b><br>
                                    <p>{{ __('اقترب من المنتج أو قم بالإبتعاد عنه واملأ إطار العدسة به لتزويد المشترين المحتملين برؤية واضحة للتفاصيل. تجنب تكبير أو قص الصورة بطريقة غير صحيحة الذي قد ينتج عنه صورة مشوهة أو غير واضحة') }}.</p><br>
                                    <b>{{ __('استخدم الإضاءة الجيدة') }}</b><br>
                                    <p>{{ __('الإضاءة الجيدة ضرورية لالتقاط صور جذابة. استخدم الضوء الطبيعي كلما أمكن ذلك بالتصوير بالقرب من النافذة أو بالخارج أثناء النهار. إذا كنت تقوم بالتصوير في الداخل ، فكر في استخدام مصادر الإضاءة الناعمة والمنتشرة مثل المصابيح أو صناديق الإضاءة لتجنب الظلال') }}.</p><br>
                                    <b>{{ __('زوايا متعددة') }}</b><br>
                                    <p>{{ __('قم بالتقاط صور من زوايا مختلفة لمنح المشترين رؤية شاملة للمنتج. التقط صورًا من جميع الزوايا لإظهار أي عيوب لتقديم وصف دقيق') }}.</p><br>
                                    <b>{{ __('الخلفية') }}</b><br>
                                    <p>{{ __('اختر خلفية نظيفة وخالية من الفوضى لكي لا تصرف الانتباه عن المنتج. غالبًا قم باستخدام الخلفية البيضاء العادية أو ذات الألوان المحايدة، مما يعزز التركيز على المنتج نفسه') }}.</p><br>
                                    <b>{{ __('التقاط الصور بدون تشويش') }}</b><br>
                                    <p>{{ __('تأكد من أن المنتج الخاص بك ضمن مدى العدسة. استخدم ميزة التركيز التلقائي على الكاميرا أو الهاتف الذكي ، أو اضبط التركيز يدويًا إذا لزم الأمر. يمكن للصور الباهتة وغير الواضحة ان تبعد المشترين المحتملين عن شراء منتجك') }}.</p>
                                </div>
                            </div>
                            </div>
                        </div>
                    </center>
                    <p><br></p>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12 text-center align-items-center mt-2 mb-2" style="position: relative">
                            <div class="col-12 me-2 text-center"><p class="p-2" style="transform: translate(-50%, -50%); top: 0%;  left: 50%;position:absolute;background-color:black;color:#fff;z-index:1">{{ __('صورة الغلاف') }}</p></div>
                            <x-uploadads maxfiles="1" filename="cover" url="{{ route('ads.cover.upload.submit') }}" />
                        </div>
                        @for($i = 1; $i <=30; $i++)
                            <div class="col-md-3 col-sm-6 col-12 text-center align-items-center mt-2 mb-2">
                                <x-uploadads maxfiles="1" filename="picture{{ $i }}" url="{{ route('ads.picture.upload.submit') }}" />
                            </div>
                        @endfor
                    </div>
                    <hr>
                    <div class="col-12 text-center form-navigation">
                        <button class="btn btn-dark text-white previous">{{ __('الرجوع') }}</button>
                        <button class="btn btn-primary text-white next">{{ __('المتابعة') }}</button>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
        {{-- VIDEO SECTION --}}
        <div class="col-md-8 col-sm-10 col-12 form-section">
            <h5>{{ __('أضف فيديو ريلز إلى إعلانك') }}</h5><br>
            <div class="card">
                <div class="card-body">
                    <div class="row alert alert-primary m-4 align-items-center">
                        <div class="col-1 align-items-center">
                            <i class="fa fa-lightbulb text-primary" style="font-size: 30px"></i>
                        </div>
                        <div class="col-11 align-items-center">
                        <ul>
                            <li>• {{ __('يمكن إضافة فيديو لمدة') }} <b>{{ __('30 ثانية') }}</b></li>
                            <li>• {{ __('لمشاهدات أكثر، اشرح بشكل سريع و واضح') }}</li>
                            <li>• {{ __('لتحسين جودة الفيديو قم بالتصوير بشكل طولي') }}</li>
                            <li>• {{ __('الإعلانات مع ريلز تحصل على مزيد من المشاركات والمكالمات') }}</li>
                        </ul>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-3 col-sm-6 col-12 text-center align-items-center mt-4 mb-2" style="position: relative">
                        <div class="col-12 me-2 text-center"><p class="p-2" style="transform: translate(-50%, -50%); top: 0%;  left: 50%;position:absolute;background-color:black;color:#fff;z-index:1">{{ __('فيديو') }}</p></div>
                        <x-uploadads maxfiles="1" filetype="videos" filename="video1" url="{{ route('ads.video.upload.submit') }}" />
                    </div>
                    <div class="col-12 text-center form-navigation">
                        <button class="btn btn-dark text-white previous">{{ __('الرجوع') }}</button>
                        <button class="btn btn-primary text-white next">{{ __('المتابعة') }}</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- DETAILS SECTION --}}
        <div class="col-md-8 col-sm-10 col-12 form-section">
            <h5>{{ __('تفاصيل الإعلان') }}</h5><br>
            <div class="card mb-3">
                <div class="card-body">
                    <h6>{{ __('القسم') }}</h6>
                    <div class="category_menu_name"><i class="fa-solid fa-circle-notch fa-spin"></i></div>
                    <div class="col-12 text-center form-navigation">

                    <center><a class="btn text-white" href="{{ route('ads.create') }}">{{ __('تغيير') }}</a></center>
                    </div>

                </div>
            </div>
            <x-ads.detailscontainer />

            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ __('الموقع') }}</h5>
                    <div class="alert alert-primary m-4"><i class="fa fa-lightbulb text-primary"></i> {{ __('هذا هو موقع المنتج أو موقع تقديم الخدمة') }}</div>
                    <x-city :country_id="session('user.id_country')" />
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="name_area" class="form-label">{{__('المنطقة')}}</label>
                            <input type="text" class="form-control" name="name_area" id="name_area" placeholder="{{__('المنطقة')}}" value="{{old('name_area')}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ __('التفاصيل') }}</h5>
                    <div class="row alert alert-primary m-4 align-items-center">
                        <div class="col-1 align-items-center">
                            <i class="fa fa-lightbulb text-primary" style="font-size: 30px"></i>
                        </div>
                        <div class="col-11 align-items-center">
                        <ul>
                            <li>• {{ __('أضف المزيد من التفاصيل التي تريد أن يعرفها المشترين') }}</li>
                            <li>• {{ __('تفاصيل الإعلان تزيد من فرصتك في الحصول على المشتري المناسب') }}</li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="title" class="form-label">{{__('عنوان الإعلان')}}</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="{{__('عنوان الإعلان')}}" value="{{old('title')}}" required>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="details" class="form-label">{{ __('تفاصيل الإعلان') }}</label>
                            <textarea class="form-control" id="details" name="details" rows="3" placeholder="تفاصيل الإعلان"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="ad_type" class="form-label">{{__('نوع الإعلان')}}</label>
                            <input type="text" class="form-control" name="ad_type" id="ad_type" placeholder="{{__('نوع الإعلان')}}" value="{{old('ad_type')}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="tags" class="form-label">{{__('الوسوم')}} ({{ __("فرق بنقطة-فاصلة ';'") }})</label>
                            <input type="text" class="form-control" name="tags" id="tags" placeholder="{{__('الوسوم')}}" value="{{old('tags')}}">
                        </div>
                    </div>
                    {{-- <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="allow_comments" class="form-label">{{__('تفعيل التعليقات')}}</label>
                            <select name="allow_comments" id="allow_comments" class="form-select">
                                <option value="0">{{ __('لا') }}</option>
                                <option value="1" selected>{{ __('نعم') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="mazad" class="form-label">{{__('مزاد')}}</label>
                            <select name="mazad" id="mazad" class="form-select">
                                <option value="0" selected>{{ __('لا') }}</option>
                                <option value="1">{{ __('نعم') }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="status" class="form-label">{{__('تفعيل الإعلان')}}</label>
                            <select name="status" id="status" class="form-select">
                                <option value="0">{{ __('مسودة') }}</option>
                                <option value="3" selected>{{ __('مفعل') }}</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ __('السعر') }}</h5>
                    <div class="row alert alert-primary m-4 align-items-center">
                        <div class="col-1 align-items-center">
                            <i class="fa fa-lightbulb text-primary" style="font-size: 30px"></i>
                        </div>
                        <div class="col-11 align-items-center">
                        <ul>
                            <li>• {{ __('أضف سعر واقعي للحصول على مشاهدات أكثر') }}</li>
                            <li>• {{ __('تأكد من إضافة السعر الكامل (مثال: 100،000)') }}</li>
                            <li>• {{ __('تأكد من عدم إدخال الدفعة الأولى كسعر') }}</li>
                        </ul>
                        </div>
                    </div>
                    <div class="col-md-12 col-12">
                        <x-currency />
                    </div>
                    <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="price" class="form-label">{{__('السعر')}}</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="{{__('السعر')}}" value="{{old('price')}}">
                        </div>
                    </div>
                    <div class="col-md-12 col-12 mb-3 cars-sell">
                        <div class="form-group">
                            <label for="payment_method" class="form-label">{{__('طريقة الدفع')}}</label>
                            <select name="payment_method" id="payment_method" class="form-select">
                                <option value="{{ __('كاش فقط') }}">{{ __('كاش فقط') }}</option>
                                <option value="{{ __('أقساط فقط') }}">{{ __('أقساط فقط') }}</option>
                                <option value="{{ __('كاش أو أقساط') }}">{{ __('كاش أو أقساط') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ __('معلومات الاتصال') }}</h5>
                    <div class="row alert alert-primary m-4 align-items-center">
                        <div class="col-1 align-items-center">
                            <i class="fa fa-lightbulb text-primary" style="font-size: 30px"></i>
                        </div>
                        <div class="col-11 align-items-center">
                            {{ __('أضف معلومات الاتصال الخاصة بالإعلان') }}
                        </div>
                    </div>
                    {{-- <div class="col-md-12 col-12 mb-3">
                        <div class="form-group">
                            <label for="phone_contact" class="form-label">{{__('رقم الهاتف')}}</label>
                            <input type="text" class="form-control" name="phone_contact" id="phone_contact" placeholder="{{__('رقم الهاتف')}}" value="{{old('phone_contact')}}">
                        </div>
                    </div> --}}
                    <div class="col-12 text-center form-navigation">
                        <button class="btn btn-dark text-white previous">{{ __('الرجوع') }}</button>
                        <button class="btn btn-primary text-white next">{{ __('المتابعة') }}</button>
                        <button class="btn btn-primary text-white submit" type="submit" formaction="{{ route('ads.create.submit') }}">{{ __('إضافة الإعلان') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-2 col-12">
            <br><br>
            <div class="card">
                <div class="card-body">
                  <h5>{{ __('هل تحتاج إلى مساعدة؟') }}</h5>
                    <p><small>{{ __('تواصل معنا الآن') }}</small></p>
                    <center><a class="btn btn-success text-white" href="https://api.whatsapp.com/send/?phone={{ e(App\Models\Setting::where('id',1)->first()->mobileadmin) }}&text&type=phone_number&app_absent=0"><i class="fab fa-whatsapp text-success"></i>  {{ __('واتساب') }}</a></center>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts2')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/js/----source-code-----ads.js"></script>
{{--<script src="/assets/js/adscompressed.js"></script>--}}
@endsection