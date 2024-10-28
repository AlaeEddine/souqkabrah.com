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
                        <label for="type_device" class="form-label">{{ __('السعة') }}</label>
                        <select name="type_device" id="type_device" class="form-select">
                            <option value="1 - 99 {{ __('لتر') }}">1 - 99 {{ __('لتر') }}</option>
                            @for($i=100;$i<=700;$i+=50)
                            <?php $j = $i + 49 ?>
                            <option value="{{ $i }} - {{ $j }} {{ __('لتر') }}">{{ $i }} - {{ $j }} {{ __('لتر') }}</option>
                            @endfor
                            <option value="+800">+800</option>

                        </select>
                    </div>
                </div>
                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
