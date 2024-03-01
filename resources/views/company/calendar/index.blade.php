@extends('layout.company')
@section('title')
    Admins
@endsection
@section('page_name')
    Roles Page
@endsection
@section('active_link')
    <a href="#">Admins</a>
@endsection
@section('active_content')
    Roles Page
@endsection
@section('content')
    <!-- /.row -->
    <div class="page-content">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('assets/plugins/fullcalendar/js/main.min.js') }}"></script>

    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const months = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];
            let initialDate = new Date();
            const SITEURL = 'http://127.0.0.1:8000/company/calendar';
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: ''
                },
                initialView: 'dayGridMonth',
                initialDate: `${initialDate.getFullYear()}-${months[initialDate.getMonth()]}-${months[initialDate.getDay()]}`,
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                nowIndicator: true,
                dayMaxEvents: true, // allow "more" link when too many events
                editable: true,
                selectable: true,
                businessHours: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: SITEURL + "/events",
                select: function(start, end, allDay) {
                    console.log(start.startStr)
                    console.log(start.endStr)
                    Swal.fire({
                        title: "{{ __('routes.Event Title') }}",
                        input: "text",
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        showCancelButton: true,
                        confirmButtonText: "{{ __('routes.Submit') }}",
                        cancelButtonText: "{{ __('routes.Cancel') }}",
                        showLoaderOnConfirm: true,
                        preConfirm: async (title) => {
                            try {
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                            .attr('content')
                                    },
                                    url: SITEURL + "/handle-event",
                                    data: {
                                        title: title,
                                        start: start.startStr, //start,
                                        end: start.endStr, //end,
                                        type: 'add'
                                    },
                                    type: "POST",
                                    success: function(data) {
                                        //displayMessage("Event Created Successfully");

                                        calendarEl.fullCalendar('renderEvent', {
                                            id: data.id,
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                        }, true);

                                        //    calendarEl.fullCalendar('unselect');
                                    }
                                });
                            } catch (error) {
                                Swal.showValidationMessage(`
                                Request failed: ${error}
                            `);
                            }
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                // title: "{{ __('routes.Deleted!') }}",
                                // text: "{{ __('routes.Has been Successfully deleted.') }}",
                                icon: "success"
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                    // var title = prompt('Event Title:');
                    // if (title) {
                    //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                    //     $.ajax({
                    //         url: SITEURL + "/fullcalenderAjax",
                    //         data: {
                    //             title: title,
                    //             start: start,
                    //             end: end,
                    //             type: 'add'
                    //         },
                    //         type: "POST",
                    //         success: function (data) {
                    //             displayMessage("Event Created Successfully");

                    //             calendar.fullCalendar('renderEvent',
                    //                 {
                    //                     id: data.id,
                    //                     title: title,
                    //                     start: start,
                    //                     end: end,
                    //                     allDay: allDay
                    //                 },true);

                    //             calendar.fullCalendar('unselect');
                    //         }
                    //     });
                    // }
                },
                eventDrop: function({
                    event,
                    delta
                }) {
                    var start = event.startStr; // $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = event.endStr; // $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    console.log(event.startStr);
                    console.log(event.endStr);
                    $.ajax({
                        url: SITEURL + "/handle-event",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function(response) {
                           // displayMessage("Event Updated Successfully");
                           Swal.fire({
                                // title: "{{ __('routes.Deleted!') }}",
                                // text: "{{ __('routes.Has been Successfully deleted.') }}",
                                icon: "success"
                            });
                        }
                    });
                },
                eventClick: function({event}) {
                    console.log(event);
                    Swal.fire({
                    title: "{{ __('routes.Are you sure?') }}",
                    // text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "{{ __('routes.Cancel') }}",
                    confirmButtonText: "{{ __('routes.Yes, delete it!') }}"
                }).then((result) => {

                    if (result.isConfirmed) {
                             $.ajax({
                            type: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: SITEURL + "/handle-event",
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
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
                
                }
            });
            calendar.render();
        });
    </script>
@endsection
