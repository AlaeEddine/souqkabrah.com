@props(['SearchCount' => 0,'Search'=>[]])
@if($SearchCount > 0)
<table id="searchtable" class="table table-bordered table-hover table-responsive table-striped rtl" style="width:100%">
    <thead>
        <tr>
            <th>{{ __('التاريخ') }}</th>
            <th>{{ __('الإعلان') }}</th>
            <th>{{ __('حالة الإعلان') }}</th>
            <th>{{ __('الأقسام') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Ads as $Ad)
        <tr>
            <td>{{ date('d/m/Y H:i',strtotime(e($Ad->created_at))) }}</td>
            <td>{{ e($Ad->title) }}</td>
            <td>
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
            <td>{{ __('الأقسام') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
    <h2 class="text-center">{{ __('لا توجد نتائج')}}</h2>
    <p class="p-5 text-center"><i class="fa fa-searchengin os-text text-center" style="font-size:50px !important;"></i></p>
@endif
@section('scripts')
@parent
<script>
    new DataTable('#searchtable', {
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
