<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="land_surface" class="form-label">{{__('مساحة الأرض')}}</label>
        <div class="row">
            <div class="col-md-3 col-12">
                <select name="land_surface_size" id="land_surface_size" class="form-select">
                    <option value="{{ __('متر مربع') }}" selected>{{ __('متر مربع') }}</option>
                    <option value="{{ __('قدم مربع') }}">{{ __('قدم مربع') }}</option>
                    <option value="{{ __('فدان') }}">{{ __('فدان') }}</option>
                    <option value="{{ __('دونم') }}">{{ __('دونم') }}</option>
                    <option value="{{ __('هكتار') }}">{{ __('هكتار') }}</option>
                </select>
            </div>
            <div class="col-md-9 col-12">
                <input type="text" class="form-control" name="land_surface" id="land_surface" placeholder="{{__('مساحة الأرض')}}" value="{{old('land_surface')}}">
            </div>
        </div>
    </div>
</div>
