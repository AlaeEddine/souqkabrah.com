<div class="card mb-3">
    <div class="card-body">
<div class="cardetails">
    <div class="row">

        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="shipping_service" class="form-label">{{ __('هل لديك خدمة توصيل؟') }}</label>
                <select name="shipping_service" id="shipping_service" class="form-select">
                    <option value="{{ __('كوشوك') }}">{{ __('كوشوك') }}</option>
                    <option value="{{ __('جنط') }}">{{ __('جنط') }}</option>
                    <option value="{{ __('طاسة') }}">{{ __('طاسة') }}</option>
                    <option value="{{ __('طاسة مع كوشوك') }}">{{ __('طاسة مع كوشوك') }}</option>
                    <option value="{{ __('جنط مع كوشوك') }}">{{ __('جنط مع كوشوك') }}</option>
                </select>
            </div>
        </div>
        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="tyres_size" class="form-label">{{ __('المقاس') }}</label>
                <select name="tyres_size" id="tyres_size" class="form-select">
                    <option value="10">10</option>
                    @for($i=11; $i <=16;$i++)
                    <option value="{{ e($i) }}">{{ e($i) }}</option>
                    @endfor
                    <option value="16.5">16.5</option>
                    <option value="17">17</option>
                    <option value="17.5">17.5</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="19.5">19.5</option>
                    @for($i=20; $i <=22;$i++)
                    <option value="{{ e($i) }}">{{ e($i) }}</option>
                    @endfor
                    <option value="22.5">22.5</option>
                    @for($i=23; $i <=26;$i++)
                    <option value="{{ e($i) }}">{{ e($i) }}</option>
                    @endfor
                    <option value="28">28</option>
                    <option value="30">30</option>
                    <option value="{{ __('اخرى') }}">{{ __('اخرى') }}</option>
                </select>
            </div>
        </div>

        <div class="col-md-12 col-12 mb-3">
            <div class="form-group">
                <label for="tyres_brand" class="form-label">{{ __('الماركة') }}</label>
                <select name="tyres_brand" id="tyres_brand" class="form-select">
                    <option value="{{ __('أتلاندر') }}">{{ __('أتلاندر') }}</option>
                    <option value="{{ __('أفون') }}">{{ __('أفون') }}</option>
                    <option value="{{ __('أوز') }}">{{ __('أوز') }}</option>
                    <option value="{{ __('اوزكا') }}">{{ __('اوزكا') }}</option>
                    <option value="{{ __('ايولوس') }}">{{ __('ايولوس') }}</option>
                    <option value="{{ __('باور كينج') }}">{{ __('باور كينج') }}</option>
                    <option value="{{ __('بريد') }}">{{ __('بريد') }}</option>
                    <option value="{{ __('بريدجستون') }}">{{ __('بريدجستون') }}</option>
                    <option value="{{ __('بلاك بير') }}">{{ __('بلاك بير') }}</option>
                    <option value="{{ __('بلاك ريون') }}">{{ __('بلاك ريون') }}</option>
                    <option value="{{ __('بي اف قودريتش') }}">{{ __('بي اف قودريتش') }}</option>
                    <option value="{{ __('بيريللي') }}">{{ __('بيريللي') }}</option>
                    <option value="{{ __('تويو') }}">{{ __('تويو') }}</option>
                    <option value="{{ __('جنرال تاير') }}">{{ __('جنرال تاير') }}</option>
                    <option value="{{ __('جوديير') }}">{{ __('جوديير') }}</option>
                    <option value="{{ __('دنلوب') }}">{{ __('دنلوب') }}</option>
                    <option value="{{ __('ديبيكا') }}">{{ __('ديبيكا') }}</option>
                    <option value="{{ __('ديك سيبيك') }}">{{ __('ديك سيبيك') }}</option>
                    <option value="{{ __('ريكن') }}">{{ __('ريكن') }}</option>
                    <option value="{{ __('سايرس') }}">{{ __('سايرس') }}</option>
                    <option value="{{ __('سوميتومو') }}">{{ __('سوميتومو') }}</option>
                    <option value="{{ __('صني') }}">{{ __('صني') }}</option>
                    <option value="{{ __('فار رود') }}">{{ __('فار رود') }}</option>
                    <option value="{{ __('فالكون') }}">{{ __('فالكون') }}</option>
                    <option value="{{ __('فايرستون') }}">{{ __('فايرستون') }}</option>
                    <option value="{{ __('فريدشتاين') }}">{{ __('فريدشتاين') }}</option>
                    <option value="{{ __('فل رن') }}">{{ __('فل رن') }}</option>
                    <option value="{{ __('كوبر') }}">{{ __('كوبر') }}</option>
                    <option value="{{ __('كومهو') }}">{{ __('كومهو') }}</option>
                    <option value="{{ __('كونتيننتل') }}">{{ __('كونتيننتل') }}</option>
                    <option value="{{ __('لاسا') }}">{{ __('لاسا') }}</option>
                    <option value="{{ __('لاند سبايدر') }}">{{ __('لاند سبايدر') }}</option>
                    <option value="{{ __('لوفن') }}">{{ __('لوفن') }}</option>
                    <option value="{{ __('لينج لونج') }}">{{ __('لينج لونج') }}</option>
                    <option value="{{ __('مارشال') }}">{{ __('مارشال') }}</option>
                    <option value="{{ __('ماستر كرافت') }}">{{ __('ماستر كرافت') }}</option>
                    <option value="{{ __('ميثود') }}">{{ __('ميثود') }}</option>
                    <option value="{{ __('ميشلين') }}">{{ __('ميشلين') }}</option>
                    <option value="{{ __('نوكيا') }}">{{ __('نوكيا') }}</option>
                    <option value="{{ __('نوكيان') }}">{{ __('نوكيان') }}</option>
                    <option value="{{ __('نيكسين') }}">{{ __('نيكسين') }}</option>
                    <option value="{{ __('هانكوك') }}">{{ __('هانكوك') }}</option>
                    <option value="{{ __('هوزير') }}">{{ __('هوزير') }}</option>
                    <option value="{{ __('وانلي') }}">{{ __('وانلي') }}</option>
                    <option value="{{ __('يوكوهاما') }}">{{ __('يوكوهاما') }}</option>
                    <option value="{{ __('يونيرويال') }}">{{ __('يونيرويال') }}</option>
                    <option value="{{ __('اخرى') }}">{{ __('اخرى') }}</option>
                </select>
            </div>
        </div>
        <x-ads.shared.shippingandstatus />

    </div>
</div>
    </div>
</div>
