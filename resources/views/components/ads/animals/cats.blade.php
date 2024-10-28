<div class="card mb-3">
    <div class="card-body">
        <div class="animalsdetails">
            <div class="col-md-12 col-12 mb-3">
                <div class="form-group">
                    <label for="animals_type" class="form-label">{{ __('النوع') }}</label>
                    <select name="animals_type" id="animals_type" class="form-select">
                        <option value="{{ __('سكوتش فولد') }}">{{ __('سكوتش فولد') }}</option>
                        <option value="{{ __('شانشيلا') }}">{{ __('شانشيلا') }}</option>
                        <option value="{{ __('سيامي') }}">{{ __('سيامي') }}</option>
                        <option value="{{ __('سيبيري') }}">{{ __('سيبيري') }}</option>
                        <option value="{{ __('بنغال') }}">{{ __('بنغال') }}</option>
                        <option value="{{ __('ديفون ريكس') }}">{{ __('ديفون ريكس') }}</option>
                        <option value="{{ __('ميست') }}">{{ __('ميست') }}</option>
                        <option value="{{ __('شيرازي') }}">{{ __('شيرازي') }}</option>
                        <option value="{{ __('هملايا') }}">{{ __('هملايا') }}</option>
                        <option value="{{ __('مكس') }}">{{ __('مكس') }}</option>
                        <option value="{{ __('أخرى') }}">{{ __('أخرى') }}</option>
                    </select>
                </div>
            </div>
            <x-ads.shared.shipping />
        </div>
    </div>
</div>
