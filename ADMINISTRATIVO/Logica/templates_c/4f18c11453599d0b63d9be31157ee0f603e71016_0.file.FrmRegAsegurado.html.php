<?php
/* Smarty version 4.3.1, created on 2024-03-26 17:16:08
  from '/var/www/html/SISTEMAFICHAS/Administrativo/templates/FrmRegAsegurado.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_66033b181254b9_52538883',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4f18c11453599d0b63d9be31157ee0f603e71016' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Administrativo/templates/FrmRegAsegurado.html',
      1 => 1711487756,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66033b181254b9_52538883 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 src="../validacion/validacion.js"><?php echo '</script'; ?>
>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>FICHAS <small>.</small></h3>
            </div>


        </div>

        <div class="clearfix"></div>




        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>AVISO DE AFIALIACION DE TRABAJADORES</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <h2>DATOS DEL TRABAJADOR</h2>
                    <br />
                    <div class="row">
                        <div class='col-sm-2'>
                            Nº ASEGURADO:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" id="matricula" name="matricula"
                                                data-inputmask="'mask' : '**-****-***'"
                                                style="background-color: lawngreen; width : 200px; height : 200p; font-size: larger;"
                                                class="form-control" value="" />

                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            . <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <button onclick="CargarAsegurado()" class="btn btn-primary"><i
                                                    class="fa fa-search" aria-hidden="true"
                                                    style="color: rgb(252, 252, 252);">
                                                    BUSCAR AFILIADO</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-4'>
                            APELLIDO PATERNO:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation"
                                                id="apellidopaterno" name="apellidopaterno" class="form-control"
                                                value=""
                                                onkeypress="nextFocus('apellidopaterno', 'apellidomaterno');return soloLetras(event)" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            APELLIDO MATERNO:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" id="apellidomaterno" style="width: 200px"
                                                class="form-control" value=""
                                                onkeypress="nextFocus('apellidomaterno', 'nombre');return soloLetras(event)" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            NOMBRES:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" id="nombre" style="width: 200px" class="form-control"
                                                onkeypress="nextFocus('nombre', 'single_cal1');return soloLetras(event)"
                                                value="" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-4'>
                            FECHA NACIMIENTO:
                            <div
                                class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_4 xdisplay">
                                <div class="calendar left single" style="display: block;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control active"
                                            type="text" name="daterangepicker_start" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev available"><i
                                                            class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i>
                                                    </th>
                                                    <th colspan="5" class="month">Oct 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">25</td>
                                                    <td class="off available" data-title="r0c1">26</td>
                                                    <td class="off available" data-title="r0c2">27</td>
                                                    <td class="off available" data-title="r0c3">28</td>
                                                    <td class="off available" data-title="r0c4">29</td>
                                                    <td class="off available" data-title="r0c5">30</td>
                                                    <td class="weekend available" data-title="r0c6">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">2</td>
                                                    <td class="available" data-title="r1c1">3</td>
                                                    <td class="available" data-title="r1c2">4</td>
                                                    <td class="available" data-title="r1c3">5</td>
                                                    <td class="available" data-title="r1c4">6</td>
                                                    <td class="available" data-title="r1c5">7</td>
                                                    <td class="weekend available" data-title="r1c6">8</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">9</td>
                                                    <td class="available" data-title="r2c1">10</td>
                                                    <td class="available" data-title="r2c2">11</td>
                                                    <td class="available" data-title="r2c3">12</td>
                                                    <td class="available" data-title="r2c4">13</td>
                                                    <td class="available" data-title="r2c5">14</td>
                                                    <td class="weekend available" data-title="r2c6">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">16</td>
                                                    <td class="available" data-title="r3c1">17</td>
                                                    <td class="today active start-date active end-date available"
                                                        data-title="r3c2">18</td>
                                                    <td class="available" data-title="r3c3">19</td>
                                                    <td class="available" data-title="r3c4">20</td>
                                                    <td class="available" data-title="r3c5">21</td>
                                                    <td class="weekend available" data-title="r3c6">22</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">23</td>
                                                    <td class="available" data-title="r4c1">24</td>
                                                    <td class="available" data-title="r4c2">25</td>
                                                    <td class="available" data-title="r4c3">26</td>
                                                    <td class="available" data-title="r4c4">27</td>
                                                    <td class="available" data-title="r4c5">28</td>
                                                    <td class="weekend available" data-title="r4c6">29</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r5c0">30</td>
                                                    <td class="available" data-title="r5c1">31</td>
                                                    <td class="off available" data-title="r5c2">1</td>
                                                    <td class="off available" data-title="r5c3">2</td>
                                                    <td class="off available" data-title="r5c4">3</td>
                                                    <td class="off available" data-title="r5c5">4</td>
                                                    <td class="weekend off available" data-title="r5c6">5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="calendar right" style="display: none;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control"
                                            type="text" name="daterangepicker_end" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="5" class="month">Nov 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">30</td>
                                                    <td class="off available" data-title="r0c1">31</td>
                                                    <td class="available" data-title="r0c2">1</td>
                                                    <td class="available" data-title="r0c3">2</td>
                                                    <td class="available" data-title="r0c4">3</td>
                                                    <td class="available" data-title="r0c5">4</td>
                                                    <td class="weekend available" data-title="r0c6">5</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">6</td>
                                                    <td class="available" data-title="r1c1">7</td>
                                                    <td class="available" data-title="r1c2">8</td>
                                                    <td class="available" data-title="r1c3">9</td>
                                                    <td class="available" data-title="r1c4">10</td>
                                                    <td class="available" data-title="r1c5">11</td>
                                                    <td class="weekend available" data-title="r1c6">12</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">13</td>
                                                    <td class="available" data-title="r2c1">14</td>
                                                    <td class="available" data-title="r2c2">15</td>
                                                    <td class="available" data-title="r2c3">16</td>
                                                    <td class="available" data-title="r2c4">17</td>
                                                    <td class="available" data-title="r2c5">18</td>
                                                    <td class="weekend available" data-title="r2c6">19</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">20</td>
                                                    <td class="available" data-title="r3c1">21</td>
                                                    <td class="available" data-title="r3c2">22</td>
                                                    <td class="available" data-title="r3c3">23</td>
                                                    <td class="available" data-title="r3c4">24</td>
                                                    <td class="available" data-title="r3c5">25</td>
                                                    <td class="weekend available" data-title="r3c6">26</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">27</td>
                                                    <td class="available" data-title="r4c1">28</td>
                                                    <td class="available" data-title="r4c2">29</td>
                                                    <td class="available" data-title="r4c3">30</td>
                                                    <td class="off available" data-title="r4c4">1</td>
                                                    <td class="off available" data-title="r4c5">2</td>
                                                    <td class="weekend off available" data-title="r4c6">3</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend off available" data-title="r5c0">4</td>
                                                    <td class="off available" data-title="r5c1">5</td>
                                                    <td class="off available" data-title="r5c2">6</td>
                                                    <td class="off available" data-title="r5c3">7</td>
                                                    <td class="off available" data-title="r5c4">8</td>
                                                    <td class="off available" data-title="r5c5">9</td>
                                                    <td class="weekend off available" data-title="r5c6">10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ranges" style="display: none;">
                                    <div class="range_inputs"><button class="applyBtn btn btn-sm btn-success"
                                            type="button">Apply</button> <button
                                            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" class="form-control has-feedback-left"
                                                data-inputmask="'mask' : '**/**/****'" id="single_cal1"
                                                onkeypress="nextFocus('single_cal1', 'ci')" placeholder="First Name"
                                                aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            CI:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" id="ci" style="width: 200px" class="form-control"
                                                onkeypress="nextFocus('ci', 'lexpirado');return soloLetras(event)"
                                                value="" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            EXPIRADO:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lexpirado', 'lgenero')" id="lexpirado"
                                                name="lexpirado" style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    NINGUNO </option>
                                                <option value="SANTA CRUZ">SANTA CRUZ</option>
                                                <option value="COCHABAMBA">COCHABAMBA</option>
                                                <option value="LA PAZ">LA PAZ</option>
                                                <option value="SUCRE">SUCRE</option>
                                                <option value="ORURO">ORURO</option>
                                                <option value="POTOSI">POTOSI</option>
                                                <option value="TARIJA">TARIJA</option>
                                                <option value="PANDO">PANDO</option>
                                                <option value="BENI">BENI</option>
                                                <option value="TRINIDAD">TRINIDAD</option>
                                                <option value="EXTRANJERO">EXTRANJERO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-4'>
                            GENERO:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lgenero', 'lfactor')" id="lgenero"
                                                onchange="FunctionMatriculaTitular();" name="lgenero"
                                                style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    [GENERO] </option>
                                                <option value="F">
                                                    FEMENINO
                                                </option>
                                                <option value="M">
                                                    MASCULINO
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            FACTOR RH:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lfactor', 'lgrupo')" id="lfactor" name="lfactor"
                                                style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    [SELECCIONA] </option>
                                                <option value="NEGATIVO">NEGATIVO</option>
                                                <option value="POSITIVO">POSITIVO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            GRUPO:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lgrupo', 'lcordinal')" id="lgrupo" name="lgrupo"
                                                style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    [SELECCIONA] </option>
                                                <option value="A">A</option>
                                                <option value="AB">AB</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <h2>DOMICILO Y CONTACTO DEL TRABAJADOR</h2>
                    <div class="row">
                        <div class='col-sm-4'>
                            PUNTO CARDINAL:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lcordinal', 'zona')" id="lcordinal"
                                                name="lcordinal" style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    [SELECCIONA] </option>
                                                <option value="Este">Este</option>
                                                <option value="Oeste">Oeste</option>
                                                <option value="Norte">Norte</option>
                                                <option value="Sur">Sur</option>
                                                <option value="NorEste">NorEste</option>
                                                <option value="NorOeste">NorOeste</option>
                                                <option value="SudEste">SudEste</option>
                                                <option value="Central">Central</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            ZONA:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="zona"
                                                name="zona" class="form-control" value=""
                                                onkeypress="nextFocus('zona', 'calle');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            CALLE:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="calle"
                                                name="calle" class="form-control" value=""
                                                onkeypress="nextFocus('calle', 'nro');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-4'>
                            Nº:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="nro"
                                                name="nro" class="form-control" value=""
                                                onkeypress="nextFocus('nro', 'localidad');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            LOCALIDAD:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="localidad"
                                                name="localidad" class="form-control" value=""
                                                onkeypress="nextFocus('localidad', 'telefono');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            TELEFONO:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="telefono"
                                                name="telefono" class="form-control" value=""
                                                onkeypress="nextFocus('telefono', 'correo');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-4'>
                            CORREO:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="correo"
                                                name="correo" class="form-control" value=""
                                                onkeypress="nextFocus('correo', 'telefono');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <h2>LUGAR DE TRABAJO DEL TRABAJADOR</h2>
                    <div class="row">
                        <div class='col-sm-4'>
                            EMPRESA:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="empresa"
                                                list="dlist" name="empresa" class="form-control"
                                                oninput='BusquedaEmpresa()'
                                                onkeypress="nextFocus('empresa', 'numeroempleador');" />
                                        </div>
                                        <datalist id='dlist'>
                                            <?php
$__section_posi_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['lempresa']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_posi_0_total = $__section_posi_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_posi'] = new Smarty_Variable(array());
if ($__section_posi_0_total !== 0) {
for ($__section_posi_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index'] = 0; $__section_posi_0_iteration <= $__section_posi_0_total; $__section_posi_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index']++){
?>
                                            <option value="<?php echo $_smarty_tpl->tpl_vars['lempresa']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index'] : null)]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lempresa']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_posi']->value['index'] : null)]['nombre'];?>
</option>
                                            <?php
}
}
?>
                                        </datalist>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            NUMERO DEL EMPLEADOR:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation"
                                                id="numeroempleador" name="numeroempleador" class="form-control"
                                                value="" onkeypress="nextFocus('numeroempleador', 'ocupacion');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            OCUPACION ACTUAL:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="ocupacion"
                                                name="ocupacion" class="form-control" value=""
                                                onkeypress="nextFocus('ocupacion', 'single_cal2');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-sm-4'>
                            FECHA DE INGRESO AL TRABAJO:
                            <div
                                class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_4 xdisplay">
                                <div class="calendar left single" style="display: block;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control active"
                                            type="text" name="daterangepicker_start" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev available"><i
                                                            class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i>
                                                    </th>
                                                    <th colspan="5" class="month">Oct 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">25</td>
                                                    <td class="off available" data-title="r0c1">26</td>
                                                    <td class="off available" data-title="r0c2">27</td>
                                                    <td class="off available" data-title="r0c3">28</td>
                                                    <td class="off available" data-title="r0c4">29</td>
                                                    <td class="off available" data-title="r0c5">30</td>
                                                    <td class="weekend available" data-title="r0c6">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">2</td>
                                                    <td class="available" data-title="r1c1">3</td>
                                                    <td class="available" data-title="r1c2">4</td>
                                                    <td class="available" data-title="r1c3">5</td>
                                                    <td class="available" data-title="r1c4">6</td>
                                                    <td class="available" data-title="r1c5">7</td>
                                                    <td class="weekend available" data-title="r1c6">8</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">9</td>
                                                    <td class="available" data-title="r2c1">10</td>
                                                    <td class="available" data-title="r2c2">11</td>
                                                    <td class="available" data-title="r2c3">12</td>
                                                    <td class="available" data-title="r2c4">13</td>
                                                    <td class="available" data-title="r2c5">14</td>
                                                    <td class="weekend available" data-title="r2c6">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">16</td>
                                                    <td class="available" data-title="r3c1">17</td>
                                                    <td class="today active start-date active end-date available"
                                                        data-title="r3c2">18</td>
                                                    <td class="available" data-title="r3c3">19</td>
                                                    <td class="available" data-title="r3c4">20</td>
                                                    <td class="available" data-title="r3c5">21</td>
                                                    <td class="weekend available" data-title="r3c6">22</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">23</td>
                                                    <td class="available" data-title="r4c1">24</td>
                                                    <td class="available" data-title="r4c2">25</td>
                                                    <td class="available" data-title="r4c3">26</td>
                                                    <td class="available" data-title="r4c4">27</td>
                                                    <td class="available" data-title="r4c5">28</td>
                                                    <td class="weekend available" data-title="r4c6">29</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r5c0">30</td>
                                                    <td class="available" data-title="r5c1">31</td>
                                                    <td class="off available" data-title="r5c2">1</td>
                                                    <td class="off available" data-title="r5c3">2</td>
                                                    <td class="off available" data-title="r5c4">3</td>
                                                    <td class="off available" data-title="r5c5">4</td>
                                                    <td class="weekend off available" data-title="r5c6">5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="calendar right" style="display: none;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control"
                                            type="text" name="daterangepicker_end" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="5" class="month">Nov 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">30</td>
                                                    <td class="off available" data-title="r0c1">31</td>
                                                    <td class="available" data-title="r0c2">1</td>
                                                    <td class="available" data-title="r0c3">2</td>
                                                    <td class="available" data-title="r0c4">3</td>
                                                    <td class="available" data-title="r0c5">4</td>
                                                    <td class="weekend available" data-title="r0c6">5</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">6</td>
                                                    <td class="available" data-title="r1c1">7</td>
                                                    <td class="available" data-title="r1c2">8</td>
                                                    <td class="available" data-title="r1c3">9</td>
                                                    <td class="available" data-title="r1c4">10</td>
                                                    <td class="available" data-title="r1c5">11</td>
                                                    <td class="weekend available" data-title="r1c6">12</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">13</td>
                                                    <td class="available" data-title="r2c1">14</td>
                                                    <td class="available" data-title="r2c2">15</td>
                                                    <td class="available" data-title="r2c3">16</td>
                                                    <td class="available" data-title="r2c4">17</td>
                                                    <td class="available" data-title="r2c5">18</td>
                                                    <td class="weekend available" data-title="r2c6">19</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">20</td>
                                                    <td class="available" data-title="r3c1">21</td>
                                                    <td class="available" data-title="r3c2">22</td>
                                                    <td class="available" data-title="r3c3">23</td>
                                                    <td class="available" data-title="r3c4">24</td>
                                                    <td class="available" data-title="r3c5">25</td>
                                                    <td class="weekend available" data-title="r3c6">26</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">27</td>
                                                    <td class="available" data-title="r4c1">28</td>
                                                    <td class="available" data-title="r4c2">29</td>
                                                    <td class="available" data-title="r4c3">30</td>
                                                    <td class="off available" data-title="r4c4">1</td>
                                                    <td class="off available" data-title="r4c5">2</td>
                                                    <td class="weekend off available" data-title="r4c6">3</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend off available" data-title="r5c0">4</td>
                                                    <td class="off available" data-title="r5c1">5</td>
                                                    <td class="off available" data-title="r5c2">6</td>
                                                    <td class="off available" data-title="r5c3">7</td>
                                                    <td class="off available" data-title="r5c4">8</td>
                                                    <td class="off available" data-title="r5c5">9</td>
                                                    <td class="weekend off available" data-title="r5c6">10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ranges" style="display: none;">
                                    <div class="range_inputs"><button class="applyBtn btn btn-sm btn-success"
                                            type="button">Apply</button> <button
                                            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" class="form-control has-feedback-left"
                                                data-inputmask="'mask' : '**/**/****'" id="single_cal2"
                                                onkeypress="nextFocus('single_cal2', 'salario')"
                                                placeholder="First Name" aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            SALARIO MENSUAL:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="salario"
                                                name="salario" class="form-control" value=""
                                                onkeypress="nextFocus('salario', 'lcategoria');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <h2>DATOS DE AFILIACION</h2>
                    <div class="row">
                        <div class='col-sm-4'>
                            CATEGORIA:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lcategoria', 'single_cal3')" id="lcategoria"
                                                name="lcategoria" style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    [SELECCIONA] </option>
                                                <option value="TITULAR">TITULAR</option>
                                                <option value="RENTISTA COTIZANTE">RENTISTA COTIZANTE</option>
                                                <option value="RENTISTA DIFUNTO">RENTISTA DIFUNTO</option>
                                                <option value="SEGURIDAD ESTUDIANTIL">SEGURIDAD ESTUDIANTIL
                                                </option>
                                                <option value="SEGURIDAD VOLUNTARIO">SEGURIDAD VOLUNTARIO
                                                </option>
                                                <option value="SPAM">SPAM</option>
                                                <option value="SUMI">SUMI</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            FECHA DE PRESENTACION:
                            <div
                                class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_4 xdisplay">
                                <div class="calendar left single" style="display: block;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control active"
                                            type="text" name="daterangepicker_start" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev available"><i
                                                            class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i>
                                                    </th>
                                                    <th colspan="5" class="month">Oct 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">25</td>
                                                    <td class="off available" data-title="r0c1">26</td>
                                                    <td class="off available" data-title="r0c2">27</td>
                                                    <td class="off available" data-title="r0c3">28</td>
                                                    <td class="off available" data-title="r0c4">29</td>
                                                    <td class="off available" data-title="r0c5">30</td>
                                                    <td class="weekend available" data-title="r0c6">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">2</td>
                                                    <td class="available" data-title="r1c1">3</td>
                                                    <td class="available" data-title="r1c2">4</td>
                                                    <td class="available" data-title="r1c3">5</td>
                                                    <td class="available" data-title="r1c4">6</td>
                                                    <td class="available" data-title="r1c5">7</td>
                                                    <td class="weekend available" data-title="r1c6">8</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">9</td>
                                                    <td class="available" data-title="r2c1">10</td>
                                                    <td class="available" data-title="r2c2">11</td>
                                                    <td class="available" data-title="r2c3">12</td>
                                                    <td class="available" data-title="r2c4">13</td>
                                                    <td class="available" data-title="r2c5">14</td>
                                                    <td class="weekend available" data-title="r2c6">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">16</td>
                                                    <td class="available" data-title="r3c1">17</td>
                                                    <td class="today active start-date active end-date available"
                                                        data-title="r3c2">18</td>
                                                    <td class="available" data-title="r3c3">19</td>
                                                    <td class="available" data-title="r3c4">20</td>
                                                    <td class="available" data-title="r3c5">21</td>
                                                    <td class="weekend available" data-title="r3c6">22</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">23</td>
                                                    <td class="available" data-title="r4c1">24</td>
                                                    <td class="available" data-title="r4c2">25</td>
                                                    <td class="available" data-title="r4c3">26</td>
                                                    <td class="available" data-title="r4c4">27</td>
                                                    <td class="available" data-title="r4c5">28</td>
                                                    <td class="weekend available" data-title="r4c6">29</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r5c0">30</td>
                                                    <td class="available" data-title="r5c1">31</td>
                                                    <td class="off available" data-title="r5c2">1</td>
                                                    <td class="off available" data-title="r5c3">2</td>
                                                    <td class="off available" data-title="r5c4">3</td>
                                                    <td class="off available" data-title="r5c5">4</td>
                                                    <td class="weekend off available" data-title="r5c6">5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="calendar right" style="display: none;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control"
                                            type="text" name="daterangepicker_end" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="5" class="month">Nov 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">30</td>
                                                    <td class="off available" data-title="r0c1">31</td>
                                                    <td class="available" data-title="r0c2">1</td>
                                                    <td class="available" data-title="r0c3">2</td>
                                                    <td class="available" data-title="r0c4">3</td>
                                                    <td class="available" data-title="r0c5">4</td>
                                                    <td class="weekend available" data-title="r0c6">5</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">6</td>
                                                    <td class="available" data-title="r1c1">7</td>
                                                    <td class="available" data-title="r1c2">8</td>
                                                    <td class="available" data-title="r1c3">9</td>
                                                    <td class="available" data-title="r1c4">10</td>
                                                    <td class="available" data-title="r1c5">11</td>
                                                    <td class="weekend available" data-title="r1c6">12</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">13</td>
                                                    <td class="available" data-title="r2c1">14</td>
                                                    <td class="available" data-title="r2c2">15</td>
                                                    <td class="available" data-title="r2c3">16</td>
                                                    <td class="available" data-title="r2c4">17</td>
                                                    <td class="available" data-title="r2c5">18</td>
                                                    <td class="weekend available" data-title="r2c6">19</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">20</td>
                                                    <td class="available" data-title="r3c1">21</td>
                                                    <td class="available" data-title="r3c2">22</td>
                                                    <td class="available" data-title="r3c3">23</td>
                                                    <td class="available" data-title="r3c4">24</td>
                                                    <td class="available" data-title="r3c5">25</td>
                                                    <td class="weekend available" data-title="r3c6">26</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">27</td>
                                                    <td class="available" data-title="r4c1">28</td>
                                                    <td class="available" data-title="r4c2">29</td>
                                                    <td class="available" data-title="r4c3">30</td>
                                                    <td class="off available" data-title="r4c4">1</td>
                                                    <td class="off available" data-title="r4c5">2</td>
                                                    <td class="weekend off available" data-title="r4c6">3</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend off available" data-title="r5c0">4</td>
                                                    <td class="off available" data-title="r5c1">5</td>
                                                    <td class="off available" data-title="r5c2">6</td>
                                                    <td class="off available" data-title="r5c3">7</td>
                                                    <td class="off available" data-title="r5c4">8</td>
                                                    <td class="off available" data-title="r5c5">9</td>
                                                    <td class="weekend off available" data-title="r5c6">10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ranges" style="display: none;">
                                    <div class="range_inputs"><button class="applyBtn btn btn-sm btn-success"
                                            type="button">Apply</button> <button
                                            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="single_cal3"
                                                onkeypress="nextFocus('single_cal3', 'single_cal4')"
                                                data-inputmask="'mask' : '**/**/****'" placeholder="First Name"
                                                aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            FECHA DE RECEPCION:
                            <div
                                class="daterangepicker dropdown-menu ltr single opensright show-calendar picker_4 xdisplay">
                                <div class="calendar left single" style="display: block;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control active"
                                            type="text" name="daterangepicker_start" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th class="prev available"><i
                                                            class="fa fa-chevron-left glyphicon glyphicon-chevron-left"></i>
                                                    </th>
                                                    <th colspan="5" class="month">Oct 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">25</td>
                                                    <td class="off available" data-title="r0c1">26</td>
                                                    <td class="off available" data-title="r0c2">27</td>
                                                    <td class="off available" data-title="r0c3">28</td>
                                                    <td class="off available" data-title="r0c4">29</td>
                                                    <td class="off available" data-title="r0c5">30</td>
                                                    <td class="weekend available" data-title="r0c6">1</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">2</td>
                                                    <td class="available" data-title="r1c1">3</td>
                                                    <td class="available" data-title="r1c2">4</td>
                                                    <td class="available" data-title="r1c3">5</td>
                                                    <td class="available" data-title="r1c4">6</td>
                                                    <td class="available" data-title="r1c5">7</td>
                                                    <td class="weekend available" data-title="r1c6">8</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">9</td>
                                                    <td class="available" data-title="r2c1">10</td>
                                                    <td class="available" data-title="r2c2">11</td>
                                                    <td class="available" data-title="r2c3">12</td>
                                                    <td class="available" data-title="r2c4">13</td>
                                                    <td class="available" data-title="r2c5">14</td>
                                                    <td class="weekend available" data-title="r2c6">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">16</td>
                                                    <td class="available" data-title="r3c1">17</td>
                                                    <td class="today active start-date active end-date available"
                                                        data-title="r3c2">18</td>
                                                    <td class="available" data-title="r3c3">19</td>
                                                    <td class="available" data-title="r3c4">20</td>
                                                    <td class="available" data-title="r3c5">21</td>
                                                    <td class="weekend available" data-title="r3c6">22</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">23</td>
                                                    <td class="available" data-title="r4c1">24</td>
                                                    <td class="available" data-title="r4c2">25</td>
                                                    <td class="available" data-title="r4c3">26</td>
                                                    <td class="available" data-title="r4c4">27</td>
                                                    <td class="available" data-title="r4c5">28</td>
                                                    <td class="weekend available" data-title="r4c6">29</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r5c0">30</td>
                                                    <td class="available" data-title="r5c1">31</td>
                                                    <td class="off available" data-title="r5c2">1</td>
                                                    <td class="off available" data-title="r5c3">2</td>
                                                    <td class="off available" data-title="r5c4">3</td>
                                                    <td class="off available" data-title="r5c5">4</td>
                                                    <td class="weekend off available" data-title="r5c6">5</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="calendar right" style="display: none;">
                                    <div class="daterangepicker_input"><input class="input-mini form-control"
                                            type="text" name="daterangepicker_end" value="" style="display: none;"><i
                                            class="fa fa-calendar glyphicon glyphicon-calendar"
                                            style="display: none;"></i>
                                        <div class="calendar-time" style="display: none;">
                                            <div></div><i class="fa fa-clock-o glyphicon glyphicon-time"></i>
                                        </div>
                                    </div>
                                    <div class="calendar-table">
                                        <table class="table-condensed">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th colspan="5" class="month">Nov 2016</th>
                                                    <th class="next available"><i
                                                            class="fa fa-chevron-right glyphicon glyphicon-chevron-right"></i>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Su</th>
                                                    <th>Mo</th>
                                                    <th>Tu</th>
                                                    <th>We</th>
                                                    <th>Th</th>
                                                    <th>Fr</th>
                                                    <th>Sa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="weekend off available" data-title="r0c0">30</td>
                                                    <td class="off available" data-title="r0c1">31</td>
                                                    <td class="available" data-title="r0c2">1</td>
                                                    <td class="available" data-title="r0c3">2</td>
                                                    <td class="available" data-title="r0c4">3</td>
                                                    <td class="available" data-title="r0c5">4</td>
                                                    <td class="weekend available" data-title="r0c6">5</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r1c0">6</td>
                                                    <td class="available" data-title="r1c1">7</td>
                                                    <td class="available" data-title="r1c2">8</td>
                                                    <td class="available" data-title="r1c3">9</td>
                                                    <td class="available" data-title="r1c4">10</td>
                                                    <td class="available" data-title="r1c5">11</td>
                                                    <td class="weekend available" data-title="r1c6">12</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r2c0">13</td>
                                                    <td class="available" data-title="r2c1">14</td>
                                                    <td class="available" data-title="r2c2">15</td>
                                                    <td class="available" data-title="r2c3">16</td>
                                                    <td class="available" data-title="r2c4">17</td>
                                                    <td class="available" data-title="r2c5">18</td>
                                                    <td class="weekend available" data-title="r2c6">19</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r3c0">20</td>
                                                    <td class="available" data-title="r3c1">21</td>
                                                    <td class="available" data-title="r3c2">22</td>
                                                    <td class="available" data-title="r3c3">23</td>
                                                    <td class="available" data-title="r3c4">24</td>
                                                    <td class="available" data-title="r3c5">25</td>
                                                    <td class="weekend available" data-title="r3c6">26</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend available" data-title="r4c0">27</td>
                                                    <td class="available" data-title="r4c1">28</td>
                                                    <td class="available" data-title="r4c2">29</td>
                                                    <td class="available" data-title="r4c3">30</td>
                                                    <td class="off available" data-title="r4c4">1</td>
                                                    <td class="off available" data-title="r4c5">2</td>
                                                    <td class="weekend off available" data-title="r4c6">3</td>
                                                </tr>
                                                <tr>
                                                    <td class="weekend off available" data-title="r5c0">4</td>
                                                    <td class="off available" data-title="r5c1">5</td>
                                                    <td class="off available" data-title="r5c2">6</td>
                                                    <td class="off available" data-title="r5c3">7</td>
                                                    <td class="off available" data-title="r5c4">8</td>
                                                    <td class="off available" data-title="r5c5">9</td>
                                                    <td class="weekend off available" data-title="r5c6">10</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="ranges" style="display: none;">
                                    <div class="range_inputs"><button class="applyBtn btn btn-sm btn-success"
                                            type="button">Apply</button> <button
                                            class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="single_cal4"
                                                onkeypress="nextFocus('single_cal4', 'recepcion')"
                                                data-inputmask="'mask' : '**/**/****'" placeholder="First Name"
                                                aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            RECEPCIONADO POR :
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" name="reservation" id="recepcion"
                                                name="recepcion" class="form-control" value=""
                                                onkeypress="nextFocus('recepcion', 'lregional');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            REGIONAL:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <select class="select2_single form-control" tabindex="-1"
                                                onkeypress="nextFocus('lregional', 'guardar')" id="lregional"
                                                name="lregional" style="width: 100%;">
                                                <option id="0" value="0" selected="selected">
                                                    [SELECCIONA] </option>
                                                <option value="SANTA CRUZ">SANTA CRUZ</option>
                                                <option value="GUABIRA">GUABIRA</option>
                                                <option value="COCHABAMBA">COCHAMBABA</option>
                                                <option value="POPOSI">POTOSI</option>
                                                <option value="LA PAZ">LA PAZ</option>
                                                <option value="BENI">BENI</option>
                                                <option value="PANDO">PANDO</option>
                                                <option value="TARIJA">TARIJA</option>
                                                <option value="TRINIDAD">TRINIDAD</option>
                                                <option value="ORURO">ORURO</option>
                                                <option value="SUCRE">SUCRE</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <h2>DATOS DE LA BAJA DEL TRABAJADOR</h2>
                    <div class="row">
                        <div class="col-sm-4">
                            TIENE BAJA:
                            <fieldset>
                                <div class="control-group ">
                                    <div class="controls">
                                        <div class="input-prepend input-group">
                                            <input type="text" style="width: 200px" id="baja" name="baja"
                                                class="form-control" value="NO"
                                                onkeypress="nextFocus('baja', 'fechabaja');" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            FECHA DE BAJA:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="fechabaja"
                                                data-inputmask="'mask' : '**/**/****'" value="00/00/0000"
                                                onkeypress="nextFocus('fechabaja', 'fechalimite')"
                                                aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class='col-sm-4'>
                            F. LIMITE ATE.:
                            <fieldset>
                                <div class="control-group">
                                    <div class="controls">
                                        <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                            <input type="text" class="form-control has-feedback-left" id="fechalimite"
                                                data-inputmask="'mask' : '**/**/****'" value="00/00/0000"
                                                onkeypress="nextFocus('fechalimite', 'btnguardar')"
                                                aria-describedby="inputSuccess2Status4">
                                            <span class="fa fa-calendar-o form-control-feedback left"
                                                aria-hidden="true"></span>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button name="Submit" value="Enviar" type="submit" id="btnguardar"
                                    class="btn btn-primary"><i class="fa fa-save"></i> REGISTRAR</button>
                                <!--<button type='reset' class="btn btn-success">Reset</button>!-->
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="x_content">
                            <button value="export" onclick="PantallaBeneficiario()" class="btn btn-success"><i
                                    class="fa fa-users"></i> BENEFICIARIO</button>
                            <button value="export" onclick="exportToExcel('example')" class="btn btn-success"><i
                                    class="fa fa-file-excel-o"></i> EXCEL</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm12">

                        </div>
                        <!-- /form input mask -->
                        <!-- form color picker -->

                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="col-md-3">
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="col-md-11 xdisplay_inputx form-group row has-feedback">
                                                    <button style="display: none;" class="btn btn-success"><i
                                                            class="fa fa-file-excel-o"
                                                            onclick="exportTableToExcel('example','ExportarFichas')"
                                                            aria-hidden="true" style="color: rgb(252, 252, 252);">
                                                            EXCEL </i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <br><br>

                                <table id="example" style="width:100%" class="yourClass">
                                    <thead>

                                        <tr>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">
                                                    <center>ID</center>
                                                </font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">MATRICULA </font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">PARENTESCO </font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">APELLIDO PATERNO</font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">APELLIDO MATERNO </font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">NOMBRES</font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">FECHA NACIMIENTO </font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">EDAD</font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">SEXO</font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">CI </font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">FACTOR RH</font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">GRUPO</font>
                                            </th>
                                            <th style="background-color: darkgreen;">
                                                <font color="white">FECHA EXTINCION </font>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>

                                <div id="BeneficiarioModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">

                                                <div id="testmodal" style="padding: 5px 20px;">
                                                    <form id="antoform2" class="form-horizontal calender" role="form">
                                                        <center><span class="section">REGISTRO DE BENEFICIARIO</span>
                                                        </center>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">MATRICULA
                                                                BENEFICIARIO:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="matriculabeneficiario" name="title"
                                                                    onkeypress="nextFocus('matriculabeneficiario', 'parentescobeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">PARENTESCO:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="parentescobeneficiario" name="title"
                                                                    onkeypress="nextFocus('parentescobeneficiario', 'apellidopaternobeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">APELLIDO
                                                                PATERNO:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="apellidopaternobeneficiario" name="title"
                                                                    onkeypress="nextFocus('apellidopaternobeneficiario', 'apellidomaternobeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">APELLIDO
                                                                MATERNO:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="apellidomaternobeneficiario" name="title"
                                                                    onkeypress="nextFocus('apellidomaternobeneficiario', 'nombrebeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">NOMBRES:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="nombrebeneficiario" name="title"
                                                                    onkeypress="nextFocus('nombrebeneficiario', 'fechanacimientobeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">FECHA
                                                                NACIMIENTO:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    data-inputmask="'mask' : '**/**/****'"
                                                                    id="fechanacimientobeneficiario" name="title"
                                                                    onkeypress="CalculoFechaExtincion('fechanacimientobeneficiario', 'lgenerobeneficiario');return soloNumeros(event)">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">GENERO:</label>
                                                            <div class="col-sm-9">
                                                                <select class="select2_single form-control" tabindex="-1"
                                                                    id="lgenerobeneficiario" name="title"
                                                                    onkeypress="nextFocus('lgenerobeneficiario', 'cibeneficiario');"
                                                                    onchange="FunctionMatriculaBeneficiario(this.value);"
                                                                    name="lgenerobeneficiario" style="width: 100%;">
                                                                    <option id="0" value="0" selected="selected">[GENERO]</option>
                                                                    <option value="F">FEMENINO</option>
                                                                    <option value="M">MASCULINO</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">CI:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="cibeneficiario" name="title"
                                                                    onkeypress="nextFocus('cibeneficiario', 'factorrhbeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">FACTOR RH:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="factorrhbeneficiario" name="title"
                                                                    onkeypress="nextFocus('factorrhbeneficiario', 'grupobeneficiario');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">GRUPO:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    id="grupobeneficiario" name="title"
                                                                    onkeypress="nextFocus('grupobeneficiario', 'fechaextincion');">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 control-label">FECHA
                                                                EXTINCION:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control"
                                                                    data-inputmask="'mask' : '**/**/****'"
                                                                    id="fechaextincion" name="title"
                                                                    onkeypress="nextFocus('fechaextincion', 'btnAgregarBeneficiario');">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" id="btnCerrar" class="btn btn-default antoclose"
                                                    data-dismiss="modal">CERRAR</button>
                                                <button type="button" id="btnAgregarBeneficiario"
                                                    onclick="RegistrarFicha()"
                                                    class="btn btn-primary antosubmit">REGISTRAR</button>
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


    </div>
</div>
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.7.0.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'B<"row"<"col-sm-6" l><"col-sm-6"f>>' + 'tip',
            buttons: [
                // { extend: 'pdf', className: 'btn btn-secondary' },
                { extend: 'copy', className: 'btn btn-primary' }
                //{ extend: 'excel', className: 'btn btn-success' }
                // { extend: 'print', className: 'btn btn-info' },
            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
<?php echo '</script'; ?>
>

<style>
    .yourClass {
        border-collapse: collapse;
        width: 300px;
    }

    .yourClass th,
    .yourClass td {
        padding: 10px;
        border: solid 1px #777;
    }
</style><?php }
}
