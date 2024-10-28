<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="etage" class="form-label">{{ __('الطابق') }}</label>
        <select name="etage" id="etage" class="form-select">
            <option value="{{ __('طابق التسوية') }}">{{ __('طابق التسوية') }}</option>
            <option value="{{ __('طابق شبه أرضي') }}">{{ __('طابق شبه أرضي') }}</option>
            <option value="{{ __('الطابق الأرضي') }}">{{ __('الطابق الأرضي') }}</option>
            @for($i = 1; $i <=9;$i++)
            <option value="{{ e($i) }}">{{ e($i) }}</option>
            @endfor
            <option value="+10">+10</option>
            <option value="{{ __('طابق أخير مع روف') }}">{{ __('طابق أخير مع روف') }}</option>
        </select>
    </div>
</div>
