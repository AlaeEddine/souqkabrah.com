<div class="card mb-3">
    <div class="card-body">
        <div class="fooddetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="etat" class="form-label">{{__('النوع')}}</label>
                        <select name="etat" id="etat" class="form-select">
                            <option value="{{ __('طازجة') }}" selected>{{ __('طازجة') }}</option>
                            <option value="{{ __('مجمّدة') }}">{{ __('مجمّدة') }}</option>
                            <option value="{{ __('طازجة ومجمدة') }}">{{ __('طازجة ومجمدة') }}</option>
                        </select>
                    </div>
                </div>
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
