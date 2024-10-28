<div class="card mb-3">
    <div class="card-body">
        <div class="animalsdetails">
            <div class="col-md-12 col-12 mb-3">
                <div class="form-group">
                    <label for="shipping_service" class="form-label">{{ __('النوع') }}</label>
                    <select name="shipping_service" id="shipping_service" class="form-select">
                        <option value="{{ __('كلاب') }}">{{ __('كلاب') }}</option>
                        <option value="{{ __('قطط') }}">{{ __('قطط') }}</option>
                        <option value="{{ __('أسماك') }}">{{ __('أسماك') }}</option>
                        <option value="{{ __('سلاحف') }}">{{ __('سلاحف') }}</option>
                        <option value="{{ __('طيور ودواجن') }}">{{ __('طيور ودواجن') }}</option>
                        <option value="{{ __('مواشي') }}">{{ __('مواشي') }}</option>
                        <option value="{{ __('خيل') }}">{{ __('خيل') }}</option>
                        <option value="{{ __('إبل') }}">{{ __('إبل') }}</option>
                        <option value="{{ __('أخرى') }}">{{ __('أخرى') }}</option>
                    </select>
                </div>
            </div>
            <x-ads.shared.shipping />
        </div>
    </div>
</div>
