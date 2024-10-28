@if(request('id') == session('user.id')) @extends('layouts.website')
@section('content')
<x-guest-layout>
<div class="container rtl">
    <h2 class="text-center">{{ __('إكمال التسجيل') }}</h2>
    @if(session('success'))
        <div class="rtl mt-4 mb-4 text-center alert alert-success">{{e(session('success'))}}</div>
    @endif
    @if(session('error'))
        <div class="rtl mt-4 mb-4 text-center alert alert-danger">{{e(session('error'))}}</div>
    @endif
    <form method="POST" action="{{ route('register.user.continue.submit',[e(request('what')),e(session('user.id'))]) }}" class="rtl">
        @csrf
        <div>
            <x-input-label for="name" :value="__('الإسم الكامل')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"  />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <x-text-input id="email" class="block mt-1 w-full rtl" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Mobile Phone -->
        <div class="mt-4">
            <x-input-label for="phone" :value="__('رقم الهاتف')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" readonly dir="ltr" :value="old('phone',e(session('user.phone')))" required autocomplete="phone" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('كلمة المرور')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" value="" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" value="" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        {{--  <div class="row">
            <div class="mt-1">
                <x-input-label for="level" :value="__('نوع المستعمل')" />
                <select class="w-full rtl mt-1" name="level" aria-label="Default select example">
                    <option value="1" selected>{{ __('زبون') }}</option>
                    <option value="2">{{ __('تاجر') }}</option>
                </select>
                <x-input-error :messages="$errors->get('level')" class="mt-2" />
            </div>
        </div>--}}
        <x-recaptcha />

        <div class="flex items-center justify-end mt-4 rtl">
            <x-primary-button class="ms-4">
                {{ __('التسجيل') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>
<p><br></p>

</div>
@endsection
@else
{{abort(403)}}
@endif