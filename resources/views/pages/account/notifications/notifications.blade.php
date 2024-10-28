@extends('layouts.website')
@section('content')
<div class=" m-5">
    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-title">
                        <h4><i class="fa fa-bell os-text"></i> {{ __('تنبيهاتي') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if($NotificationsCount > 0)
                        @foreach($Notifications as $Notification)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-secondary">
                                    <div class="text-muted"><small>#{{ $Notification->id }}#</small></div>
                                    {{ $Notification->message }}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h2 class="text-center">{{ __('لا توجد اشعارات') }}</h2>
                        <p class="p-5 text-center"><i class="fa fa-bell os-text text-center" style="font-size:50px !important;"></i></p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
   @endsection
