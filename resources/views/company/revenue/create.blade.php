@extends('layout.company')
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
                        <h3 class="card-title">Create Role</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <form method="POST" action="{{ route('company.revenues.revenue_store') }}" class='needs-validation'
                            novalidate>
                            @csrf
                            <div class="card-body row g-2">
                                <div class="form-group  ">
                                    
                                    <label for="multiple-select-field" class="form-label">{{ __('routes.Account No') }}</label>
                                    <select class="form-select" id="multiple-select-field"
                                     id="account_id" name="account_id"  required>
                                    
                                    @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}">
                                        {{ $account->account_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">{{ __('routes.Amount') }}</label>
                                <input type="text" name="amount" class="form-control" id="amount"
                                     required>
                            </div>
                            <div class="form-group">
                                <label for="desc">{{ __('routes.Description') }}</label>
                                <input type="text" name="desc" class="form-control" id="desc"
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
