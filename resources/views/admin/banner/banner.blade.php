@extends('layout.admin')
{{-- @section('title')
Admins
@endsection
@section('page_name')
Packages Page
@endsection
@section('active_link')
<a href="#">Packages</a>
@endsection
@section('active_content')
Packages Page
@endsection --}}
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('routes.Banner Section') }}</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.landing.landing_banner_save') }}" class='needs-validation' enctype="multipart/form-data"
                            novalidate>
                            @csrf
                            <div class="card-body row g-2">
                                <div class="form-group col-md-6 ">
                                    <label for="banner_title_english">{{ __('routes.Banner Title(English)') }}</label>
                                    <input type="text" name="banner_title_english" class="form-control" id="banner_title_english"
                                         value="{{ $banner->getTranslation('banner_title','en')??'' }}" required>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="banner_title_arabic">{{ __('routes.Banner Title(Arabic)') }}</label>
                                    <input type="text" name="banner_title_arabic" class="form-control" id="banner_title_arabic"
                                         value="{{ $banner->getTranslation('banner_title','ar')??'' }}" required>
                                </div>
                                <div class="form-group ">
                                    <label for="banner_desc_english">{{ __('routes.Banner Description(English)') }}</label>
                                    <input type="text" name="banner_desc_english" class="form-control" id="banner_desc_english"
                                         value="{{ $banner->getTranslation('banner_desc','en')??'' }} "required>
                                </div>
                                <div class="form-group ">
                                    <label for="banner_desc_arabic">{{ __('routes.Banner Description(Arabic)') }}</label>
                                    <input type="text" name="banner_desc_arabic" class="form-control" id="banner_desc_arabic"
                                         value="{{ $banner->getTranslation('banner_desc','ar')??'' }}" required>
                                </div>
                                <div class="form-group ">
                                    <label for="banner_bg">{{ __('routes.Banner Background') }}</label>
                                    <input type="file" name="banner_bg" class="form-control" id="banner_bg"
                                        value="{{ $banner->banner_bg??'' }}" required>
                                </div>
                              
                                {{-- <div class="form-group  mb-4 mt-2">
                                   
                                    <label for="multiple-select-field" class="form-label">{{ __('routes.Permissions') }}</label>
                                    <select class="form-select" id="multiple-select-field"
                                         id="permissions" name="permissions[]" multiple required>

                                        @foreach ($permissions as $permission)
                                            <option value="{{ $permission->id }}"
                                                {{ in_array($permission->id, old('permissions') ?? []) ? 'selected' : '' }}>
                                                {{ $permission->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">{{__('routes.Submit')}}</button>
                                </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    
    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
@endsection
