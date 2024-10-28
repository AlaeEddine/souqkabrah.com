<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="job_category" class="form-label">{{ __('هل أنت شركة أم فرد؟') }}</label>
        <select name="job_category" id="job_category" class="form-select">
            <option value="{{ __('شركة') }}">{{ __('شركة') }}</option>
            <option value="{{ __('شركة توظيف') }}">{{ __('شركة توظيف') }}</option>
            <option value="{{ __('فرد') }}">{{ __('فرد') }}</option>
        </select>
    </div>
</div>
