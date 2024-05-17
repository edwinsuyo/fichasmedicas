<?php
/* Smarty version 4.3.1, created on 2024-03-22 16:27:02
  from '/var/www/html/SISTEMAFICHAS/Administrativo/templates/Login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_65fde996c94464_84408958',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2e7f2f72134892a815c03bb41880a9fc120d9dd' => 
    array (
      0 => '/var/www/html/SISTEMAFICHAS/Administrativo/templates/Login.html',
      1 => 1710272985,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65fde996c94464_84408958 (Smarty_Internal_Template $_smarty_tpl) {
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
          <form action="GestionLogin.php" method="post">
            <h2>LOGIN ADMINISTRATIVO DE REGISTRO DE FICHAS</h2>
            <div>
              <input type="text" id="username" name="username" class="form-control" placeholder="Usuario"
                required="" />
            </div>
            <div>
              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" 
              required="" />
            </div>
            <BR />
            <div>
              <button class="btn btn-info btn-block">INGRESAR</button>
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

</html><?php }
}
