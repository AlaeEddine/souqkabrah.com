<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="age" class="form-label">{{ __('عمر البناء') }}</label>
        <select name="age" id="age" class="form-select">
            <option value="{{ __('قيد الإنشاء') }}">{{ __('قيد الإنشاء') }}</option>
            <option value="0 - 11 {{ __('شهر') }}">0 - 11 {{ __('شهر') }}</option>
            <option value="1 - 5 {{ __('سنوات') }}">1 - 5 {{ __('سنوات') }}</option>
            <option value="6 - 9 {{ __('سنوات') }}">6 - 9 {{ __('سنوات') }}</option>
            <option value="10 - 19 {{ __('سنوات') }}">10 - 19 {{ __('سنوات') }}</option>
            <option value="+20 {{ __('سنة') }}">+20 {{ __('سنة') }}</option>
        </select>
    </div>
</div>
