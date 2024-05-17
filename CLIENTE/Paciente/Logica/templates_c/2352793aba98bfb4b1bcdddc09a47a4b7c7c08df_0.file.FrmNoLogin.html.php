<?php
/* Smarty version 4.3.1, created on 2023-12-06 10:38:46
  from '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmNoLogin.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65709586328e07_26870084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2352793aba98bfb4b1bcdddc09a47a4b7c7c08df' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Paciente/templates/FrmNoLogin.html',
      1 => 1684424725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65709586328e07_26870084 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Caja de Salud Cordes | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center text-center">
              <h1 class="error-number">Error</h1>
              <h2>Acceso denegado</h2>
              <p>No se Inicio Seccion debido: <?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
 
                <!--<a href="<?php echo $_smarty_tpl->tpl_vars['enlaceback']->value;?>
">Volver a Logearse</a>-->
              </p>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <?php echo '<script'; ?>
 src="../vendors/jquery/dist/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap -->
   <?php echo '<script'; ?>
 src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <!-- FastClick -->
    <?php echo '<script'; ?>
 src="../vendors/fastclick/lib/fastclick.js"><?php echo '</script'; ?>
>
    <!-- NProgress -->
    <?php echo '<script'; ?>
 src="../vendors/nprogress/nprogress.js"><?php echo '</script'; ?>
>

    <!-- Custom Theme Scripts -->
    <?php echo '<script'; ?>
 src="../build/js/custom.min.js"><?php echo '</script'; ?>
>
  </body>
</html><?php }
}
