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
                            <option value="0 - 1 {{ __('طن') }}">0 - 1 {{ __('طن') }}</option>
                            @for($i=1;$i<=7.5;$i+=0.5)
                            <?php $j = $i + 0.4 ?>
                            <option value="{{ $i }} - {{ $j }} {{ __('طن') }}">{{ $i }} - {{ $j }} {{ __('طن') }}</option>
                            @endfor
                            <option value="+8">+8</option>

                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="cold_hot" class="form-label">{{ __('بارد / ساخن') }}</label>
                        <select name="cold_hot" id="cold_hot" class="form-select">
                            <option value="{{ __('بارد') }}">{{ __('بارد') }}</option>
                            <option value="{{ __('ساخن') }}">{{ __('ساخن') }}</option>
                            <option value="{{ __('بارد / ساخن') }}" selected>{{ __('بارد / ساخن') }}</option>
                        </select>
                    </div>
                </div>
                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
