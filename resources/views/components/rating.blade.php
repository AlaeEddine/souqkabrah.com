@props(['User'=>null, 'ReadOnly'=>'0','Rating'=>null])
<?php
if($User == null): $UserID =''; else: $UserID = e($User->id); endif;
?>
<div class="rating{{ $UserID }} text-center"></div><small>({{ App\Models\Rating::where([['id_to','=',e($User->id)],['removed','=',0],])->count() }})</small><br class=" mb-2">
@section('scripts')
@parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.css" integrity="sha512-JEUoTOcC35/ovhE1389S9NxeGcVLIqOAEzlpcJujvyUaxvIXJN9VxPX0x1TwSo22jCxz2fHQPS1de8NgUyg+nA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.4/jquery.rateyo.min.js" integrity="sha512-09bUVOnphTvb854qSgkpY/UGKLW9w7ISXGrN0FR/QdXTkjs0D+EfMFMTB+CGiIYvBoFXexYwGUD5FD8xVU89mw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
@if($ReadOnly == '1')
$('.rating{{ $UserID }}').on( "click", function() {
  alert( "يجب أن تسجل الدخول لتتمكن من التقييم" );
} );
@endif
$('.rating{{ $UserID }}').rateYo({
    normalFill: "#ccc",
    @if($Rating!= null) rating:'{{ $Rating }}', @endif
    starWidth: "20px",
    ratedFill: '#F7941D',
    fullStar: true,
    @if($ReadOnly=='1') readOnly: true, @endif
    /*onInit: function (rating, rateYoInstance) {
        alert("RateYo initialized! with " + rating);
    },*/
    onSet: function (rating, rateYoInstance) {
        //alert("Rating is set to: " + rating);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('ajax.rating.insert') }}",
            type: 'POST',
            data:{
                ratingResult:rating,
                id_to:"{{ e($User->id) }}",
            },
            success: function(data) {
                alert(data);
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    },
});

</script>
@endsection
