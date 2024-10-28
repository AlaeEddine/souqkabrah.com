<div class="card mb-3">
    <div class="card-body">
        <div class="electronicdetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="id_camera" class="form-label">{{ __('الفرع') }}</label>
                        <select name="id_camera" id="id_camera" class="form-select" >
                            <option class="d-none id_camera" id_sub_sub_category_camera="0"></option>

                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('ابسون') }}">{{ __('ابسون') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('الجويل') }}">{{ __('الجويل') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('اوليمبوس') }}">{{ __('اوليمبوس') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('باناسونيك') }}">{{ __('باناسونيك') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('جو برو') }}">{{ __('جو برو') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('جي في سي') }}">{{ __('جي في سي') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('سامسونج') }}">{{ __('سامسونج') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('سوني') }}">{{ __('سوني') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('شاومي') }}">{{ __('شاومي') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('فوجي فيلم') }}">{{ __('فوجي فيلم') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('فيفيتار') }}">{{ __('فيفيتار') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('كانون') }}">{{ __('كانون') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('كوداك') }}">{{ __('كوداك') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('نيكون') }}">{{ __('نيكون') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1347" value="{{ __('اخرى') }}">{{ __('اخرى') }}</option>

                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('كانون') }}">{{ __('كانون') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('نيكون') }}">{{ __('نيكون') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('سوني') }}">{{ __('سوني') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('ابسون') }}">{{ __('ابسون') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('فوجي فيلم') }}">{{ __('فوجي فيلم') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('كوداك') }}">{{ __('كوداك') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('جو برو') }}">{{ __('جو برو') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1348" value="{{ __('اخرى') }}">{{ __('اخرى') }}</option>

                            <option class="d-none id_camera" id_sub_sub_category_camera="1349" value="{{ __('حقائب كاميرات') }}">{{ __('حقائب كاميرات') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1349" value="{{ __('معدات تنظيف') }}">{{ __('معدات تنظيف') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1349" value="{{ __('ترايبود') }}">{{ __('ترايبود') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1349" value="{{ __('بطاريات') }}">{{ __('بطاريات') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1349" value="{{ __('كرت الذاكرة') }}">{{ __('كرت الذاكرة') }}</option>
                            <option class="d-none id_camera" id_sub_sub_category_camera="1349" value="{{ __('اخرى') }}">{{ __('اخرى') }}</option>

                            <option class="d-none id_camera" id_sub_sub_category_camera="1350" value="{{ __('الكل') }}">{{ __('الكل') }}</option>
                        </select>
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
