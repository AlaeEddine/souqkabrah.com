<div class="col-md-12 col-12">
    <label for="job_avantages" class="form-label">{{ __('ما المزايا الاضافية للوظيفة؟') }}</label>
    <select name="job_avantages" id="job_avantages" class="form-select" multiple>
        <option value="{{ __('عمولة') }}">{{ __('عمولة') }}</option>
        <option value="{{ __('مكافات') }}">{{ __('مكافات') }}</option>
        <option value="{{ __('تامين طبي') }}">{{ __('تامين طبي') }}</option>
        <option value="{{ __('بدل مواصلات') }}">{{ __('بدل مواصلات') }}</option>
        <option value="{{ __('دورات تدريب') }}">{{ __('دورات تدريب') }}</option>
        <option value="{{ __('وجبة غداء') }}">{{ __('وجبة غداء') }}</option>
        <option value="{{ __('لا يوجد') }}" selected>{{ __('لا يوجد') }}</option>
    </select>
</div>
