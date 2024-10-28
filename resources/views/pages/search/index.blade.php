@extends('layouts.website')
@section('content')
<div class="m-5">

        <h5 class="mb-3 mt-3"><i class="fa fa-search os-text"></i> {{ __('نتائج البحث') }} : ({{ e($ResultCount) }})</h5>
        @if(session('success'))
            <div class="alert alert-success">{{e(session('success'))}}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{e(session('error'))}}</div>
        @endif
        <x-ads.search />
        <div class="row">
            <div class="col-md-3 d-none d-md-inline mt-2">
                <div class="card">
                    <div class="card-body">
                        <h3>{{ __('القسم') }}</h3>
                        <select name="category" class="form-select">
                            <option value="" selected></option>
                            @foreach (App\Models\Category::where('removed',0)->get() as $Category)
                                <option value="{{ e($Category->id) }}">{{ e($Category->name_1) }}</option>
                            @endforeach
                        </select>
                        <h5>{{ __('جميع الأقسام') }}</h5>
                        @foreach (App\Models\Category::where('removed',0)->get()->skip(0)->take(8) as $Category)
                            <a href="/الأقسام/{{ $Category->id }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Category->id))->get()->first()->name_1) }}" class="black mt-2">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }}@endif</a><br>
                        @endforeach
                        <button class="btn btn-link more2 mt-2" type="button" data-bs-toggle="collapse"   onclick="this.classList.remove('d-inline');this.classList.add('d-none');document.querySelector('.less2').classList.remove('d-none');document.querySelector('.less2').classList.add('d-inline');" data-bs-target="#moreCategories2" aria-expanded="false" aria-controls="moreCategories2">
                            <b>{{ __('شاهد المزيد') }}</b>
                        </button>
                        <div class="collapse" id="moreCategories2">
                            @foreach (App\Models\Category::where('removed',0)->get()->skip(8) as $Category)
                                <a href="/الأقسام/{{ $Category->id }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Category->id))->get()->first()->name_1) }}" class="black mt-2">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }}@endif</a><br>
                            @endforeach
                            <button class="btn btn-link less2 mt-2" type="button" data-bs-toggle="collapse" onclick="this.classList.remove('d-inline');this.classList.add('d-none');document.querySelector('.more2').classList.remove('d-none');document.querySelector('.more2').classList.add('d-inline');" data-bs-target="#moreCategories2" aria-expanded="false" aria-controls="moreCategories2">
                                <b>{{ __('شاهد أقل') }}</b>
                            </button>
                        </div>
                        <hr>
                        <h5>{{ __('المدينة') }}</h5>
                        <x-city :country_id="session('user.id_country')" />
                        <hr>
                        @if(session('user.id_country') == 2)
                        <div class="form-group">
                            <label for="name_area" class="form-label">{{__('المنطقة')}}</label>
                            <x-village :country_id="2" :city_id="3889" />
                        </div>
                        <hr>
                        @endif

                    </div>
                </div>

            </div>
            <div class="col-md-9 col-sm-12 col-12">
                <div class="row">
                    @foreach ($Ads as $Ad)
                    <?php
                    if($Ad->id_category == 0):
                        $ProductUrl = route('ads.show',[$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
                    else:
                        if($Ad->id_subcategory == 0):
                            $ProductUrl = route('ads.with.category.show',[$Ad->id_category, App\Http\Controllers\UserController::slug($Ad->name_category),$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
                        else:
                            if($Ad->id_subsubcategory == 0):
                                $ProductUrl = route('ads.with.subcategory.show',[$Ad->id_subcategory, App\Http\Controllers\UserController::slug($Ad->name_subcategory),$Ad->id_category, App\Http\Controllers\UserController::slug($Ad->name_category),$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
                            else:
                                $ProductUrl = route('ads.with.subsubcategory.show',[$Ad->id_subsubcategory, App\Http\Controllers\UserController::slug($Ad->name_subsubcategory),$Ad->id_subcategory, App\Http\Controllers\UserController::slug($Ad->name_subcategory),$Ad->id_category, App\Http\Controllers\UserController::slug($Ad->name_category),$Ad->id, App\Http\Controllers\UserController::slug($Ad->title)]);
                            endif;
                        endif;
                    endif;
                    ?>
                    <div class="col-md-12 p-2 gray m-2">
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <?php $CompteurPIC = 1; $CompteurVID = 0; ?>
                                    @for ($i = 1; $i <=30; $i++)
                                        @if( $Ad->{'picture'.$i} != null)
                                            <?php $CompteurPIC += 1; ?>
                                        @endif
                                    @endfor

                                    @for ($j = 1; $j <=30; $j++)
                                        @if( $Ad->{'video'.$j} != null)
                                        <?php $CompteurVID += 1; ?>
                                        @endif
                                    @endfor
                                    <a href="{{ $ProductUrl }}"><div class="position-relative">
                                        <img src="{{ $Ad->cover }}" alt="{{ $Ad->title }}" class="img-fluid img-thumbnail rounded img-reponsive position-relative">
                                        <span class="badge bg-dark p-1 position-absolute top-100 start-0" style="margin-top:-40px; margin-left:10px; background-color: rgba(0, 0, 0, 0.4) !important;font-weight:normal !important;font-size:20px;">{{ $CompteurPIC }} <i class="fa fa-image"></i></span>
                                        <span class="badge bg-dark p-1 position-absolute top-100 start-0 @if($CompteurVID == 0) d-none @endif" style="margin-top:-40px; margin-left:60px; background-color: rgba(0, 0, 0, 0.4) !important;font-weight:normal !important;font-size:20px;">{{ $CompteurVID }} <i class="fa fa-video"></i></span>
                                    </div></a>
                                </div>
                                <div class="col-md-8 col-12">
                                    <a href="{{ $ProductUrl }}" class="black"><h3 class="mb-3">{{ $Ad->title }}</h3>
                                    <h6 class="mb-3">{{ e(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }}</h6>
                                    <h6 class="mb-3">{{ e(App\Models\Category::where('removed',0)->where('id',e($Ad->id_category))->get()->first()->name_1) }} {{ __('في') }} <b>{{ e($Ad->name_city) }}</b></h6>
                                    </a><div class="row mt-4">
                                        @if(App\Models\User::where('id',e($Ad->id_owner))->where('removed',0)->count()>0)<div class="col-md-4 col-sm-6 col-xs-12"><a onclick="getphonenumber('{{ App\Models\User::where('id',e($Ad->id_owner))->where('removed',0)->get()->first()->phone }}',{{ e($Ad->id) }})" class="position-relative shineEffect btn btn-primary form-control mt-2 p-2 mb-2" dir="ltr"> <span class="phone{{ e($Ad->id) }}">{{ e(substr(App\Models\User::where('id',e($Ad->id_owner))->where('removed',0)->get()->first()->phone,0,-3)) }}XXX</span> <i class="fa fa-phone"></i></a></div>@endif
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else data-bs-toggle="modal" data-bs-target="#ChatNew{{ e($Ad->id) }}" @endif class="btn btn-outline-primary form-control mt-2 p-2 mb-2" dir="ltr">{{ __('دردش') }} <i class="fa fa-comments "></i></a>
                                            <div class="modal fade" dir="ltr" id="ChatNew{{ e($Ad->id) }}" tabindex="-1" aria-labelledby="ChatNew{{ e($Ad->id) }}Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="ChatNew{{ e($Ad->id) }}Label">{{ __('التواصل مع صاحب الإعلان') }}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" dir="rtl">
                                                        <form action="{{ route('chat.new',[$Ad->id]) }}" method="POST">@csrf
                                                            <div class="form-floating">
                                                                <textarea class="form-control border-primary" placeholder="{{ __('اترك رسالتك') }}" rows="3" name="message_1" id="floatingTextarea{{ e($Ad->id) }}"></textarea>
                                                                <label for="floatingTextarea{{ e($Ad->id) }}">{{ __('الرسالة') }}</label>
                                                            </div>
                                                            <button type="submit" class="btn btn-outline-primary form-control mt-2"><i class="fa fa-comments "></i> {{ __('دردش') }}</button>
                                                        </form>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-1 col-sm-1 col-xs-1">
                                            <a @if(!Auth::check()) data-bs-toggle="modal" data-bs-target="#LoginOrRegister" @else href="{{ route('likes.add',[$Ad->id]) }}" @endif  class="btn mt-2 p-2 mb-2 bg-white"><i class="fa fa-heart text-danger"></i></a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 text-start mt-2 p-2 mb-2">
                                            <h6 class="text-danger"><b>
                                                @if($Ad->price != null && $Ad->price !=0)
                                                    {{ number_format($Ad->price,0) }} {{ $Ad->name_currency }}
                                                @else
                                                    {{ __('غير محدد') }}
                                                @endif </b></h6>
                                        </div>
                                    </div>

                                </div>

                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
</div>
@endsection
@section('scripts')
@parent
    <script type="text/javascript">
        function getphonenumber(phone,id){
            @if(Auth::check())
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/chat/show/nd/"+id,
                type: 'POST',
                success: function(data) {
                    document.querySelector('.phone'+id).innerHTML = phone;
                    $('.phone'+id).attr('href','tel:'+phone);
                    window.location.href = $('.phone'+id).attr('href');

                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + xhr.status + " " + error);
                }
            });
            @else
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/show/nd/"+id,
                type: 'POST',
                success: function(data) {
                    document.querySelector('.phone'+id).innerHTML = phone;
                    $('.phone'+id).attr('href','tel:'+phone);
                    window.location.href = $('.phone'+id).attr('href');
                },
                error: function(xhr, status, error) {
                    console.log("An error occurred: " + xhr.status + " " + error);
                }
            });
            @endif
        }
    </script>
@endsection
