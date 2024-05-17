<?php
/* Smarty version 4.3.1, created on 2024-03-22 16:27:05
  from '/var/www/html/SISTEMAFICHAS/Administrativo/templates/FrmOpcion.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65fde999dd5cc4_08844639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de3ecb24816651ba7eac8fd73bda1133fc8fa332' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Administrativo/templates/FrmOpcion.html',
      1 => 1710960328,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fde999dd5cc4_08844639 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>CAJA DE SALUD | CORDES</title>

  <!-- Bootstrap -->
  <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>

  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Bootstrap -->
  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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
  <!-- jquery.inputmask -->
<?php echo '<script'; ?>
 src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"><?php echo '</script'; ?>
>

  <!-- Datatables -->
  <?php echo '<script'; ?>
 src="../vendors/datatables.net/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-buttons/js/buttons.print.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/jszip/dist/jszip.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/pdfmake/build/pdfmake.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/pdfmake/build/vfs_fonts.js"><?php echo '</script'; ?>
>


  <!-- bootstrap-daterangepicker -->
  <?php echo '<script'; ?>
 src="../vendors/moment/min/moment.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="../vendors/bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>

  <!-- Custom Theme Scripts -->
  <?php echo '<script'; ?>
 src="../build/js/custom.min.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
