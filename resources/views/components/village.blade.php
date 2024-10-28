@props(['selected'=>null,'country_id'=>0,'city_id'=>0,'name'=>'village','required'=>0])<?php use App\Models\Village;
if($selected == null && $city_id == 0):
    $Villages = Village::where('country_id',$country_id)->get();
else:
    if($selected == null):
        $Villages = Village::where('city_id',$city_id)->get();
    else:
        if($city_id != 0){
            $Villages = Village::where('city_id',$city_id)->get();
        }else{
            $Village::where('country_id',$country_id)->get();
        }
    endif;
endif;
?>
<div class="form-group">
    <select name="{{ $name }}" id="{{ $name }}" class="form-select {{ $name }}" style="border:1px solid #eee !important" @if($required == 1) required @endif>
        @foreach ($Villages as $Village)
        <option value="{{ e($Village->id) }}" @if($selected == $Village->id) selected @endif>{{ e($Village->name_ar) }}</option>
        @endforeach
    </select>
</div><style>
    .choices,.choices__inner{
        border:1px solid #eee !important
    }
</style>
@section('scripts')
@parent
<script type="text/javascript">
        const element2 = document.querySelector('.{{ $name }}');
        const choices2 = new Choices(element2);

    $('#city').on('change', function() {
        var city_id =  $('#city').val();
//        alert(city_id);
        choices2.clearChoices();
        choices2.removeActiveItems();
        choices2.setChoices(function() {
            return fetch('/ajax/villages/'+city_id).then(function(response) {
                return response.json();
            }).then(function(data) {
                return data.map(function(village) {
                    return { id:village.id, label: village.name_ar, value:village.id };
                });
            });
        });
    });

</script>
@endsection
