@extends('layout.business')
{{-- @section('title')
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
@endsection --}}
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">{{ __('routes.Add Product') }}</h3>

              
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <form method="POST" action="{{ route('business.products.products_store') }}" class='needs-validation' novalidate>
                    @csrf
                    <div class="card-body row g-3">
                        <div class="form-group mb-2 col-md-6">
                          <label for="category_id">{{ __('routes.Category') }}</label>
                          <select name="category_id" id="" class="form-control select2">
                            @foreach ($categories as $catefory)
                              <option value="{{ $catefory->id }}">{{ $catefory->name }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="name">{{ __('routes.Name') }}</label>
                            <input type="text" name="name" class="form-control" id="name"  required>
                        </div>
                        <div class="form-group col-md-4" >
                          <label for="purchase_price">{{ __('routes.Purchase Price') }}</label>
                          <input type="text" name="purchase_price" class="form-control" id="purchase_price"  required>
                      </div>
                      <div class="form-group col-md-4" >
                        <label for="price_sale">{{ __('routes.Sale Price') }}</label>
                        <input type="text" name="price_sale" class="form-control" id="price_sale"  required>
                      </div>
                      <div class="form-group col-md-4" >
                        <label for="quantity">{{ __('routes.Quantity') }}</label>
                        <input type="text" name="quantity" class="form-control" id="quantity"  required>
                    </div>
                    {{-- <div class="form-group col-md-6" >
                      <label for="name">Image</label>
                      <input type="text" name="name" class="form-control" id="name"  required>
                  </div> --}}
                    <div class="form-group col-md-12">
                      <label for="description">{{ __('routes.Description') }}</label>
                      <textarea class="form-control" id="description"  name='description' required></textarea>
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