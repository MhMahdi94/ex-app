@extends('layout.admin')
@section('title')
Admins
@endsection
@section('page_name')
Admins Page
@endsection
@section('active_link')
<a href="#">Admins</a>
@endsection
@section('active_content')
Admins Page
@endsection
@section('content')
 <!-- /.row -->
<div class="container">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit Admin</h3>

              
            </div>
            <!-- /.card-header -->
          
            <div class="card-body table-responsive p-0">
                <form method="POST" action="../update/{{ $package->id }}" class='needs-validation' novalidate>
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $package->name }}" class="form-control" id="name" placeholder="Enter Name" required>
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