@props(['Category' => null])
@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }} @endif
