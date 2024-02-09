@extends('layout.admin')
@section('title')
    Owners
@endsection
@section('page_name')
    Owners Page
@endsection
@section('active_link')
    <a href="#">Owners</a>
@endsection
@section('active_content')
    Owners Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('routes.Create Owner') }}</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <form method="POST" action="{{ route('admin.owners.owners_store') }}" class='needs-validation'
                            novalidate>
                            @csrf
                            <div class="card-body row g-2">
                                <div class="form-group">
                                    <label for="name">{{ __('routes.Company') }}</label>
                                    <select name="company_id" id="" class="form-control select2">
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="english_name">{{ __('routes.Name(English)') }}</label>
                                    <input type="text" name="english_name" class="form-control" id="english_name"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="arabic_name">{{ __('routes.Name(Arabic)') }}</label>
                                    <input type="text" name="arabic_name" class="form-control" id="arabic_name"
                                        placeholder="Enter Name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('routes.Email') }}</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Enter email" required>
                                </div>
                                <div class="form-group">
                                    <label for="mobile_no">{{ __('routes.Mobile No') }}</label>
                                    <input type="text" name="mobile_no" class="form-control" id="mobile_no"
                                        placeholder="Enter Mobile Number" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('routes.Password') }}</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">{{ __('routes.Confirm Password') }}</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name='confirm_password' placeholder="Confirm Password" required>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('routes.Submit') }}</button>
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
