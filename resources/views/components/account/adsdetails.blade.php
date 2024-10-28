<div class="card m-2">
    <div class="card-header text-center">
        <div class="card-title">
            <h4>{{ __('ميزات إعلاناتي') }}</h4>
            <h6><small>{{ __('الإعلانات حسب الحالة') }}</small></h6>
        </div>
    </div>
    <div class="card-body">
        <p><br></p>
        <table class="table">
            <tr>
                <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-primary">{{ __('حد الإعلانات الفعالة') }}</a></td>
                <td>{{ App\Http\Controllers\AccountController::countallads(); }} / <i class="fa fa-infinity"></i></td>
            </tr>
            <tr class="d-none">
                <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-primary">{{ __('جودة الإعلانات الفعالة') }}</a></td>
                <td>0</td>
            </tr>
            <tr>
                <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-primary">{{ __('رصيد الإعلانات المميزة') }}</a></td>
                <td>0</td>
            </tr>
        </table>
        <p><br></p>
        <p class="text-center"><a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('premium') }}" @endif  class="btn btn-warning">{{ __('إحصل على إعلانات أكثر') }}</a></p>
    </div>
</div>

