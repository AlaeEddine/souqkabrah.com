@props(['Ad'])
<?php
if($Ad->id_category == 0):
    $ProductUrl = route('ads.show',[$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
else:
    if($Ad->id_subcategory == 0):
        $ProductUrl = route('ads.with.category.show',[$Ad->id_category, App\Http\Controllers\UserController::slug($Ad->name_category),$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
    else:
        if($Ad->id_subsubcategory == 0):
            $ProductUrl = route('ads.with.subcategory.show',[$Ad->id_subcategory, App\Http\Controllers\UserController::slug($Ad->name_subcategory),$Ad->id_category, App\Http\Controllers\UserController::slug($Ad->name_category),$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
        else:
            $ProductUrl = route('ads.with.subsubcategory.show',[$Ad->id_subsubcategory, App\Http\Controllers\UserController::slug($Ad->name_subsubcategory),$Ad->id_subcategory, App\Http\Controllers\UserController::slug($Ad->name_subcategory),$Ad->id_category, App\Http\Controllers\UserController::slug($Ad->name_category),$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
        endif;
    endif;
endif;
?>
<div class="col-md-3 col-12 p-2">
    <a href="{{ $ProductUrl }}" class="black">
        <div class="position-relative">
            <div class="product-image-container" style="width: 100%; height: 200px; overflow: hidden; position: relative;">
                <img src="{{ $Ad->cover }}" alt="{{ $Ad->title }}" class="img-fluid img-thumbnail rounded position-relative" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <span class="badge bg-dark p-1 position-absolute top-100 start-50 translate-middle-x" style="margin-top:-40px; background-color: rgba(0, 0, 0, 0.4); font-weight:normal; font-size:16px;">
                {{ __('السعر') }} : @if($Ad->price == null){{ __('غير محدد') }} @else{{ e($Ad->price) }} {{ e($Ad->name_currency) }}@endif
            </span>
        </div>
        <div class="text-muted text-center mt-2">{{ $Ad->title }}</div>
    </a>
</div>
