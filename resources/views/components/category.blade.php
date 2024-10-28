@props(['selected'=>null,'name'=>'category','required'=>0])<?php use App\Models\Category; $Categories = Category::where('removed','0')->get(); ?>
<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ __('اختر السوق') }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-select" @if($required == 1) required @endif>
        @foreach ($Categories as $Category)
        <option value="{{ e($Category->id) }}" @if($selected == $Category->id) selected @endif>{{ e($Category->name_1) }}</option>
        @endforeach
    </select>
</div>
