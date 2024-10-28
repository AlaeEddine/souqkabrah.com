<div class="px-1 pt-2">
    <form action="{{ route('search') }}" method="POST">@csrf
        <div class="container d-none d-md-block">
            <div class="col-12 text-center" dir="ltr">
                @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                <div class="input-group mb-2">
                    <button class="btn btn-primary border-dark" type="submit"><b>بحث</b></button>
                    <input type="text" class="form-control border-dark text-end"  name="searchquery" placeholder="ابحث في {{App\Models\Setting::first()->title}}" aria-label="ابحث في {{App\Models\Setting::first()->title}}" required>
                </div>
                @else
                <div class="input-group px-5 mb-3 ">
                    <input type="text" class="form-control border-dark" name="searchquery" id="searchquery" placeholder="Search In OpenSooq" aria-label="Search In OpenSooq" required>
                    <button class="btn btn-primary px-5 border-dark" type="submit"><b><h5>Search</h5></b></button>
                </div>
                @endif
            </div>
        </div>
    </form>
    <form action="{{ route('search') }}" method="POST">@csrf
        <div class="d-md-none d-sm-block">
            <div class="col-12 text-center" dir="ltr">
                @if(Illuminate\Support\Facades\App::currentLocale() == 'ar')
                <div class="input-group mb-2">
                    <button class="btn btn-primary border-dark" type="submit"><b>بحث</b></button>
                    <input type="text" class="form-control border-dark text-end"  name="searchquery" placeholder="ابحث في {{App\Models\Setting::first()->title}}" aria-labe="{{App\Models\Setting::first()->title}} في " required>
                </div>
                @else
                <div class="input-group px-5 mb-3 ">
                    <input type="text" class="form-control border-dark" name="searchquery" id="searchquery" placeholder="Search In OpenSooq" aria-label="Search In OpenSooq" required>
                    <button class="btn btn-primary px-5 border-dark" type="submit"><b><h5>Search</h5></b></button>
                </div>
                @endif
            </div>
        </div>
    </form>
</div>
<hr>
