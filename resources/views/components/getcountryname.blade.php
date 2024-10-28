@if(session('selector.city.name.'.Illuminate\Support\Facades\App::currentLocale()) == null)
    @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
        {{ __('عمان') }}
    @else
        {{ __('Oman') }}
    @endif
    <?php session('selector.city.name.ar','عمان'); ?>
    <?php session('selector.city.name.en','Oman'); ?>
@else
    {{ session('selector.city.name.'.Illuminate\Support\Facades\App::currentLocale()) }}
@endif
