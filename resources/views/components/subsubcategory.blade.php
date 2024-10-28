@props(['selected'=>null,'category'=>null,'subcategory'=>null,'name'=>'subsubcategory','required'=>0])<?php use App\Models\Category; use App\Models\SubCategory; use App\Models\SubSubCategory;
if($selected == null && $category == null && $subcategory == null):
    $SubSubCategories = SubSubCategory::where('removed',100)->get();
else:
    if($selected == null && $subcategory == null):
        $SubSubCategories = SubSubCategory::where('category',$category)->get();
    else:
        if($selected == null && $category == null):
            $SubSubCategories = SubSubCategory::where('subcategory',$subcategory)->get();
        else:
            $SubSubCategories = SubSubCategory::where('subcategory',$selected)->get();
        endif;
    endif;
endif;
?>
<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ __('القسم الفرعي') }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select" @if($required == 1) required @endif>
        @foreach ($SubSubCategories as $SubSubCategory)
        <option value="{{ e($SubSubCategory->id) }}" @if($selected == $SubSubCategory->id) selected @endif>{{ e($SubSubCategory->name_1) }}</option>
        @endforeach
    </select>
</div>
@section('scripts')
@parent
<script type="text/javascript">
    $('#subcategory').on('change', function() {
        $('#subsubcategory').html("");
        var subcategory =  $('#subcategory').val();
        //alert("ID GATEGORY = "+subcategory);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route("ajax.subsubcategories.select.from.subcategories") }}',
            type: 'POST',
            data:{data:subcategory},
            success: function(data) {
                $('#subsubcategory').html("");
                //alert(data);
                $('#subsubcategory').html(data);
                if($('#subcategory').val() == 1 || $('#subcategory').val() == 2){
                    $('.cardetails').removeClass('d-none').addClass('d-block');
                    if($('#subcategory').val() == 2){
                        $('.carrental').removeClass('d-none').addClass('d-block');
                    }else{
                        $('.carrental').removeClass('d-block').addClass('d-none');
                    }
                }else{
                    $('.cardetails').removeClass('d-block').addClass('d-none');
                }
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    });
</script>
@endsection
