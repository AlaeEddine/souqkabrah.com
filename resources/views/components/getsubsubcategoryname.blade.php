@props(['SubSubCategory' => null])
@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($SubSubCategory->name_1) }}@else{{ e($SubSubCategory->name_2) }} @endif
