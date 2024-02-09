@extends('layout.company')
@section('title')
    Journal
@endsection
@section('page_name')
    Journal Page
@endsection
@section('active_link')
    <a href="#">Journal</a>
@endsection
@section('active_content')
    Journal Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 text-uppercase">{{ __('routes.Add Journal') }}</h6>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive ">

                        <form method="POST" action="{{ route('company.journals.journals_store') }}" class='needs-validation'
                            novalidate>
                            @csrf
                            {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                            <div class="card-body row g-2">
                                <div class="form-group col-md-6">
                                    <label for="journal_date">{{ __('routes.Date') }}</label>
                                    <input type="date"  name="journal_date" class="form-control"
                                        id="journal_date" placeholder="Enter Journal Date" value="{{ $date }}"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="journal_number">{{ __('routes.Journal Number') }}</label>
                                    <input type="text" readonly name="journal_number" class="form-control"
                                        id="journal_number" placeholder="Enter journal_number" value="{{ $count + 1 }}"
                                        required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">{{ __('routes.Description') }}</label>
                                    <input type="text" name="description" class="form-control" id="description"
                                        placeholder="Enter description" required>
                                </div>
                                <hr class="mt-4">
                                <div class="card-header">
                                    <h6 class="mb-2 text-uppercase">{{ __('routes.Journal Details') }}</h6>

                                    <div class="row">
                                          
                                           <div class="form-group col-md-3">
                                               <select name="account_no" id="account_no"
                                                    class="form-control select2 account_no">
                                                    @foreach ($accounts as $account)
                                                        <option value="{{ $account->account_no}}">{{ $account->account_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                       <div class="col-md-2">
                                        <input type="text" name="debit" id="debit"
                                        placeholder="Enter Debit" class="form-control " />
                                       </div>
                                       <div class="col-md-2">
                                        <input type="text" name="credit" id="credit"
                                                placeholder="Enter credit" class="form-control" />
                                       </div>
                                       <div class="col-md-3">
                                        <input type="text" name="descriprtion" id="descriprtion"
                                        placeholder="Enter Description" class="form-control " />
                                       </div>
                                       
                                        
                                       <div class="col-md-2">
                                          <button type="button" name="add" id="add-btn"
                                                class="btn btn-success w-100">{{ __('routes.Add') }} </button>
                                       </div>
                                       
                                    
                                    </div>

                                </div>
                                <table class="table table-bordered journal-list" id="dynamicAddRemove">
                                    <tr>
                                        <th>{{ __('routes.Account Name') }}</th>
                                        <th>{{ __('routes.Debit') }}</th>
                                        <th>{{ __('routes.Credit') }}</th>
                                        <th>{{ __('routes.Description') }}</th>
                                        <th>{{ __('routes.Actions') }}</th>
                                    </tr>
                                   
                                </table>
                                 {{-- <hr class="mt-2"/> --}}
                                 <div class="row">
                                  <div class="form-group col-md-4">
                                    <label for="total_debit">{{ __('routes.Total Debit') }}</label>
                                    <input type="text" readonly name="total_debit" class="form-control sum_debit"
                                        id="total_debit" placeholder="Enter total_debit" value="{{ 0}}"
                                        required>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="total_credit">{{ __('routes.Total Credit') }}</label>
                                    <input type="text" readonly name="total_credit" class="form-control sum_credit"
                                        id="total_credit" placeholder="Enter total_credit" value="{{ 0}}"
                                        required>
                                  </div>
                                  <div class="form-group col-md-4">
                                    <label for="balance">{{ __('routes.Balance') }} </label>
                                    <input type="text" readonly name="balance" class="form-control balance"
                                        id="balance" placeholder="Enter balance" value="{{ 0}}"
                                        required>
                                  </div>
                                 </div>

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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        var i = -1;

        $("#add-btn").click(function() {

            
            ++i;
            
            $(".journal-list").append(`<tr><td >
              <input type="text" hidden name="journalDetails[${i}][account_no]" placeholder="Enter Debit" class="form-control " readonly value=${$('#account_no').val()} >
              <input type="text" name="" placeholder="Enter Debit" class="form-control " readonly value='${$('#account_no').find(":selected").text()}' ></td>
                <td ><input type="text" name="journalDetails[${i}][debit]" placeholder="Enter Debit" class="form-control total-debit" readonly value=${$('#debit').val()} ></td>
                <td><input type="text" name="journalDetails[${i}][credit]" placeholder="Enter Credit" class="form-control total-credit" readonly value=${$('#credit').val()}></td>
                <td><input type="text" name="journalDetails[${i}][descriprtion]" placeholder="Enter Description" class="form-control " readonly value=${$('#descriprtion').val()}></td>
                <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>`);
                calculateTotalDebit();
                calculateTotalCredit();
                calculateBalance();
                    $('#account_no').val('');
            $('#debit').val('');
            $('#credit').val('');
            $('#descriprtion').val('');
              });
          
            
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
            calculateTotalDebit();
            calculateTotalCredit();
            calculateBalance();
        });
    </script>
    <script>
       $(document).ready(function() {
        calculateBalance();
       
       });
      function calculateTotalDebit(){
        var total_debit=0;
        console.log(total_debit);
        $(' .total-debit').each(function(index){
          console.log($(this).val());
          total_debit+= parseFloat($(this).val());
        });
        //$('.total-orders').html(price);
        console.log(`${total_debit}`);

        $('.sum_debit').val(`${total_debit}`);
        // if(price>0){
        //   $('#add-order-btn').removeClass('disabled')
        // }else{
        //   $('#add-order-btn').addClass('disabled')
        // }
      }

      function calculateTotalCredit(){
        var total_credit=0;
        console.log(total_credit);
        $(' .total-credit').each(function(index){
          console.log($(this).val());
          total_credit+= parseFloat($(this).val());
        });
        //$('.total-orders').html(price);
        console.log(`${total_credit}`);

        $('.sum_credit').val(`${total_credit}`);
        // if(price>0){
        //   $('#add-order-btn').removeClass('disabled')
        // }else{
        //   $('#add-order-btn').addClass('disabled')
        // }
      }

      function calculateBalance(){
        var balance=0;
        console.log(balance);
        $('.balance').val(parseFloat( $('.sum_credit').val()) - parseFloat($('.sum_debit').val()));
        //$('.total-orders').html(price);
       console.log($('.sum_credit').val()+$('.sum_debit').val());

        // if(price>0){
        //   $('#add-order-btn').removeClass('disabled')
        // }else{
        //   $('#add-order-btn').addClass('disabled')
        // }
      }
    </script>
@endsection
