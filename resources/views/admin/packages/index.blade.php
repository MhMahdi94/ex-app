@extends('layout.admin')
@section('title')
Services
@endsection
@section('page_name')
Services Page
@endsection
@section('active_link')
<a href="#">Services</a>
@endsection
@section('active_content')
Services Page
@endsection
@section('content')
 <!-- /.row -->
<div class="page-content">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h6 class="mb-0 text-uppercase">{{ __('routes.Services List') }}</h6>
              
              <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
                <input class="form-control px-5" disabled type="search" placeholder="Search">
                <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i class='bx bx-search'></i></span>
                </div>
            
           
    
    
            {{-- {{ dd(Auth::guard('admin')->user()->can('create-package')) }} --}}
              <div class="d-flex ustify-content-between align-items-center" width='200'>
                @if (Auth::guard('admin')->user()->can('create-package'))
                  <a class=" btn btn-primary float-right" href="{{ route('admin.packages.packages_create') }}">{{ __('routes.Add Service') }}</a>
                             
                @endif
               </div>
              
        </div>
            <!-- /.card-header -->
            <div class="card-body table-fixed">
              <table class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>{{ __('routes.Name') }}</th>
                    <th style="width:50%">{{ __('routes.Description') }}</th>
                    <th>{{ __('routes.Actions') }}</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td style="width:30%">
                            <span>

                              {{ $item->desc }}
                            </span>
                            </td>
                            <td class="d-flex">
                              @if (Auth::guard('admin')->user()->can('edit-package'))
                                <a class="mx-2 btn btn-warning" href="{{ route('admin.packages.packages_edit',$item->id ) }}">{{ __('routes.Edit') }}</a>
                              @endif
                              @if (Auth::guard('admin')->user()->can('delete-package'))
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form method="post" class="delete-form" data-route="{{route('admin.packages.packages_destroy', $item->id) }}">
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger  ">{{ __('routes.Delete') }}</button>
                                </form>
                              @endif
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

  $(document).ready(function() {

$('.delete-form').on('submit', function(e) {
  e.preventDefault();
  console.log($(this).data('route'));
  Swal.fire({
    title: "{{ __('routes.Are you sure?') }}",
                    // text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText:"{{ __('routes.Cancel') }}",
                    confirmButtonText: "{{ __('routes.Yes, delete it!') }}"
  }).then((result) => {
  
    if (result.isConfirmed) {
      $.ajax({
        type: 'delete',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: $(this).data('route'),
        data: {
          '_method': 'delete'
        },
        success: function (response, textStatus, xhr) {
          Swal.fire({
            title: "{{ __('routes.Deleted!') }}",
            text: "{{ __('routes.Has been Successfully deleted.') }}",
            icon: "success"
          }).then((res)=>{
            // setTimeout(function() {
            //your code to be executed after 1 second
            location.reload();
          // }, 3000);
          })
          ;
         
          
        }
    });
    
    }
});
  
 })
});
    
</script>
 @endsection