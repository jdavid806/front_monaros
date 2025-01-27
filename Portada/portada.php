<?php
include "../menu.php";
include "../header.php";

$baner = "https://placecats.com/3000/200";
$baner = "";

?>

<style type="text/css">
  .custom-btn {
    width: 150px;
    /* Establece el ancho fijo */
    height: 40px;
    /* Establece la altura fija */
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    margin-bottom: 5px;
    /* Espaciado opcional entre botones */
  }

  .custom-btn i {
    margin-right: 5px;
    /* Espaciado entre el ícono y el texto */
  }

  .banner {
    display: inline-block;
    background-color: #f8f9fa;
    /* Opcional, para agregar un fondo detrás de la imagen */
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  .banner img {
    max-width: 90%;
    height: auto;
  }
</style>
<div class="componete">
  <div class="content">
    <div class="col-12 col-xxl-12">
      <?php if ($baner != ""): ?>
        <div class="mb-8 text-center">
          <div class="banner">
            <img src="https://placecats.com/3000/200" alt="Banner de Dashboard" class="img-fluid">
          </div>
        </div>
      <?php endif ?>
      <div class="row justify-content-center g-4">

        <div class="col-12 col-md-auto text-secondary-lighter">
          <div class="card bg-secondary text-secondary-lighter" style="max-width:18rem;">
            <div class="card-body bg-secondary">
              <h5 class="card-title text-secondary-lighter"><span data-feather="user"></span> Pacientes</h5>
              <p class="card-text text-secondary-lighter">
              <h3 class="card-text text-secondary-lighter">250</h3>
              Pacientes Creados
              </p>
              <button class="btn btn-phoenix-secondary me-1 mb-1" type="button"
                onclick="window.location.href='pacientes'">
                <span data-feather="users"></span> Ver Pacientes
              </button>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-auto">
          <div class="card" style="max-width:18rem;">
            <div class="card-body">
              <h5 class="card-title"><span data-feather="calendar"></span> Citas Generadas</h5>
              <p class="card-text">
              <h3>50</h3>
              Citas generadas este mes
              </p>
              <button class="btn btn-phoenix-secondary me-1 mb-1" type="button" data-bs-toggle="modal"
                data-bs-target="#modalCrearCita">
                <span class="far fa-calendar-plus"></span> Nueva Cita
              </button>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-auto">
          <div class="card" style="max-width:18rem;">
            <div class="card-body">
              <h5 class="card-title"><span data-feather="file-text"></span> Consultas para hoy</h5>
              <p class="card-text">
              <h3>0/2</h3>
              Consultas para hoy
              </p>
              <button class="btn btn-phoenix-secondary me-1 mb-1" type="button"
                onclick="window.location.href='citasControl'">
                <span data-feather="file-plus"></span> Ver Consultas
              </button>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-auto">
          <div class="card" style="max-width:16rem;">
            <div class="card-body">
              <h5 class="card-title"><span data-feather="dollar-sign"></span> Ventas del mes</h5>
              <p class="card-text">
              <h3> <small class="text-muted">$</small>252.000</h3>
              Ventas Totales
              </p>
              <button class="btn btn-phoenix-secondary me-1 mb-1 no-highlight" type="button"
                onclick="window.location.href='FE_FCE'">
                <span class="fas fa-money-bill"></span> Ver Facturas
              </button>
            </div>
          </div>
        </div>

      </div>
      <hr class="bg-body-secondary mb-6 mt-4" />
      <div id='calendar'></div>
      <hr class="bg-body-secondary mb-6 mt-4" />
      <div class="row align-items-center g-4">
        <!-- Primer gráfico Doughnut -->
        <div class="col-6">
          <div id="pie-chart-1" style="width: 100%; height: 400px;"></div>
        </div>
        <!-- Segundo gráfico Doughnut -->
        <div class="col-6">
          <div id="pie-chart-2" style="width: 100%; height: 400px;"></div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {

    createDoughnutChart(
      "pie-chart-1",
      "Iventario de productos",
      "Cantidad de producto",
      "Productos",
      [
        { value: 20, name: "Vitaminas A" },
        { value: 10, name: "supositorios" },
        { value: 5, name: "Vendajes" },
      ]
    );

    createDoughnutChart(
      "pie-chart-2",
      "Pacientes por genero",
      "Pacientes creados por genero",
      "Generos",
      [
        { value: 100, name: "Masculino" },
        { value: 123, name: "Femenino" },
      ]
    );
  });

</script>

<script>

  document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var todayDate = moment().startOf('day');
    var YM = todayDate.format('YYYY-MM');
    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
    var TODAY = todayDate.format('YYYY-MM-DD');
    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      lang: 'es',
      locale: 'es',
      // idicamos los botones que tendra y ubicación
      headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
        //  right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth' en caso de tener lista
      },
      buttonText: {
        month: 'Mes',
        week: 'Semana',
        day: 'Dia',
        // list: 'lista',
      },

      // configruación:

      editable: true,
      dayMaxEvents: true,
      navLinks: true,

      editable: true,
      eventDurationEditable: false,
      selectable: true,
      droppable: true,

      height: 800,
      contentHeight: 780,
      aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

      nowIndicator: true,
      now: TODAY,

      navLinks: true, // can click day/week names to navigate views
      businessHours: true,

      views: {
        dayGridMonth: { buttonText: 'month' },
        timeGridWeek: { buttonText: 'week' },
        timeGridDay: { buttonText: 'day' }
      },

      eventDurationEditable: false,

      initialView: 'dayGridMonth', // iunicia en el día actual en cambia de inciar mes colocar mes 


      events: [
        {
          title: 'All Day Event',
          start: YM + '-01',
          description: 'Toto lorem ipsum dolor sit incid idunt ut',
          className: "fc-event-danger fc-event-solid-warning"
        },
        {
          title: 'Reporting',
          start: YM + '-14T13:30:00',
          description: 'Lorem ipsum dolor incid idunt ut labore',
          end: YM + '-14',
          className: "fc-event-success"
        },
        {
          title: 'Company Trip',
          start: YM + '-02',
          description: 'LAndo de viaje :v',
          end: YM + '-03',
          className: "fc-event-primary"
        },
        {
          title: 'ICT Expo 2017 - Product Release',
          start: YM + '-03',
          description: 'Lorem ipsum dolor sit tempor inci',
          end: YM + '-05',
          className: "fc-event-light fc-event-solid-primary"
        },
        {
          title: 'Dinner',
          start: YM + '-12',
          description: 'Lorem ipsum dolor sit amet, conse ctetur',
          end: YM + '-10'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: YM + '-09T16:00:00',
          description: 'Lorem ipsum dolor sit ncididunt ut labore',
          className: "fc-event-danger"
        },
        {
          id: 1000,
          title: 'Repeating Event',
          description: 'Lorem ipsum dolor sit amet, labore',
          start: YM + '-16T16:00:00'
        },
        {
          title: 'Conference',
          start: YESTERDAY,
          end: TOMORROW,
          description: 'Lorem ipsum dolor eius mod tempor labore',
          className: "fc-event-primary"
        },
        {
          title: 'Meeting',
          start: TODAY + 'T10:30:00',
          end: TODAY + 'T12:30:00',
          description: 'Lorem ipsum dolor eiu idunt ut labore'
        },
        {
          title: 'Lunch',
          start: TODAY + 'T12:00:00',
          className: "fc-event-info",
          description: 'Lorem ipsum dolor sit amet, ut labore'
        },
        {
          title: 'Meeting',
          start: TODAY + 'T14:30:00',
          className: "fc-event-warning",
          description: 'Lorem ipsum conse ctetur adipi scing'
        },
        {
          title: 'Happy Hour',
          start: TODAY + 'T17:30:00',
          className: "fc-event-info",
          description: 'Lorem ipsum dolor sit amet, conse ctetur'
        },
        {
          title: 'Dinner',
          start: TOMORROW + 'T05:00:00',
          className: "fc-event-solid-danger fc-event-light",
          description: 'Lorem ipsum dolor sit ctetur adipi scing'
        },
        {
          title: 'Birthday Party',
          start: TOMORROW + 'T07:00:00',
          className: "fc-event-primary",
          description: 'Lorem ipsum dolor sit amet, scing'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: YM + '-28',
          className: "fc-event-solid-info fc-event-light",
          description: 'Lorem ipsum dolor sit amet, labore'
        }
      ],

      // Esta función lo que hace es que al darle clic a un evento abra un modal con su data
      eventClick: function (info) {

        const titulo = info.event.title || "Título no disponible";
        const descripcion = info.event.extendedProps?.description || "Descripción no disponible";

        // Inserta los valores en el modal
        $('#tituloEvento').text(titulo);
        $('#descripcionEvento').text(descripcion);

        // Muestra el modal
        $('#modalEvento').modal('show');

      },

      // Esta función lo que hace es que al darle clic a un lugar del calendario abrira un modal de agendamiento
      select: function (info) {
        var fechaInicioInicial = moment(info.start);
        var fechaFinalInicial = moment(info.end);

        // Formatear fechas y horas por separado usando moment.js
        var fechaInicio = fechaInicioInicial.format('YYYY-MM-DD');
        var horaInicio = fechaInicioInicial.format('HH:mm');
        var fechaFinal = fechaFinalInicial.format('YYYY-MM-DD');
        var horaFinal = fechaFinalInicial.format('HH:mm');

        // Asignar datos a los campos del modal
        document.getElementById('fechaCita').value = fechaInicio; // Asignar la fecha de inicio
        document.getElementById('consulta-hora').value = horaInicio; // Asignar la hora de inicio

        // Mostrar el modal usando Bootstrap 5
        var modalCrearCita = new bootstrap.Modal(document.getElementById('modalCrearCita'), {
          keyboard: false
        });
        modalCrearCita.show();
      },

      // Esta función lo que hace es que al una cita se reagende
      eventDrop: function (arg) {
        // console.log(arg);

        let FechaHoraInicio = moment(arg.event.start).format();
        var usuario_modificar_cita = arg.event.extendedProps.resourceId;

        Swal.fire({
          title: '¿Estás seguro?',
          text: 'Si Acepta, Se movera la cita a la fecha ' + FechaHoraInicio.replace('T', ' '),
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Aceptar',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            console.log("se reagndo");

            // $.ajax({
            //   type: "POST",
            //   url: "CL_Ajax_Calendario.php",
            //   data: {
            //     FechaHoraInicio: FechaHoraInicio,
            //     idCita: arg.event.id,
            //     usuario_id: '<?= $_SESSION["ID"]; ?>',
            //     usuario_modificar_cita: usuario_modificar_cita,
            //     Tipo_Consulta: "Mover Cita"
            //   },
            //   success: function (response) {
            //     //console.log(response);
            //     var Respuesta = JSON.parse(response);
            //     var Mensaje = Respuesta.Mensaje;

            //     var FechaHora = FechaHoraInicio.replace("T", " ");

            //     if (Respuesta.Estado == true) {
            //       // event.start.format() a esta fecha quitarle la T 

            //       $.ajax({
            //         type: "POST",
            //         url: "CL_Ajax_Calendario.php",
            //         data: {
            //           idCita: arg.event.id,
            //           Tipo_Consulta: "Envio Whatsapp"
            //         },
            //         success: function (response) {

            //         }
            //       });

            //       if (Respuesta.GoogleCalendar == true) {

            //         Swal.fire({
            //           icon: 'success',
            //           title: 'Correcto',
            //           html: '<p style="font-size:18px;">' +
            //             'La cita se ha movido a la fecha <b>' +
            //             FechaHora + '</b>.' +
            //             Mensaje +
            //             ', Ademas se actualizara la cita en google calendar en unos segundos,<label style="color:red"> No cierre la pestaña del navegador</label></p>',
            //           width: '30%',
            //         });

            //         //window.location = "ApiGoogleCalendar.php?cita_id="+event.id+"&ruta=2";

            //         setTimeout(function () {
            //           // Redireccionar a una ubicación específica después de 2 segundos
            //           window.location =
            //             "ApiGoogleCalendar.php?cita_id=" +
            //             arg.event.id + "&ruta=2";
            //         }, 2000);


            //       } else {
            //         Swal.fire({
            //           icon: 'success',
            //           title: 'Correcto',
            //           html: '<p style="font-size:18px;">' +
            //             'La cita se ha movido a la fecha <b>' +
            //             FechaHora + '</b>.' +
            //             Mensaje + '</p>',
            //           width: '30%',
            //         });
            //       }

            //     } else if (Respuesta.Estado == false) {
            //       Swal.fire({
            //         icon: 'error',
            //         title: 'Error',
            //         html: '<p style="font-size:18px;">' +
            //           Mensaje + '</p>',
            //         width: '30%',
            //       });
            //       arg.revert();
            //     } else if (Respuesta.Estado == "Warning") {
            //       Swal.fire({

            //         icon: 'warning',
            //         title: 'Advertencia',
            //         html: '<p style="font-size:18px;">' +
            //           Mensaje + '</p>',
            //         width: '30%',
            //       });

            //     }
            //   }
            // });
          } else {
            arg.revert();
          }

        })
      }

    });
    calendar.render();
  });

</script>

<script src="./Portada/graficas/crearGrafica.js"></script>

<?php
include "../footer.php";
include "../Citas/modalCitas.php";
include "./modalEventos.php";
?>