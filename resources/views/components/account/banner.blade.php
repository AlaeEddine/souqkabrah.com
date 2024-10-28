<div class="card">
    <div class="card-body">
        <div class="col-12">
            <div class="row text-center">
                <div class="col-md-2 col-xs-12">
                    <a href="/account"><img @if(session('user.picture') != null) src="{{ e(session('user.picture')) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" width="200"></a>
                </div>
                <div class="col-md-10 col-xs-12 ">
                    <h2 class="inline">{{ e(session('user.name')) }}</h2><a href="" class="text-success d-none"><small>{{ __('ترقية الإشتراك إلى متجر') }}</small></a>
                    <div class="row">
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-user"></i> {{ __('عضو منذ') }} {{ date('d/m/Y',strtotime(e(session('user.created_at')))) }}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-address-card"></i> {{ __('رقم العضوية') }} {{ e(session('user.id')) }}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-users"></i> {{ __('المتابعون') }} {{ App\Http\Controllers\AccountController::countLikes() }}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-user-check"></i> {{ __('المتابعون') }}  {{ App\Http\Controllers\AccountController::countLikers() }}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3 col-xs-12 p-1">
                            <a href="{{ route('account.cv') }}" class="btn btn-dark text-white"><i class="fa fa-user-tie"></i> {{ __('تعديل السيرة الذاتية') }}</a>
                        </div>
                        <div class="col-md-3 col-xs-12 p-1">
                            <a href="/account/tabs/account" class="btn btn-dark text-white"><i class="fa fa-pencil"></i>  {{ __('تعديل الملف الشحصي') }}</a>
                        </div>
                        <div class="col-md-3 col-xs-12 p-1">
                            <a href="{{ route('account.profile.page',[ session('user.link') ]) }}" class="btn btn-dark text-white"><i class="fa fa-eye"></i> {{ __('مشاهدة البروفايل') }}</a>
                        </div>
                        <div class="col-md-3 col-xs-12 p-1">
                            <a href="{{ route('invite.friends',[ session('user.link') ]) }}" class="btn btn-dark text-white"><i class="fa fa-share"></i> {{ __('شارك الرابط مع أصدقائك') }}</a>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
