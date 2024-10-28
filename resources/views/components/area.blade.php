@props(['selected'=>null,'country_id'=>0,'city_id'=>0,'name'=>'area','required'=>0])
<?php use App\Models\Area;  use App\Models\City; use App\Models\Country;
if($selected == null && $city_id == 0):
    $CitAreasies = Area::where('city_id',1)->get();
else:
    if($selected == null):
        $Areas = Area::where('city_id',$city_id)->get();
    else:
        if($city_id != 0){
            $Areas = Area::where('city_id',Country::where('id',City::where('id',$selected)->first()->city_id)->first()->id)->get();
        }else{
            $Areas = Area::where('city_id',1)->get();
        }
    endif;
endif;
?>
<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ __('المدينة') }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select" @if($required == 1) required @endif>
        @foreach ($Areas as $Area)
        <option value="{{ e($Area->id) }}" @if($selected == $Area->id) selected @endif>{{ e($Area->name_ar) }}</option>
        @endforeach
    </select>
</div>
@section('scripts')
@parent
<script type="text/javascript">
    $('#city').on('change', function() {
        $('#area').html("");
        var city_id =  $('#city').val();
        //alert("ID city = "+city_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route("ajax.areas.select.from.cities") }}',
            type: 'POST',
            data:{data:country_id},
            success: function(data) {
                $('#area').html("");
                $('#area').html(data);
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    });
</script>
@endsection
