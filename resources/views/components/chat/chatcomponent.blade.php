@props(['users','user_id'])
<link rel="stylesheet" href="/css/chat.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<div>
    <style>
        .msg-body ul li.sender:before {
            display: block !important;
            clear: both !important;
            content: '' !important;
            position: absolute !important;
            top: -6px !important;
            right: -7px !important; /* Changed from left to right */
            width: 0 !important;
            height: 0 !important;
            border-style: solid !important;
            border-width: 0 12px 15px 12px !important;
            border-color: transparent #f5f5f5 transparent transparent !important; /* Adjusted the color order */
            -webkit-transform: rotate(37deg) !important; /* Adjusted the rotation for RTL */
            -ms-transform: rotate(37deg) !important; /* Adjusted the rotation for RTL */
            transform: rotate(37deg) !important; /* Adjusted the rotation for RTL */
        }

        .loading i{
            font-size:100px;
            vertical-align: middle !important;
            line-height: 550%;
        }
        @media (max-width: 767px) {
    .chatlist {
        z-index: 2; /* Assure-toi qu'il est plus élevé que celui de .chatbox */
    }
    .chatbox {
        z-index: 1;
    }
}
.scrollable-div {
            height: 500px;
            overflow-y: auto; /* Ajoute une barre de défilement verticale si nécessaire */
            overflow-x: hidden; /* Cache la barre de défilement horizontale */
            border: 1px solid #eee;
            padding: 10px;
        }
    </style>
     <!-- char-area -->

     <div class="scrollable-div d-block d-md-none">
        <h3 class="pb-4">دردشاتي</h3>

        <div class="container-fluid"> 
            @if(App\Models\PrivateMessage::where('removed',0)->where('id_to',e(session('user.id')))->orWhere('id_from',e(session('user.id')))->count()>0)

            <div class="msg-search">
                <input type="text" class="form-control" id="SearchUser" placeholder="{{ __('إبحث عن عضو') }}" aria-label="{{ __('إبحث عن عضو') }}">
                <a class="add d-none" href="#"><img class="img-fluid" src="/assets/images/add.svg" alt="add"></a>
            </div>
            @else
            <center><img src="/assets/images/openSooqLogoDesktop.svg" alt="" width="20%" class="mt-5 chatlogo"></center>

            <h2 class="text-center">{{__('لا توجد رسائل')}}</h2>
            @endif
            @foreach ($users as $user)
            @foreach(App\Models\PrivateMessage::where('removed',0)->get() as $ConversationCounterData)
                @php $IDUSER[$user->id] = NULL; @endphp
                @if($ConversationCounterData->id_from == e(session('user.id')))
                    @php $IDUSER[$user->id] = $ConversationCounterData->id_to; @endphp
                @endif
                @if($ConversationCounterData->id_to == e(session('user.id')))
                    @php $IDUSER[$user->id] = $ConversationCounterData->id_from; @endphp
                @endif
                @if($IDUSER[$user->id] == $user->id)
                    <div class="UserListFilter"><hr>

                    <a onclick="getConversation('{{ $user->id }}');refreshConversation('{{ $user->id }}');scrollToBottom()" class="d-flex align-items-center" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal-{{e($user->id)}}">
                        <div class="flex-shrink-0 mt-1 mx-2 position-relative">
                            <div class="active" dir="ltr" class="position-absolute top-0"></div>
                            <img @if($user->picture != null) src="{{ e($user->picture) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" class="img-fluid" style="width:50px;height:50px;">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6>{{ $user->name }}</h6>
                            <p dir="ltr" class="text-end">{{ $user->phone }}</p>
                        </div>
                    </a>                        
                        <div class="modal modal-{{ $user->id }} fade" id="modal-{{ $user->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal-{{ $user->id }}label" aria-hidden="true" id="modal-{{ $user->id }}">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header" dir="ltr">
                                        <h5 class="modal-title" id="modal-{{ $user->id }}label">{{ $user->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="msg-body">
                                            <ul class="conversationMobile conversationMobile{{ e($user->id) }}" id="conversation"></ul>

                                        </div>               
                                    </div>
                                    <form method="POST" action="{{ route('chat.submit',[e(session('user.id')),e($user->id)]) }}">@csrf
                                        <div class="input-group mb-3 p-2" dir="ltr">
                                            <button class="btn btn-primary" type="submit" id="sendMessage{{ e($user->id) }}" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{ __('إرسال') }}</button>
                                            <input type="hidden" name="id_to" id="id_to{{ e($user->id) }}" value="{{ e($user->id) }}">
                                            <input type="hidden" name="id_from" id="id_from{{ e($user->id) }}" value="{{ e(session('user.id')) }}">
                                            <input type="text" name="message" id="message{{ e($user->id) }}" class="form-control" placeholder="{{ __('أكتب رسالتك') }}..." aria-label="{{ __('أكتب رسالتك') }}..." dir="rtl" aria-describedby="sendMessage">
                                        </div>
                                    </form>                 
                                   
                                </div>
                            </div>
                        </div>
                        @section('scripts')
                        @parent
                        <script>   
                            const myModal{{ $user->id }} = document.getElementById('modal-{{ $user->id }}');
                            myModal{{ $user->id }}.addEventListener('shown.bs.modal', () => {

                                mobilechatrefresh('{{ $user->id }}');
                                myModal{{ $user->id }}.animate({ scrollTop: jQuery('.modal-{{ $user->id }}.modal-body').height() });

                            });
                            $('#sendMessage{{ $user->id }}').on('click', function(e){
                                e.preventDefault();
                                sendMessageMobile({{ $user->id}}); 
                            });

                            </script>   
                        
                        @endsection
                    </div>
                    @endif
                    @endforeach
                @endforeach            
        </div>
    </div>
     <section class="message-area d-none d-md-block" dir="rtl">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chat-area position-relative">
                        <div class="loading position-absolute top-50 start-50 translate-middle w-100 h-100 text-center" style="z-index: 30;background-color: rgb(0,0,0,0.5)"><i class="fa fa-spin fa-spinner fa-2xl loading top-50 start-50"></i></div>
                        <!-- chatlist -->
                        @if(App\Models\PrivateMessage::where('removed',0)->where('id_to',e(session('user.id')))->orWhere('id_from',e(session('user.id')))->count()>0)

                        <div class="chatlist">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="chat-header">
                                        <div class="msg-search">
                                            <input type="text" class="form-control" id="SearchUser" placeholder="{{ __('بحث') }}" aria-label="{{ __('بحث') }}">
                                            <a class="add d-none" href="#"><img class="img-fluid" src="/assets/images/add.svg" alt="add"></a>
                                        </div>
                                    </div>

                                    <div class="modal-body">
                                        <!-- chat-list -->

                                        <div class="chat-lists" style='position: absolute;'>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                                    <!-- chat-list -->

                                                    <div class="chat-list">
                                                        @foreach ($users as $user)
                                                        @foreach(App\Models\PrivateMessage::where('removed',0)->get() as $ConversationCounterData)
                                                            @php $IDUSER[$user->id] = NULL; @endphp
                                                            @if($ConversationCounterData->id_from == e(session('user.id')))
                                                                @php $IDUSER[$user->id] = $ConversationCounterData->id_to; @endphp
                                                            @endif
                                                            @if($ConversationCounterData->id_to == e(session('user.id')))
                                                                @php $IDUSER[$user->id] = $ConversationCounterData->id_from; @endphp
                                                            @endif
                                                            @if($IDUSER[$user->id] == $user->id)
                                                            <div class="UserListFilter"><hr>
                                                                <a onclick="getConversation('{{ $user->id }}');refreshConversation('{{ $user->id }}');scrollToBottom()" class="d-flex align-items-center" style="cursor: pointer">
                                                                    <div class="flex-shrink-0 mt-1 mx-2 position-relative">
                                                                        {{--<div class="active" dir="ltr" class="position-absolute top-0"></div>--}}
                                                                        <img @if($user->picture != null) src="{{ e($user->picture) }}" @else src="/uploads/categories/no_profile.png" @endif alt="avatar" class="img-fluid" style="width:50px;height:50px;">
                                                                    </div>
                                                                    <div class="flex-grow-1 ms-3">
                                                                        <h3>{{ $user->name }}</h3>
                                                                        <p dir="ltr" class="text-end">{{ $user->phone }}</p>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endif
                                                        @endforeach
                                                        

                                                        @endforeach
                                                    </div>
                                                    <!-- chat-list -->

                                                </div>
                                            </div>

                                        </div>
                                        <!-- chat-list -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- chatlist -->
                        @endif




                        <!-- chatbox -->
                        <div class="chatbox" id="chatbox">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="msg-head">
                                        <div class="row">
                                            <div class="col-8">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 mt-1 mx-2">
                                                        <img src="/uploads/categories/no_profile.png" alt="avatar" class="img-fluid userpicture d-none" style="width:50px;height:50px;">
                                                        <span class="active"></span>
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h3 class="username d-none"></h3>
                                                        <p class="userphone d-none text-end" dir="ltr"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <ul class="moreoption d-none">
                                                    <li class="navbar nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                                            <li>
                                                                <hr class="dropdown-divider">
                                                            </li>   
                                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class="msg-body relative" id="msg-body">
                                            <center><img src="/assets/images/openSooqLogoDesktop.svg" alt="" width="20%" class="position-absolute top-50 start-50 translate-middle chatlogo"></center>
                                            @if(App\Models\PrivateMessage::where('removed',0)->where('id_to',e(session('user.id')))->orWhere('id_from',e(session('user.id')))->count() == 
                                            0)
                                                <h2 class="text-center position-absolute top-50 mt-5 start-50 translate-middle chatlogo">{{__('لا توجد رسائل')}}</h2>
                                            @endif
                                            @foreach ($users as $user)
                                                <ul class="conversation conversation{{ e($user->id) }} d-none" id="conversation"></ul>
                                            @endforeach
                                        </div>
                                    </div>


                                    <div class="sendbox d-none">
                                        <form method="POST" action="{{ route('chat.submit',[e(session('user.id')),e($user->id)]) }}">@csrf
                                            <div class="input-group mb-3 p-2" dir="ltr">
                                                <button class="btn btn-primary" type="submit" id="sendMessage" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{ __('إرسال') }}</button>
                                                <input type="hidden" name="id_to" id="id_to" value="{{ e($user->id) }}">
                                                <input type="hidden" name="id_from" id="id_from" value="{{ e(session('user.id')) }}">
                                                <input type="text" name="message" id="message" class="form-control" placeholder="{{ __('أكتب رسالتك') }}..." aria-label="{{ __('أكتب رسالتك') }}..." dir="rtl" aria-describedby="sendMessage">
                                            </div>
                                        </form>

                                        <div class="send-btns">
                                            {{--<div class="attach d-none">
                                                <div class="button-wrapper">
                                                    <span class="label">
                                                        <img class="img-fluid" src="/assets/images/upload.svg" alt="image title"> attached file
                                                    </span><input type="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File">
                                                </div>

                                                <select class="form-control" id="exampleFormControlSelect1">
                                                    <option>Select template</option>
                                                    <option>Template 1</option>
                                                    <option>Template 2</option>
                                                </select>

                                                <div class="add-apoint">
                                                    <a href="#" data-toggle="modal" data-target="#exampleModal4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none"><path d="M8 16C3.58862 16 0 12.4114 0 8C0 3.58862 3.58862 0 8 0C12.4114 0 16 3.58862 16 8C16 12.4114 12.4114 16 8 16ZM8 1C4.14001 1 1 4.14001 1 8C1 11.86 4.14001 15 8 15C11.86 15 15 11.86 15 8C15 4.14001 11.86 1 8 1Z" fill="#7D7D7D"/><path d="M11.5 8.5H4.5C4.224 8.5 4 8.276 4 8C4 7.724 4.224 7.5 4.5 7.5H11.5C11.776 7.5 12 7.724 12 8C12 8.276 11.776 8.5 11.5 8.5Z" fill="#7D7D7D"/><path d="M8 12C7.724 12 7.5 11.776 7.5 11.5V4.5C7.5 4.224 7.724 4 8 4C8.276 4 8.5 4.224 8.5 4.5V11.5C8.5 11.776 8.276 12 8 12Z" fill="#7D7D7D"/></svg> Appoinment</a>
                                                </div>
                                            </div>--}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- chatbox -->


                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- char-area -->
</div>
@section('scripts')
@parent
<script>
  
    $('.loading').removeClass('d-block').addClass('d-none');
    function sendMessageMobile(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{ route('chat.submit') }}",
            data: {
                id_to:$('#id_to'+id).val(),
                id_from:$('#id_from'+id).val(),
                message:$('#message'+id).val(),
            },
            type: 'POST',
            success: function(data) {
                if(data.error == true){
                    alert(data.response);
                }else{
                    refreshConversation($('#id_to'+id).val());
                    $('.conversationMobile.conversationMobile'+$('#id_to').val()).scrollTop($('.conversation.conversation'+$('#id_to').val()).height());
                    scrollToBottom();
                    $('#message'+id).val("");
                    mobilechatrefresh(id);
                }
            },
            error: function(xhr, status, error) {
                //console.log("An error occurred: " + xhr.status + " " + error);
                //alert("NOT SENT");
            }
        });
    }

    $('#sendMessage').on('click', function(e){
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:"{{ route('chat.submit') }}",
            data: {
                id_to:$('#id_to').val(),
                id_from:$('#id_from').val(),
                message:$('#message').val(),
            },
            type: 'POST',
            success: function(data) {
                if(data.error == true){
                    alert(data.response);
                }else{
                    refreshConversation($('#id_to').val());
                    $('.conversation.conversation'+$('#id_to').val()).scrollTop($('.conversation.conversation'+$('#id_to').val()).height());
                    scrollToBottom();
                    $('#message').val("");
                    chatrefresh($('#id_to').val());
                }
            },
            error: function(xhr, status, error) {
                //console.log("An error occurred: " + xhr.status + " " + error);
                //alert("NOT SENT");

            }
        });
    });

    hasRun = false;
    function scrollToBottom() {
        var div1 = document.getElementById('msg-body');
        div1.scrollTop = div1.scrollHeight;
    }
    function refreshConversation(id){
        if (!hasRun) {

            setInterval(() => {
                chatrefresh(id);
                scrollToBottom();
            }, 1000)
            hasRun = true;
        }
    }

    function chatrefresh(id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/chat/refresh',
            type: 'POST',
            data:{id:id},
            success: function(data) {
                //console.log(data);
                $('.conversation.conversation'+id).html(data.conversation);
                $('.conversation.conversation'+id).scrollTop($('.conversation.conversation'+id).height());
                scrollToBottom();
            },
            error: function(xhr, status, error) {
                //console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    }
    function mobilechatrefresh(id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/chat/refresh',
            type: 'POST',
            data:{id:id},
            success: function(data) {
                //console.log(data);
                $('.conversationMobile.conversationMobile'+id).html(data.conversation);
                $('.conversationMobile.conversationMobile'+id).scrollTop($('.conversationMobile.conversationMobile'+id).height());
                scrollToBottom();
            },
            error: function(xhr, status, error) {
                //console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    }



    function getConversation(id){
        $('.loading').removeClass('d-none').addClass('d-block');
        $('.conversation').removeClass('d-block').addClass('d-none');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/chat/user/info',
            type: 'POST',
            data:{id:id},
            success: function(data) {
                $('.chatlogo').removeClass('d-block').addClass('d-none');
                $('.conversation.conversation'+id).removeClass('d-none').addClass('d-block');
                $('.sendbox').removeClass('d-none').addClass('d-block');
                $('.userpicture').removeClass('d-none').addClass('d-block');
                $('.username').removeClass('d-none').addClass('d-block');
                $('.userphone').removeClass('d-none').addClass('d-block');
                $('.loading').removeClass('d-block').addClass('d-none');

                $('.userpicture').attr('src',data.picture);
                $('.username').html(data.name);
                $('.userphone').html(data.phone);
                $('.conversation.conversation'+id).html(data.conversation);
                //alert("USER ACTIF : "+data.actif);
                $('#id_to').val(data.actif);
                $('.conversation.conversation'+id).scrollTop($('.conversation.conversation'+id).height());
                scrollToBottom();
            },
            error: function(xhr, status, error) {
                //console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    }
    function getConversationMobile(id){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/chat/user/info',
            type: 'POST',
            data:{id:id},
            success: function(data) {
                $('.conversationMobile.conversationMobile'+id).html(data.conversation);
                $('#id_to').val(data.actif);
                $('.conversationMobile.conversationMobile'+id).scrollTop($('.conversationMobile.conversationMobile'+id).height());
                scrollToBottom();
                chatrefresh(id);
            },
            error: function(xhr, status, error) {
                console.log("An error occurred: " + xhr.status + " " + error);
            }
        });
    }

    jQuery(document).ready(function() {

$(".chat-list a").click(function() {
    $(".chatbox").addClass('showbox');
    return false;
});

$(".chat-icon").click(function() {
    $(".chatbox").removeClass('showbox');
});


});

$("#SearchUser").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".UserListFilter *").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)

    });
  });
</script>
@endsection
