@extends('layouts.website')
@section('content')
<div class="m-5">
    <x-account.banner />

    <p><br></p>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link @if(request('tab') == "home" || request('tab') == null) active @endif" id="home" data-bs-toggle="tab" data-bs-target="#home-pane" type="button" role="tab" aria-controls="home-pane" aria-selected="true">{{ __('الرئيسية') }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link @if(request('tab') == "resume") active @endif" id="resume" data-bs-toggle="tab" data-bs-target="#resume-pane" type="button" role="tab" aria-controls="resume-pane" aria-selected="false">{{ __('الملخص') }}</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link @if(request('tab') == "rating") active @endif" id="rating" data-bs-toggle="tab" data-bs-target="#rating-pane" type="button" role="tab" aria-controls="rating-pane" aria-selected="false">{{ __('التقييم') }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link @if(request('tab') == "account") active @endif" id="account" data-bs-toggle="tab" data-bs-target="#account-pane" type="button" role="tab" aria-controls="account-pane" aria-selected="false">{{ __('تعديل حسابي') }}</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link @if(request('tab') == "files") active @endif" id="files" data-bs-toggle="tab" data-bs-target="#files-pane" type="button" role="tab" aria-controls="files-pane" aria-selected="false">{{ __('الملفات') }}</button>
        </li>
      </ul>
        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif

      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade @if(request('tab') == "home" || request('tab') == null) show active @endif" id="home-pane" role="tabpanel" aria-labelledby="home" tabindex="0">
            <x-account.tabs.home />
        </div>
        <div class="tab-pane fade @if(request('tab') == "resume") show active @endif" id="resume-pane" role="tabpanel" aria-labelledby="resume" tabindex="0">
            <x-account.tabs.resume />
        </div>
        <div class="tab-pane fade @if(request('tab') == "rating") show active @endif" id="rating-pane" role="tabpanel" aria-labelledby="rating" tabindex="0">
            <x-account.tabs.rating />
        </div>
        <div class="tab-pane fade @if(request('tab') == "account") show active @endif" id="account-pane" role="tabpanel" aria-labelledby="account" tabindex="0">
            <x-account.tabs.account />
        </div>
        <div class="tab-pane fade @if(request('tab') == "files") show active @endif" id="files-pane" role="tabpanel" aria-labelledby="files" tabindex="0">
            <x-account.tabs.files :UploadFile="$UploadFile" :UploadFilesCount="$UploadFilesCount" />
        </div>
      </div>
</div>
@endsection
