<?php
/* Smarty version 4.3.1, created on 2024-01-17 15:18:25
  from '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmRegFicha.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65a836112e4443_71565117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00cb3e4c9ec971b229b0b7f99029a92ab472558b' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmRegFicha.html',
      1 => 1705522684,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a836112e4443_71565117 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>FORMULARIO DE REGISTRO PARA FICHAS</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-sm-12  ">

                <div class="x_panel">
                    <div class="x_title">
                        <h4>SELECCIONA LA ESPECIALIDAD </h4>
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
                                    <select class="form-control select" data-live-search="true" id="lespecialidad"
                                        name="lespecialidad" style="width: 100%;">
                                        <option id="0" value="" disabled="disabled" selected="selected">[SELECCIONE
                                            UN ESPECIALIDAD] </option>
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
                    </div>
                </div>
            </div>
            <!-- /form input mask -->

            <!-- form color picker -->
            <div class="col-md-6 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h4>SELECCIONA AL MEDICO </h4>
                    </div>
                    <div class="x_content">
                        <br />
                        <form class="form-horizontal form-label-left">

                            <div class="form-group row">
                                <FONT SIZE=5> <label class="control-label col-md-3 col-sm-3 badge badge-light">MEDICO
                                        :</label></FONT>
                                <div class="col-md-9 col-sm-9  ">
                                    <select class="form-control select" data-live-search="true" id="lmedico"
                                        name="lmedico" style="width: 100%;">
                                        <option id="0" value="" disabled="disabled" selected="selected">[SELECCIONE
                                            UN MEDICO] </option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="form-group">
                            <div class="">
                                <button name="Submit" value="Enviar" type="submit" onclick="CargarHorario()"
                                    class="btn btn-primary">VER
                                    HORARIO MEDICO</button>
                                <!--<button type='reset' class="btn btn-success">Reset</button>!-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="item form-group">
                            <div class="col-md-3 col-sm-3">
                                <FONT SIZE=3.5><label class="badge badge-light">TURNO : </label></FONT>
                                <FONT SIZE=3.5> <label class="badge badge-light" id="labelturno">......</label>
                                </FONT>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <FONT SIZE=3.5><label class="badge badge-light">HORARIO : </label></FONT>
                                <FONT SIZE=3.5><label class="badge badge-light" id="labelhorario">......</label>
                                </FONT>
                            </div>
                            <div class="col-md-9 col-sm-9 ">
                                <FONT SIZE=3.5><label class="badge badge-light">DIA DE ATENCION :</label></FONT>
                                <FONT SIZE=3.5><label class="badge badge-light" id="labeldia">.......</label></FONT>
                            </div>
                        </div>
                        <div class="item form-group">
                            <div class="col-md-3 col-sm-3">
                                <FONT SIZE=3.5><label class="badge badge-light">MEDICO : </label></FONT>
                                <FONT SIZE=3.5> <label class="badge badge-light" id="labelmedico">......</label>
                                </FONT>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <FONT SIZE=3.5><label class="badge badge-light">ESPECIALIDAD : </label></FONT>
                                <FONT SIZE=3.5><label class="badge badge-light" id="labelespecialidad">......</label>
                                </FONT>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12" id="pantallacalendario" style="visibility: hidden;">
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
                                        <h3>CUPOS: <span>
                                                <P class="badge badge-light" id="txtcupo">
                                                    ....
                                            </span></h3>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-header">
                                        <span>
                                            <P class="badge badge-light" id="txtcantidadcupo">
                                                ....
                                        </span>
                                    </div>
                                    <div class="modal-body">

                                        <div id="testmodal" style="padding: 5px 20px;">
                                            <form id="antoform2" class="form-horizontal calender" role="form">
                                                <center><span class="section">FICHA MEDICA</span></center>
                                                <div class="field item form-group">
                                                    <label
                                                        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">MEDICO<span
                                                            class="required">:</span></label>
                                                    <div class="col-md-12 col-sm-6">
                                                        <FONT SIZE=3.5>
                                                            <p class="badge badge-light" id="txtmedico"
                                                                name="txtmedico">
                                                            </p>
                                                        </FONT>
                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label
                                                        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">ESPECIALIDAD<span
                                                            class="required">:</span></label>
                                                    <div class="col-md-12 col-sm-6">
                                                        <FONT SIZE=3.5>
                                                            <p class="badge badge-light" id="txtespecialidad"
                                                                name="txtespecialidad"></p>
                                                        </FONT>

                                                    </div>
                                                </div>
                                                <div class="field item form-group">
                                                    <label
                                                        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">DIA
                                                        SELECCIONADA
                                                        <span class="required">:</span></label>
                                                    <div class="col-md-12 col-sm-6">
                                                        <FONT SIZE=3.5>
                                                            <p class="badge badge-light" id="txtdia" name="txtdia"></p>
                                                            <p class="badge badge-light" id="txtfecha"
                                                                style="display: none;" name="txtdia"></p>
                                                        </FONT>
                                                    </div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label
                                                        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">TURNO
                                                        DISPONIBLE<span class="required">:</span></label>
                                                    <div class="col-md-6 col-sm-6">
                                                        <select class="form-control select" data-live-search="true"
                                                            id="lturno" name="lturno" style="width: 100%;">
                                                            <option value="" selected="selected">[LISTA DE TURNO]
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="field item form-group">
                                                    <label
                                                        class="col-form-label col-md-3 col-sm-3  label-align badge badge-light">HORA
                                                        DISPONIBLE
                                                        <span class="required">:</span></label>
                                                    <div class="col-md-12 col-sm-6">
                                                        <FONT SIZE=3.5>
                                                            <p class="badge badge-light" id="txthora" name="txthora">
                                                                seleccione un turno</p>
                                                        </FONT>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="btnCerrar" class="btn btn-default antoclose"
                                            data-dismiss="modal">CERRAR</button>
                                        <button type="button" id="btnAgregar" onclick="RegistrarFicha()"
                                            class="btn btn-primary antosubmit">REGISTRAR</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Calender modal imprimir ficha-->
                        <div id="FichaModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">X</button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="testmodal" style="padding: 5px 20px;">

                                            <center><span class="section">FICHA MEDICA</span></center>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>N°
                                                    DE ORDEN : </b></label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtorden" name="txtorden">
                                                        </p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>PACIENTE : </b></label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtpacienteficha" name="txtpacienteficha">
                                                        </p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>EMPRESA : </b></label>
                                                <div class="col-md-6 col-sm-6">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtempresaficha" name="txtempresaficha">
                                                        </p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>PARENTESCO : </b>
                                                </label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtparentescoficha" name="txtparentescoficha">
                                                        </p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>MEDICO : </b></label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtmedicoficha" name="txtmedicoficha">
                                                        </p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>ESPECIALIDAD : </b>
                                                </label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtespecialidadficha" name="txtespecialidadficha"></p>
                                                    </FONT>

                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>DIA : </b></label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtdiaficha" name="txtdiaficha"></p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-3 col-sm-3"><b>TURNO : </b></label>
                                                <div class="col-md-6 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txtturnoficha" name="txtturnoficha">
                                                        </p>
                                                    </FONT>
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label class="col-form-label col-md-3 col-sm-3" ><b>HORA
                                                    DE RESERVA : </b></label>
                                                <div class="col-md-3 col-sm-3">
                                                    <FONT SIZE=3.5>
                                                        <p id="txthoraficha" name="txthoraficha">
                                                        </p>
                                                    </FONT>
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <div id="qrcode"
                                                        style="width:100px; height:100px; margin-top:15px;">
                                                    </div>
                                                </div>
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
 type="text/javascript" src="../qr/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="../qr/qrcode.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
>
    function DescargarFicha() {
        var url = "fichamedica.php?txtpaciente=" + document.getElementById('txtpacienteficha').innerHTML
            + "&txtempresa=" + document.getElementById('txtempresaficha').innerHTML
            + "&txtparentesco=" + document.getElementById('txtparentescoficha').innerHTML
            + "&txtmedico=" + document.getElementById('txtmedicoficha').innerHTML
            + "&txtespecialidad=" + document.getElementById('txtespecialidadficha').innerHTML
            + "&txtdia=" + document.getElementById('txtdiaficha').innerHTML
            + "&txtturno=" + document.getElementById('txtturnoficha').innerHTML
            + "&txthoraficha=" + document.getElementById('txthoraficha').innerHTML
            + "&txtorden=" + document.getElementById('txtorden').innerHTML;

        var link = url;
        window.open(link);

        //x.style.display = "none";
    }

<?php echo '</script'; ?>
>

<!--Javascript CargarHorario-->

<?php echo '<script'; ?>
>
    function CargarHorario() {
        var medico = $('#lmedico').val();
        var especialidad = $('#lespecialidad').val();
        if (medico == undefined || especialidad == undefined) {

            event.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tiene que seleccionar la especialidad y el medico!'
            });

        }
        else {
            var x = document.getElementById("pantallacalendario");
            x.style.visibility = "visible";
            var horario = "datomedico.php?data=" + $('#lmedico').val() + "&valor=2";
            $.ajax({
                url: horario,
                type: 'POST',
                dataType: 'json',
                success: recargarhorariomedico
            });
            var diamedico = "datomedico.php?data=" + $('#lmedico').val() + "&valor=3";
            $.ajax({
                url: diamedico,
                type: 'POST',
                dataType: 'json',
                success: recargardiamedico
            });
            CargarCalender();
            var historiafichamedico = "datoficha.php?valorm=" + $('#lmedico').val() + "&opcion=6&valorp=" + $('#idpaciente').val();
            //alert(historiafichamedico);
            $.ajax({
                url: historiafichamedico,
                type: 'POST',
                dataType: 'json',
                success: recargarCalendario
            });
            //$("#CalendarioWeb").fullCalendar('render');
        }
        //x.style.display = "none";
    }

    function recargarhorariomedico(json) {
        document.querySelector('#labelturno').innerText = '';
        document.querySelector('#labelhorario').innerText = '';

        document.querySelector('#labelmedico').innerText = $("#lmedico option:selected").text();
        document.querySelector('#labelespecialidad').innerText = $("#lespecialidad option:selected").text();

        var turno = '';
        var horario = '';
        var l = json.length;
        for (i = 0; i < l; i++) {
            if (i == 0) {
                turno = turno + json[i].turno;
                horario = horario + json[i].horario;
            }
            else {
                turno = turno + " - " + json[i].turno;
                horario = horario + " - " + json[i].horario;

            }
        }
        document.querySelector('#labelturno').innerText = turno;
        document.querySelector('#labelhorario').innerText = horario;

    }

    function recargardiamedico(json) {
        document.querySelector('#labeldia').innerText = '';
        var dias = "";
        var l = json.length;
        for (i = 0; i < l; i++) {
            if (i == 0)
                dias = dias + json[i].nombredia;
            else
                dias = dias + " - " + json[i].nombredia;
        }
        document.querySelector('#labeldia').innerText = dias;
    }
<?php echo '</script'; ?>
><?php }
}
