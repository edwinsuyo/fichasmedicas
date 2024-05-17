var calendarDiv = document.getElementById('CalendarioWeb');


var calendar;
var fechacupo = "";
var initialLocaleCode = 'es';
function CargarCalender() {
    calendar = new FullCalendar.Calendar(calendarDiv, {
        locales: 'es',
        initialView: 'dayGridMonth',
        firstDay: 1,
        //headerToolbar
        headerToolbar: {
            left: 'prev', // asignamos el botón a la toolbar 
            //left: 'prev,crearEntrada', // asignamos el botón a la toolbar 
            center: 'title',
            right: 'next',

        },
        locale: initialLocaleCode,
        buttonIcons: false,
        footerToolbar: {
            left: 'prevYear',
            //center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth,today',
            center: 'dayGridMonth,today',
            right: 'nextYear'
        },
        buttonText: {
            today: 'Hoy',
            month: 'Mes'
            //month: 'Mes',
            //week: 'Semana',
            //day: 'Día',
            //list: 'Listado'
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

            if (day < 10)
                day = '0' + day;
            if (month < 10)
                month = '0' + month;
            var fechactual = year + '-' + month + '-' + day;
            var fechaseleccionada = info.dateStr;

            var fechactual2 = day + '/' + month + '/' + year;
            var fechaseleccionadaformato = changeDateFormatTo(fechaseleccionada);

            var semanaactual = semanadelano(fechactual2);
            var semanaseleccionada = semanadelano(fechaseleccionadaformato);


            if (fechaseleccionada < fechactual) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No Puedes Reservar Ficha Medica de dias pasados!'
                });
            }
            else {
                if (semanaactual == semanaseleccionada) {
                    const anyString = fechaseleccionada;
                    fechacupo = fechaseleccionada;
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
                        //VERIFICAR SI TIENE FICHA ESE DIA EL PACIENTE
                        var fichamedica = "datoficha.php?valorp=" + $('#idpaciente').val() + "&valorm=" + $('#lmedico').val() + "&opcion=1&fecha=" + fechaseleccionada;
                        $.ajax({
                            type: 'POST',
                            url: fichamedica,
                            dataType: 'json',
                            success: function (json) {
                                if (JSON.stringify(json) == '[]') {
                                    //VERIFICA SI HAY ALGUN CUPO EN LA MAÑANA O TARDE EN ESA FECHA
                                    var cupomedico = "datomedico.php?valor=4&fecha=" + fechaseleccionada + "&data=" + $('#lmedico').val();
                                    $.ajax({
                                        type: 'POST',
                                        url: cupomedico,
                                        dataType: 'json',
                                        success: function (json) {
                                            if (JSON.stringify(json) == '[]') {
                                                //SACAR LA CANTIDAD TOTAL DE MAÑANA Y TARDE DE CUPOS MEDICOS DISPONIBLES
                                                var vercupomedico = "datomedico.php?valor=5&data=" + $('#lmedico').val() + "&fecha=" + fechaseleccionada;
                                                $.ajax({
                                                    type: 'POST',
                                                    url: vercupomedico,
                                                    dataType: 'json',
                                                    success: function (json) {
                                                        if (JSON.stringify(json) == '[]') {

                                                        }
                                                        else {
                                                            //CARGAMOS LOS DATOS AL MODAL
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
                                        var mensaje = "Usted Tiene Ficha Medica con el Medico:" + elem.nombremedico + " - Especialidad : " + elem.especialidad;
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
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Solo puedes Reservar Fichas Medicas de Esta Semana!'
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
            document.getElementById('txthoraficha').innerHTML = info.event.extendedProps.horaficha;
            document.getElementById('txtorden').innerHTML = info.event.id;
            //var qrcode = new QRCode("qrcode");
            var elText = "Id:" + info.event.id + "\n"
                + "Paciente:" + info.event.extendedProps.paciente + "\n"
                + "Empresa:" + info.event.extendedProps.empresa + "\n"
                + "Parentesco:" + info.event.extendedProps.parentesco + "\n"
                + "Medico:" + info.event.extendedProps.medico + "(" + info.event.extendedProps.especialidad + ")" + "\n"
                + "Dia:" + info.event.extendedProps.fecha + " " + info.event.extendedProps.turno + " " + info.event.extendedProps.horaficha;
            //alert(elText);
            document.getElementById('qrcode').innerHTML = ''
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                correctLevel: QRCode.CorrectLevel.L,
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
//cambiar formato de fecha
const changeDateFormatTo = date => {
    const [yy, mm, dd] = date.split(/-/g);
    return `${dd}/${mm}/${yy}`;
};

//CARGAMOS LOS DATOS AL MODAL DONDE SE GUARDARAN LOS DATOS DE LA FICHAS
function CargarModal(fecha) {
    //alert(fecha);

    //CARGAMOS LOS TURNOS DISPONIBLE DONDE HAY CUPO 
    document.querySelector('#txtdia').value = '';
    $("#lturno").find('option').not(':first').remove();
    var medicos = "datomedico.php?data=" + $('#lmedico').val() + "&valor=7&fecha=" + fecha;
    $.ajax({
        url: medicos,
        type:'POST',
        dataType: 'json',
        success: recargarhorariomodal
    });

    var cupomedicos = "datomedico.php?fecha=" + fecha + "&data=" + $('#lmedico').val() + "&valor=6";
    $.ajax({
        url: cupomedicos,
        type:'POST',
        dataType: 'json',
        success: recargarcupomedico
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
    document.querySelector('#txthora').innerHTML = 'Selecciona el turno';

}
function recargarhorariomodal(json) {
    $("#lturno").find('option').not(':first').remove();
    var $select = $('#lturno');
    var turno = '';
    var horario = '';
    var l = json.length;
    for (i = 0; i < l; i++) {
        if (i == 0) {
            idcupo = json[i].idcupo;
            turno = json[i].turno;
            horario = json[i].horario;
            $select.append('<option value="' + idcupo + '">' + turno + ' ' + horario + '</option>');

        }
        else {
            idcupo = json[i].idcupo;
            turno = json[i].turno;
            horario = json[i].horario;
            $select.append('<option value="' + idcupo + '">' + turno + ' ' + horario + '</option>');


        }
        document.querySelector('#txtmedico').innerHTML = json[i].nombre;
        document.querySelector('#txtespecialidad').innerHTML = json[i].especialidad;

    }

}

function recargarcupomedico(json) {

    var l = json.length;
    var cantidadcupo = '';
    for (i = 0; i < l; i++) {
        cantidadcupo = cantidadcupo + '  Turno:' + json[i].turno + ' Cupo: ' + json[i].cupo;
    }
    document.querySelector('#txtcantidadcupo').innerHTML = cantidadcupo;

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
        nuevoEvento.horaficha = json[i].horareserva;
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
    var turno = $('#lturno').val();
    if (turno == undefined | turno=="") {

        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar el turno para el Registro de la Ficha!'
        });

    }
    else {
        RecolectarDatos();
        GuardarInformacionFicha(2, NuevoEvento);
    }
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

    var selectturno = document.getElementById('lturno');
    var selectedIndex = selectturno.selectedIndex;
    var selectedOption = selectturno.options[selectedIndex];
    var turnoficha = selectedOption.innerHTML;

    nuevoEventoFicha.fecha = textdia + ' , ' + day2 + ' ' + textmes + ' ' + year;
    nuevoEventoFicha.color = '#FF0F0';
    nuevoEventoFicha.turno = turnoficha;
    nuevoEventoFicha.cupo = '1';
    nuevoEventoFicha.idpaciente = document.getElementById("idpaciente").value;
    nuevoEventoFicha.idmedico = document.getElementById("lmedico").value;
    nuevoEventoFicha.medico = document.querySelector('#txtmedico').innerHTML;
    nuevoEventoFicha.especialidad = document.querySelector('#txtespecialidad').innerHTML;
    nuevoEventoFicha.horaficha = document.querySelector('#txthora').innerHTML;
    nuevoEventoFicha.title = titulo;



    NuevoEvento = {
        title: titulo,
        start: document.querySelector('#txtfecha').innerHTML,
        fecha: document.querySelector('#txtfecha').innerHTML,
        color: '#FF0F0',
        descripcion: document.querySelector('#txtespecialidad').innerHTML,
        textcolor: '#FFFFFF',
        turno: turnoficha,
        idcupo: document.getElementById("lturno").value,
        cupo: '1',
        idpaciente: document.getElementById("idpaciente").value,
        idmedico: document.getElementById("lmedico").value,
        horaficha: document.querySelector('#txthora').innerHTML
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
                type:'POST',
                dataType: 'json',
                success: recargarlistamedico
            });
        }
    });
    $('#lmedico').change(function () {
        // document.getElementById("idusuario").value = document.getElementById("lmedico").value;
    });
});

$(document).ready(function () {
    $('#lturno').change(function () {
        if ($('#lturno').val() == "0") {
            document.querySelector('#txthora').innerHTML = ' ';
        } else {
            var horaficha = "datoficha.php?opcion=8&data=" + $('#lturno').val() + "&valorm=" + $('#lmedico').val() + "&fecha=" + fechacupo + "&especialidad=" + $('#lespecialidad').val();
            $.ajax({
                url: horaficha,
                type:'POST',
                dataType: 'json',
                success: recargarhoraficha
            });
        }
    });
});

function recargarhoraficha(json) {
    var l = json.length;
    for (i = 0; i < l; i++) {
        document.querySelector('#txthora').innerHTML = json[i].horaficha;
    }
}

function recargarlistamedico(json) {
    $("#lmedico").find('option').not(':first').remove();
    var $select = $('#lmedico');
    var l = json.length;
    for (i = 0; i < l; i++) {
        $select.append('<option value=' + json[i].id + '>' + json[i].nombre + '</option>');
    }
}
//Nro de la Semana
function semanadelano($fecha) {
    $const = [2, 1, 7, 6, 5, 4, 3];

    if ($fecha.match(/\//)) {
        $fecha = $fecha.replace(/\//g, "-", $fecha);
    };

    $fecha = $fecha.split("-");

    $dia = eval($fecha[0]);
    $mes = eval($fecha[1]);
    $ano = eval($fecha[2]);
    if ($mes != 0) {
        $mes--;
    };

    $dia_pri = new Date($ano, 0, 1);
    $dia_pri = $dia_pri.getDay();
    $dia_pri = eval($const[$dia_pri]);
    $tiempo0 = new Date($ano, 0, $dia_pri);
    $dia = ($dia + $dia_pri);
    $tiempo1 = new Date($ano, $mes, $dia);
    $lapso = ($tiempo1 - $tiempo0)
    $semanas = Math.floor($lapso / 1000 / 60 / 60 / 24 / 7);

    if ($dia_pri == 1) {
        $semanas++;
    };

    if ($semanas == 0) {
        $semanas = 52;
        $ano--;
    };

    if ($ano < 10) {
        $ano = '0' + $ano;
    };

    return $semanas;
};

//Calendar.render();
