@props(['AdsCount' => 0,'Ads'=>[]])
@if(session('success'))
    <div class="mt-4"><div class="m-2 alert alert-success">{{e(session('success'))}}</div></div>
@endif
@if(session('error'))
    <div class="mt-4"><div class="m-2 alert alert-danger"><i class="fa fa-warning"></i> {{e(session('error'))}}</div></div>
@endif
@if($AdsCount > 0)
<table id="adstable" class="table table-bordered table-hover table-responsive table-striped rtl" style="width:100%">
    <thead>
        <tr>
            <th>{{ __('التاريخ') }}</th>
            <th>{{ __('الإعلان') }}</th>
            <th>{{ __('الأقسام') }}</th>
            <th>{{ __('مسح') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Ads as $Ad)
        <tr>
            <td>{{ date('d/m/Y H:i',strtotime(e($Ad->created_at))) }}</td>
            <td><a href="{{ route('ads',[$Ad->id]) }}">{{ e($Ad->title) }}</a></td>
            <td class="d-none">
                @if($Ad->status == 0)
                    <i class="fa fa-square text-primary"></i> {{ __('مسودة') }}
                @endif
                @if($Ad->status == 1)
                    <i class="fa fa-square text-danger"></i> {{ __('محذوف أو منتهي الصلاحية') }}
                @endif
                @if($Ad->status == 2)
                    <i class="fa fa-square text-danger"></i> {{ __('مرفوض') }}
                @endif
                @if($Ad->status == 3)
                    <i class="fa fa-square text-warning"></i> {{ __('قيد المراجعة') }}
                @endif
                @if($Ad->status == 4)
                    <i class="fa fa-square text-warning"></i> {{ __('بانتظار الدفع') }}
                @endif
                @if($Ad->status == 5)
                    <i class="fa fa-square text-success"></i> {{ __('عادي') }}
                @endif
                @if($Ad->status == 6)
                    <i class="fa fa-square text-success"></i> {{ __('مميز') }}
                @endif
            </td>
            <td>
                {{ e($Ad->name_category) }}
                @if($Ad->name_subcategory != null) > {{ e($Ad->name_subcategory) }} @endif
                @if($Ad->name_subsubcategory != null) > {{ e($Ad->name_subsubcategory) }} @endif
            </td>
            <td><a href="{{ route('ads.remove',[$Ad->id]) }}" onclick="return confirm('{{__('هل تريد حقا مسح الإعلان؟')}}');"><i class="fa fa-trash text-danger"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <h2 class="text-center">{{ __('لا توجد إعلانات')}}</h2>
    <p class="p-5 text-center"><i class="fa fa-bullhorn os-text text-center" style="font-size:50px !important;"></i></p>
    <h2 class="text-center">{{ __('بيع ما لا تحتاج واكسب المال')}}</h2>
    <br>
    <ul class="text-center">
        <li><i class="fa fa-check text-success"></i> {{ __('الوصول إلى الملايين من المشترين')}}</li>
        <li><i class="fa fa-check text-success"></i> {{ __('أضف إعلانك وبيع أي شيء')}}</li>
        <li><i class="fa fa-check text-success"></i> {{ __('بيع كل ما تريده بأفضل الأسعار')}}</li>
    </ul>
    <p class="text-center m-5">
        <a href="{{ route('ads.create') }}" class="btn os-background text-white"><i class="fa fa-plus-square"></i> {{ __('أضف إعلانك الآن') }}</a>
    </p>
@endif
@section('scripts')
@parent
<script>
    new DataTable('#adstable', {
    select: true,
    language: {
        info: 'إظهار الصفحة _PAGE_ من أصل _PAGES_',
        infoEmpty: 'لا توجد تسجيلات',
        infoFiltered: '(فلترة من أصل _MAX_ تسجيلات)',
        lengthMenu: 'إظهار _MENU_ تسجيلات في الصفحة',
        zeroRecords: 'لا توجد تسجيلات - آسف',
        search:'البحث'
    }

});
</script>
@endsection
