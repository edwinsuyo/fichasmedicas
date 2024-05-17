<?php
/* Smarty version 4.3.1, created on 2024-01-17 09:06:58
  from '/var/www/html/SISTEMAFICHAS/Paciente/templates/Login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65a7df0230c731_31902371',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ff16acf5dfd30b49d8d72c4f2ebfc2395ab013b' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Paciente/templates/Login.html',
      1 => 1705500405,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a7df0230c731_31902371 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="es">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="content-language" content="es">
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
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- bootstrap-datetimepicker -->
  <link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">

  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">

</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="GestionLogin.php" method="POST">
            <h2>INGRESE SUS DATOS PARA EL REGISTRO DE FICHAS</h2>
            <div>
              <input type="text" id="username" name="username" class="form-control" data-inputmask="'mask' : '**-****-***'" placeholder="Matricula" required=""/>

            </div>
            <div>

              <input id="password" name="password" class="form-control" placeholder="Ingrese Fecha Nacimiento"
                type="text" onfocus="(this.type='date')" required="" />
            </div>



            <BR />
            <div>
              <button class="btn btn-info btn-block" id="btnSubmit" type="submit">INGRESAR</button>
            </div>
          </form>
          <div class="pull-left">
            CAJA DE SALUD CORDES |
          </div>
          <div class="pull-right">
            <a href="#">REGIONAL SANTA CRUZ</a>
          </div>
      </div>

    </div>

    </section>
  </div>

  </div>
  </div>
</body>

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
<!-- bootstrap-daterangepicker -->
<?php echo '<script'; ?>
 src="../vendors/moment/min/moment.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="../vendors/bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
>
<!-- bootstrap-datetimepicker -->
<?php echo '<script'; ?>
 src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"><?php echo '</script'; ?>
>
<!-- Ion.RangeSlider -->
<?php echo '<script'; ?>
 src="../vendors/ion.rangeSlider/js/ion.rangeSlider.min.js"><?php echo '</script'; ?>
>

<!-- jquery.inputmask -->
<?php echo '<script'; ?>
 src="../vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js"><?php echo '</script'; ?>
>

<!-- Custom Theme Scripts -->
<?php echo '<script'; ?>
 src="../build/js/custom.min.js"><?php echo '</script'; ?>
>



</html><?php }
}
