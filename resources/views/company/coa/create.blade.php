@extends('layout.company')
@section('title')
    Account
@endsection
@section('page_name')
    Account Page
@endsection
@section('active_link')
    <a href="#">Account</a>
@endsection
@section('active_content')
    Account Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('routes.Add Account') }}</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">

                        <form method="POST" action="{{ route('company.coa.coa_store') }}" class='needs-validation'
                            novalidate>
                            @csrf
                            {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                            <div class="card-body row g-3">
                                <div class="form-group col-6 ">
                                    <label for="name">{{ __('routes.Name') }}</label>
                                    <input type="text" name="name" class="form-control mt-1" id="name" required>
                                </div>
                                <div class="form-group col-6">
                                  <label for="parent_id">{{ __('routes.Parent Account') }}</label>
                                  <select name="parent_id" id="parent_id" class="form-control mt-1 select2 parent_id"
                                      data-show-subtext="true" data-live-search="true">
                                      @foreach ($collections as $item)
                                          <option value="{{ $item->id }}">{{ $item->account_name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                                <div class="form-group col-6">
                                    <label for="account_number">{{ __('routes.Account No') }}</label>
                                    <input type="text" readonly value="0" name="account_number" class="form-control mt-1"
                                        id="account_number"  placeholder="Enter Account Number" required>
                                </div>
                                
                                <div class="form-group col-6">
                                    <label for="level">{{ __('routes.Level') }}</label>
                                    <input type="text" name="level" readonly value="0" class="form-control mt-1" id="level"
                                        placeholder="Enter Level" required>
                                </div>

                                <div class="form-group col-4">
                                    <label for="debit">{{ __('routes.Debit') }}</label>
                                    <input type="text" readonly value="0" name="debit" class="form-control mt-1"
                                        id="debit" placeholder="Enter Debit" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="credit">{{ __('routes.Credit') }}</label>
                                    <input type="text" readonly value="0" name="credit" class="form-control mt-1"
                                        id="credit" placeholder="Enter Credit" required>
                                </div>
                                <div class="form-group col-4">
                                    <label for="balance">{{ __('routes.Balance') }}</label>
                                    <input type="text" readonly value="0" name="balance" class="form-control mt-1"
                                        id="balance" required>
                                </div>
                                <hr />
                                <div class="form-group col-6">
                                    <label for="report_type">{{ __('routes.Report Type') }}</label>
                                    <select name="report_type" id="" class="form-control mt-1 select2">

                                        @foreach ($report_types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="account_type">{{ __('routes.Account Type') }}</label>
                                    <select name="account_type" id="" class="form-control mt-1 select2">

                                        @foreach ($account_types as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
      $( document ).ready(function() {
          console.log( "ready!" );
          console.log( $('.parent_id').val() );
          $.ajax({
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: './childs/'+$('.parent_id').val(),
                
                success: function(response, textStatus, xhr) {
                  console.log('success');
                  console.log('response:'+JSON.stringify(response));
                  $('#account_number').val(response[0]);
                  $('#level').val(response[1]);
                    // Swal.fire({
                    //     title: "{{ __('routes.Deleted!') }}",
                    //     text: "{{ __('routes.Has been Successfully deleted.') }}",
                    //     icon: "success"
                    // });
                    // setTimeout(function() {
                    //     //your code to be executed after 1 second
                    //     location.reload();
                    // }, 3000);

                },
                
            });
      });
    </script>
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
  
    <script>
        $('.parent_id').on('change', function() {
            console.log(this.value);
            var val=this.value;
            $.ajax({
                type: 'get',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: './childs/'+val,
                
                success: function(response, textStatus, xhr) {
                  console.log('success');
                  console.log('response:'+JSON.stringify(response));
                  $('#account_number').val(response[0]);
                  $('#level').val(response[1]);
                    // Swal.fire({
                    //     title: "{{ __('routes.Deleted!') }}",
                    //     text: "{{ __('routes.Has been Successfully deleted.') }}",
                    //     icon: "success"
                    // });
                    // setTimeout(function() {
                    //     //your code to be executed after 1 second
                    //     location.reload();
                    // }, 3000);

                },
                
            });
        })
    </script>
@endsection
