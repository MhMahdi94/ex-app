@extends('layout.business')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        
        <div class=" card">
            
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0 text-uppercase ">Orders Details - (#{{ $request->id }})</h6>
                    





                    <div class="d-flex ustify-content-between align-items-center" width='200'>
                        {{ $request->client->name }}
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
                <th>Product</th>
                <th>Quantity</th>
                {{-- <th>Mobile</th>
                <th>Address</th> 
                <th>Actions</th>--}}
            </tr>
            </tr>
          </thead>
          <tbody>
            @foreach ($contents as $item)
                <tr>
                  <td>{{ $item->product->name }}</td>
                   <td>{{ $item->quantity }}</td>
                  {{--<td>{{ $item->mobile_no }}</td>
                  <td>{{ $item->address }}</td> --}}
                  <td class="row row-cols-auto ">
                   
                     {{-- <div class="col-2">
                        <a class="btn btn-primary px-4" href="{{ route('business.clients.clients_edit',$item->id ) }}">Edit</a>
                      </div> --}}
                       {{-- < <div class="col-2">
                          <meta name="csrf-token" content="{{ csrf_token() }}">
                          <form method="post" class="delete-form" data-route="{{route('business.clients.clients_destroy', $item->id) }}">
                            @method('delete')
                            <button type="submit" class="btn btn-danger px-4 ">Delete</button>
                          </form>
                        </div> --}}
                        
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
