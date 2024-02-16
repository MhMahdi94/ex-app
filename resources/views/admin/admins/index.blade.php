@extends('layout.admin')
{{-- @section('title')
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
@endsection --}}
@section('content')
    <!-- /.row -->
    <div class="page-content">
        <!-- search modal -->
        <div class="modal" id="SearchModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-fullscreen-md-down">
                <div class="modal-content">
                    <div class="modal-header gap-2">
                        <div class="position-relative popup-search w-100">
                            <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search"
                                placeholder="Search">
                            <span
                                class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-4"><i
                                    class='bx bx-search'></i></span>
                        </div>
                        <button type="button" class="btn-close d-md-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="search-list">
                            <p class="mb-1">Html Templates</p>
                            <div class="list-group">
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action active align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-angular fs-4'></i>Best Html Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-vuejs fs-4'></i>Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-magento fs-4'></i>Responsive Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-shopify fs-4'></i>eCommerce Html Templates</a>
                            </div>
                            <p class="mb-1 mt-3">Web Designe Company</p>
                            <div class="list-group">
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-windows fs-4'></i>Best Html Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-dropbox fs-4'></i>Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-opera fs-4'></i>Responsive Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-wordpress fs-4'></i>eCommerce Html Templates</a>
                            </div>
                            <p class="mb-1 mt-3">Software Development</p>
                            <div class="list-group">
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-mailchimp fs-4'></i>Best Html Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-zoom fs-4'></i>Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-sass fs-4'></i>Responsive Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-vk fs-4'></i>eCommerce Html Templates</a>
                            </div>
                            <p class="mb-1 mt-3">Online Shoping Portals</p>
                            <div class="list-group">
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-slack fs-4'></i>Best Html Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-skype fs-4'></i>Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-twitter fs-4'></i>Responsive Html5 Templates</a>
                                <a href="javascript:;"
                                    class="list-group-item list-group-item-action align-items-center d-flex gap-2 py-1"><i
                                        class='bx bxl-vimeo fs-4'></i>eCommerce Html Templates</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end search modal -->
        <hr />
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">

                <h6 class="mb-0 text-uppercase ">{{ __('routes.Admins List') }}</h6>
                <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal"
                    data-bs-target="#SearchModal">
                    <input class="form-control px-5" disabled type="search" placeholder="Search">
                    <span class="position-absolute top-50 search-show ms-3 translate-middle-y start-0 top-50 fs-5"><i
                            class='bx bx-search'></i></span>
                </div>




                {{-- {{ dd($user->can('create-admin')) }} --}}
                <div class="d-flex ustify-content-between align-items-center" width='200'>
                    @if ($user->can('create-admin'))
                        <a class=" btn btn-primary float-right"
                            href="{{ route('admin.admins.admins_create') }}">{{ __('routes.Add Admin') }}</a>
                    @endif

                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>{{ __('routes.Name') }}</th>
                                <th>{{ __('routes.Email') }}</th>
                                <th>{{ __('routes.Mobile No') }}</th>
                                <th>{{ __('routes.Status') }}</th>
                                <th>{{ __('routes.Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->mobile_no }}</td>
                                    <td><span
                                            class="badge {{ $item->status ? 'bg-success' : 'bg-danger' }} ">{{ $item->status ? __('routes.Active') : __('routes.Not Active') }}</span>
                                    </td>
                                    <td class="d-flex  ">
                                        @if ($user->can('edit-admin'))
                                            <div class=" ">
                                                <a class="btn btn-warning px-4"
                                                    href="{{ route('admin.admins.admins_edit', $item->id) }}">{{ __('routes.Edit') }}</a>
                                            </div>
                                        @endif
                                        @if ($user->can('delete-admin'))
                                          <div class="mx-2">
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                            <form method="post" class="delete-form"
                                                data-route="{{ route('admin.admins.admins_destroy', $item->id) }}">
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-danger px-4 ">{{ __('routes.Delete') }}</button>
                                            </form>
                                          </div>
                                        @endif
                                        

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

   

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
                            success: function(response, textStatus, xhr) {
                                Swal.fire({
                                    title: "{{ __('routes.Deleted!') }}",
            text: "{{ __('routes.Has been Successfully deleted.') }}",
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

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
