@extends('layouts.website')
@section('content')
<div class="m-5">
    <x-account.banner />

<?php $User = App\Models\User::where([
    ['id','=',e(session('user.id'))],
    ['banned','!=',1],
    ['removed','=',0]
])->first(); ?>
    <p><br></p>
    @if(session('success'))
    <div class="alert alert-success">{{e(session('success'))}}</div>    <p><br></p>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{e(session('error'))}}</div>    <p><br></p>
    @endif
    <form action="{{ route('account.cv.submit') }}" method="POST">@csrf
    <div class="card mt-2">
        <div class="card-header text-center">
            <div class="card-title">
                <h4><i class="fa fa-user-tie os-text"></i> {{ __('تعديل السيرة الذاتية') }}</h4>
            </div>
        </div>
        <div class="card-body">        {{-- <x-share />  --}}
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-12">
                        <label for="cv_category" class="form-label">{{ __('ما الوظيفة التي تبحث عنها؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_category">
                            @foreach (App\Models\SubSubCategory::where([['subcategory','=',49],['category','=',7]])->get() as $SubCategory)
                                <option value="{{ e($SubCategory->id) }}" @if($User->cv_category == $SubCategory->id) selected @endif>{{ e($SubCategory->name_1) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="cv_exprience" class="form-label">{{ __('ما مستوى الخبرة؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_exprience">
                            <option value="0" @if($User->cv_exprience == null || $User->cv_exprience == 0) selected @endif>{{ __('مبتدئ') }}</option>
                            <option value="1" @if($User->cv_exprience == 1) selected @endif>{{ __('1-2 سنوات') }}</option>
                            <option value="2" @if($User->cv_exprience == 2) selected @endif>{{ __('3-5 سنوات') }}</option>
                            <option value="3" @if($User->cv_exprience == 3) selected @endif>{{ __('6-10 سنوات') }}</option>
                            <option value="4" @if($User->cv_exprience == 4) selected @endif>{{ __('11-15 سنة') }}</option>
                            <option value="5" @if($User->cv_exprience == 5) selected @endif>{{ __('15+ سنة') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <x-country :selected="$User->id_country" />
                        </div>
                        @error('country')
                            <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="mb-3">
                            <x-city :selected="$User->id_city" :country_id="$User->id_country" />
                        </div>
                        @error('city')
                            <div class="text-danger mb-3"><i class="fa fa-warning"></i> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="cv_car" class="form-label">{{ __('هل تتوفر على مركبة؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_car">
                            <option value="1" @if($User->cv_car == null || $User->cv_car == 1) selected @endif>{{ __('نعم') }}</option>
                            <option value="0" @if($User->cv_exprience == 0) selected @endif>{{ __('لا') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="cv_permis" class="form-label">{{ __('هل لديك رخصة قيادة؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_permis">
                            <option value="1" @if($User->cv_permis == null || $User->cv_permis == 1) selected @endif>{{ __('نعم') }}</option>
                            <option value="0" @if($User->cv_car == 0) selected @endif>{{ __('لا') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="cv_diplome" class="form-label">{{ __('ما هي درجة التعليم؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_diplome">
                            <option value="0" @if($User->cv_diplome == null || $User->cv_diplome == 0) selected @endif>{{ __('القراءة والكتابة بدون شهادة') }}</option>
                            <option value="1" @if($User->cv_diplome == 1) selected @endif>{{ __('شهادة ابتدائي') }}</option>
                            <option value="2" @if($User->cv_diplome == 2) selected @endif>{{ __('شهادة ثانوية عامة') }}</option>
                            <option value="3" @if($User->cv_diplome == 3) selected @endif>{{ __('طالب') }}</option>
                            <option value="4" @if($User->cv_diplome == 4) selected @endif>{{ __('دبلوم') }}</option>
                            <option value="5" @if($User->cv_diplome == 5) selected @endif>{{ __('بكالوريوس') }}</option>
                            <option value="6" @if($User->cv_diplome == 6) selected @endif>{{ __('ماجستير') }}</option>
                            <option value="7" @if($User->cv_diplome == 7) selected @endif>{{ __('دكتوراه') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <label for="cv_married" class="form-label">{{ __('ما الحالة الاجتماعية؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_married">
                            <option value="1" @if($User->cv_married == null || $User->cv_married == 1) selected @endif>{{ __('أعزب') }}</option>
                            <option value="2" @if($User->cv_married == 2) selected @endif>{{ __('متزوج') }}</option>
                        </select>
                    </div>
                    <div class="col-md-12 col-12">
                        <label for="cv_info" class="form-label">{{ __('أدخل نبذة عنك') }}</label>
                        <textarea class="form-control" id="cv_info" name="cv_info" rows="3">{{ e($User->cv_info) }}</textarea>
                    </div>
                    <div class="col-md-12 col-12">
                        <label for="cv_adress" class="form-label">{{ __('عنوان السكن') }}</label>
                        <textarea class="form-control" id="cv_adress" rows="3" name="cv_adress">{{ e($User->cv_adress) }}</textarea>
                    </div>
                    <div class="col-md-6 col-12">
                        <?php
$competence1=false;$competence2=false;$competence3=false;$competence4=false;$competence5=false;$competence6=false;
$competence7=false;$competence8=false;$competence9=false;$competence10=false;$competence11=false;$competence12=false;
$competence13=false;$competence14=false;$competence15=false;$competence16=false;$competence17=false;$competence18=false;
$competence19=false;$competence20=false;$competence21=false;$competence22=false;$competence23=false;$competence24=false;
$competence25=false;$competence26=false;$competence27=false;$competence28=false;$competence29=false;$competence30=false;
$Competences = explode(",",$User->cv_competences);
foreach ($Competences as $key => $value) {if($value == 1){ $competence1=true; }if($value == 2){ $competence2=true; }if($value == 3){ $competence3=true; }if($value == 4){ $competence4=true; }if($value == 5){ $competence5=true; }if($value == 6){ $competence6=true; }if($value == 7){ $competence7=true; }if($value == 8){ $competence8=true; }if($value == 9){ $competence9=true; }if($value == 10){ $competence10=true; }if($value == 11){ $competence11=true; }if($value == 12){ $competence12=true; }if($value == 13){ $competence13=true; }if($value == 14){ $competence14=true; }if($value == 15){ $competence15=true; }if($value == 16){ $competence16=true; }if($value == 17){ $competence17=true; }if($value == 18){ $competence18=true; }if($value == 19){ $competence19=true; }if($value == 20){ $competence20=true; }if($value == 21){ $competence21=true; }if($value == 22){ $competence22=true; }if($value == 23){ $competence23=true; }if($value == 24){ $competence24=true; }if($value == 25){ $competence25=true; }if($value == 26){ $competence26=true; }if($value == 27){ $competence27=true; }if($value == 28){ $competence28=true; }if($value == 29){ $competence29=true; }if($value == 20){ $competence20=true; }
}
                        ?>
                        <label for="cv_competences" class="form-label">{{ __('اختر المهارات') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_competences[]" multiple>
                            <option value="1" @if($competence1 == true) selected @endif>{{ __('التواصل') }}</option>
                            <option value="2" @if($competence2 == true) selected @endif>{{ __('القيادة') }}</option>
                            <option value="3" @if($competence3 == true) selected @endif>{{ __('العمل الجماعي') }}</option>
                            <option value="4" @if($competence4 == true) selected @endif>{{ __('التعامل مع الآخرين') }}</option>
                            <option value="5" @if($competence5 == true) selected @endif>{{ __('سرعة التعلم') }}</option>
                            <option value="6" @if($competence6 == true) selected @endif>{{ __('مهارات القدرة على التكيف') }}</option>
                            <option value="7" @if($competence7 == true) selected @endif>{{ __('إدارة') }}</option>
                            <option value="8" @if($competence8 == true) selected @endif>{{ __('حل المشاكل') }}</option>
                            <option value="9" @if($competence9 == true) selected @endif>{{ __('الرغبة في التعلم') }}</option>
                            <option value="10" @if($competence10 == true) selected @endif>{{ __('تعدد المهام') }}</option>
                            <option value="11" @if($competence11 == true) selected @endif>{{ __('المفاوضة') }}</option>
                            <option value="12" @if($competence12 == true) selected @endif>{{ __('المراسلات التجارية') }}</option>
                            <option value="13" @if($competence13 == true) selected @endif>{{ __('إدارة المشاريع') }}</option>
                            <option value="14" @if($competence14 == true) selected @endif>{{ __('إبرام العقود') }}</option>
                            <option value="15" @if($competence15 == true) selected @endif>{{ __('المحادثات الهاتفية') }}</option>
                            <option value="16" @if($competence16 == true) selected @endif>{{ __('إيجاد و جذب العملاء') }}</option>
                            <option value="17" @if($competence17 == true) selected @endif>{{ __('البحث على الأنترنيت') }}</option>
                            <option value="18" @if($competence18 == true) selected @endif>{{ __('إجراء العروض التقديمية') }}</option>
                            <option value="19" @if($competence19 == true) selected @endif>{{ __('مبدع') }}</option>
                            <option value="20" @if($competence20 == true) selected @endif>{{ __('التدريب و التطوير') }}</option>
                            <option value="21" @if($competence21 == true) selected @endif>{{ __('تدقيق وثائق') }}</option>
                            <option value="22" @if($competence22 == true) selected @endif>{{ __('استخدام البريد الالكتروني') }}</option>
                            <option value="23" @if($competence23 == true) selected @endif>{{ __('العمل مع قواعد البيانات') }}</option>
                            <option value="24" @if($competence24 == true) selected @endif>{{ __('تحفيز الموظفين') }}</option>
                            <option value="25" @if($competence25 == true) selected @endif>{{ __('مايكروسوفت باوربوينت') }}</option>
                            <option value="26" @if($competence26 == true) selected @endif>{{ __('مايكروسوفت اكسل') }}</option>
                            <option value="27" @if($competence27 == true) selected @endif>{{ __('مايكروسوفت وورد') }}</option>
                            <option value="28" @if($competence28 == true) selected @endif>{{ __('فوتوشوب') }}</option>
                            <option value="29" @if($competence29 == true) selected @endif>{{ __('أوتوكاد') }}</option>
                            <option value="30" @if($competence30 == true) selected @endif>{{ __('استخدام الكبيوتر') }}</option>
                        </select>
                    </div>
                    <div class="col-md-6 col-12">
                        <?php
$langues1=false;$langues2=false;$langues3=false;$langues4=false;$langues5=false;$langues6=false;$langues7=false;$langues8=false;$langues9=false;
$Langues = explode(",",$User->cv_languages);
foreach ($Langues as $key => $value) {if($value == 1){ $langues1=true; }if($value == 2){ $langues2=true; }if($value == 3){ $langues3=true; }if($value == 4){ $langues4=true; }if($value == 5){ $langues5=true; }if($value == 6){ $langues6=true; }if($value == 7){ $langues7=true; }if($value == 8){ $langues8=true; }if($value == 9){ $langues9=true; }}
                            ?>
                        <label for="cv_languages" class="form-label">{{ __('ما اللغات التي تتحدثها؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_languages[]" multiple>
                            <option value="1" @if($langues1 == true) selected @endif>{{ __('عربي') }}</option>
                            <option value="2" @if($langues2 == true) selected @endif>{{ __('إنجليزي') }}</option>
                            <option value="3" @if($langues3 == true) selected @endif>{{ __('تركي') }}</option>
                            <option value="4" @if($langues4 == true) selected @endif>{{ __('فرنسي') }}</option>
                            <option value="5" @if($langues5 == true) selected @endif>{{ __('إسباني') }}</option>
                            <option value="6" @if($langues6 == true) selected @endif>{{ __('إيطالي') }}</option>
                            <option value="7" @if($langues7 == true) selected @endif>{{ __('ألماني') }}</option>
                            <option value="8" @if($langues8 == true) selected @endif>{{ __('صيني') }}</option>
                            <option value="9" @if($langues9 == true) selected @endif>{{ __('أخرى') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="cv_type" class="form-label">{{ __('ما نوع عقد التوظيف؟') }}</label>
                        <select class="form-select mt-3 mb-3" name="cv_type">
                            <option value="0" @if($User->cv_type == null || $User->cv_type == 0) selected @endif>{{ __('لا يهم') }}</option>
                            <option value="1" @if($User->cv_type == 1) selected @endif>{{ __('عقد دائم') }}</option>
                            <option value="2" @if($User->cv_type == 2) selected @endif>{{ __('عقد جزئي') }}</option>
                            <option value="3" @if($User->cv_type == 3) selected @endif>{{ __('عقد استشارة') }}</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-12">
                        <label for="cv_salaire" class="form-label">{{ __('ما اقل راتب يمكنك القبول به؟') }}</label>
                        <input type="text" value="{{ e($User->cv_salaire) }}" class="form-control mt-3 mb-3" placeholder="{{ __('ما اقل راتب يمكنك القبول به؟') }}" name="cv_salaire" />
                    </div>
                    <div class="col-md-12 col-12 mt-4 text-center">
                        <button class="btn" type="submit">{{ __('حفظ البيانات') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
