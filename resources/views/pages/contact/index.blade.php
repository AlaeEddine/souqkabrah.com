@extends('layouts.website')

@section('content')
<div class="container my-5">
    <h2 class="mb-5 text-center">{{ __('تواصل معنا') }}</h2>

    <section id="contact-us" class="contact-us">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="p-4 border rounded shadow-sm">
                    @if(session('success'))
                        <div class="alert alert-success">{{ e(session('success')) }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger"><i class="fa fa-warning"></i> {{ e(session('error')) }}</div>
                    @endif

                    <h4 class="mb-3">{{ __('تواصل معنا الآن') }}</h4>
                    <h3 class="mb-4 text-center">{{ __('أكتب رسالتك') }}</h3>

                    @if($errors->any())
                        <div class="text-danger mb-3">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br/>
                            @endforeach
                        </div>
                    @endif

                    <form method="post" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="row g-3">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('الإسم') }}<span>*</span></label>
                                <input name="name" type="text" class="form-control" placeholder="{{ __('الإسم') }}" @if(session('user.name') != null) value="{{ e(session('user.name')) }}" readonly @endif />
                            </div>

                            <!-- Mobile Field -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('رقم الموبايل') }}<span>*</span></label>
                                <input name="mobile" type="text" class="form-control" placeholder="{{ __('رقم الموبايل') }}" @if(session('user.phone') != null) value="{{ e(session('user.phone')) }}" readonly @endif />
                            </div>

                            <!-- Email Field -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('البريد الإلكتروني') }}<span>*</span></label>
                                <input name="email" type="text" class="form-control" placeholder="{{ __('البريد الإلكتروني') }}" @if(session('user.email') != null) value="{{ e(session('user.email')) }}" readonly @endif />
                            </div>

                            <!-- Subject Field -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('سبب التواصل') }}<span>*</span></label>
                                <select class="form-select" name="subject">
                                    <option value="{{ __('الحسابات') }}">{{ __('الحسابات') }}</option>
                                    <option value="{{ __('الإعلانات') }}">{{ __('الإعلانات') }}</option>
                                    <option value="{{ __('الدفع و الشراء') }}">{{ __('الدفع و الشراء') }}</option>
                                    <option value="{{ __('سلايدرات و بانرات و خدمات أخرى') }}">{{ __('سلايدرات و بانرات و خدمات أخرى') }}</option>
                                    <option value="{{ __('نظام الإعلانات المدفوعة الجديد') }}">{{ __('نظام الإعلانات المدفوعة الجديد') }}</option>
                                    <option value="{{ __('الأمن و الأمان') }}">{{ __('الأمن و الأمان') }}</option>
                                </select>
                            </div>

                            <!-- Message Field -->
                            <div class="col-12">
                                <label class="form-label">{{  __('رسالك') }}<span>*</span></label>
                                <textarea name="details" class="form-control" rows="4" placeholder="{{  __('رسالك') }}"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary px-5">{{ __('إرسال') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-4">
                <div class="p-4 border rounded shadow-sm">
                    <div class="mb-4">
                        
                        <h5 class="m-2 pb-4"><i class="fa fa-phone"></i> {{ __('إتصل بنا الآن') }}:</h5>
                        <center><a href="tel:{{$Setting->mobileadmin}}" dir="ltr" class="d-block text-decoration-none">{{$Setting->mobileadmin}}</a></center>
                    </div>
                    <div class="mb-4">
                        
                        <h5 class="m-2 pb-4"><i class="fa fa-envelope-open"></i> {{ __('البريد الإلكتروني') }} :</h5>
						<center><a href="mailto:{{$Setting->emailadmin}}" class="d-block text-decoration-none">{{$Setting->emailadmin}}</a></center>
					</div>
                    <div>
                        
                        <h5 class="m-2 pb-4"><i class="fa fa-thumbs-up"></i> {{ __('مواقع التواصل الإجتماعي') }}</h5>
                        @if($Setting->loginsocialmedia == 1)
							<div class="row">
								<div class="col-12 mb-2">
									@if($Setting->appstore)
										<a href="{{$Setting->appstore}}" class="btn btn-primary btn-sm"><span class="fa-brands fa-app-store"></span> {{ __('أبل ستور') }}</a>
									@endif
								</div>
								<div class="col-12 mb-2">
									@if($Setting->googleplay)
										<a href="{{$Setting->googleplay}}" class="btn btn-primary btn-sm"><span class="fa-brands fa-google-play"></span> {{ __('جوجل بلاي') }}</a>
									@endif
								</div>
								<div class="col-12 mb-2">
									@if($Setting->twitter)
										<a href="{{$Setting->twitter}}" class="btn btn-primary btn-sm"><span class="fa-brands fa-twitter"></span> {{ __('تويتر') }}</a>
									@endif
								</div>
								<div class="col-12 mb-2">
									@if($Setting->facebook)
										<a href="{{$Setting->facebook}}" class="btn btn-primary btn-sm"><span class="fa-brands fa-facebook"></span> {{ __('فيسبوك') }}</a>
									@endif
								</div>
								<div class="col-12 mb-2">
									@if($Setting->instagram)
										<a href="{{$Setting->instagram}}" class="btn btn-primary btn-sm"><span class="fa-brands fa-instagram"></span> {{ __('إنتقرام') }}</a>
									@endif
								</div>
							</div>

                        @else
                            <p>{{ __('مواقع التواصل الإجتماعي غير مفعلة') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
