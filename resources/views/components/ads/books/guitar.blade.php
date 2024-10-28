<div class="card mb-3">
    <div class="card-body">
        <div class="booksdetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="age" class="form-label">{{ __('النوع') }}</label>
                        <select name="age" id="age" class="form-select">
                            <option value="{{ __('جيتار و عود') }}">{{ __('جيتار و عود') }}</option>
                            <option value="{{ __('آلات النفخ') }}">{{ __('آلات النفخ') }}</option>
                            <option value="{{ __('بيانو و اورج') }}">{{ __('بيانو و اورج') }}</option>
                            <option value="{{ __('الطبول وآلات الايقاع') }}">{{ __('الطبول وآلات الايقاع') }}</option>
                            <option value="{{ __('الكمان وآلات أخرى') }}">{{ __('الكمان وآلات أخرى') }}</option>
                            <option value="{{ __('اكسسوارات') }}">{{ __('اكسسوارات') }}</option>
                        </select>
                    </div>
                </div>
                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
