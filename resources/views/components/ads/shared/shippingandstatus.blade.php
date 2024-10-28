<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="shipping_service" class="form-label">{{ __('هل لديك خدمة توصيل؟') }}</label>
        <select name="shipping_service" id="shipping_service" class="form-select">
            <option value="{{ __('لا') }}" selected>{{ __('لا') }}</option>
            <option value="{{ __('نعم') }}">{{ __('نعم') }}</option>
        </select>
    </div>
</div>
<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="etat" class="form-label">{{__('الحالة')}}</label>
        <select name="etat" id="etat" class="form-select">
            <option value="{{ __('جديد') }}" selected>{{ __('جديد') }}</option>
            <option value="{{ __('مستعمل') }}">{{ __('مستعمل') }}</option>
        </select>
    </div>
</div>
