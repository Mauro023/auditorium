@extends('layouts.app')

@section('scripts')

<link rel="stylesheet" href="{{ asset('fullcalendar/core/main.css') }}">
<link rel="stylesheet" href="{{ asset('fullcalendar/daygrid/main.css') }}">
<link rel="stylesheet" href="{{ asset('fullcalendar/list/main.css') }}">
<link rel="stylesheet" href="{{ asset('fullcalendar/timegrid/main.css') }}">

<script src="{{ asset('fullcalendar/core/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/interaction/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/daygrid/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/list/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/timegrid/main.js') }}" defer></script>

<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
        //defaultView: 'timeGridDay'

        header:{
            left: 'prev,next today boton',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        customButtons:{

            boton:{
                text: "Agregar evento",
                click:function(){
                  $('#exampleModal').modal('show');
                }
            }
        },
        dateClick:function(info){
            $('#exampleModal').modal('toggle');
            console.log(info);
            calendar.addEvent({ title:"Evento x", date:info.dateStr });
        },
        eventClick:function(info){
            console.log(info);
            console.log(info.event.title);
            console.log(info.event.start);
        }
      });
      calendar.setOption('locale', 'Es');

      calendar.render();
    });
    
  </script>

@endsection

@section('content')
<div class="row">
  <div class="col"></div>
  <div class="col-8">
    <div id="calendar"></div>
  </div>
  <div class="col"></div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btnAdd">Agregar</button>
            <button type="button" class="btn btn-warning" id="btnEdit">Modificar</button>
            <button type="button" class="btn btn-danger" id="btnDelete">Borrar</button>

          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection