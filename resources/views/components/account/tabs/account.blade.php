<div class="row">
    <div class="col-12 p-2">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-user-tie os-text"></i> {{ __('معلومات الحساب') }}</h4>
                </div>
            </div>
            <div class="card-body rtl" dir='rtl'>
                    <div class="container">
                        <form action="{{ route('account.update.submit') }}" method="POST">@csrf
                            <input type="hidden" class="picture" name="picture" value="{{ e(session('user.picture')) }}" />
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="picture" class="form-label">{{ __('الصورة الحالية') }}</label><br>
                                <img @if(session('user.picture') != null) src="{{ e(session('user.picture')) }}" @else src="/uploads/categories/no_profile.png" @endif class="avatar" alt="avatar" width="200">
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="picture" class="form-label">{{ __('رفع صورة جديدة') }}</label><br>
                                <x-uploadprofile maxfiles="1"  url="{{ route('account.profile.upload.submit') }}"  buttontext="{{ __('رفع صورة جديدة') }}" />
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">{{ __('الإسم الكامل') }}</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ e(session('user.name')) }}" name="name" placeholder="{{ __('الإسم الكامل') }}">
                                </div>
                                @error('name')
                                    <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="link" class="form-label">{{ __('رابط الصفحة الشخصية') }}</label>
                                    <input type="text" name="link" class="form-control @error('link') is-invalid @enderror" value="{{ e(session('user.link')) }}" id="link" placeholder="{{ __('رابط الصفحة الشخصية') }}">
                                </div>
                                @if(e(session('user.link')) != null)<a href="/u/{{ e(session('user.link')) }}"><i class="fa fa-link"></i> {{ App\Models\Setting::first()->url }}/u/{{ e(session('user.link')) }}</a>@endif
                                @error('link')
                                    <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">{{ __('البريد الإلكتروني') }}</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ e(session('user.email')) }}"  id="email" placeholder="{{ __('البريد الإلكتروني') }}" readonly>
                                    @error('email')
                                        <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                    @enderror
                                    @if(e(session('user.email_enabled')) == 0 || e(session('user.email_enabled')) == null) <p class="text-center m-2"> <a href="{{ route('otp.validation.submit', ['email']) }}" class="btn text-white">{{ __('تفعيل البريد الإلكتروني') }}</a></p> @endif
                                </div>

                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">{{ __('رقم الموبايل') }}</label>
                                    <input type="text" dir="ltr" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ e(session('user.phone')) }}"  id="phone" placeholder="{{ __('رقم الموبايل') }}">
                                    @error('phone')
                                        <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                    @enderror
                                    @if(e(session('user.phone_enabled')) == 0 || e(session('user.phone_enabled')) == null) <p class="text-center m-2"> <a href="{{ route('otp.validation.submit', ['phone']) }}" class="btn text-white">{{ __('تفعيل رقم الموبايل') }}</a></p> @endif
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="gender" class="form-label">{{ __('الجنس') }}</label>
                                    <select class="form-select" name="gender">
                                        <option value="1">{{ __('ذكر') }}</option>
                                        <option value="2">{{ __('أنثى') }}</option>
                                    </select>
                                    @error('gender')
                                        <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="birthday" class="form-label">{{ __('تاريخ الميلاد') }}</label>
                                    <input type="date" class="form-control @error('birthday') is-invalid @enderror" value="{{ e(session('user.birthday')) }}" id="birthday" name="birthday" placeholder="{{ __('تاريخ الميلاد') }}">
                                </div>
                                @error('birthday')
                                    <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    @if(session('user.id_country') != null && session('user.id_country') != 0)
                                    <x-country :selected="e(session('user.id_country'))" />
                                    @else
                                    <x-country :selected="2" />
                                    @endif
                                </div>
                                @error('country')
                                    <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    @if(session('user.id_city') != null && session('user.id_city') != '0')
                                    <x-city :selected="e(session('user.id_city'))" />
                                    @else
                                    <x-city :country_id="e(session('user.id_country'))" />
                                    @endif
                                </div>
                                @error('city')
                                    <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">{{ __('كلمة المرور') }}</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  id="password" placeholder="{{ __('كلمة المرور') }}">
                                    @error('password')
                                        <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch" id="hidephone" name="hidephone" @if(e(session('user.hidephone')) == 1) checked @endif>
                                    <label class="form-check-label" for="hidephone">{{ __('إخفاء رقم الموبايل على ملفي الشخصي') }}</label>
                                    <br>{{ __('هذا فقط يخفي هاتفك المحمول من صفحة الملف الشخصي.') }}
                                </div>
                                @error('hidephone')
                                    <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12 col-12 text-center">
                                <br>
                                <button type="submit" class="btn btn-primary">{{ __('حفظ التغييرات') }}</button>
                            </div>
                        </div>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</div>
