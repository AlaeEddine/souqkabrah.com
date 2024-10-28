@props(['selected'=>null,'country_id'=>0,'name'=>'city','required'=>0])<?php use App\Models\City; use App\Models\Country;
if($selected == null && $country_id == 0):
    $Cities = City::where('country_id',2)->get();
else:
    if($selected == null):
        $Cities = City::where('country_id',$country_id)->get();
    else:
        if($country_id != 0){
            $Cities = City::where('country_id',Country::where('id',City::where('id',$selected)->first()->country_id)->first()->id)->get();
        }else{
            $Cities = City::where('country_id',City::where('id',$selected)->first()->country_id)->get();
        }
    endif;
endif;
?>
<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ __('المدينة') }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select" @if($required == 1) required @endif>
        @foreach ($Cities as $City)
        <option value="{{ e($City->id) }}" @if($selected == $City->id) selected @endif>{{ e($City->name_ar) }}</option>
        @endforeach
    </select>
</div>
@section('scripts')
@parent
<script type="text/javascript">
    $('#country').on('change', function() {
        $('#city').html("");
        var country_id =  $('#country').val();
        //alert("ID COUNTRY = "+country_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route("ajax.cities.select.from.countries") }}',
            type: 'POST',
            data:{data:country_id},
            success: function(data) {
                $('#city').html("");
                //alert(data);
                $('#city').html(data);
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    });
</script>
@endsection
