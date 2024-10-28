<div class="card mb-3">
    <div class="card-body">
<div class="cardetails">
    <div class="row">
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="id_brand" class="form-label">{{ __('النوع') }}</label>
                <select name="id_brand" id="id_brand" class="form-select my-select">
                    @foreach (App\Models\CarsBrand::get() as $CarBrand)
                    <option  value="{{ e($CarBrand->id) }}" data-img-src="{{ e($CarBrand->icon) }}">{{ e($CarBrand->name_ar) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="model" class="form-label">{{__('الموديل')}}</label>
                <input type="text" class="form-control" name="model" id="model" placeholder="{{__('الموديل')}}" value="{{old('model')}}">
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="submodel" class="form-label">{{__('الفئة')}}</label>
                <input type="text" class="form-control" name="submodel" id="submodel" placeholder="{{__('الفئة')}}" value="{{old('submodel')}}">
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="year" class="form-label">{{ __('سنة الصنع') }}</label>
                <select name="year" id="year" class="form-select">
                    @for($i = 1900;$i <= date('Y')+1;$i++)
                    <option value="{{ e($i) }}" @if($i == date('Y')) selected @endif>{{ e($i) }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="submodel" class="form-label">{{__('مواصفات إقليمية')}}</label>
                <select name="submodel" id="submodel" class="form-select">
                    <option value="{{ __('مواصفات أخرى') }}" selected>{{ __('مواصفات أخرى') }}</option>
                    <option value="{{ __('مواصفات أمريكية') }}">{{ __('مواصفات أمريكية') }}</option>
                    <option value="{{ __('مواصفات أوروبية') }}">{{ __('مواصفات أوروبية') }}</option>
                    <option value="{{ __('مواصفات خليجية') }}">{{ __('مواصفات خليجية') }}</option>
                    <option value="{{ __('مواصفات كوريا') }}">{{ __('مواصفات كوريا') }}</option>
                    <option value="{{ __('مواصفات يابانية') }}">{{ __('مواصفات يابانية') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="etat" class="form-label">{{__('الحالة')}}</label>
                <select name="etat" id="etat" class="form-select">
                    <option value="{{ __('جديد') }}" selected>{{ __('جديد') }}</option>
                    <option value="{{ __('مستعمل') }}">{{ __('مستعمل') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="km" class="form-label">{{__('الكيلومترات')}}</label>
                <select name="km" id="km" class="form-select">
                    <option value="0">0</option>
                    <option value="999 - 1">999 - 1</option>
                    <option value="9,999 - 1,000">9,999 - 1,000</option>
                    <option value="19,999 - 10,000">19,999 - 10,000</option>
                    <option value="29,999 - 20,000">29,999 - 20,000</option>
                    <option value="39,999 - 30,000">39,999 - 30,000</option>
                    <option value="49,999 - 40,000">49,999 - 40,000</option>
                    <option value="59,999 - 50,000">59,999 - 50,000</option>
                    <option value="69,999 - 60,000">69,999 - 60,000</option>
                    <option value="79,999 - 70,000">79,999 - 70,000</option>
                    <option value="89,999 - 80,000">89,999 - 80,000</option>
                    <option value="99,999 - 90,000">99,999 - 90,000</option>
                    <option value="109,999 - 100,000">109,999 - 100,000</option>
                    <option value="119,999 - 110,000">119,999 - 110,000</option>
                    <option value="129,999 - 120,000">129,999 - 120,000</option>
                    <option value="139,999 - 130,000">139,999 - 130,000</option>
                    <option value="149,999 - 140,000">149,999 - 140,000</option>
                    <option value="159,999 - 150,000">159,999 - 150,000</option>
                    <option value="169,999 - 160,000">169,999 - 160,000</option>
                    <option value="179,999 - 170,000">179,999 - 170,000</option>
                    <option value="189,999 - 180,000">189,999 - 180,000</option>
                    <option value="199,999 - 190,000">199,999 - 190,000</option>
                    <option value="+200,000">+200,000</option>
                </select>
            </div>
        </div>


        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="painting" class="form-label">{{__('الدهان')}}</label>
                <select name="painting" id="painting" class="form-select">
                    <option value="{{ __('أعيد دهانها كلياً') }}">{{ __('أعيد دهانها كلياً') }}</option>
                    <option value="{{ __('أعيد دهانها جزئياً') }}">{{ __('أعيد دهانها جزئياً') }}</option>
                    <option value="{{ __('الدهان الأصلي') }}" selected>{{ __('الدهان الأصلي') }}</option>
                    <option value="{{ __('أخرى') }}">{{ __('أخرى') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="chassis_condition" class="form-label">{{__('حالة الهيكل')}}</label>
                <select name="chassis_condition" id="chassis_condition" class="form-select">
                    <option value="{{ __('تعرضت لحادث (أضرار جسيمة في البودي)') }}">{{ __('تعرضت لحادث (أضرار جسيمة في البودي)') }}</option>
                    <option value="{{ __('حادث بسيط (البودي يحتاج للإصلاح)') }}">{{ __('حادث بسيط (البودي يحتاج للإصلاح)') }}</option>
                    <option value="{{ __('جيد (عيوب بسيطة في البودي)') }}">{{ __('جيد (عيوب بسيطة في البودي)') }}</option>
                    <option value="{{ __('ممتازة بدون حوادث') }}" selected>{{ __('ممتازة بدون حوادث') }}</option>
                    <option value="{{ __('أخرى') }}">{{ __('أخرى') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="manual_or_automatic" class="form-label">{{__('نوع ناقل الحركة')}}</label>
                <select name="manual_or_automatic" id="manual_or_automatic" class="form-select">
                    <option value="{{ __('اوتوماتيك') }}">{{ __('اوتوماتيك') }}</option>
                    <option value="{{ __('يدوي/عادي') }}" selected>{{ __('يدوي/عادي') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="gazoil_or_not" class="form-label">{{__('نوع الوقود')}}</label>
                <select name="gazoil_or_not" id="gazoil_or_not" class="form-select">
                    <option value="{{ __('بنزين') }}">{{ __('بنزين') }}</option>
                    <option value="{{ __('ديزل') }}" selected>{{ __('ديزل') }}</option>
                    <option value="{{ __('مايلد هايبرد') }}" selected>{{ __('مايلد هايبرد') }}</option>
                    <option value="{{ __('كهربائي') }}" selected>{{ __('كهربائي') }}</option>
                    <option value="{{ __('مايلد هايبرد') }}" selected>{{ __('مايلد هايبرد') }}</option>
                    <option value="{{ __('هايبرد') }}" selected>{{ __('هايبرد') }}</option>
                    <option value="{{ __('هايبرد - Plug-in') }}" selected>{{ __('هايبرد - Plug-in') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="motor_cc" class="form-label">{{__('سعة المحرك (سي سي)')}}</label>
                <select name="motor_cc" id="motor_cc" class="form-select">
                    <option value="0 - 499 {{ __('سي سي') }}">0 - 499 {{ __('سي سي') }}</option>
                    <option value="500 - 999 {{ __('سي سي') }}">500 - 999 {{ __('سي سي') }}</option>
                    <option value="1,0000 - 1,999 {{ __('سي سي') }}">1,000 - 1,999 {{ __('سي سي') }}</option>
                    <option value="2,000 - 2,999 {{ __('سي سي') }}">2,000 - 2,999 {{ __('سي سي') }}</option>
                    <option value="3,000 - 3,999 {{ __('سي سي') }}">3,000 - 3,999 {{ __('سي سي') }}</option>
                    <option value="4,000 - 4,999 {{ __('سي سي') }}">4,000 - 4,999 {{ __('سي سي') }}</option>
                    <option value="5,000 - 5,999 {{ __('سي سي') }}">5,000 - 5,999 {{ __('سي سي') }}</option>
                    <option value="+6,000 {{ __('سي سي') }}">+6,000 {{ __('سي سي') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="battery_size" class="form-label">{{__('سعة البطارية')}}</label>
                <select name="battery_size" id="battery_size" class="form-select">
                    <option value="" selected></option>
                    <option value="{{ __('أقل من 50 كيلو واط/ الساعة') }}">{{ __('أقل من 50 كيلو واط/ الساعة') }}</option>
                    <option value="{{ __('50 - 69 كيلو واط/ الساعة') }}">{{ __('50 - 69 كيلو واط/ الساعة') }}</option>
                    <option value="{{ __('40 - 89 كيلو واط/ الساعة') }}">{{ __('40 - 89 كيلو واط/ الساعة') }}</option>
                    <option value="{{ __('90 - 99 كيلو واط/ الساعة') }}">{{ __('90 - 99 كيلو واط/ الساعة') }}</option>
                    <option value="{{ __('أكثر من 100 كيلو واط/ الساعة') }}">{{ __('أكثر من 100 كيلو واط/ الساعة') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="battery_life" class="form-label">{{__('مدى البطارية')}}</label>
                <select name="battery_life" id="battery_life" class="form-select">
                    <option value="" selected></option>
                    <option value="{{ __('أقل من 100 كم/الشحنة') }}">{{ __('أقل من 100 كم/الشحنة') }}</option>
                    <option value="{{ __('100 - 199 كم/الشحنة') }}">{{ __('100 - 199 كم/الشحنة') }}</option>
                    <option value="{{ __('200 - 299 كم/الشحنة') }}">{{ __('200 - 299 كم/الشحنة') }}</option>
                    <option value="{{ __('300 - 399 كم/الشحنة') }}">{{ __('300 - 399 كم/الشحنة') }}</option>
                    <option value="{{ __('400 - 499 كم/الشحنة') }}">{{ __('400 - 499 كم/الشحنة') }}</option>
                    <option value="{{ __('أكثر من 500 كم/الشحنة') }}">{{ __('أكثر من 500 كم/الشحنة') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="color_external" class="form-label">{{__('اللون الخارجي')}}</label>
                <select name="color_external" id="color_external" class="form-select">
                    <option value="{{ __('أبيض') }}" selected>{{ __('أبيض') }}</option>
                    <option value="{{ __('أحمر') }}">{{ __('أحمر') }}</option>
                    <option value="{{ __('أخضر') }}">{{ __('أخضر') }}</option>
                    <option value="{{ __('أزرق') }}">{{ __('أزرق') }}</option>
                    <option value="{{ __('أزرق فاتح') }}">{{ __('أزرق فاتح') }}</option>
                    <option value="{{ __('أسمنتي') }}">{{ __('أسمنتي') }}</option>
                    <option value="{{ __('أسود') }}">{{ __('أسود') }}</option>
                    <option value="{{ __('أصفر') }}">{{ __('أصفر') }}</option>
                    <option value="{{ __('بترولي') }}">{{ __('بترولي') }}</option>
                    <option value="{{ __('برتقالي') }}">{{ __('برتقالي') }}</option>
                    <option value="{{ __('برونزي') }}">{{ __('برونزي') }}</option>
                    <option value="{{ __('بنفسجي') }}">{{ __('بنفسجي') }}</option>
                    <option value="{{ __('بني') }}">{{ __('بني') }}</option>
                    <option value="{{ __('بيج') }}">{{ __('بيج') }}</option>
                    <option value="{{ __('تان') }}">{{ __('تان') }}</option>
                    <option value="{{ __('تركواز') }}">{{ __('تركواز') }}</option>
                    <option value="{{ __('خمري') }}">{{ __('خمري') }}</option>
                    <option value="{{ __('ذهبي') }}">{{ __('ذهبي') }}</option>
                    <option value="{{ __('رمادي') }}">{{ __('رمادي') }}</option>
                    <option value="{{ __('زهري') }}">{{ __('زهري') }}</option>
                    <option value="{{ __('زيتي') }}">{{ __('زيتي') }}</option>
                    <option value="{{ __('فضي') }}">{{ __('فضي') }}</option>
                    <option value="{{ __('كحلي') }}">{{ __('كحلي') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="color_internal" class="form-label">{{__('اللون الداخلي')}}</label>
                <select name="color_internal" id="color_internal" class="form-select">
                    <option value="{{ __('أبيض') }}" selected>{{ __('أبيض') }}</option>
                    <option value="{{ __('أحمر') }}">{{ __('أحمر') }}</option>
                    <option value="{{ __('أخضر') }}">{{ __('أخضر') }}</option>
                    <option value="{{ __('أزرق') }}">{{ __('أزرق') }}</option>
                    <option value="{{ __('أزرق فاتح') }}">{{ __('أزرق فاتح') }}</option>
                    <option value="{{ __('أسمنتي') }}">{{ __('أسمنتي') }}</option>
                    <option value="{{ __('أسود') }}">{{ __('أسود') }}</option>
                    <option value="{{ __('أصفر') }}">{{ __('أصفر') }}</option>
                    <option value="{{ __('بترولي') }}">{{ __('بترولي') }}</option>
                    <option value="{{ __('برتقالي') }}">{{ __('برتقالي') }}</option>
                    <option value="{{ __('برونزي') }}">{{ __('برونزي') }}</option>
                    <option value="{{ __('بنفسجي') }}">{{ __('بنفسجي') }}</option>
                    <option value="{{ __('بني') }}">{{ __('بني') }}</option>
                    <option value="{{ __('بيج') }}">{{ __('بيج') }}</option>
                    <option value="{{ __('تان') }}">{{ __('تان') }}</option>
                    <option value="{{ __('تركواز') }}">{{ __('تركواز') }}</option>
                    <option value="{{ __('خمري') }}">{{ __('خمري') }}</option>
                    <option value="{{ __('ذهبي') }}">{{ __('ذهبي') }}</option>
                    <option value="{{ __('رمادي') }}">{{ __('رمادي') }}</option>
                    <option value="{{ __('زهري') }}">{{ __('زهري') }}</option>
                    <option value="{{ __('زيتي') }}">{{ __('زيتي') }}</option>
                    <option value="{{ __('فضي') }}">{{ __('فضي') }}</option>
                    <option value="{{ __('كحلي') }}">{{ __('كحلي') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="chassis_number" class="form-label">{{__('رقم الشاصي')}}</label>
                <input type="text" class="form-control" name="chassis_number" id="chassis_number" placeholder="{{__('رقم الشاصي')}}" value="{{old('chassis_number')}}">
            </div>
        </div>
        <center><a class="text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2"><i class="fa fa-info-circle text-primary"></i> {{ __('أين أجد رقم الشاصي؟') }}</a>
            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModal2Label">{{ __('أين أجد رقم الشاصي؟') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>{{ __('خلف الزجاج الأمامي من جهة السائق') }}</p>
                        <p>{{ __('على إطار باب السائق') }}</p>
                        <p>{{ __('أوراق التأمين') }}</p>
                        <p>{{ __('رخصة السيارة') }}</p>
                    </div>
                </div>
                </div>
            </div>
        </center>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="technical_details" class="form-label">{{__('مواصفات  تقنية')}}</label>
                <select name="technical_details" id="technical_details" class="form-select" multiple>
                    <option value="{{ __('أبل كار بلاي') }}">{{ __('أبل كار بلاي') }}</option>
                    <option value="{{ __('أندرويد أوتو') }}">{{ __('أندرويد أوتو') }}</option>
                    <option value="{{ __('أوامر صوتية') }}">{{ __('أوامر صوتية') }}</option>
                    <option value="{{ __('بروجكتر') }}">{{ __('بروجكتر') }}</option>
                    <option value="{{ __('بلوتوث') }}">{{ __('بلوتوث') }}</option>
                    <option value="{{ __('تشغيل عن بعد') }}">{{ __('تشغيل عن بعد') }}</option>
                    <option value="{{ __('تنبيه الاصطدام الامامي') }}">{{ __('تنبيه الاصطدام الامامي') }}</option>
                    <option value="{{ __('تنبيه النقاط العمياء') }}">{{ __('تنبيه النقاط العمياء') }}</option>
                    <option value="{{ __('تنبيه مغادرة المسار') }}">{{ __('تنبيه مغادرة المسار') }}</option>
                    <option value="{{ __('حساس ضغط الاطارات') }}">{{ __('حساس ضغط الاطارات') }}</option>
                    <option value="{{ __('دفلوك') }}">{{ __('دفلوك') }}</option>
                    <option value="{{ __('رادار') }}">{{ __('رادار') }}</option>
                    <option value="{{ __('شاشة لمس') }}">{{ __('شاشة لمس') }}</option>
                    <option value="{{ __('شاشة وسائط') }}">{{ __('شاشة وسائط') }}</option>
                    <option value="{{ __('فرامل ABS') }}">{{ __('فرامل ABS') }}</option>
                    <option value="{{ __('قفل الباب تلقائي') }}">{{ __('قفل الباب تلقائي') }}</option>
                    <option value="{{ __('كاميرا 360°') }}">{{ __('كاميرا 360°') }}</option>
                    <option value="{{ __('كاميرا خلفية') }}">{{ __('كاميرا خلفية') }}</option>
                    <option value="{{ __('مانع انزلاق') }}">{{ __('مانع انزلاق') }}</option>
                    <option value="{{ __('مثبت سرعة') }}">{{ __('مثبت سرعة') }}</option>
                    <option value="{{ __('مساعد الاصطفاف') }}">{{ __('مساعد الاصطفاف') }}</option>
                    <option value="{{ __('نظام تعليق رياضي') }}">{{ __('نظام تعليق رياضي') }}</option>
                    <option value="{{ __('نظام ملاحة / خرائط') }}">{{ __('نظام ملاحة / خرائط') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="chairs_number" class="form-label">{{__('عدد المقاعد')}}</label>
                <select name="chairs_number" id="chairs_number" class="form-select">
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="{{ __('أكثر من') }} 9">{{ __('أكثر من') }} 9</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="bodywork" class="form-label">{{__('نوع الهيكل')}}</label>
                <select name="bodywork" id="bodywork" class="form-select">
                    <option value="{{ __('اس يو في') }}">{{ __('اس يو في') }}</option>
                    <option value="{{ __('باص / فان') }}">{{ __('باص / فان') }}</option>
                    <option value="{{ __('بيك اب') }}">{{ __('بيك اب') }}</option>
                    <option value="{{ __('شاحنة') }}">{{ __('شاحنة') }}</option>
                    <option value="{{ __('صالون / سيدان') }}">{{ __('صالون / سيدان') }}</option>
                    <option value="{{ __('كشف') }}">{{ __('كشف') }}</option>
                    <option value="{{ __('كوبيه') }}">{{ __('كوبيه') }}</option>
                    <option value="{{ __('هاتشباك') }}">{{ __('هاتشباك') }}</option>
                </select>
            </div>
        </div>



        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="details_external" class="form-label">{{__('مواصفات  خارجية')}}</label>
                <input type="text" class="form-control" name="details_external" id="details_external" placeholder="{{__('مواصفات  خارجية')}}" value="{{old('details_external')}}">
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="details_internal" class="form-label">{{__('مواصفات  داخلية')}}</label>
                <input type="text" class="form-control" name="details_internal" id="details_internal" placeholder="{{__('مواصفات  داخلية')}}" value="{{old('details_internal')}}">
            </div>
        </div>

       {{--  <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="license" class="form-label">{{__('الترخيص')}}</label>
                <input type="text" class="form-control" name="license" id="license" placeholder="{{__('الترخيص')}}" value="{{old('license')}}">
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="insurance" class="form-label">{{__('التأمين')}}</label>
                <input type="text" class="form-control" name="insurance" id="insurance" placeholder="{{__('التأمين')}}" value="{{old('insurance')}}">
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="customs" class="form-label">{{__('الجمرك')}}</label>
                <input type="text" class="form-control" name="customs" id="customs" placeholder="{{__('الجمرك')}}" value="{{old('customs')}}">
            </div>
        </div> --}}
    </div>
</div>
</div>
</div>

@section('scriptscomponents')
@parent

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js" integrity="sha512-rMGGF4wg1R73ehtnxXBt5mbUfN9JUJwbk21KMlnLZDJh7BkPmeovBuddZCENJddHYYMkCh9hPFnPmS9sspki8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" integrity="sha512-0nkKORjFgcyxv3HbE4rzFUlENUMNqic/EzDIeYCgsKa/nwqr2B91Vu/tNAu4Q0cBuG4Xe/D1f/freEci/7GDRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/assets/css/ImageSelect.css">
<script src="/assets/js/ImageSelect.jquery.js" type="text/javascript"></script>
</script>
<script type="text/javascript">
  $(".my-select").chosen({width:"100%"});
</script>
@endsection

