@extends('layouts.website')
@section('content')
<div class=" m-5">
    <div class="row">
        <div class="col-12 p-2">
            <div class="card">
                <div class="card-header text-center">
                    <div class="card-title">
                        <h4><i class="fa fa-envelope os-text"></i> {{ __('دردشاتي') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            @foreach (App\Models\PrivateMessage::orderBy('name_from')->groupBy('id_to')->where('id_from',e(session('user.id')))->orWhere('id_to',e(session('user.id')))->where('removed',0)->get() as $List)

                                @foreach (App\Models\User::where('removed',0)->where('id',e($List->id_to))->orWhere('id',e($List->id_from))->get() as $User)
                                <div class="card mb-2 @if($List->vu == 0) border-primary @endif ">
                                    <div class="card-body text-center">
                                        <div class="row ">
                                            <div class="col-4">
                                                <img @if($User->picture != null) src="{{ e($User->picture) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" class="img-responsive" style="width:50px">
                                            </div>
                                            <div class="col-8 pt-2">
                                                {{ e($User->name) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach

                        </div>
                        <div class="col-8">
                            <div class="card w-100 h-100">
                                <div class="card-body text-center align-middle">
                                    <div class="chat-container">
                                        <img @if($User->picture != null) src="{{ e($User->picture) }}" @else src="/assets/images/openSooqLogoDesktop.svg" @endif alt="Logo" class="img-responsive">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   {{--  @if($ListCount > 0)
                       <table class="table table-bordered table-hover table-stripped text-center align-middle table-responsive">
                            <tr>
                                <td>{{ __('من') }}</td>
                                <td>{{ __('إلى') }}</td>
                                <td>{{ __('الرسالة') }}</td>
                            </tr>
                        @foreach ($Lists as $List)
                            <tr>
                                <td>{{ e($List->name_from) }}</td>
                                <td>{{ e($List->name_to) }}</td>
                                <td>{!!  Purifier::clean($List->message) !!}</td>
                            </tr>
                        @endforeach
                       </table>
                    @else
                        <h2 class="text-center">{{ __('لا توجد رسائل') }}</h2>
                        <p class="p-5 text-center"><i class="fa fa-envelope os-text text-center" style="font-size:50px !important;"></i></p>

                    @endif --}}
                    <?php /*use SevenSpan\Chat\Facades\Channel;

                    ?>
                    @foreach (Channel::list(session('user.id')) as $ChannelLIST)

                        @dump($ChannelLIST)

                    @endforeach
                    @if(Channel::list(session('user.id')) == "" || Channel::list(session('user.id')) == null  || Channel::list(session('user.id') == []))
                        <h2 class="text-center">{{ __('لا توجد رسائل') }}</h2>
                        <p class="p-5 text-center"><i class="fa fa-envelope os-text text-center" style="font-size:50px !important;"></i></p>
                    @else
                    <?php Channel::list(session('user.id')); ?>
                    {{--     @foreach($Chats as $Chat)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-secondary">
                                    <div class="text-muted"><small>#{{ $Chat->id }}# - {{ date('d/m/Y H:i', strtotime(e($Chat->created_at))) }}</small></div>
                                    {{ $Chat->message }}
                                </div>
                            </div>
                        </div>
                        @endforeach  --}}
                    @endif*/ ?>
                </div>
            </div>
        </div>
    </div>
</div>
   @endsection
