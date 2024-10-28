@props(['User'])
<div class="card">
    <div class="card-body">
        <div class="col-12">
            <div class="row text-center">
                <div class="col-md-2 col-xs-12">
                    <?php
                        $UsersData =  App\Models\User::where([
                            ['id','=', e($User->id)],
                            ['removed','=', 0],
                        ]);
                        $SEEN = $UsersData->first()->seen+1;
                        $UsersData->update([
                            'seen' => $SEEN
                        ]);
                    ?>
                    <img @if($User->picture != null) src="{{ e($User->picture) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" width="200">
                </div>
                <div class="col-md-10 col-xs-12 ">
                    <h2 class="inline mt-2">{{ e($User->name) }}</h2><a href="" class="text-success d-none"><small>{{ __('ترقية الإشتراك إلى متجر') }}</small></a>
                    <div class="row mt-4">
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-user"></i> {{ __('عضو منذ') }} {{ date('d/m/Y',strtotime(e($User->created_at))) }}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-address-card"></i> {{ __('رقم العضوية') }} {{ e($User->id) }}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-users"></i> {{ __('المتابعون') }} {{ App\Http\Controllers\AccountController::countLikes() }}
                        </div>
                        <div class="col-md-3 col-xs-12">
                            <i class="fa fa-user-check"></i> {{ __('المتابعون') }}  {{ App\Http\Controllers\AccountController::countLikers() }}
                        </div>
                    </div>
                    <div class="row mt-4">
                        @if($User->email != null)
                        <div class="col-md-4 mt-2 col-12 text-center">
                            <a href="mailto:{{ e($User->email) }}" class="btn btn-dark text-white"><i class="fa fa-envelope"></i> {{ e($User->email) }}</a>
                        </div>
                        @endif
                        @if($User->phone != null)
                        <div class="col-md-4 mt-2 col-12 text-center">
                            <a href="tel:{{ e($User->phone) }}" dir="ltr" class="btn btn-dark text-white"><i class="fa fa-phone"></i> {{ e($User->phone) }}</a>
                        </div>
                        @endif
                        <div class="col-md-4 mt-2 col-12 text-center">
                            <a href="{{ route('invite.friends',[ $User->link ]) }}" class="btn btn-dark text-white"><i class="fa fa-share"></i> {{ __('شارك رابط العضو') }}</a>
                        </div>
                    </div>
                    <br>

                </div>
            </div>
        </div>
    </div>
</div>
