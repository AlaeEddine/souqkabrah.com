<div class="row">
    <div class="col-md-6 col-xs-12 p-2">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4>{{ __('حالة حسابي') }}</h4>
                    <h6><small>{{ __('قم بتعبئة محفظتك عن طريق إضافة رصيد أو شحن بطاقة') }}</small></h6>
                </div>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td><a href="{{route('account.ads')}}"><i class="fa fa-square text-primary"></i> {{ __('الإعلانات الفعالة') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countactiveads() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads')}}"><i class="fa fa-square text-primary"></i> {{ __('الإعلانات المتبقية') }}</a></td>
                        <td><i class="fa fa-infinity"></i></td>
                    </tr>
                    <tr>
                        <td><a href=""><i class="fa fa-square text-primary"></i> {{ __('الإعلانات المدفوعة') }}</a></td>
                        <td>0</td>
                    </tr>
                </table>
            </div>
        </div>
        <p><br></p>
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4>{{ __('إحصائيات الحساب') }}</h4>
                    <h6><small>{{ __('عدد المشاهدات') }} 0</small></h6>
                </div>
            </div>
            <div class="card-body">
                <ul>
                    <li>
                        <table class="table">
                            <tr>
                                <td><a href="{{route('account.ads.seen')}}"><i class="fa fa-square text-success"></i> {{ __('مشاهدات الإعلانات') }}</a></td>
                                <td style="text-align: left;">{{ App\Http\Controllers\AccountController::countseenads() }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table class="table">
                            <tr>
                                <td><a href=""><i class="fa fa-square text-primary"></i> {{ __('مشاهدات الحساب') }}</a></td>
                                <td style="text-align: left;">{{ App\Http\Controllers\AccountController::countseenuser() }}</td>
                            </tr>
                        </table>
                    </li>
                    <li>
                        <table class="table">
                            <tr>
                                <td><a href=""><i class="fa fa-square text-gray"></i> {{ __('مشاهدات السيرة الذاتية') }}</a></td>
                                <td style="text-align: left;">{{ App\Http\Controllers\AccountController::countseencv() }}</td>
                            </tr>
                        </table>
                    </li>
                </ul><p class="text-center"><a href="{{ route('account.statistics') }}" class="btn"><i class="fa fa-eye"></i> {{ __('شاهد إحصائيات  حسابي') }}</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12 p-2">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4>{{ __('حد الإعلانات في الأقسام') }}</h4>
                    <h6><small>{{ __('هذا هو عدد الإعلانات التي يمكنك الإعلان عنها مجانًا تحت كل قسم') }}</small></h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    @foreach (App\Http\Controllers\UserController::Categories() as $Category)
                    <tr>
                        <td><i class="{{ e($Category->icon) }}"></i> {{ e($Category->name_1) }}</td>
                        <td><i class="fa fa-infinity"></i></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>



</div>
