@props(['Comment','Ad'])
<div class="single-comment p-2" style="border: 1px dashed #ccc">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <img @if(App\Http\Controllers\UserController::generatePictureFromId($Comment->id_from) == null)src="{{ Creativeorange\Gravatar\Facades\Gravatar::get($Comment->email_from) }}"@else src="{{ App\Http\Controllers\UserController::generatePictureFromId($Comment->id_from) }}" @endif alt="avatar" class="m-3" width="200">
                <h4>@if(App\Http\Controllers\UserController::generateLinkFromId($Comment->id_from) != null)<a href="{{ route('account.profile.page',[App\Http\Controllers\UserController::generateLinkFromId($Comment->id_from)]) }}" >@endif   {{ e($Comment->name_from) }} @if(App\Http\Controllers\UserController::generateLinkFromId($Comment->id_from) != null)</a>@endif <span>{{ date('d/m/Y H:i',strtotime(e($Comment->created_at))) }}</span></h4>
                <p>{{ e($Comment->comment) }}</p>
                {{-- <div class="button">
                    <a href="#" class="btn"><i class="fa fa-reply" aria-hidden="true"></i>Reply</a>
                </div> --}}
                <center><a href="{{ route('report.comments',[$Ad->id,$Comment->id]) }}"><i class="fa fa-bug"></i> {{ __('التبليغ') }}</a></center>
            </div>
        </div>

    </div>
</div>
