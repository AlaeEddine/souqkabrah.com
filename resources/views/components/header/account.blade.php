<div class="header-inner rtl" dir="rtl">
    <div class="container">
        <div class="cat-nav-head">
            <div class="row">
                <div class="col-lg-9 col-12">
                    <div class="menu-area">
                        <!-- Main Menu -->
                        <style>
                            .fa-menu{
                                font-size: 15px !important;
                            }
                        </style>
                        <nav class="navbar navbar-expand-lg rtl" dir="rtl">
                            <div class="navbar-collapse">
                                <div class="nav-inner">
                                    <ul class="nav main-menu menu navbar-nav">
                                        <li><a href="{{ route('/') }}"><i class="fa fa-home fa-menu"></i> {{ __('الرئيسية') }}</a></li>
                                        <li><a href="{{ route('chat') }}"><i class="fa fa-envelope fa-menu"></i> {{ __('دردشاتي') }}</a></li>
                                        <li><a href="{{ route('notification') }}"><i class="fa fa-bell fa-menu"></i> {{ __('تنبيهاتي') }}</a></li>
                                        <li><a><i class="fa fa-bullhorn fa-menu"></i> {{ __('الإعلانات') }} <i class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{route('account.ads')}}"><i class="fa fa-bullhorn"></i> {{ __('إعلاناتي') }}</a></li>
                                                <li><a href="{{route('account.ads.draft')}}"><i class="fa fa-pencil"></i> {{ __('المسودات') }}</a></li>
                                                <li><a href="{{route('account.ads.likes')}}"><i class="fa fa-heart"></i> {{ __('الإعلانات المفضلة') }}</a></li>
                                                <li><a href="{{route('account.ads.seen')}}"><i class="fa fa-eye"></i> {{ __('الإعلانات المشاهدة') }}</a></li>
                                                <li><a href="{{route('account.ads.likers')}}"><i class="fa fa-user-plus"></i> {{ __('الإعلانات من المتابعون') }}</a></li>
                                                <li><a href="{{route('account.ads.job')}}"><i class="fa fa-user-tie"></i> {{ __('طلبات التوظيف') }}</a></li>
                                                <li><a href="{{route('account.ads.search.liked')}}"><i class="fa fa-searchengin"></i> {{ __('البحوث المفضلة') }}</a></li>
                                                <li><a href="{{route('account.ads.search.history')}}"><i class="fa fa-search"></i> {{ __('البحوث المشاهدة') }}</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-user-tie fa-menu"></i> {{ __('الحساب') }} <i class="ti-angle-down"></i></a>
                                            <ul class="dropdown">
                                                <li><a href="{{route('account')}}"><i class="fa fa-user-shield"></i> {{ __('حسابي') }}</a></li>
                                                <li><a href="{{route('account.cv')}}"><i class="fa fa-user-tie"></i> {{ __('السيرة الذاتية') }}</a></li>
                                                <li><a href="/account/tabs/rating"><i class="fa fa-star"></i> {{ __('التقييم') }}</a></li>
                                                {{-- <li><a href="{{route('account.wallet')}}"><i class="fa fa-wallet"></i> {{ __('المحفظة') }}</a></li>  --}}
                                            </ul>
                                        </li>
                                        {{--  <li><a href="{{ route('/') }}"><i class="fa fa-cubes fa-menu"></i> {{ __('الخدمات') }}</a></li>--}}
                                        <li><a href="{{ route('invite.friends',[session('user.link')]) }}"><i class="fa fa-users fa-menu"></i> {{ __('أدعو أصدقائك') }}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!--/ End Main Menu -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
