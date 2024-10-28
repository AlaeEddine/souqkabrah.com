@foreach(App\Http\Controllers\SettingController::getSettings() as $Setting)
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body class="rtl js" @if(Illuminate\Support\Facades\App::currentLocale() == 'ar') dir="rtl" @else dir="ltr" @endif>
    <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
    <!-- Header -->
	<header class="header shop">
		<x-header.top :Setting="$Setting" />
		{{-- <x-header.middle :Categories="App\Http\Controllers\UserController::Categories()" :SubCategories="App\Http\Controllers\UserController::SubCategories()" :SubSubCategories="App\Http\Controllers\UserController::SubSubCategories()" />
		@if(!Auth::check())
        <x-header.bottom :Categories="App\Http\Controllers\UserController::Categories()" :SubCategories="App\Http\Controllers\UserController::SubCategories()" :SubSubCategories="App\Http\Controllers\UserController::SubSubCategories()" />
        @else
        <x-header.account />
        @endif
 --}}
    </header>
    <section class="content">
    @yield('content')
    </section>
    @include('includes.footer')
    @yield('js')
    @yield('script')
    @yield('scripts')
    @yield('scripts2')
    @yield('scriptscomponents')
</body>
 </html>
@endforeach
