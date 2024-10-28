<div class="card mb-3">
    <div class="card-body">
<div class="cardetails">
    <div class="row">
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="id_brand" class="form-label">{{ __('النوع') }}</label>
                <select name="id_brand" id="id_brand" class="vodiapicker form-select">
                    @foreach (App\Models\CarsBrand::get() as $CarBrand)
                    <option  value="{{ e($CarBrand->id) }}" data-thumbnail="{{ e($CarBrand->icon) }}">{{ e($CarBrand->name_ar) }}</option>
                    @endforeach
                </select>
                <div class="lang-select">
                    <button class="btn-select" value=""></button>
                    <div class="b">
                        <ul id="a"></ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="model" class="form-label">{{__('الموديل')}}</label>
                <input type="text" class="form-control" name="model" id="model" placeholder="{{__('الموديل')}}" value="{{old('model')}}">
            </div>
        </div>
        <x-ads.shared.fi2a />
        <x-ads.shared.year />
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
                <label for="rental_period" class="form-label">{{__('مدة الإيجار')}}</label>
                <select name="rental_period" id="rental_period" class="form-select">
                    <option value="{{ __('يومي') }}">{{ __('يومي') }}</option>
                    <option value="{{ __('أسبوعي') }}">{{ __('أسبوعي') }}</option>
                    <option value="{{ __('شهري') }}">{{ __('شهري') }}</option>
                    <option value="{{ __('سنوي') }}">{{ __('سنوي') }}</option>
                </select>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@section('scripts')
@parent

<script>
    var langArray = [];
$('.vodiapicker option').each(function(){
  var img = $(this).attr("data-thumbnail");
  var text = this.innerText;
  var value = $(this).val();
  var item = '<li class"px-4 py-4"><img src="'+ img +'" alt="" value="'+value+'"/><span>'+ text +'</span></li>';
  langArray.push(item);
})

$('#a').html(langArray);

//Set the button value to the first el of the array
$('.btn-select').html(langArray[0]);
$('.btn-select').attr('value', 'en');

//change button stuff on click
$('#a li').click(function(e){
    e.preventDefault();
   var img = $(this).find('img').attr("src");
   var value = $(this).find('img').attr('value');
   var text = this.innerText;
   var item = '<li class"px-4 py-4"><img src="'+ img +'" alt="" /><span>'+ text +'</span></li>';
  $('.btn-select').html(item);
  $('.btn-select').attr('value', value);
  $(".b").toggle();
  //console.log(value);
});

$(".btn-select").click(function(e){
    e.preventDefault();
        $(".b").toggle();
    });

//check local storage for the lang
var sessionLang = localStorage.getItem('lang');
if (sessionLang){
  //find an item with value of sessionLang
  var langIndex = langArray.indexOf(sessionLang);
  $('.btn-select').html(langArray[langIndex]);
  $('.btn-select').attr('value', sessionLang);
} else {
   var langIndex = langArray.indexOf('ch');
  console.log(langIndex);
  $('.btn-select').html(langArray[langIndex]);
  //$('.btn-select').attr('value', 'en');
}

</script>
@endsection

