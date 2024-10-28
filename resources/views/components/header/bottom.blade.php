@props(['Categories','SubCategories'])
<div class="header-inner">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">

                <div class="col-lg-9 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <nav class="navbar navbar-expand-lg">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        @foreach($Categories as $Category)
                                            @if($Category->id <=7 && $Category->id !=2)

                                            <li><a href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}">@if(Illuminate\Support\Facades\App::isLocale('ar')){!! Purifier::clean($Category->name_1) !!}@endif @if(Illuminate\Support\Facades\App::isLocale('en')){!! Purifier::clean($Category->name_2) !!}@endif<i class="ti-angle-down"></i></a>
                                            @if($Category->has_sub_category == 1)
                                                <ul class="dropdown">
                                                    @foreach($SubCategories as $SubCategory)
                                                        @if($Category->id == $SubCategory->category)
                                                            <li><a href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}"> @if(Illuminate\Support\Facades\App::isLocale('ar')){!! Purifier::clean($SubCategory->name_1) !!}@endif @if(Illuminate\Support\Facades\App::isLocale('en')){!! Purifier::clean($SubCategory->name_2) !!}@endif</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
                {{--  @if(!Route::is('contact') && !Route::is('ads') && !Route::is('ads.show') && !Route::is('categroy') && !Route::is('subcategroy'))--}}

                <div class="col-lg-3">
                    <div class="all-category rtl">
                        @if(!Route::is('/'))
                        <h3 class="cat-heading"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> {{ __('الرئيسية') }}</a></h3>
                        @else
                        <h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i> {{ __('أخرى') }}</h3>
                        <ul class="main-category">
                            @foreach($Categories as $Category)
                            @if($Category->id >7)
                                <li><a href="/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}">
                                    @if(Illuminate\Support\Facades\App::isLocale('ar')){!! Purifier::clean($Category->name_1) !!}@endif
                                    @if(Illuminate\Support\Facades\App::isLocale('en')){!! Purifier::clean($Category->name_2) !!}@endif
                                </a>
                            @endif
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
