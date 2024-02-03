@extends('layout.company')
@section('title')
Import/Export
@endsection
@section('page_name')
Import/Export Page
@endsection
@section('active_link')
<a href="#">Import/Export</a>
@endsection
@section('active_content')
Import/Export Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Import/Export</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">

                <form method="POST" action="{{ route('company.stock.stock_import_export_update') }}" class='needs-validation' novalidate>
                    @csrf
                    {{-- @method('put') --}}
                    {{-- <input type="hidden" name="company_id" value="{{ $employee->company->id }}"> --}}
                    <div class="row gap-2 mb-2">
                        <div class="form-group ">
                            <label for="name">Name</label>
                            <input type="hidden" name="product_id"  value="{{ $product->id }}"/>
                            <input type="text" readonly name="name" class="form-control" value="{{ $product->name }}" id="name" placeholder="Enter Name" required>
                        </div>
                       
                        <div class="form-group ">
                          <label for="operation_id">Operation</label>
                          <select name="operation_id" id="" class="form-control select2">
                            @foreach ($opertions as $opertion)
                              <option value="{{ $opertion->id }}" >{{ $opertion->name }}</option>
                              
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group ">
                          <label for="current_quantity"> Current Quantity</label>
                          <input type="number" readonly name="current_quantity" class="form-control" value="{{ $product->quantity }}" id="current_quantity" placeholder="Enter Name" required>
                      </div>

                      <div class="form-group ">
                        <label for="quantity">Quantity</label>
                        <input type="number"  name="quantity" class="form-control"  id="quantity" placeholder="Enter quantity" required>
                    </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
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
    (function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
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