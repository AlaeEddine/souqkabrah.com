<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="etat" class="form-label">{{__('الحالة')}}</label>
        <select name="etat" id="etat" class="form-select">
            <option value="{{ __('جديد') }}" selected>{{ __('جديد') }}</option>
            <option value="{{ __('مستعمل - حالة ممتازة') }}">{{ __('مستعمل - حالة ممتازة') }}</option>
            <option value="{{ __('مستعمل - حالة جيدة') }}">{{ __('مستعمل - حالة جيدة') }}</option>
            <option value="{{ __('مستعمل - حالة سيئة') }}">{{ __('مستعمل - حالة سيئة') }}</option>
        </select>
    </div>
</div>
