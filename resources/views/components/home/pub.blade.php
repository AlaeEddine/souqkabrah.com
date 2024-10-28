<section id="pub" class="mb-3 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card m-1">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <h5 class="mb-3">{{ __('بيع ما لا تحتاج واكسب المال') }}</h5>
                                <p class="mb-2"><i class="fa fa-check text-success"></i> {{ __('الوصول إلى الملايين من المشترين') }}</p>
                                <p class="mb-2"><i class="fa fa-check text-success"></i> {{ __('أضف إعلانك وبيع أي شيء') }}</p>
                                <p class="mb-2"><i class="fa fa-check text-success"></i> {{ __('بيع كل ما تريده بأفضل الأسعار') }}</p>
                            </div>
                            <div class="col-4"><img src="{{ url('/assets/images/addNewListing.webp') }}" width="120%" alt=""></div>
                        </div>
                        <a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('ads.create') }}" @endif class="btn pt-2 pb-2 mt-3 text-white btn-warning form-control"><b>{{ __('أضف إعلانك الآن') }}</b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card m-1">
                    <div class="card-body">
                        <h5 class="mb-3">{{ __('احصل على إعلانات أكثر و بيع بشكل أسرع') }}</h5>
                        <div class="row">
                            <div class="col-8">
                                <p class="mb-2"><i class="fa fa-check text-success"></i> {{ __('احصل على خصم') }}</p>
                                <p class="mb-2"><i class="fa fa-check text-success"></i> {{ __('أضف إعلانات أكثر وبيع أكثر') }}</p>
                                <p class="mb-2"><i class="fa fa-check text-success"></i> {{ __('اكسب مال أكثر') }}</p>
                            </div>
                            <div class="col-4"><img src="{{ url('/assets/images/getNewListing.webp') }}" width="120%" alt=""></div>
                        </div>
                        <a  @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else  href="{{ route('ads.create') }}" @endif class="btn pt-2 pb-2 mt-3 text-white btn-primary form-control"><b>{{ __('أحصل على إعلانات أكثر') }}</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
