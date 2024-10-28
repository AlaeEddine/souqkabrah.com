<div class="col-md-12 col-12 mb-3">
    <div class="form-group">
        <label for="shoes_size" class="form-label">{{ __('القياس') }}</label>
        <select name="shoes_size" id="shoes_size" class="form-select">
            @for($i=35;$i<=47;$i+=0.5)
            <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>
</div>



