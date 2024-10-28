@props(['selected'=>null,'category'=>null,'name'=>'subcategory','required'=>0])<?php use App\Models\Category; use App\Models\SubCategory; use App\Models\SubSubCategory;
if($selected == null && $category == null):
    $SubCategories = SubCategory::where('category',1)->get();
else:
    if($selected == null):
        $SubCategories = SubCategory::where('category',$category)->get();
    else:
        $SubCategories = SubCategory::where('category',$selected)->get();
    endif;
endif;
?>
<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ __('القسم الرئيسي') }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select" @if($required == 1) required @endif>
        @foreach ($SubCategories as $SubCategory)
        <option value="{{ e($SubCategory->id) }}" @if($selected == $SubCategory->id) selected @endif>{{ e($SubCategory->name_1) }}</option>
        @endforeach
    </select>
</div>
@section('scripts')
@parent
<script type="text/javascript">
    $('#category').on('change', function() {
        $('#subcategory').html("");
        $('#subsubcategory').html("");
        var category =  $('#category').val();
        //alert("ID GATEGORY = "+category);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '{{ route("ajax.subcategories.select.from.categories") }}',
            type: 'POST',
            data:{data:category},
            success: function(data) {
                $('#subcategory').html("");
                $('#subsubcategory').html("");
                //alert(data);
                $('#subcategory').html(data);
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
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    });
</script>
@endsection
