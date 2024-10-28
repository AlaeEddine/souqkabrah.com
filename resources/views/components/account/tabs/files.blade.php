@props(['UploadFile','UploadFilesCount'])
<div class="row">
    <div class="col-12 p-2">
        <div class="card">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-cogs os-text"></i> {{ __('حمّل الهوية أو السجل التجاري') }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-warning">
                    <p><i class="fa fa-lightbulb"></i> {{ __('حمّل الهوية أو السجل التجاري أو أي إثبات لعملك') }}</p>
                    <p><i class="fa fa-lightbulb"></i> {{ __('وثق معلوماتك لتكون معتمد لدى السوق المفتوح حتى نتمكن من تقديم أفضل خدمة لك ولعملائك.') }}</p>
                </div>
            </div>
        </div>
        <br>
        <form action="{{ route('account.files.upload.submit') }}" method="POST" enctype="multipart/form-data">@csrf
        <div class="card mt-5">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-file os-text"></i> {{ __('نوع الوثيقة ') }}1</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="type1" class="form-label">{{ __('نوع الملف') }}</label>
                                <select class="form-select mt-3 mb-3" name="type1">
                                    <option value="1" @if($UploadFilesCount >0) @if($UploadFile->type1 == 1) selected @endif @else selected @endif>{{ __('البطاقة الشخصية') }}</option>
                                    <option value="2" @if($UploadFilesCount >0) @if($UploadFile->type1 == 2) selected @endif @endif>{{ __('جواز السفر') }}</option>
                                    <option value="3" @if($UploadFilesCount >0) @if($UploadFile->type1 == 3) selected @endif @endif>{{ __('السجل التجاري') }}</option>
                                    <option value="4" @if($UploadFilesCount >0) @if($UploadFile->type1 == 4) selected @endif @endif>{{ __('شهادة مزاولة المهنة') }}</option>
                                    <option value="5" @if($UploadFilesCount >0) @if($UploadFile->type1 == 5) selected @endif @endif>{{ __('أخرى') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="date1" class="form-label">{{ __('تاريخ إنتهاء الصلاحية') }}</label>
                                <input type="date" class="form-control mt-3 mb-3" placeholder="{{ __('تاريخ إنتهاء الصلاحية') }}" name="expirationdate1"  @if($UploadFilesCount >0) @if($UploadFile->expirationdate1 != null) value="{{ e($UploadFile->expirationdate1) }}" @endif @else value="{{ old('expirationdate1') }}" @endif id="date1"/>
                            </div>
                        </div>
                        <table class="">
                            <tr>
                                <td colspan="2">
                                    @if($UploadFilesCount >0)
                                        @if($UploadFile->upload_file1 != '')
                                            <p class="text-center"><img src="{{ $UploadFile->upload_file1 }}" alt="file1" style="width:200px;height:200px"></p>
                                            <input type="hidden" name="upload_file1" value="{{ $UploadFile->upload_file1 }}" />
                                        @endif
                                    @endif
                                    <x-upload buttontext="{{ __('تحميل صورة واحدة') }}" :url="route('account.files.upload','file1')" filename='file1' maxfiles="1" />
                                </td>
                            </tr>
                        </table>
                        <p class="text-center">
                            <button class="btn" formaction="{{ route('account.files.upload.submit') }}" id="submit1" type="submit"><i class="fa fa-floppy-disk"></i> {{ __('حفظ') }}</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-file os-text"></i> {{ __('نوع الوثيقة ') }}2</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="type2" class="form-label">{{ __('نوع الملف') }}</label>
                                <select class="form-select mt-3 mb-3" name="type2">
                                    <option value="1" @if($UploadFilesCount >0) @if($UploadFile->type2 == 1) selected @endif @endif>{{ __('البطاقة الشخصية') }}</option>
                                    <option value="2" @if($UploadFilesCount >0) @if($UploadFile->type2 == 2) selected @endif @else selected @endif>{{ __('جواز السفر') }}</option>
                                    <option value="3" @if($UploadFilesCount >0) @if($UploadFile->type2 == 3) selected @endif @endif>{{ __('السجل التجاري') }}</option>
                                    <option value="4" @if($UploadFilesCount >0) @if($UploadFile->type2 == 4) selected @endif @endif>{{ __('شهادة مزاولة المهنة') }}</option>
                                    <option value="5" @if($UploadFilesCount >0) @if($UploadFile->type2 == 5) selected @endif @endif>{{ __('أخرى') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="date2" class="form-label">{{ __('تاريخ إنتهاء الصلاحية') }}</label>
                                <input type="date" class="form-control mt-3 mb-3" placeholder="{{ __('تاريخ إنتهاء الصلاحية') }}" name="expirationdate2"  @if($UploadFilesCount >0) @if($UploadFile->expirationdate2 != null) value="{{ e($UploadFile->expirationdate2) }}" @endif @else value="{{ old('expirationdate2') }}" @endif id="date2"/>
                            </div>
                        </div>
                        <table class="">
                            <tr>
                                <td colspan="2">
                                    @if($UploadFilesCount >0)
                                        @if($UploadFile->upload_file2 != '')
                                            <p class="text-center"><img src="{{ $UploadFile->upload_file2 }}" alt="file2" style="width:200px;height:200px"></p>
                                            <input type="hidden" name="upload_file2" value="{{ $UploadFile->upload_file2 }}" />
                                        @endif
                                    @endif
                                    <x-upload buttontext="{{ __('تحميل صورة واحدة') }}" :url="route('account.files.upload','file2')" filename='file2' maxfiles="1" />
                                </td>
                            </tr>
                        </table>
                        <p class="text-center">
                            <button class="btn" formaction="{{ route('account.files.upload.submit') }}" id="submit2" type="submit"><i class="fa fa-floppy-disk"></i> {{ __('حفظ') }}</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-file os-text"></i> {{ __('نوع الوثيقة ') }}3</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="type3" class="form-label">{{ __('نوع الملف') }}</label>
                                <select class="form-select mt-3 mb-3" name="type3">
                                    <option value="1" @if($UploadFilesCount >0) @if($UploadFile->type3 == '1') selected @endif @endif>{{ __('البطاقة الشخصية') }}</option>
                                    <option value="2" @if($UploadFilesCount >0) @if($UploadFile->type3 == '2') selected @endif @endif>{{ __('جواز السفر') }}</option>
                                    <option value="3" @if($UploadFilesCount >0) @if($UploadFile->type3 == '3') selected @endif @else selected  @endif>{{ __('السجل التجاري') }}</option>
                                    <option value="4" @if($UploadFilesCount >0) @if($UploadFile->type3 == '4') selected @endif @endif>{{ __('شهادة مزاولة المهنة') }}</option>
                                    <option value="5" @if($UploadFilesCount >0) @if($UploadFile->type3 == '5') selected @endif @endif>{{ __('أخرى') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="date3" class="form-label">{{ __('تاريخ إنتهاء الصلاحية') }}</label>
                                <input type="date" class="form-control mt-3 mb-3" placeholder="{{ __('تاريخ إنتهاء الصلاحية') }}" name="expirationdate3"  @if($UploadFilesCount >0) @if($UploadFile->expirationdate3 != null) value="{{ e($UploadFile->expirationdate3) }}" @endif @else value="{{ old('expirationdate3') }}" @endif id="date3"/>
                            </div>
                        </div>
                        <table class="">
                            <tr>
                                <td colspan="2">
                                    @if($UploadFilesCount >0)
                                        @if($UploadFile->upload_file3 != '')
                                            <p class="text-center"><img src="{{ $UploadFile->upload_file3 }}" alt="file3" style="width:200px;height:200px"></p>
                                            <input type="hidden" name="upload_file3" value="{{ $UploadFile->upload_file3 }}" />
                                        @endif
                                    @endif
                                    <x-upload buttontext="{{ __('تحميل صورة واحدة') }}" :url="route('account.files.upload','file3')" filename='file3' maxfiles="1" />
                                </td>
                            </tr>
                        </table>
                        <p class="text-center">
                            <button class="btn" formaction="{{ route('account.files.upload.submit') }}" id="submit3" type="submit"><i class="fa fa-floppy-disk"></i> {{ __('حفظ') }}</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-file os-text"></i> {{ __('نوع الوثيقة ') }}4</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="type4" class="form-label">{{ __('نوع الملف') }}</label>
                                <select class="form-select mt-3 mb-3" name="type4">
                                    <option value="1" @if($UploadFilesCount >0) @if($UploadFile->type4 == '1') selected @endif @endif>{{ __('البطاقة الشخصية') }}</option>
                                    <option value="2" @if($UploadFilesCount >0) @if($UploadFile->type4 == '2') selected @endif @endif>{{ __('جواز السفر') }}</option>
                                    <option value="3" @if($UploadFilesCount >0) @if($UploadFile->type4 == '3') selected @endif @endif>{{ __('السجل التجاري') }}</option>
                                    <option value="4" @if($UploadFilesCount >0) @if($UploadFile->type4 == '4') selected @endif @else selected @endif>{{ __('شهادة مزاولة المهنة') }}</option>
                                    <option value="5" @if($UploadFilesCount >0) @if($UploadFile->type4 == '5') selected @endif @endif>{{ __('أخرى') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="date4" class="form-label">{{ __('تاريخ إنتهاء الصلاحية') }}</label>
                                <input type="date" class="form-control mt-3 mb-3" placeholder="{{ __('تاريخ إنتهاء الصلاحية') }}" name="expirationdate4"  @if($UploadFilesCount >0) @if($UploadFile->expirationdate4 != null) value="{{ e($UploadFile->expirationdate4) }}" @endif @else value="{{ old('expirationdate4') }}" @endif id="date4"/>
                            </div>
                        </div>
                        <table class="">
                            <tr>
                                <td colspan="2">
                                    @if($UploadFilesCount >0)
                                        @if($UploadFile->upload_file4 != '')
                                            <p class="text-center"><img src="{{ $UploadFile->upload_file4 }}" alt="file4" style="width:200px;height:200px"></p>
                                            <input type="hidden" name="upload_file4" value="{{ $UploadFile->upload_file4 }}" />
                                        @endif
                                    @endif
                                    <x-upload buttontext="{{ __('تحميل صورة واحدة') }}" :url="route('account.files.upload','file4')" filename='file4' maxfiles="1" />
                                </td>
                            </tr>
                        </table>
                        <p class="text-center">
                            <button class="btn" formaction="{{ route('account.files.upload.submit') }}" id="submit4" type="submit"><i class="fa fa-floppy-disk"></i> {{ __('حفظ') }}</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-header text-center">
                <div class="card-title">
                    <h4><i class="fa fa-file os-text"></i> {{ __('نوع الوثيقة ') }}5</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <label for="type5" class="form-label">{{ __('نوع الملف') }}</label>
                                <select class="form-select mt-3 mb-3" name="type5">
                                    <option value="1" @if($UploadFilesCount >0) @if($UploadFile->type5 == '1') selected @endif @endif>{{ __('البطاقة الشخصية') }}</option>
                                    <option value="2" @if($UploadFilesCount >0) @if($UploadFile->type5 == '2') selected @endif @endif>{{ __('جواز السفر') }}</option>
                                    <option value="3" @if($UploadFilesCount >0) @if($UploadFile->type5 == '3') selected @endif @endif>{{ __('السجل التجاري') }}</option>
                                    <option value="4" @if($UploadFilesCount >0) @if($UploadFile->type5 == '4') selected @endif @endif>{{ __('شهادة مزاولة المهنة') }}</option>
                                    <option value="5" @if($UploadFilesCount >0) @if($UploadFile->type5 == '5') selected @endif @else selected @endif>{{ __('أخرى') }}</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="date5" class="form-label">{{ __('تاريخ إنتهاء الصلاحية') }}</label>
                                <input type="date" class="form-control mt-3 mb-3" placeholder="{{ __('تاريخ إنتهاء الصلاحية') }}" name="expirationdate5"  @if($UploadFilesCount >0) @if($UploadFile->expirationdate5 != null) value="{{ e($UploadFile->expirationdate5) }}" @endif @else value="{{ old('expirationdate5') }}" @endif id="date5"/>
                            </div>
                        </div>
                        <table class="">
                            <tr>
                                <td colspan="2">
                                    @if($UploadFilesCount >0)
                                        @if($UploadFile->upload_file5 != '')
                                            <p class="text-center"><img src="{{ $UploadFile->upload_file5 }}" alt="file5" style="width:200px;height:200px"></p>
                                            <input type="hidden" name="upload_file5" value="{{ $UploadFile->upload_file5 }}" />
                                        @endif
                                    @endif
                                    <x-upload buttontext="{{ __('تحميل صورة واحدة') }}" :url="route('account.files.upload','file5')" filename='file5' maxfiles="1" />
                                </td>
                            </tr>
                        </table>
                        <p class="text-center">
                            <button class="btn" formaction="{{ route('account.files.upload.submit') }}" id="submit5" type="submit"><i class="fa fa-floppy-disk"></i> {{ __('حفظ') }}</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

