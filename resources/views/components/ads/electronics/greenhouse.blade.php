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

                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
