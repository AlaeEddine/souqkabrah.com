<div class="desktoponly d-none d-md-block">
    @foreach (App\Models\Category::where('removed',0)->get()->skip(0)->take(8) as $Category)
        <a href="/الأقسام/{{ $Category->id }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Category->id))->get()->first()->name_1) }}" class="btn btn-outline-primary mt-2">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }}@endif</a>
    @endforeach
    <button class="btn btn-outline-primary more mt-2" type="button" data-bs-toggle="collapse"   onclick="this.classList.remove('d-inline');this.classList.add('d-none');document.querySelector('.less').classList.remove('d-none');document.querySelector('.less').classList.add('d-inline');" data-bs-target="#moreCategories" aria-expanded="false" aria-controls="moreCategories">
        <b>{{ __('شاهد المزيد') }}</b>
    </button>
    <div class="collapse" id="moreCategories">
        @foreach (App\Models\Category::where('removed',0)->get()->skip(8) as $Category)
            <a href="/الأقسام/{{ $Category->id }}-{{ App\Http\Controllers\UserController::slug(App\Models\Category::where('removed',0)->where('id',e($Category->id))->get()->first()->name_1) }}" class="btn btn-outline-primary mt-2">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ e($Category->name_1) }}@else{{ e($Category->name_2) }}@endif</a>
        @endforeach
        <button class="btn btn-outline-primary less mt-2" type="button" data-bs-toggle="collapse" onclick="this.classList.remove('d-inline');this.classList.add('d-none');document.querySelector('.more').classList.remove('d-none');document.querySelector('.more').classList.add('d-inline');" data-bs-target="#moreCategories" aria-expanded="false" aria-controls="moreCategories">
            <b>{{ __('شاهد أقل') }}</b>
        </button>
    </div>
</div>
