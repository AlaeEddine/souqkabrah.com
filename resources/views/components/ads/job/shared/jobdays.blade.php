<div class="col-md-12 col-12">
    <label for="cv_days" class="form-label">{{ __('ما عدد أيام العمل؟') }}</label>
    <select class="form-select mt-3 mb-3" name="cv_days">
        @for($i=1;$i<=7;$i++)
        <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
</div>
