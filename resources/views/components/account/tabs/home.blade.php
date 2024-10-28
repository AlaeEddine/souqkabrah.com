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
                <table class="table">
                    <tr>
                        <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-square text-primary"></i> {{ __('الإعلانات الفعالة') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countactiveads() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-square text-primary"></i> {{ __('حد الإعلانات الفعالة') }}</a></td>
                        <td><i class="fa fa-infinity"></i></td>
                    </tr>
                    <tr>
                        <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-square text-primary"></i> {{ __('رصيد المحفظة') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countsolduser() }}</td>
                    </tr>
                    <tr>
                        <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-square text-primary"></i> {{ __('رصيد التميز') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countspecialuser() }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4>{{ __('إحصائيات الحساب') }}</h4>
                    <h6><small>{{ __('عدد المشاهدات') }} {{ App\Http\Controllers\AccountController::countprofileseen() }}</small></h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><a href="{{route('account.ads.seen')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-success"><i class="fa fa-square text-success"></i> {{ __('مشاهدات الإعلانات') }}</a></td>
                        <td style="text-align: left;">{{ App\Http\Controllers\AccountController::countseenads() }}</td>
                    </tr>
                    <tr>
                        <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-dark"><i class="fa fa-square text-dark"></i> {{ __('مشاهدات الحساب') }}</a></td>
                        <td style="text-align: left;">{{ App\Http\Controllers\AccountController::countseenuser() }}</td>
                    </tr>
                    <tr>
                        <td><a href="" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-square text-gray"></i> {{ __('مشاهدات السيرة الذاتية') }}</a></td>
                        <td style="text-align: left;">{{ App\Http\Controllers\AccountController::countseencv() }}</td>
                    </tr>
                </table>

                <p class="text-center d-none"><a href="{{ route('account.statistics') }}" class="btn btn-dark"><i class="fa fa-eye"></i> {{ __('شاهد إحصائيات  حسابي') }}</a></p>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <x-account.myads />
        <br>
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4>{{ __('مشتر') }}</h4>
                    <h6><small>{{ __('الإعلانات الأخرى التي أهتم بها') }}</small></h6>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td><a href="{{route('account.ads.likes')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-heart os-text"></i> {{ __('الإعلانات المفضلة') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countLikes() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads.seen')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-eye os-text"></i> {{ __('آخر الإعلانات المشاهدة') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countseenads() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads.likers')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-user-plus os-text"></i> {{ __('إعلانات المتابعون') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countLikers() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads.job')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-user-tie os-text"></i> {{ __('طلبات التوظيف') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countjobads() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads.search.liked')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-search os-text"></i> {{ __('البحوث المفضلة') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countlikedsearch() }}</td>
                    </tr>
                    <tr>
                        <td><a href="{{route('account.ads.search.history')}}" class="link-offset-2 link-underline link-underline-opacity-0 text-primary"><i class="fa fa-clock os-text"></i> {{ __('آخر البحوث') }}</a></td>
                        <td>{{ App\Http\Controllers\AccountController::countsearch() }}</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>
</div>
