<div class="card mb-3">
    <div class="card-body">
        <div class="toysdetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="id_clothes_baby" class="form-label">{{ __('الفرع') }}</label>
                        <select name="id_clothes_baby" id="id_clothes_baby" class="form-select" >
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="0"></option>

                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('فساتين') }}">{{ __('فساتين') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('بلايز وقمصان') }}">{{ __('بلايز وقمصان') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('ملابس رياضية') }}">{{ __('ملابس رياضية') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('معاطف وجاكيتات') }}">{{ __('معاطف وجاكيتات') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('صنادل وبوابيج') }}">{{ __('صنادل وبوابيج') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('أحذية رياضية') }}">{{ __('أحذية رياضية') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('أحذية الاستخدام اليومي والرسمي') }}">{{ __('أحذية الاستخدام اليومي والرسمي') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('أحذية طويلة') }}">{{ __('أحذية طويلة') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1704" value="{{ __('أخرى') }}">{{ __('أخرى') }}</option>

                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('بلايز وقمصان') }}">{{ __('بلايز وقمصان') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('بناطيل وشورتات') }}">{{ __('بناطيل وشورتات') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('ملابس رياضية') }}">{{ __('ملابس رياضية') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('معاطف وجاكيتات') }}">{{ __('معاطف وجاكيتات') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('ملابس نوم وملابس داخلية') }}">{{ __('ملابس نوم وملابس داخلية') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('صنادل وبوابيج') }}">{{ __('صنادل وبوابيج') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('أحذية رياضية') }}">{{ __('أحذية رياضية') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('أحذية الاستخدام اليومي والرسمي') }}">{{ __('أحذية الاستخدام اليومي والرسمي') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('أحذية طويلة') }}">{{ __('أحذية طويلة') }}</option>
                            <option class="d-none id_clothes_baby" id_sub_sub_category_clothes_baby="1705" value="{{ __('أخرى') }}">{{ __('أخرى') }}</option>
                        </select>
                    </div>
                </div>

                <x-ads.clothes.shared.clothescolor />
                <x-ads.clothes.shared.clothessizebaby />
                <x-ads.shared.shipping />
                <x-ads.shared.status />
                <x-ads.clothes.shared.clothesbrand />
            </div>
        </div>
    </div>
</div>
