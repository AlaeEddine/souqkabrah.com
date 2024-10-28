<div class="card mb-3">
    <div class="card-body">
<div class="motocyclesdetails">
    <div class="row">
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
                <label for="motor_cc" class="form-label">{{__('سعة المحرك (سي سي)')}}</label>
                <select name="motor_cc" id="motor_cc" class="form-select">
                    <option value="1 - 250 {{ __('سي سي') }}">1 - 250 {{ __('سي سي') }}</option>
                    <option value="250 - 499 {{ __('سي سي') }}">250 - 499 {{ __('سي سي') }}</option>
                    <option value="500 - 599 {{ __('سي سي') }}">500 - 599 {{ __('سي سي') }}</option>
                    <option value="600 - 749 {{ __('سي سي') }}">600 - 749 {{ __('سي سي') }}</option>
                    <option value="750 - 999 {{ __('سي سي') }}">750 - 999 {{ __('سي سي') }}</option>
                    <option value="1,000 {{ __('سي سي') }}">1,000 {{ __('سي سي') }}</option>
                    <option value="+1,000 {{ __('سي سي') }}">+1,000 {{ __('سي سي') }}</option>
                </select>
            </div>
        </div>
        <x-ads.shared.status />
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

