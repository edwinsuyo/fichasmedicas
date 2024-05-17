<?php
/* Smarty version 4.3.1, created on 2024-01-17 15:52:09
  from '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmListaFicha.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65a83df9a5b979_01256548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3416274ab819afb8aaba697dadf8c7021cae8099' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmListaFicha.html',
      1 => 1705524704,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a83df9a5b979_01256548 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>FORMULARIO DE REGISTRO PARA FICHAS</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_title">
                        <h4>HISTORIA DE FICHAS MEDICAS </h4>
                    </div>
                    <div class="clearfix"></div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">
                            <input type="hidden" name="idpaciente" id="idpaciente" value="<?php echo $_smarty_tpl->tpl_vars['idpaciente']->value;?>
">
                            <div class="item form-group">
                                <FONT SIZE=5> <label
                                        class="control-label col-md-3 col-sm-3 badge badge-light">ESPECIALIDAD :</label>
                                </FONT>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control select" data-live-search="true" id="lespecialidadbuscar"
                                        name="lespecialidadbuscar" style="width: 100%;">
                                        <option id="0" value="" disabled="disabled" selected="selected">[SELECCIONE
                                            UN ESPECIALIDAD] </option>
                                        <option value="0">TODAS LAS ESPECIALIDADES
                                        </option>
                                        <?php
$__section_posi_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['lespecialidad']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_posi_0_total = $__section_posi_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_posi'] = new Smarty_Variable(array());
if ($__section_posi_0_total !== 0) {
for ($__section_posi_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index'] = 0; $__section_posi_0_iteration <= $__section_posi_0_total; $__section_posi_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index']++){
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['lespecialidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lespecialidad']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index'] : null)]['nombre'];?>

                                        </option>
                                        <?php
}
}
?>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <div class="ln_solid">
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button name="Submit" value="Enviar" type="submit" onclick="BuscarxEspecialidad()"
                                        class="btn btn-primary">BUSCAR POR
                                        ESPECIALIDAD</button>
                                    <!--<button type='reset' class="btn btn-success">Reset</button>!-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12" id="pantallacalendario">
                <div class="x_panel">
                    <div class="x_content">
                        <div id="CalendarioWeb">
                        </div>
                        <!-- Modal -->
                        <!-- calendar modal -->
                        <div id="exampleModal" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="testmodal" style="padding: 5px 20px;">

                                            <form id="antoform" class="form-horizontal calender" role="form">
                                                <center><span class="section">FICHA MEDICA</span></center>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3 "><b>N°
                                                            DE ORDEN : </b></label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtorden" name="txtorden">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3 "><b>PACIENTE :
                                                        </b></label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtpaciente" name="txtpaciente">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3"><b>EMPRESA :
                                                        </b></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtempresa" name="txtempresa">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3"><b>PARENTESCO : </b>
                                                    </label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtparentesco" name="txtparentesco">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3  "><b>MEDICO :
                                                        </b></label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtmedico" name="txtmedico">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3  "><b>ESPECIALIDAD :
                                                        </b></label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtespecialidad" name="txtespecialidad"></p>
                                                        </FONT>

                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3"> <b>DIA :
                                                        </b></label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtdia" name="txtdia"></p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3  "><b>TURNO :
                                                        </b></label>
                                                    <div class="col-md-6 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txtturno" name="txtturno">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <label class="col-form-label col-md-5 col-sm-3  "><b>HORA DE RESERVA
                                                            :
                                                        </b></label>
                                                    <div class="col-md-3 col-sm-3">
                                                        <FONT SIZE=3.5>
                                                            <p id="txthora" name="txthora">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div id="qrcode"
                                                            style="width:100px; height:100px; margin-top:15px;">
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="btnficha" class="btn btn btn-secondary"
                                        onclick="DescargarFicha()">DESCARGAR</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"><?php echo '</script'; ?>
>


<style>
    #antoform {
        background: #ffffff;
        background-color: #ffffff;
    }
</style>

<?php echo '<script'; ?>
>
    function DescargarFicha() {
        var url = "fichamedica.php?txtpaciente=" + document.getElementById('txtpaciente').innerHTML
            + "&txtempresa=" + document.getElementById('txtempresa').innerHTML
            + "&txtparentesco=" + document.getElementById('txtparentesco').innerHTML
            + "&txtmedico=" + document.getElementById('txtmedico').innerHTML
            + "&txtespecialidad=" + document.getElementById('txtespecialidad').innerHTML
            + "&txtdia=" + document.getElementById('txtdia').innerHTML
            + "&txtturno=" + document.getElementById('txtturno').innerHTML
            + "&txthoraficha=" + document.getElementById('txthora').innerHTML
            + "&txtorden=" + document.getElementById('txtorden').innerHTML;

        var link = url;
        window.open(link);

        //x.style.display = "none";
    }
    function BuscarxEspecialidad() {
        var especialidad = $('#lespecialidadbuscar').val();
        if (especialidad == undefined) {
            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tiene que seleccionar la especialidad!'
            });
        }
        else {
            CargarCalendarioNuevo();
        }
    }
    function CargarCalendarioNuevo() {
        calendar = new FullCalendar.Calendar(calendarDiv, {
            locales: 'es',
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev', // asignamos el botón a la toolbar 
                center: 'title',
                right: 'next',

            },
            locale: initialLocaleCode,
            buttonIcons: false,
            footerToolbar: {
                left: 'prevYear',
                //center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth,today',
                center: 'dayGridMonth,listMonth,today',
                right: 'nextYear'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                list: 'Listado'
            },
            customButtons: { // cargamos la propiedad custombuttons
                crearEntrada: { // creamos un botón
                    text: 'Nuevo evento', // le asignamos un texto
                    click: () => { // y ejecutamos la acción que se dispara.
                        abrirModal('crear'); // esta será abrir el modal con permisos de creación
                        vaciarCampos(); // y vaciamos campos
                    }
                }
            },
            dateClick: (info) => {


            },
            eventClick: (info) => {
                document.getElementById('txtpaciente').innerHTML = info.event.extendedProps.paciente;
                document.getElementById('txtempresa').innerHTML = info.event.extendedProps.empresa;
                document.getElementById('txtparentesco').innerHTML = info.event.extendedProps.parentesco;
                document.getElementById('txtmedico').innerHTML = info.event.extendedProps.medico;
                document.getElementById('txtespecialidad').innerHTML = info.event.extendedProps.especialidad;
                document.getElementById('txtdia').innerHTML = info.event.extendedProps.fecha;
                document.getElementById('txtturno').innerHTML = info.event.extendedProps.turno;
                document.getElementById('txthora').innerHTML = info.event.extendedProps.horaficha;
                document.getElementById('txtorden').innerHTML = info.event.id;
                //var qrcode = new QRCode("qrcode");
                var elText = "Id:" + info.event.id + "\n"
                    + "Paciente:" + info.event.extendedProps.paciente + "\n"
                    + "Empresa:" + info.event.extendedProps.empresa + "\n"
                    + "Parentesco:" + info.event.extendedProps.parentesco + "\n"
                    + "Medico:" + info.event.extendedProps.medico + "(" + info.event.extendedProps.especialidad + ")" + "\n"
                    + "Dia:" + info.event.extendedProps.fecha + " " + info.event.extendedProps.turno + "\n" + " Hora de Reserva:" + info.event.extendedProps.horaficha;
                //alert(elText);
                document.getElementById('qrcode').innerHTML = '';
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    correctLevel: QRCode.CorrectLevel.L,
                    width: 100,
                    height: 100
                });
                qrcode.makeCode(elText);
                //makeCode();

                $('#exampleModal').modal();
            },
            editable: true

        });
        CargarCalenderxEspecialidadxPaciente();
        calendar.render();
    }
    function CargarCalenderxEspecialidadxPaciente() {
        var especialidad = $('#lespecialidadbuscar').val();
        var ficha = "datoficha.php?valorp=" + document.getElementById('idpaciente').value + "&especialidad=" + especialidad + "&opcion=9";
        $.ajax({
            url: ficha,
            dataType: 'json',
            success: recargarfichapacienteespecialidad
        });
    }
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript" src="../qr/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../qr/qrcode.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var calendarDiv = document.getElementById('CalendarioWeb');


    var calendar;
    var initialLocaleCode = 'es';
    function iniciarcalendar() {
        calendar = new FullCalendar.Calendar(calendarDiv, {
            locales: 'es',
            initialView: 'dayGridMonth',
            firstDay: 1,
            headerToolbar: {
                left: 'prev', // asignamos el botón a la toolbar 
                center: 'title',
                right: 'next',

            },
            locale: initialLocaleCode,
            buttonIcons: false,
            footerToolbar: {
                left: 'prevYear',
                //center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth,today',
                center: 'dayGridMonth,listMonth,today',
                right: 'nextYear'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                list: 'Listado'
            },
            customButtons: { // cargamos la propiedad custombuttons
                crearEntrada: { // creamos un botón
                    text: 'Nuevo evento', // le asignamos un texto
                    click: () => { // y ejecutamos la acción que se dispara.
                        abrirModal('crear'); // esta será abrir el modal con permisos de creación
                        vaciarCampos(); // y vaciamos campos
                    }
                }
            },
            dateClick: (info) => {


            },
            eventClick: (info) => {
                document.getElementById('txtpaciente').innerHTML = info.event.extendedProps.paciente;
                document.getElementById('txtempresa').innerHTML = info.event.extendedProps.empresa;
                document.getElementById('txtparentesco').innerHTML = info.event.extendedProps.parentesco;
                document.getElementById('txtmedico').innerHTML = info.event.extendedProps.medico;
                document.getElementById('txtespecialidad').innerHTML = info.event.extendedProps.especialidad;
                document.getElementById('txtdia').innerHTML = info.event.extendedProps.fecha;
                document.getElementById('txtturno').innerHTML = info.event.extendedProps.turno;
                document.getElementById('txthora').innerHTML = info.event.extendedProps.horaficha;
                document.getElementById('txtorden').innerHTML = info.event.id;
                //var qrcode = new QRCode("qrcode");
                var elText = "Id:" + info.event.id + "\n"
                    + "Paciente:" + info.event.extendedProps.paciente + "\n"
                    + "Empresa:" + info.event.extendedProps.empresa + "\n"
                    + "Parentesco:" + info.event.extendedProps.parentesco + "\n"
                    + "Medico:" + info.event.extendedProps.medico + "(" + info.event.extendedProps.especialidad + ")" + "\n"
                    + "Dia:" + info.event.extendedProps.fecha + " " + info.event.extendedProps.turno + "\n" + " Hora de Reserva:" + info.event.extendedProps.horaficha;
                //alert(elText);
                document.getElementById('qrcode').innerHTML = '';
                var qrcode = new QRCode(document.getElementById("qrcode"), {
                    correctLevel: QRCode.CorrectLevel.L,
                    width: 100,
                    height: 100
                });
                qrcode.makeCode(elText);
                //makeCode();

                $('#exampleModal').modal();
            },
            editable: true

        });
        CargarCalenderPaciente();
        calendar.render();
    }



    function CargarCalenderPaciente() {
        var ficha = "datoficha.php?valorp=" + document.getElementById('idpaciente').value + "&opcion=5";
        $.ajax({
            url: ficha,
            dataType: 'json',
            success: recargarfichapaciente
        });
    }

    function recargarfichapaciente(json) {
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

    window.onload = iniciarcalendar;



    function recargarfichapacienteespecialidad(json) {
        calendar = new FullCalendar.Calendar(calendarDiv, {
            locales: 'es',
            initialView: 'dayGridMonth',
            firstDay: 1,
            headerToolbar: {
                left: 'prev', // asignamos el botón a la toolbar 
                center: 'title',
                right: 'next',

            },
            locale: initialLocaleCode,
            buttonIcons: false,
            footerToolbar: {
                left: 'prevYear',
                //                center: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth,today',
                center: 'dayGridMonth,listMonth,today',
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
                crearEntrada: { // creamos un botón
                    text: 'Nuevo evento', // le asignamos un texto
                    click: () => { // y ejecutamos la acción que se dispara.
                        abrirModal('crear'); // esta será abrir el modal con permisos de creación
                        vaciarCampos(); // y vaciamos campos
                    }
                }
            },
            dateClick: (info) => {


            },
            eventClick: (info) => {
                document.getElementById('txtpaciente').innerHTML = info.event.extendedProps.paciente;
                document.getElementById('txtempresa').innerHTML = info.event.extendedProps.empresa;
                document.getElementById('txtparentesco').innerHTML = info.event.extendedProps.parentesco;
                document.getElementById('txtmedico').innerHTML = info.event.extendedProps.medico;
                document.getElementById('txtespecialidad').innerHTML = info.event.extendedProps.especialidad;
                document.getElementById('txtdia').innerHTML = info.event.extendedProps.fecha;
                document.getElementById('txtturno').innerHTML = info.event.extendedProps.turno;
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

                $('#exampleModal').modal();
            },
            editable: true

        });

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
        calendar.render();

    }
<?php echo '</script'; ?>
><?php }
}
