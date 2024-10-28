@props(['AdsHome'])
@foreach ($AdsHome as $Ad)
<section class="hero-slider text-center">
    <div @if($Ad->cover != null)style="background-image:url({{ e($Ad->cover) }});background-size:cover; background-repeat:no-repeat" @else class='single-slider' @endif>
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-9 offset-lg-3 col-12 text-center">
                    <div class="text-inner text-center">
                        <div class="row">
                            <div class="col-lg-7 col-12 text-center">
                                <div class="hero-text">
                                    <h1>{{ e($Ad->title) }}</h1>
                                    <p>{!!  Purifier::clean($Ad->details) !!}</p>
                                    <div class="button">
                                        <a href="{{ route('ads',[e($Ad->id)]) }}" class="btn">{{ __('إشتري الآن') }}</a>
                                    </div>
                                    <p><br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
