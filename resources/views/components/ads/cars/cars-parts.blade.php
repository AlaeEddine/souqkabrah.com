<div class="card mb-3">
    <div class="card-body">
<div class="cardetails">
    <div class="row">

        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="id_parts" class="form-label">{{ __('الفرع') }}</label>
                <select name="id_parts" id="id_parts" class="form-select" >
                    <option class="d-none id_parts" id_sub_sub_category_parts="0"></option>

                    <option class="d-none id_parts" id_sub_sub_category_parts="1" value="{{ __('بطاريات') }}" >{{ __('بطاريات') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="1" value="{{ __('بطاريات هايبرد') }}" >{{ __('بطاريات هايبرد') }}</option>

                    <option class="d-none id_parts" id_sub_sub_category_parts="2" value="{{ __('اضوية وكشافات') }}" >{{ __('اضوية وكشافات') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="2" value="{{ __('الغرفة الداخلية') }}" >{{ __('الغرفة الداخلية') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="2" value="{{ __('قطع خارجية') }}" >{{ __('قطع خارجية') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="2" value="{{ __('اخر') }}" >{{ __('اخر') }}</option>

                    <option class="d-none id_parts" id_sub_sub_category_parts="3" value="{{ __('تيربو - سوبر تشارج') }}" >{{ __('تيربو - سوبر تشارج') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="3" value="{{ __('ستيرنج ويل - عدادات') }}" >{{ __('ستيرنج ويل - عدادات') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="3" value="{{ __('فلاتر رياضية') }}" >{{ __('فلاتر رياضية') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="3" value="{{ __('مبردات') }}" >{{ __('مبردات') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="3" value="{{ __('هيدرز') }}" >{{ __('هيدرز') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="3" value="{{ __('اخرى') }}" >{{ __('اخرى') }}</option>

                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('بريكات') }}" >{{ __('بريكات') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('زيوت') }}" >{{ __('زيوت') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('فلاتر') }}" >{{ __('فلاتر') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('قطع ميكانيك') }}" >{{ __('قطع ميكانيك') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('كمبيوتر') }}" >{{ __('كمبيوتر') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('محركات') }}" >{{ __('محركات') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('ناقل حركة') }}" >{{ __('ناقل حركة') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('نظام التعليق') }}" >{{ __('نظام التعليق') }}</option>
                    <option class="d-none id_parts" id_sub_sub_category_parts="4" value="{{ __('اخرى') }}" >{{ __('اخرى') }}</option>

                    <option class="d-none id_parts" id_sub_sub_category_parts="5" value="{{ __('اخرى') }}" >{{ __('اخرى') }}</option>

                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="shipping_service" class="form-label">{{ __('هل لديك خدمة توصيل؟') }}</label>
                <select name="shipping_service" id="shipping_service" class="form-select">
                    <option value="{{ __('لا') }}" selected>{{ __('لا') }}</option>
                    <option value="{{ __('نعم') }}">{{ __('نعم') }}</option>
                </select>
            </div>
        </div>
        <x-ads.shared.status />
    </div>
</div>
    </div>
</div>
