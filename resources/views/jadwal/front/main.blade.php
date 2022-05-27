@extends('templates/user')
@section('content')
<div class="container">
    {{-- <div class="row"> --}}
        <div class="text-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <h1>Jadwal Pertemuan</h1>
            <em>Daftar Jadwal Pertemuan Pemerintah Kota Yogyakarta</em>
        </div>
        <br/>
        <br/>
        <br/>

        <script>

            document.addEventListener('DOMContentLoaded', function() {
              var acara = @json($acara);
              console.log(acara);
              var calendarEl = document.getElementById('calendar');
          
              var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                  left: 'prevYear,prev,next,nextYear today',
                  center: 'title',
                  right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },
                locale: 'id',
                initialDate: "{{ date('Y-m-d') }}",
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: acara
              });
              calendar.render();
            });
          
          </script>

        <style>
            body {
                margin: 40px 10px;
                padding: 0;
                font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
                font-size: 14px;
            }
            #calendar {
            max-width: 1200px;
            margin: 0 auto;
            }
        
        </style>

        <div id='calendar'></div>

    {{-- </div> --}}
</div>
@endsection
