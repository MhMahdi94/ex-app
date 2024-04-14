@extends('layout.pdf')

@section('content')
    <!-- /.row -->
    <div class="page-content">
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col">
                <div class="d-flex gap-3">
                    <div class="">
                        <img src="{{ asset('assets/images/thrs.jpg') }}" width="80" height="80" alt="">
                    </div>
                    <div class="row">
                        <span class="fs-6 fw-bold">{{ Auth::guard('employee')->user()->company->name }}</span>
                        <span class="text-secondary fs-6 fw-normal">{{ Auth::guard('employee')->user()->company->email }}</span>
                        <label class="text-secondary  fw-normal" style="font-size: 12px">{{ Auth::guard('employee')->user()->mobile_no }}</label>
                    </div>
                </div>
                
            </div>
            <div class="col float-right">
            <h4>
                {{ __('routes.Stock Managment') }}
            </h4>
                
            </div>
           
        </div>
    </div>

    <div class="card-body">
   <div class="row">
            <div class="col-12">
                <div class="">
                 
                    <!-- /.card-header -->
                    <div class="card-body table-responsive ">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('routes.Product') }}</th>
                                    <th>{{__('routes.Operation')}}</th>
                                    <th>{{ __('routes.Quantity') }}</th>
                                    <th>{{ __('routes.Price') }}</th>
                                    <th>{{ __('routes.Currency') }}</th>
                                    <th>{{ __('routes.Date') }}</th>
                                    <th>{{ __('routes.By') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->operation->name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->price }}</td>
                                            <td>{{ $item->currency->code }}</td>
                                            <td>{{ $item->date }}</td>
                                            <td>{{ $item->user->name}}</td>
                                        </tr>
                                    

                    </div>

                </div>
            </div>
            @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
     
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    </div>
    </div>


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
                                    title: "Deleted!",
                                    text: "Your department has been deleted.",
                                    icon: "success"
                                });
                                setTimeout(function() {
                                    //your code to be executed after 1 second
                                    location.reload;
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
@endsection
