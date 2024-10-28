@foreach(App\Http\Controllers\SettingController::getSettings() as $Setting)
@if($Setting->recaptcha == 1 && $Setting->recaptchasitekey != null && $Setting->recaptchasecretkey != null)
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <x-input-label for="g-recaptcha" :value="__('جوجل ريكابتشا')" />
            <div class="g-recaptcha" data-sitekey="{{ $Setting->recaptchasitekey }}"></div>
            @if ($errors->has('g-recaptcha-response'))
                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
            @endif
        </div>
    </div>
</div>
@endif
@endforeach
