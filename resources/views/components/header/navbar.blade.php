<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-center" style="padding:0;">
    <div class="container-fluid">
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
     <div class="collapse navbar-collapse" id="main_nav">
       <ul class="navbar-nav nav-fill w-100 text-center">
            @foreach (App\Models\Category::where('removed',0)->get()->skip(0)->take(7) as $Category)
            @if($Category->id != 2)
            <li class="col nav-item dropdown text-center">
                <a class="nav-link dropdown-toggle text-white" href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}" data-bs-toggle="dropdown"><b>@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $Category->name_1 }}@else{{ $Category->name_2 }}@endif</b></a>
                <ul class="dropdown-menu">
                    @foreach (App\Models\SubCategory::where('removed',0)->where('category',e($Category->id))->get()->skip(0)->take(7) as $SubCategory)
                        @if($SubCategory->has_sub_sub_category == 0)
                            <li><a class="dropdown-item" href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}"> @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $SubCategory->name_1 }}@else{{ $SubCategory->name_2 }}@endif </a></li>
                        @else
                            <li><a class="dropdown-item" onclick="getsubmenu('submenu<?php echo e($SubCategory->id); ?>')"> @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $SubCategory->name_1 }}@else{{ $SubCategory->name_2 }}@endif <i class="fa fa-caret-down"></i> </a>
                                <ul class="submenu<?php echo e($SubCategory->id); ?> dropdown-menu dropdown-menu-sghir">
                                    @foreach (App\Models\SubSubCategory::where('removed',0)->where('subcategory',e($SubCategory->id))->get()->skip(0)->take(7) as $SubSubCategory)
                                    <li><a class="dropdown-item" href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}/{{e($SubSubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubSubCategory->name_1))}}">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $SubSubCategory->name_1 }}@else{{ $SubSubCategory->name_2 }}@endif</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
            @endif
            @endforeach
            <li class="nav-item dropdown text-center">
                <a class="nav-link dropdown-toggle text-white" href="/الأقسام" data-bs-toggle="dropdown"><b>{{ __('أقسام أخرى') }}</b></a>
                <ul class="dropdown-menu">
                    @foreach (App\Models\Category::where('removed',0)->get()->skip(7) as $Category)
                        @if($Category->has_sub_category == 0)
                            <li><a class="dropdown-item" href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}"> @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $Category->name_1 }}@else{{ $Category->name_2 }}@endif </a></li>
                        @else
                            <li><a class="dropdown-item" onclick="getsubmenu('submenu<?php echo e($SubCategory->id); ?>')"> @if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $Category->name_1 }}@else{{ $Category->name_2 }}@endif <i class="fa fa-caret-down"></i> </a>
                                <ul class="submenu<?php echo e($SubCategory->id) ?> dropdown-menu dropdown-menu-sghir">
                                    @foreach (App\Models\SubCategory::where('removed',0)->where('category',e($Category->id))->get()->skip(0)->take(7) as $SubCategory)
                                    <li><a class="dropdown-item" href="/الأقسام/{{e($Category->id)}}-{{App\Http\Controllers\UserController::slug(e($Category->name_1))}}/{{e($SubCategory->id)}}-{{App\Http\Controllers\UserController::slug(e($SubCategory->name_1))}}">@if(Illuminate\Support\Facades\App::currentLocale() == 'ar'){{ $SubCategory->name_1 }}@else{{ $SubCategory->name_2 }}@endif</a></li>
                                    @endforeach
                                </ul>
                            </li>

                        @endif

                    @endforeach
                </ul>
            </li>
       </ul>
     </div> <!-- navbar-collapse.// -->
    </div> <!-- container-fluid.// -->
</nav>
<script type="text/javascript">
    function getsubmenu(categoryID){
        event.preventDefault();
        event.stopPropagation();
        let submenu = document.querySelector('.'+categoryID);
        submenu.classList.toggle('show');
        openMenus = document.querySelectorAll('.dropdown-menu-sghir');
        openMenus.forEach(function(menus) {
            if(submenu != menus) {
            menus.classList.remove('show');
            }
        });
    }
</script>
