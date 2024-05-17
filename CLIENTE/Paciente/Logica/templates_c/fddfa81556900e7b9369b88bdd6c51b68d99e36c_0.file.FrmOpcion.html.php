<?php
/* Smarty version 4.3.1, created on 2023-12-26 13:47:32
  from '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmOpcion.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_658b1fc487b631_13473302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fddfa81556900e7b9369b88bdd6c51b68d99e36c' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmOpcion.html',
      1 => 1703616426,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658b1fc487b631_13473302 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Caja de Salud Cordes!</title>



  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

  <!-- Switchery -->
  <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- starrr -->
  <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- <?php echo '<script'; ?>
 src="../validacion/sweetalert21"><?php echo '</script'; ?>
>-->
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/sweetalert2@9"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"><?php echo '</script'; ?>
>


  <!--FullCalender-->

  <link rel="stylesheet" href="../fullcalender/vendor/fullcalendar/main.css">
  <link rel="stylesheet" href="../fullcalender/css/calendar.css">

  
  <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"><?php echo '</script'; ?>
>
  
    <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><i class="fa fa-hospital-o"></i> <span>CAJA
                CORDES!</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../templates/images/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido,</span>
              <h2><?php echo $_smarty_tpl->tpl_vars['nomUser']->value;?>
</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menu General</h3>
              <ul class="nav side-menu">
                <?php
$__section_op1_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_op1_0_total = $__section_op1_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_op1'] = new Smarty_Variable(array());
if ($__section_op1_0_total !== 0) {
for ($__section_op1_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index'] = 0; $__section_op1_0_iteration <= $__section_op1_0_total; $__section_op1_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index']++){
?>
                <li><a><i class=" <?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index'] : null)]['icono_archivo'];?>
"></i>
                    <h7> <?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index'] : null)]['descripcion'];?>
</h7>
                    <!--<span class="badge badge-danger">1</span>
                  -->
                    <span class="fa fa-chevron-down"></span>
                  </a>
                  <ul class="nav child_menu">
                    <?php
$__section_op2_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index'] : null)]['subMenu']) ? count($_loop) : max(0, (int) $_loop));
$__section_op2_1_total = $__section_op2_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_op2'] = new Smarty_Variable(array());
if ($__section_op2_1_total !== 0) {
for ($__section_op2_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_op2']->value['index'] = 0; $__section_op2_1_iteration <= $__section_op2_1_total; $__section_op2_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_op2']->value['index']++){
?>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index'] : null)]['subMenu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_op2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op2']->value['index'] : null)]['link'];?>
">
                        <h6><?php echo $_smarty_tpl->tpl_vars['menu']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op1']->value['index'] : null)]['subMenu'][(isset($_smarty_tpl->tpl_vars['__smarty_section_op2']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_op2']->value['index'] : null)]['descripcion'];?>
</h6>
                      </a></li>
                    <?php
}
}
?>
                  </ul>
                </li>
                <?php
}
}
?>
              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="GestionLogin.php?opcion=999">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown"
                  data-toggle="dropdown" aria-expanded="false">
                  <img src="../templates/images/img.jpg" alt=""><?php echo $_smarty_tpl->tpl_vars['nomGrupo']->value;?>

                </a>
                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="GestionLogin.php?opcion=999"><i class="fa fa-sign-out pull-right"></i>
                    Cerrar Sesión </a>
                </div>
              </li>


            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <?php echo $_smarty_tpl->tpl_vars['body']->value;?>


      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          CAJA DE SALUD CORDES <a href="http://www.cajacordes.org.bo/">SITIO WEB CORDES</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>


  <!-- jQuery -->
  <?php echo '<script'; ?>
 src="../vendors/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>

  <!-- FastClick -->
  <?php echo '<script'; ?>
 src="../vendors/fastclick/lib/fastclick.js"><?php echo '</script'; ?>
>
  <!-- NProgress -->
  <?php echo '<script'; ?>
 src="../vendors/nprogress/nprogress.js"><?php echo '</script'; ?>
>
  <!-- Bootstrap -->
  <?php echo '<script'; ?>
 src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>

  <!-- bootstrap-progressbar -->
  <?php echo '<script'; ?>
 src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"><?php echo '</script'; ?>
>
  <!-- iCheck -->
  <?php echo '<script'; ?>
 src="../vendors/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
  <!-- bootstrap-daterangepicker -->
  <?php echo '<script'; ?>
 src="../vendors/moment/min/moment.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
  <!-- bootstrap-wysiwyg -->
  <?php echo '<script'; ?>
 src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/jquery.hotkeys/jquery.hotkeys.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/google-code-prettify/src/prettify.js"><?php echo '</script'; ?>
>
  <!-- jQuery Tags Input -->
  <?php echo '<script'; ?>
 src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"><?php echo '</script'; ?>
>
  <!-- Switchery -->
  <?php echo '<script'; ?>
 src="../vendors/switchery/dist/switchery.min.js"><?php echo '</script'; ?>
>
  <!-- Select2 -->
  <!--<?php echo '<script'; ?>
 src="../vendors/select2/dist/js/select2.full.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/select2/dist/js/select2.min.js"><?php echo '</script'; ?>
>
  -->
  <?php echo '<script'; ?>
 type="text/javascript" src="../vendors/select/bootstrap-select.js"><?php echo '</script'; ?>
>


  <!-- Validacion del Formulario-->
  <?php echo '<script'; ?>
 src="../validacion/validacion.js"><?php echo '</script'; ?>
>
  <!-- jQuery Smart Wizard -->
  <?php echo '<script'; ?>
 src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"><?php echo '</script'; ?>
>


  <!--Full Calender-->


  <?php echo '<script'; ?>
 src="../fullcalender/vendor/fullcalendar/main.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../fullcalender/js/calendar.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../fullcalender/vendor/fullcalendar/locales/es.js"><?php echo '</script'; ?>
>

  <!--qr-->

  <!-- Custom Theme Scripts -->
  <?php echo '<script'; ?>
 src="../build/js/custom.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
