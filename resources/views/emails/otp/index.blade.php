@component('mail::message')
<p>{{ __('الكود السري هو ') }}</p>
<p>{{$code}}</p>
@component('mail::button', ['url' => '/otp/autovalidation/{{ $code }}'])
{{ __('تفعيل الحساب') }}
@endcomponent

{{ config('app.name') }}
@endcomponent
