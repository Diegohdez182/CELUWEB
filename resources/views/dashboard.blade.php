
@extends('layouts.app')


@section('contenido')
    
      <div id='calendar'></div>
    
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js"></script>    
    <script>      

        document.addEventListener('DOMContentLoaded', function() {
          const calendarEl = document.getElementById('calendar');
          const calendar = new FullCalendar.Calendar(calendarEl, {
            //initialView: 'dayGridMonth',
            headerToolbar: {
              left: 'dayGridMonth,timeGridWeek,timeGridDay',
              center: 'title',
              right: 'prev,next today',
            },
          

            dateClick: function (info){
              window.open("https://www.google.com.co"); 
            },

          });
          calendar.render();
        });
  
      </script>
@endpush