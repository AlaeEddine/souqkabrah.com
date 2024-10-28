@props(['Categories'])
<div class="middle-inner d-none">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-md-2 col-12">
				<!-- Logo -->
				<div class="logo">
					<a href="/"><img src="{{url('/assets/images')}}/logo.png" alt="logo"></a>
				</div>
				<!--/ End Logo -->
				<!-- Search Form -->
                <div class="search-top">
                    <!-- Search Form -->
                    <div class="search-top">
                        <form  action="{{ route('search') }}" method="POST" class="search-form">@csrf
                            <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                            <input type="text" name="q" placeholder="{{ __('ابحث هنا') }}...">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
				<!--/ End Search Form -->
				<div class="mobile-nav"></div>
			</div>
			<div class="col-lg-8 col-md-7 col-12">
                <form action="{{ route('search') }}" method="POST">@csrf
                    <div class="input-group mb-3">
                        <select class="select-form d-none d-sm-block" name="searchcategory">
                            <option value="0" selected>{{ __('كل الأقسام') }}</option>
                            @foreach($Categories as $Category)
                                <option value="{{e($Category->id)}}">{{e($Category->name_1)}}</option>
                            @endforeach
                        </select>
                        <div class="form-floating">
                        <input type="text" class="form-control" id="searchquery" name="searchquery" placeholder="{{ __('ابحث هنا') }}..." required>
                        <label for="searchquery">{{ __('ابحث هنا') }}...</label>
                        </div>
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1"><i class="fa fa-search"></i></button>
                  </div>
                </form>
				{{--  <div class="search-bar-top">
					<div class="search-bar">
						<form action="{{ route('search') }}" method="POST">@csrf
							<input name="q" placeholder="{{ __('ابحث هنا') }}....." type="search">
                            <select name="searchcategory" class="select">
                                <option value="0">{{ __('كل الأقسام') }}</option>
                                @foreach($Categories as $Category)
                                    <option value="{{e($Category->id)}}">{{e($Category->name_1)}}</option>
                                @endforeach
                            </select>
							<button type="submit" class="btnn"><i class="ti-search"></i></button>
						</form>
					</div>
				</div>--}}
			</div>
			<div class="col-lg-2 col-md-3 col-12">
				<div class="right-bar">
					<!-- Search Form -->
					<div class="row">
					<div class="col-4">
						<div class="sinlge-bar rtl" dir="rtl">
							<a @if(!Auth::check()) onclick="alertify.alert('{{ __('تسجيل الدخول إجباري') }}', '{{ __('يجب عليك تسجيل الدخول لإضافة الإعلانات لقائمة المتابعة') }}');" @else href="{{route('account.ads.likes')}}" @endif class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i> @if(App\Http\Controllers\LikeController::countLikes()>0)<span class="total-count">{{  App\Http\Controllers\LikeController::countLikes() }}@endif</span></a>
						</div>
					</div>
					<div class="col-4">
						<div class="sinlge-bar">
							<a @if(!Auth::check()) href="{{ route('login') }}" @else href="{{ route('account') }}" @endif class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
						</div>
					</div>
					{{--  <div class="col-4">
						<div class="sinlge-bar shopping">
							<a href="#" class="single-icon"><i class="ti-bag"></i> @if(App\Http\Controllers\CartController::countAds()>0)<span class="total-count">{{ App\Http\Controllers\CartController::countAds() }}</span>@endif</a>
							<!-- Shopping Item -->
							<div class="shopping-item">
								<div class="dropdown-cart-header">
									<span>2 Items</span>
									<a href="#">View Cart</a>
								</div>
								<ul class="shopping-list">
									<li>
										<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
										<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
										<h4><a href="#">Woman Ring</a></h4>
										<p class="quantity">1x - <span class="amount">$99.00</span></p>
									</li>
									<li>
										<a href="#" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
										<a class="cart-img" href="#"><img src="https://via.placeholder.com/70x70" alt="#"></a>
										<h4><a href="#">Woman Necklace</a></h4>
										<p class="quantity">1x - <span class="amount">$35.00</span></p>
									</li>
								</ul>
								<div class="bottom">
									<div class="total">
										<span>Total</span>
										<span class="total-amount">$134.00</span>
									</div>
									<a href="checkout.html" class="btn animate">Checkout</a>
								</div>
							</div>
							<!--/ End Shopping Item -->
						</div>
					</div>--}}
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Header Inner -->
