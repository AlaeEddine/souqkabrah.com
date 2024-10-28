@props(['SubCategory' => null])
@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($SubCategory->name_1) }}@else{{ e($SubCategory->name_2) }} @endif
