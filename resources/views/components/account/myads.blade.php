<div class="card m-2">
    <div class="card-header text-center">
        <div class="card-title">
            <h4>{{ __('مُعْلِن') }}</h4>
            <h6><small>{{ __('الإعلانات حسب الحالة') }}</small></h6>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <tr>
                <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-success"><i class="fa fa-square text-success"></i> {{ __('مميز') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(6); }}</td>
            </tr>
            <tr>
                <td><a href="{{route('account.ads')}}"  class="link-offset-2 link-underline link-underline-opacity-0 text-success"><i class="fa fa-square text-success"></i> {{ __('عادي') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(5)+App\Http\Controllers\AccountController::adstatus(); }}</td>
            </tr>
            <tr>
                <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-warning"><i class="fa fa-square text-warning"></i> {{ __('بانتظار الدفع ') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(4); }}</td>
            </tr>
            <tr>
                <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-warning"><i class="fa fa-square text-warning"></i> {{ __('قيد المراجعة') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(3); }}</td>
            </tr>
            <tr>
                <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-danger"><i class="fa fa-square text-danger"></i> {{ __('مرفوض') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(2); }}</td>
            </tr>
            <tr>
                <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-danger"><i class="fa fa-square text-danger"></i> {{ __('محذوف أو منتهي الصلاحية') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(1); }}</td>
            </tr>
            <tr>
                <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-square text-primary"></i> {{ __('مسودة') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::adstatus(0); }}</td>
            </tr>
        </table>
    </div>
</div>
