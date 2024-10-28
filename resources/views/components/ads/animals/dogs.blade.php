<div class="card mb-3">
    <div class="card-body">
        <div class="animalsdetails">
            <div class="col-md-12 col-12 mb-3">
                <div class="form-group">
                    <label for="animals_type" class="form-label">{{ __('النوع') }}</label>
                    <select name="animals_type" id="animals_type" class="form-select">
                        <option value='{{__("بيتبول")}}'>{{__("بيتبول")}}</option>
                        <option value='{{__("بومرينيان")}}'>{{__("بومرينيان")}}</option>
                        <option value='{{__("جولدن")}}'>{{__("جولدن")}}</option>
                        <option value='{{__("جيرمن")}}'>{{__("جيرمن")}}</option>
                        <option value='{{__("شيتزو")}}'>{{__("شيتزو")}}</option>
                        <option value='{{__("شيواوا")}}'>{{__("شيواوا")}}</option>
                        <option value='{{__("مالتيز")}}'>{{__("مالتيز")}}</option>
                        <option value='{{__("هاسكي")}}'>{{__("هاسكي")}}</option>
                        <option value='{{__("تشاو تشاو")}}'>{{__("تشاو تشاو")}}</option>
                        <option value='{{__("يوركشاير")}}'>{{__("يوركشاير")}}</option>
                        <option value='{{__("دوبرمان")}}'>{{__("دوبرمان")}}</option>
                        <option value='{{__("بولدوج")}}'>{{__("بولدوج")}}</option>
                        <option value='{{__("بودل")}}'>{{__("بودل")}}</option>
                        <option value='{{__("لولو فوكس")}}'>{{__("لولو فوكس")}}</option>
                        <option value='{{__("بج")}}'>{{__("بج")}}</option>
                        <option value='{{__("روت وايلر")}}'>{{__("روت وايلر")}}</option>
                    </select>
                </div>
            </div>
            <x-ads.shared.shipping />
        </div>
    </div>
</div>
