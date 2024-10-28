<div class="card mb-3">
    <div class="card-body">
        <div class="electronicdetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="brand_device" class="form-label">{{__('الماركة')}}</label>
                        <input type="text" class="form-control" name="brand_device" id="brand_device" placeholder="{{__('الماركة')}}" value="{{old('brand_device')}}">
                    </div>
                </div>
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="capacity_device" class="form-label">{{ __('السعة') }}</label>
                        <select name="capacity_device" id="capacity_device" class="form-select">
                            <option value="6 {{ __('أطقم') }}">6 {{ __('أطقم') }}</option>
                            <option value="8 {{ __('أطقم') }}">8 {{ __('أطقم') }}</option>
                            <option value="10 {{ __('أطقم') }}">10 {{ __('أطقم') }}</option>
                            <option value="12 {{ __('أطقم') }}">12 {{ __('أطقم') }}</option>
                            <option value="+14 {{ __('أطقم') }}">+14 {{ __('أطقم') }}</option>
                        </select>
                    </div>
                </div>
                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
