<div class="card mb-3">
    <div class="card-body">
<div class="cardetails">
    <div class="row">

        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="model" class="form-label">{{ __('الموديل') }}</label>
                <select name="model" id="model" class="form-select">
                    <option value="{{ __('أوبل') }}">{{ __('أوبل') }}</option>
                    <option value="{{ __('إيفيكو') }}">{{ __('إيفيكو') }}</option>
                    <option value="{{ __('ام جي') }}">{{ __('ام جي') }}</option>
                    <option value="{{ __('ايسوزو') }}">{{ __('ايسوزو') }}</option>
                    <option value="{{ __('بي ام دبليو') }}">{{ __('بي ام دبليو') }}</option>
                    <option value="{{ __('بي واي دي') }}">{{ __('بي واي دي') }}</option>
                    <option value="{{ __('بيجو') }}">{{ __('بيجو') }}</option>
                    <option value="{{ __('تاتا') }}">{{ __('تاتا') }}</option>
                    <option value="{{ __('تويوتا') }}">{{ __('تويوتا') }}</option>
                    <option value="{{ __('جاي ام سي') }}">{{ __('جاي ام سي') }}</option>
                    <option value="{{ __('جريت وول') }}">{{ __('جريت وول') }}</option>
                    <option value="{{ __('جي إم سي') }}">{{ __('جي إم سي') }}</option>
                    <option value="{{ __('جيلي') }}">{{ __('جيلي') }}</option>
                    <option value="{{ __('جيه إيه سي') }}">{{ __('جيه إيه سي') }}</option>
                    <option value="{{ __('دايهاتسو') }}">{{ __('دايهاتسو') }}</option>
                    <option value="{{ __('دي إف جي') }}">{{ __('دي إف جي') }}</option>
                    <option value="{{ __('رينو') }}">{{ __('رينو') }}</option>
                    <option value="{{ __('سانغ يونغ') }}">{{ __('سانغ يونغ') }}</option>
                    <option value="{{ __('ستيروين') }}">{{ __('ستيروين') }}</option>
                    <option value="{{ __('سكانيا') }}">{{ __('سكانيا') }}</option>
                    <option value="{{ __('سكودا') }}">{{ __('سكودا') }}</option>
                    <option value="{{ __('شيري') }}">{{ __('شيري') }}</option>
                    <option value="{{ __('شيفروليه') }}">{{ __('شيفروليه') }}</option>
                    <option value="{{ __('فاو') }}">{{ __('فاو') }}</option>
                    <option value="{{ __('فوتون') }}">{{ __('فوتون') }}</option>
                    <option value="{{ __('فورد') }}">{{ __('فورد') }}</option>
                    <option value="{{ __('فولفو') }}">{{ __('فولفو') }}</option>
                    <option value="{{ __('فولكسفاغن') }}">{{ __('فولكسفاغن') }}</option>
                    <option value="{{ __('فيات') }}">{{ __('فيات') }}</option>
                    <option value="{{ __('كيا') }}">{{ __('كيا') }}</option>
                    <option value="{{ __('لكزس') }}">{{ __('لكزس') }}</option>
                    <option value="{{ __('ليفان') }}">{{ __('ليفان') }}</option>
                    <option value="{{ __('مازدا') }}">{{ __('مازدا') }}</option>
                    <option value="{{ __('مان') }}">{{ __('مان') }}</option>
                    <option value="{{ __('مرسيدس بنز') }}">{{ __('مرسيدس بنز') }}</option>
                    <option value="{{ __('ميتسوبيشي') }}">{{ __('ميتسوبيشي') }}</option>
                    <option value="{{ __('نيسان') }}">{{ __('نيسان') }}</option>
                    <option value="{{ __('هانغتشا') }}">{{ __('هانغتشا') }}</option>
                    <option value="{{ __('هوندا') }}">{{ __('هوندا') }}</option>
                    <option value="{{ __('هينو') }}">{{ __('هينو') }}</option>
                    <option value="{{ __('هيونداي') }}">{{ __('هيونداي') }}</option>
                </select>
            </div>
        </div>
        <x-ads.shared.year />
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
