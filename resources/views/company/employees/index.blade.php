@extends('layout.company')

@section('content')
    <!-- /.row -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="mb-0 text-uppercase ">Employees List</h6>
                        <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                            data-bs-target="#SearchModal">
                            <input class="form-control px-5" disabled type="search" placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                                    class='bx bx-search'></i></span>
                        </div>

                        <div class="d-flex ustify-content-between align-items-center" width='200'>
                            <a class=" btn btn-success float-right"
                                href="{{ route('company.employees.employees_create') }}">Add
                                Employee</a>
                        </div>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                          <table id="example2" class="table table-striped table-bordered">
                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Mobile No</th>
                                      <th>Status</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($data as $item)
                                      <tr>
                                          <td>{{ $item->name }}</td>
                                          <td>{{ $item->email }}</td>
                                          <td>{{ $item->mobile_no }}</td>
                                          <td>
                                              <span
                                                  class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} ">{{ $item->status ? 'Active' : 'Not Active' }}</span>
                                          </td>
                                          <td class="d-flex   ">
                                              <div class=" mx-1">
                                                  <a class="btn btn-warning px-4"
                                                      href="{{ route('company.employees.employees_details', $item->id) }}">Details</a>
                                              </div>
                                              <div class="mx-1">
                                                  <a class="btn btn-primary px-4"
                                                      href="{{ route('company.employees.employees_edit', $item->id) }}">Edit</a>
                                              </div>
                                              <div class="mx-1">
                                                  <meta name="csrf-token" content="{{ csrf_token() }}">
                                                  <form method="post" class="delete-form"
                                                      data-route="{{ route('company.employees.employees_destroy', $item->id) }}">
                                                      @method('delete')
                                                      <button type="submit" class="btn btn-danger px-4 ">Delete</button>
                                                  </form>
                                              </div>
                                          </td>
                                      </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
  
                  </div>
                </div>
            </div>
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
                    text: "You won't be able to revert this!",
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
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                                setTimeout(function() {
                                    //your code to be executed after 1 second
                                    windows.location.reload;
                                }, 3000);

                            }
                        });

                    }
                });

            })
        });
        $('#delete_admin').click(function() {
            console.log('click')
            var userURL = $(this).data('route');
            console.log(userURL)
            var token = $("meta[name='csrf-token']").attr("content");
            console.log(token)


            // $.ajax(

            // {

            //     url: "users/"+id,

            //     type: 'DELETE',

            //     data: {

            //         "id": id,

            //         "_token": token,

            //     },

            //     success: function (){

            //         console.log("it Works");

            //     }

            // });
        })
    </script>
@endsection
