var calendarDiv = document.getElementById('CalendarioWeb');


var calendar;
function CargarCalender() {
    calendar = new FullCalendar.Calendar(calendarDiv, {
        locales: 'es',
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev', // asignamos el botón a la toolbar 
            //left: 'prev,crearEntrada', // asignamos el botón a la toolbar 
            center: 'title',
            right: 'next',

        },
        footerToolbar: {
            left: 'prevYear',
            center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth,today',
            right: 'nextYear'
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes',
            week: 'Semana',
            day: 'Día',
            list: 'Listado'
        },
        customButtons: { // cargamos la propiedad custombuttons
            /* crearEntrada: { // creamos un botón
                 text: 'Nuevo evento', // le asignamos un texto
                 click: () => { // y ejecutamos la acción que se dispara.
                     abrirModal('crear'); // esta será abrir el modal con permisos de creación
                     vaciarCampos(); // y vaciamos campos
                 }
             }*/
        },
        /* events: [
             {
                 fecha: '2023-09-06',
                 turno: 'mañana',
                 cupo: '1',
                 idpaciente: '2',
                 idmedico: '1',
                 title: 'Evento de prueba 1',
                 description: 'Esta es una descripción de prueba',
                 start: '2023-09-20 12:00:00',
                 end: '2023-09-25 12:00:00',
                 color: 'yellow',
                 textColor: 'red',
             },
             {
                 fecha: '2023-09-06',
                 turno: 'mañana',
                 cupo: '4',
                 idpaciente: '2',
                 idmedico: '4',
                 title: 'Evento de prueba 2',
                 description: 'Este es otro evento de un solo día',
                 start: '2023-09-26',
                 color: 'red',
                 textColor: 'yellow'
             },
             {
                 fecha: '2023-09-06',
                 turno: 'mañana',
                 cupo: '3',
                 idpaciente: '2',
                 idmedico: '3',
                 title: 'Evento de prueba 3',
                 description: 'Este evento dura un tiempo determinado',
                 start: '2023-09-27 08:00:00',
                 end: '2023-09-27 10:00:00',
                 color: 'blue',
                 textColor: 'green'
             }
         ],*/
        dateClick: (info) => {
            //abrirModal('crear');
            var today = new Date();
            var day = today.getDate();
            var month = today.getMonth() + 1;
            var year = today.getFullYear();


            if (month < 10)
                month = '0' + month;
            var fechactual = year + '-' + month + '-' + day;
            var fechaseleccionada = info.dateStr;
            //alert(fechactual);
            //alert(fechaseleccionada)
            if (fechaseleccionada < fechactual) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No Puedes Reservar Ficha Medica de dias pasados!'
                });
            }
            else {


                const anyString = fechaseleccionada;
                //var today = new Date(fechaseleccionada);
                //alert (today);
                var day = anyString.substring(8);
                var month = anyString.substring(5, 7);
                var year = anyString.substring(0, 4);

                var dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
                var dt = new Date(month + ' ' + day + ', ' + year);
                //alert(dt);
                var textdia = dias[dt.getUTCDay()];
                //alert(textdia);

                var diamedico = document.querySelector('#labeldia').innerText;
                let diatrabajo = diamedico.toLowerCase();
                //let diatrabajo = "Me gusta programar en JavaScript";
                if (diatrabajo.includes(textdia.toLowerCase())) {

                    var fichamedica = "datoficha.php?valorp=" + $('#idpaciente').val() + "&valorm=" + $('#lmedico').val() + "&opcion=1&fecha=" + fechaseleccionada;
                    $.ajax({
                        type: 'GET',
                        url: fichamedica,
                        dataType: 'json',
                        success: function (json) {
                            if (JSON.stringify(json) == '[]') {

                                var cupomedico = "datomedico.php?valor=4&fecha=" + fechaseleccionada + "&data=" + $('#lmedico').val();
                                $.ajax({
                                    type: 'GET',
                                    url: cupomedico,
                                    dataType: 'json',
                                    success: function (json) {
                                        if (JSON.stringify(json) == '[]') {

                                            var vercupomedico = "datomedico.php?valor=5&data=" + $('#lmedico').val();
                                            $.ajax({
                                                type: 'GET',
                                                url: vercupomedico,
                                                dataType: 'json',
                                                success: function (json) {
                                                    if (JSON.stringify(json) == '[]') {

                                                    }
                                                    else {
                                                        $.each(json, function (index, elem) {
                                                            document.querySelector('#btnAgregar').disabled = false;
                                                            document.querySelector('#txtcupo').innerHTML = elem.cantidad;
                                                            document.querySelector('#txtfecha').innerHTML = fechaseleccionada;
                                                            CargarModal(fechaseleccionada);
                                                            $('#exampleModal').modal();
                                                        });
                                                    }
                                                }
                                            });


                                        }
                                        else {
                                            $.each(json, function (index, elem) {
                                                var fichatotal = elem.total;
                                                if (fichatotal == 0) {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Oops...',
                                                        text: 'NO HAY CUPO!'
                                                    });
                                                    document.querySelector('#txtcupo').innerHTML = elem.total;
                                                    document.querySelector('#btnAgregar').disabled = true;
                                                    $("#exampleModal").modal('toggle');
                                                }
                                                else {
                                                    document.querySelector('#txtcupo').innerHTML = elem.total;
                                                    document.querySelector('#btnAgregar').disabled = false;
                                                    $("#exampleModal").modal('toggle');

                                                }

                                            });

                                            document.querySelector('#txtfecha').innerHTML = fechaseleccionada;
                                            CargarModal(fechaseleccionada);
                                            $('#exampleModal').modal();
                                        }
                                    }
                                });


                            }
                            else {
                                $.each(json, function (index, elem) {
                                    var mensaje = "Usted Tiene Ficha Medica con el Medico:"+elem.nombremedico+ " - Especialidad : "+elem.especialidad;
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: mensaje
                                    });
                                });
                            }
                            //   alert(msg);
                        },
                        error: function () {
                            alert("Hay un Error.....");
                        }
                    });


                    //$(this).css('background-color', 'blue');
                }
                else {
                    //calendar.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El medico no trabaja Ese Dia!'
                    });

                }
            }
            //var fecha = document.getElementById('fechaInicio');
            //var fecha;
            //fecha.value = info.dateStr;

        },
        eventClick: (info) => {

            document.getElementById('txtpacienteficha').innerHTML = info.event.extendedProps.paciente;
            document.getElementById('txtempresaficha').innerHTML = info.event.extendedProps.empresa;
            document.getElementById('txtparentescoficha').innerHTML = info.event.extendedProps.parentesco;
            document.getElementById('txtmedicoficha').innerHTML = info.event.extendedProps.medico;
            document.getElementById('txtespecialidadficha').innerHTML = info.event.extendedProps.especialidad;
            document.getElementById('txtdiaficha').innerHTML = info.event.extendedProps.fecha;
            document.getElementById('txtturnoficha').innerHTML = info.event.extendedProps.turno;
            document.getElementById('txtorden').innerHTML = info.event.id;
            //var qrcode = new QRCode("qrcode");
            var elText = "Id:" + info.event.id + "\n"
                + "Paciente:" + info.event.extendedProps.paciente + "\n"
                + "Empresa:" + info.event.extendedProps.empresa + "\n"
                + "Parentesco:" + info.event.extendedProps.parentesco + "\n"
                + "Medico:" + info.event.extendedProps.medico + "(" + info.event.extendedProps.especialidad + ")" + "\n"
                + "Dia:" + info.event.extendedProps.fecha + " " + info.event.extendedProps.turno;
            //alert(elText);
            document.getElementById('qrcode').innerHTML = ''
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                width: 100,
                height: 100
            });
            qrcode.makeCode(elText);
            //makeCode();

            $('#FichaModal').modal();


        },
        editable: true

    });
    calendar.render();
}

function CargarModal(fecha) {
    //alert(fecha);
    document.querySelector('#txtdia').value = '';
    $("#lturno").find('option').remove();
    var medicos = "datomedico.php?data=" + $('#lmedico').val() + "&valor=2";
    $.ajax({
        url: medicos,
        dataType: 'json',
        success: recargarhorariomodal
    });

    var fechaseleccionada = fecha;
    const anyString = fechaseleccionada;
    //var today = new Date(fechaseleccionada);
    //alert (today);
    var day2 = anyString.substring(8);
    var day = anyString.substring(8);
    var month = anyString.substring(5, 7);
    var year = anyString.substring(0, 4);


    var dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"];
    var mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var dt = new Date(month + ' ' + day + ', ' + year);
    //alert(dt);
    var textdia = dias[dt.getUTCDay()];
    //alert(textdia);
    var textmes = mes[dt.getUTCMonth()];

    //document.getElementById("demo").innerHTML = text;
    //alert(textdia + ' , ' + day2 + ' ' + textmes + ' ' + year);
    document.querySelector('#txtdia').innerHTML = textdia + ' , ' + day2 + ' ' + textmes + ' ' + year;
}
function recargarhorariomodal(json) {
    $("#lturno").find('option').not(':first').remove();
    var $select = $('#lturno');
    var turno = '';
    var horario = '';
    var l = json.length;
    for (i = 0; i < l; i++) {
        if (i == 0) {
            turno = json[i].turno;
            horario = json[i].horario;
            $select.append('<option value="' + turno + ' ' + horario + '">' + turno + ' ' + horario + '</option>');

        }
        else {
            turno = json[i].turno;
            horario = json[i].horario;
            $select.append('<option value="' + turno + ' ' + horario + '">' + turno + ' ' + horario + '</option>');


        }
        document.querySelector('#txtmedico').innerHTML = json[i].nombre;
        document.querySelector('#txtespecialidad').innerHTML = json[i].especialidad;

    }

}

function recargarCalendario(json) {
    //calendar.fullCalendar('removeEvents');
    var nuevoEvento = [];
    var l = json.length;
    for (i = 0; i < l; i++) {
        //  alert(json[i].fecha);
        nuevoEvento.id = json[i].id;
        nuevoEvento.start = json[i].fecha;
        var fechaseleccionada = json[i].fecha;
        const anyString = fechaseleccionada;
        var day2 = anyString.substring(8);
        var day = anyString.substring(8);
        var month = anyString.substring(5, 7);
        var year = anyString.substring(0, 4);

        var dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
        var mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        var dt = new Date(month + ' ' + day + ', ' + year);
        var textdia = dias[dt.getUTCDay()];
        var textmes = mes[dt.getUTCMonth()];
        nuevoEvento.fecha = textdia + ' , ' + day2 + ' ' + textmes + ' ' + year;
        nuevoEvento.color = json[i].color;
        nuevoEvento.turno = json[i].turno;
        nuevoEvento.cupo = json[i].cupo;
        nuevoEvento.idpaciente = json[i].idpaciente;
        nuevoEvento.idmedico = json[i].idmedico;
        nuevoEvento.medico = json[i].nombremedico;
        nuevoEvento.especialidad = json[i].especialidad;
        nuevoEvento.paciente = json[i].nombrepaciente;
        nuevoEvento.matricula = json[i].matricula;
        nuevoEvento.empresa = json[i].empresa;
        nuevoEvento.parentesco = json[i].parentesco;
        nuevoEvento.title = json[i].especialidad + ' ' + json[i].nombremedico;
        calendar.addEvent(nuevoEvento);
    }

}

function DescargarPdf() {
    const invoice = this.document.getElementById("antoform");
    console.log(invoice);
    console.log(window);
    var opt = {
        margin: 1,
        filename: 'fichamedica.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };
    html2pdf().from(invoice).set(opt).save();
}
//Javascript Agregar un evento al Calendario
var NuevoEvento;
function RegistrarFicha() {
    RecolectarDatos();
    GuardarInformacionFicha(2, NuevoEvento);
};

var nuevoEventoFicha;
function RecolectarDatos() {
    nuevoEventoFicha = [];

    var titulo = document.querySelector('#txtespecialidad').innerHTML + ' ' + document.querySelector('#txtmedico').innerHTML;

    nuevoEventoFicha.start = document.querySelector('#txtfecha').innerHTML;
    var fechaseleccionada = document.querySelector('#txtfecha').innerHTML;
    const anyString = fechaseleccionada;
    var day2 = anyString.substring(8);
    var day = anyString.substring(8);
    var month = anyString.substring(5, 7);
    var year = anyString.substring(0, 4);

    var dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"];
    var mes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    var dt = new Date(month + ' ' + day + ', ' + year);
    var textdia = dias[dt.getUTCDay()];
    var textmes = mes[dt.getUTCMonth()];
    nuevoEventoFicha.fecha = textdia + ' , ' + day2 + ' ' + textmes + ' ' + year;
    nuevoEventoFicha.color = '#FF0F0';
    nuevoEventoFicha.turno = document.getElementById("lturno").value;
    nuevoEventoFicha.cupo = '1';
    nuevoEventoFicha.idpaciente = document.getElementById("idpaciente").value;
    nuevoEventoFicha.idmedico = document.getElementById("lmedico").value;
    nuevoEventoFicha.medico = document.querySelector('#txtmedico').innerHTML;
    nuevoEventoFicha.especialidad = document.querySelector('#txtespecialidad').innerHTML;
    nuevoEventoFicha.title = titulo;

    NuevoEvento = {
        title: titulo,
        start: document.querySelector('#txtfecha').innerHTML,
        fecha: document.querySelector('#txtfecha').innerHTML,
        color: '#FF0F0',
        descripcion: document.querySelector('#txtespecialidad').innerHTML,
        textcolor: '#FFFFFF',
        turno: document.getElementById("lturno").value,
        cupo: '1',
        idpaciente: document.getElementById("idpaciente").value,
        idmedico: document.getElementById("lmedico").value
    };

}

function GuardarInformacionFicha(accion, objEvento) {
    // alert(Object.values(objEvento));;

    $.ajax({
        type: 'GET',
        url: 'datoficha.php?opcion=' + accion,
        data: objEvento,
        dataType: 'json',
        success: function (json) {
            if (json == '') {
                alert('No Records');
            }
            else {
                $.each(json, function (index, elem) {
                    nuevoEventoFicha.paciente = elem.nombre;
                    nuevoEventoFicha.matricula = elem.matricula;
                    nuevoEventoFicha.empresa = elem.empresa;
                    nuevoEventoFicha.parentesco = elem.parentesco;
                    nuevoEventoFicha.id = elem.id;
                    calendar.addEvent(nuevoEventoFicha);
                    $("#exampleModal").modal('toggle');
                    Swal.fire({
                        icon: 'success',
                        title: 'REGISTRADO',
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            }
            //   alert(msg);
        },
        error: function () {
            alert("Hay un Error.....");
        }
    });
}
$(document).ready(function () {
    $('#lespecialidad').change(function () {
        if ($('#lespecialidad').val() == "0") {
            document.getElementById("lmedico").disabled = false;
            document.getElementById("lmedico").selectedIndex = 0;
        } else {
            var medicos = "datomedico.php?data=" + $('#lespecialidad').val() + "&valor=1";
            $.ajax({
                url: medicos,
                dataType: 'json',
                success: recargarlistamedico
            });
        }
    });
    $('#lmedico').change(function () {
        // document.getElementById("idusuario").value = document.getElementById("lmedico").value;
    });
});


function recargarlistamedico(json) {
    $("#lmedico").find('option').not(':first').remove();
    var $select = $('#lmedico');
    var l = json.length;
    for (i = 0; i < l; i++) {
        $select.append('<option value=' + json[i].id + '>' + json[i].nombre + '</option>');
    }
}

//Calendar.render();
