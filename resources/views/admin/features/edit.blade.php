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
                        <h3 class="card-title">{{ __('routes.Features Section') }}</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.landing.landing_features_save') }}" class='needs-validation' enctype="multipart/form-data"
                            novalidate>
                            @csrf
                            <div class="card-body row g-2">
                                <div class="form-group col-md-6 ">
                                    <label for="title_english">{{ __('routes.Title(English)') }}</label>
                                    <input type="text" name="title_english" class="form-control" id="title_english"
                                        placeholder="Enter Name" 
                                        value="{{ $feature->getTranslation('title','en')??'' }}" 
                                        required>
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="title_arabic">{{ __('routes.Title(Arabic)') }}</label>
                                    <input type="text" name="title_arabic" class="form-control" id="title_arabic"
                                        placeholder="Enter Name" 
                                        value="{{ $feature->getTranslation('title','ar')??'' }}" 
                                        required>
                                </div>
                                <div class="form-group ">
                                    <label for="desc_english">{{ __('routes.Description(English)') }}</label>
                                    <input type="text" name="desc_english" class="form-control" id="desc_english"
                                        placeholder="Enter desc" 
                                        value="{{ $feature->getTranslation('desc','ar')??'' }} "
                                        required>
                                </div>
                                <div class="form-group ">
                                    <label for="desc_arabic">{{ __('routes.Description(Arabic)') }}</label>
                                    <input type="text" name="desc_arabic" class="form-control" id="desc_arabic"
                                        placeholder="Enter desc" 
                                        value="{{ $feature->getTranslation('desc','ar')??'' }}" 
                                        required>
                                </div>
                               
                              
                              
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
