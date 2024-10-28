<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="shipping_service" class="form-label">{{ __('هل لديك خدمة توصيل؟') }}</label>
        <select name="shipping_service" id="shipping_service" class="form-select">
            <option value="{{ __('لا') }}" selected>{{ __('لا') }}</option>
            <option value="{{ __('نعم') }}">{{ __('نعم') }}</option>
        </select>
    </div>
</div>
