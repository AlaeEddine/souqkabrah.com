<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="year" class="form-label">{{ __('سنة الصنع') }}</label>
        <select name="year" id="year" class="form-select">
            @for($i = 1900;$i <= date('Y')+1;$i++)
            <option value="{{ e($i) }}" @if($i == date('Y')) selected @endif>{{ e($i) }}</option>
            @endfor
        </select>
    </div>
</div>
