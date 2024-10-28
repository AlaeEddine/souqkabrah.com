<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="device_age" class="form-label">{{ __('حجم الشاشة') }}</label>
        <select name="device_age" id="device_age" class="form-select" multiple>
            <option value="{{ __('جديد') }}">{{ __('جديد') }}</option>
            <option value="0 - 1 {{ __('سنة') }}">0 - 1 {{ __('سنة') }}</option>
            <option value="1 - 2 {{ __('سنة') }}">1 - 2 {{ __('سنة') }}</option>
            <option value="2 - 3 {{ __('سنوات') }}">2 - 3 {{ __('سنوات') }}</option>
            <option value="{{ __('أكثر من 3 سنوات') }}">{{ __('أكثر من 3 سنوات') }}</option>
        </select>
    </div>
</div>
