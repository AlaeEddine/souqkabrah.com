@extends('layouts.website')
@section('content')
    @if($what == 'email' && session('user.email') != null)
        <h4 class="mt-2 text-center font-bold mb-1">{{ __('المرجو تأكيد بريدك الإلكتروني') }}</h4>
    @endif
    @if($what == 'phone' && session('user.phone') != null)
        <h4 class="mt-2 text-center font-bold mb-1">{{ __('المرجو تأكيد رقم هاتفك') }}</h4>
    @endif
<form id="otp-form" method="POST" action="{{ route('otp.validation.submit') }}">@csrf
<div class="row justify-content-center mt-5 mb-5" dir="ltr">
    <div class="col-md-6">
        @if(session('success'))
            <div class="rtl mb-4 text-center alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="rtl mb-4 text-center alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <div class="card">
            <div class="card-header"><center>
                @if($what == 'email' && session('user.email') != null)
                    <p class="text-[15px] text-slate-500">{{ __('أدخل الكود المتكون من') }} 6 {{ __('أرقام الذي تم إرساله لك عبر البريد الإلكتروني') }}.</p>
                    <p><b>{{ e(session('user.email')) }}</b></p>
                    <input type="hidden" name="what" value="email">
                    <input type="hidden" name="email" value="{{ e(session('user.email')) }}">
                @endif
                @if($what == 'phone' && session('user.phone') != null)
                    <p class="text-[15px] text-slate-500">{{ __('أدخل الكود المتكون من') }} 
                        6 
                        {{ __('أرقام الذي تم إرساله لك عبر') }}
                        <br>{{__('Firebase')}}</p>
                    <p><b>{{ e(session('user.phone')) }}</b></p>
                    <input type="hidden" name="what" value="phone">
                    <input type="hidden" name="phone" value="{{ e(session('user.phone')) }}">
                @endif
            </center></div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    @for($i = 1; $i <= 6; $i++)
                        <input type="number" class="form-control otp-input mx-1 text-center" min="0" maxlength="1" id="otp{{ $i }}" name="code{{ $i }}" required>
                    @endfor
                    <div class="text-danger rtl text-center flex items-center justify-center ">
                        <center> @error('code1')[{{ $message }}] @enderror
                        @error('code2')[{{ $message }}] @enderror
                        @error('code3')[{{ $message }}] @enderror
                        @error('code4')[{{ $message }}] @enderror
                        @error('code5')[{{ $message }}] @enderror
                        @error('code6')[{{ $message }}] @enderror</center>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <button type="submit" class="btn btn-primary m-2" formaction="{{ route('otp.validation.submit', [$what]) }}">{{ __('تأكيد') }}</button>
                </div>
                <div class="d-flex justify-content-center mt-2">
                    <p>{{ __('لم تتوصل بالكود؟') }} <a href="{{ route('otp.resend', [$what,e(session('user.phone'))]) }}" style="text-decoration:underline;">{{ __('إعادة الإرسال') }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</form>


@endsection
@section('scripts')
@parent

<script>
    $(document).ready(function() {
        $(".otp-input").on("input", function() {
            var $this = $(this);
            var inputLength = $this.val().length;
            var maxlength = $this.attr("maxlength");

            if (inputLength >= maxlength) {
                $this.next('.otp-input').focus().addClass('input-highlight');
                setTimeout(function() {
                    $this.next('.otp-input').removeClass('input-highlight');
                }, 300);
            }
        });

        $(".otp-input").on("keydown", function(e) {
            if (e.key === "Backspace" && $(this).val() === '') {
                $(this).prev('.otp-input').focus();
            }
        });

        $(".otp-input").on("paste", function(e) {
            var clipboardData = e.originalEvent.clipboardData || window.clipboardData;
            var pastedData = clipboardData.getData('text').split('');

            if (pastedData.length === 6) {
                $('.otp-input').each(function(index) {
                    $(this).val(pastedData[index]);
                });
            }
        });
    });
    </script>
    <style>
    .input-highlight {
        animation: highlight 0.3s ease-in-out;
    }

    @keyframes highlight {
        0% { background-color: #F7941D; }
        100% { background-color: white; }
    }
    </style>
@endsection