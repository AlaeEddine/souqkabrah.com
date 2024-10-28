<div class="card mb-3">
    <div class="card-body">
        <div class="clothesdetails">
            <div class="row">
                <div class="col-md-12 col-12 mb-3">
                    <div class="form-group">
                        <label for="accessories_category" class="form-label">{{ __('النوع') }}</label>
                        <select name="accessories_category" id="accessories_category" class="form-select" >
                            <option value='{{__("شامبو وملطف الشعر")}}'>{{__("شامبو وملطف الشعر")}}</option>
                            <option value='{{__("صبغات للشعر")}}'>{{__("صبغات للشعر")}}</option>
                            <option value='{{__("كريمات معالجة")}}'>{{__("كريمات معالجة")}}</option>
                            <option value='{{__("وصلات شعر")}}'>{{__("وصلات شعر")}}</option>
                            <option value='{{__("أخرىخواتم")}}'>{{__("أخرىخواتم")}}</option>
                            <option value='{{__("نظارات")}}'>{{__("نظارات")}}</option>
                            <option value='{{__("اقلام")}}'>{{__("اقلام")}}</option>
                            <option value='{{__("قداحات")}}'>{{__("قداحات")}}</option>
                            <option value='{{__("شنط - محافظ")}}'>{{__("شنط - محافظ")}}</option>
                            <option value='{{__("احزمة")}}'>{{__("احزمة")}}</option>
                            <option value='{{__("سبح")}}'>{{__("سبح")}}</option>
                            <option value='{{__("شماغ - حطة - عقال")}}'>{{__("شماغ - حطة - عقال")}}</option>
                            <option value='{{__("اخرى")}}'>{{__("اخرى")}}</option>
                        </select>
                    </div>
                </div>
                <x-ads.shared.status />
                <x-ads.shared.shipping />
            </div>
        </div>
    </div>
</div>
