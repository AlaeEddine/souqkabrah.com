<div class="card mb-3">
    <div class="card-body">
        <div class="electronicdetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="type_device" class="form-label">{{ __('النوع') }}</label>
                        <select name="type_device" id="type_device" class="form-select">
                            <option value="{{ __('محضرات طعام') }}">{{ __('محضرات طعام') }}</option>
                            <option value="{{ __('غلايات كهربائية') }}">{{ __('غلايات كهربائية') }}</option>
                            <option value="{{ __('ماكينات صنع القهوة') }}">{{ __('ماكينات صنع القهوة') }}</option>
                            <option value="{{ __('القلايات الهوائية') }}">{{ __('القلايات الهوائية') }}</option>
                            <option value="{{ __('شوايات وحماصات') }}">{{ __('شوايات وحماصات') }}</option>
                            <option value="{{ __('خلاطات') }}">{{ __('خلاطات') }}</option>
                            <option value="{{ __('اجهزة الخفق') }}">{{ __('اجهزة الخفق') }}</option>
                            <option value="{{ __('اجهزة صنع الوافل') }}">{{ __('اجهزة صنع الوافل') }}</option>
                            <option value="{{ __('عصارات') }}">{{ __('عصارات') }}</option>
                            <option value="{{ __('الات طبخ كهربائية') }}">{{ __('الات طبخ كهربائية') }}</option>
                            <option value="{{ __('مطاحن وفرامات') }}">{{ __('مطاحن وفرامات') }}</option>
                            <option value="{{ __('محضرة السندويشات') }}">{{ __('محضرة السندويشات') }}</option>
                            <option value="{{ __('الات صنع البوشار') }}">{{ __('الات صنع البوشار') }}</option>
                            <option value="{{ __('الات صنع البوظة') }}">{{ __('الات صنع البوظة') }}</option>
                        </select>
                    </div>
                </div>
                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
