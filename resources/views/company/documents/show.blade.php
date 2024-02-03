@extends('layout.company')
@section('title')
    Document
@endsection
@section('page_name')
    Document Page
@endsection
@section('active_link')
    <a href="#">Document</a>
@endsection
@section('active_content')
    Document Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content  ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Show Document</h3>

                        <a class=" btn btn-dark float-right" href="{{ route('company.documents.report_pdf',$header->id) }}">Print</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                        <form method="POST" action="{{ route('company.journals.journals_store') }}"
                            class='needs-validation' novalidate>
                            @csrf
                            {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                            <div class="card-body row g-2">
                                <div class="form-group col-md-4">
                                    <label for="journal_date">Date</label>
                                    <input type="text" disabled name="journal_date" class="form-control"
                                        id="journal_date" placeholder="Enter Journal Date"
                                        value=" {{ $header->document_date }} " required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="journal_number">Document No</label>
                                    <input type="text" disabled name="journal_number" class="form-control"
                                        id="journal_number" placeholder="Enter journal_number" value="{{ $header->id }}"
                                        required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="journal_number">Document Type</label>
                                    <input type="text" disabled name="journal_number" class="form-control"
                                        id="journal_number" placeholder="Enter journal_number"
                                        value="{{ $header->documentType->name }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description">Description</label>
                                    <input type="text" disabled value={{ $header->document_description }}
                                        name="description" class="form-control" id="description"
                                        placeholder="Enter description" required>
                                </div>
                                <hr>
                                <div class="card-header">
                                    <h3 class="card-title">Document Details</h3>


                                </div>
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>Account Name</th>
                                        <th>amount</th>
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                    @foreach ($details as $item)
                                        <tr>
                                            <td width="15%">{{ $item->account->account_name }}</td>
                                            <td width="15%">{{ $item->amount }}</td>
                                        </tr>
                                    @endforeach
                                </table>


                            </div>
                            <!-- /.card-body -->

                            {{-- <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div> --}}
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
        var i = 0;

        $("#add-btn").click(function() {

            ++i;

            $("#dynamicAddRemove").append('<tr><td>' +
                '</td>' +
                '<td><input type="text" name="journalDetails[' + i +
                '][debit]" placeholder="Enter Debit" class="form-control" /></td>' +
                '<td><input type="text" name="journalDetails[' + i +
                '][credit]" placeholder="Enter Credit" class="form-control" /></td>' +
                '<td><input type="text" name="journalDetails[' + i +
                '][descriprtion]" placeholder="Enter Description" class="form-control" /></td>' +
                '<td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
        });

        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
@endsection
