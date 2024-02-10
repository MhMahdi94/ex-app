@extends('layout.business')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        
        <div class=" card">
            
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-uppercase ">{{ __('routes.Clients List') }}</h6>
                    <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                        data-bs-target="#SearchModal">
                        <input class="form-control px-5" disabled type="search" placeholder="Search">
                        <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                class='bx bx-search'></i></span>
                    </div>





                    <div class="d-flex ustify-content-between align-items-center" width='200'>
                        @if (Auth::guard('business')->user()->can('create-client'))
                            <a class=" btn btn-primary float-right" href="{{ route('business.clients.clients_create') }}">{{ __('routes.Add Client') }}</a>
                        @endif
                    </div>
                </div>
            
            <!-- /.card-header -->
            {{-- 
               --}} <div class="card-body">
      <div class="table-responsive">
        <table id="example2" class="table table-striped table-bordered">
          <thead>
            <tr>
              <tr>
                <th>{{ __('routes.Name') }}</th>
                <th>{{ __('routes.Email') }}</th>
                <th>{{ __('routes.Mobile No') }}</th>
                <th>{{ __('routes.Address') }}</th>
                <th>{{ __('routes.Actions') }}</th>
            </tr>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $item)
                <tr>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->mobile_no }}</td>
                  <td>{{ $item->address }}</td>
                  <td class="row g-4 ">
                      <div class="col-3">
                        @if (Auth::guard('business')->user()->can('edit-client'))
                            
                            <a class="btn btn-primary px-4" href="{{ route('business.clients.clients_edit',$item->id ) }}">{{ __('routes.Edit') }}</a>
                        @endif
                      </div>
                        <div class="col-3">
                            @if (Auth::guard('business')->user()->can('delete-client'))
                            
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <form method="post" class="delete-form" data-route="{{route('business.clients.clients_destroy', $item->id) }}">
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger px-4 ">{{ __('routes.Delete') }}</button>
                                </form>
                            @endif
                        </div>
                        
                    </td>
                </tr> 
            @endforeach
        </tbody>
          
        </table>
      </div>
    </div>
          
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            $('.delete-form').on('submit', function(e) {
                e.preventDefault();
                console.log($(this).data('route'));
                Swal.fire({
                    title: "Are you sure?",
                    // text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
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
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your admin has been deleted.",
                                    icon: "success"
                                });
                                setTimeout(function() {
                                    //your code to be executed after 1 second
                                    location.reload();
                                }, 3000);

                            }
                        });

                    }
                });

            })
        });
    </script>
@endsection
