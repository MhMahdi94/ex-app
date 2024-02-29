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
            <div id='calendar'></div>    
        </div>    
    </div>    


        
    </div>
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>    
    <script>
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name=csrf-token]').attr('content');
            }
        })

        var calendarEl= document.getElementById('calendar');
        var events=[];
        var calendar=new FullCalendar.Calendar(calendarEl,{
            headerToolbar:{
                left:'prev,next today',
                center:'title',
                'right':'dayGridMonth, timeGridWeek, timeGridDay',
            },
            initialView:'dayGridMonth',
            timeZone:"UTC",
            events:'/events',
            editable:true,

        });

        calendar.render();
    </script>
@endsection
