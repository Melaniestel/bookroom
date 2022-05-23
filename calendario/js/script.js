    var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!codificados) {
            Object.keys(codificados).map(k => {
                var row = codificados[k]
                events.push({ id: row.id, nombre: row.nombre, start: row.fech_inicio, end: row.fech_fin });
            })
        }
        var date = new Date()
        var d = date.getDate(),
            m = date.getMonth(),
            y = date.getFullYear()

        calendar = new Calendar(document.getElementById('calendar'), {
            initialView: 'dayGridMonth',
            locale: 'es', //Idioma Español FullCalendar
            headerToolbar: {
                left: 'prev,next today',
                right: 'dayGridMonth,dayGridWeek,list',
                center: 'title',
            },
            selectable: true,
            themeSystem: 'bootstrap',
            //Eventos predeterminados aleatorios
            events: events,
            eventClick: function(info) { //al clicar el boton nos mostrará el modal event-details-modal con los datos recogidos según el id 
                var _details = $('#event-details-modal')
                var id = info.event.id
                if (!!codificados[id]) {
                    _details.find('#nombre').text(codificados[id].nombre)
                    _details.find('#descripcion').text(codificados[id].descripcion)
                    _details.find('#start').text(codificados[id].sdate)
                    _details.find('#end').text(codificados[id].edate)
                    _details.find('#edit,#delete').attr('data-id', id)
                    _details.modal('show')
                } else {
                    alert("Reserva no definida");
                }
            },
            eventDidMount: function(info) {
                // Hacer algo después de los eventos montados
            },
            editable: true
        });

        calendar.render();

        // listener de restablecimiento de formulario
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
        })

        // Botón Editar
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            if (!!codificados[id]) {
                var _form = $('#schedule-form')
                console.log(String(codificados[id].fech_inicio), String(codificados[id].fech_inicio).replace(" ", "\\t"))
                _form.find('[name="id"]').val(id)
                _form.find('[name="nombre"]').val(codificados[id].nombre)
                _form.find('[name="descripcion"]').val(codificados[id].descripcion)
                _form.find('[name="fech_inicio"]').val(String(codificados[id].fech_inicio).replace(" ", "T"))
                _form.find('[name="fech_fin"]').val(String(codificados[id].fech_fin).replace(" ", "T"))
                $('#event-details-modal').modal('hide')
                _form.find('[name="nombre"]').focus()
            } else {
                alert("Reserva no definida");
            }
        })

        // Botón Eliminar / Eliminación de un evento
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!codificados[id]) {
                var _conf = confirm("¿Estás segura de eliminar este evento programado?");
                if (_conf === true) {
                    location.href = "./borrar.php?id=" + id;
                }
            } else {
                alert("Reserva no definida");
            }
        })
    })