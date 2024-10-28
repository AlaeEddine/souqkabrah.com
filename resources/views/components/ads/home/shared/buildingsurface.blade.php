<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="building_surface" class="form-label">{{__('مساحة البناء')}}</label>
        <div class="row">
            <div class="col-md-3 col-12">
                <select name="building_surface_size" id="building_surface_size" class="form-select">
                    <option value="{{ __('متر مربع') }}" selected>{{ __('متر مربع') }}</option>
                    <option value="{{ __('قدم مربع') }}">{{ __('قدم مربع') }}</option>
                </select>
            </div>
            <div class="col-md-9 col-12">
                <input type="text" class="form-control" name="building_surface" id="building_surface" placeholder="{{__('مساحة البناء')}}" value="{{old('building_surface')}}">
            </div>
        </div>
    </div>
</div>
