@props(['selected'=>null,'name'=>'currency','required'=>0])<?php use App\Models\Currency; $Currencies = Currency::where('removed',0)->get(); ?>
<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ __('العملة') }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select" @if($required == 1) required @endif>
        @foreach ($Currencies as $Currency)
        <option value="{{ e($Currency->id) }}" @if($selected == $Currency->id) selected @else @if($Currency->id == 10) selected @endif @endif>{{ e($Currency->name) }}</option>
        @endforeach
    </select>
</div>
