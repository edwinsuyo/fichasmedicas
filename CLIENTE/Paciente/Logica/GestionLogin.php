<?php
require '../Smarty/Smarty.class.php';
require 'conexion.php';


$html_out = "<center><h1>BIENVENIDO A CAJA DE SALUD CORDES</h1></center>";

session_start();
if (isset($_REQUEST['opcion']) == false)
  $_REQUEST['opcion'] = "1000";
if (isset($_SESSION['usuario']) == false && $_REQUEST['opcion'] != '999') {
  $_SESSION['usuario'] = $_REQUEST['username'];
  $_SESSION['contrasena'] = $_REQUEST['password'];
  $oLogin = new CLogin();
  $oLogin->setOutputBody($html_out);
  $oLogin->generarOpciones($_SESSION['usuario'], $_SESSION['contrasena']);
} else {

  $oLogin = new CLogin();
  if (isset($_REQUEST['opcion']) == false)
    $_REQUEST['opcion'] = "1000";
  if ($_REQUEST['opcion'] == "999") {
    $oLogin->Salir();
  } else {
    $valor = $_REQUEST['opcion'];
    if ($valor < 100 && $valor != "") {
      //	echo "variables registradas<br> $sw";
    } else {
      $oLogin = new CLogin();
      $oLogin->setOutputBody($html_out);
      $oLogin->generarOpciones($_SESSION['usuario'], $_SESSION['contrasena']);
    }
  }
}




class CLogin
{
  var $db;
  var $f_ini, $f_fin, $f_hoy;
  var $output_body;
  var $nomUsernomb;
  var $nomUserappp;

  function setOutputBody($body)
  {
    $this->output_body = $body;
  }

  function showMensaje($titulo, $msg)
  {
    $smarty_msg = new Smarty;
    $smarty_msg->compile_check = true;
    $smarty_msg->debugging = false;
    $smarty_msg->assign("tituloIngreso", $titulo);
    $smarty_msg->assign("mensaje", $msg);
    #Visualizar la informacion en el TEMPLATE
    $smarty_msg->display('../templates/FrmNoLogin.html');
  }

  function verificarUser($usuario, $contrasena)
  {

    $db = ADONewConnection($GLOBALS["driver"]);
    $db->debug = false;
    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
    $sql = "SELECT id,carnet,matricula,nombre,genero,fecha_nacimiento,empresa,parentesco,regional
      from paciente 
      where (UPPER(matricula)=UPPER('$usuario') or UPPER(carnet)=UPPER('$usuario'))
      and UPPER(fecha_nacimiento)=UPPER('$contrasena');";

    $rs = $db->Execute($sql);
    $arr = $rs->Getrows();
    if (count($arr) >= 1) // Existe el Usuario
    {
      $tipo_usuario =  $arr[0]["parentesco"];
      $db->Close();
      return $tipo_usuario;
    } else {
      $db->Close();
      return -1; //USUARIO NO VALIDO	           
    }
  }

  function generarOpciones($usuario, $contrasena)
  {
    $tipo = $this->verificarUser($usuario, $contrasena);
    switch ($tipo) {
      case -1: {
          $msg = "<center>";
          $msg .= "SUS DATOS INGRESADOS SON INCORRECTOS <br> Por favor verifique su informacion ingresada<br>si el Error Continua comuniquese con el Adm. de caja salud Cordes<br>";

          $msg .= "User :  $usuario <br>";
          $msg .= "Password : $contrasena <br>";
          $msg .=  '<form class="bo" method="post" action="index.php">
    			                <button type="submit" class="btn btn-primary">Volver a Intentar</button>
  				              </form>';
          $msg .= "</center>";
          $titulo = "Error al Ingresar al Sitio";
          $this->showMensaje($titulo, $msg);
          session_destroy();
          exit;
        }
        break;
      default: {
          $this->CrearOpciones($usuario, $contrasena, $tipo);
        }
    }
  }


  function CrearOpciones($usuario, $contrasena, $tipo)
  {

    $db = ADONewConnection($GLOBALS["driver"]);
    $db->debug = false;
    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
    $tipouser = "";

    /*Buscar Nombre Grupo del usuario*/
    $sql = "SELECT * from tipousuario where id=3;";
    $rs  = $db->Execute($sql);
    $arr = $rs->Getrows();

    $codGrupo = $arr[0]["id"];
    $nomGrupo = $arr[0]["nombre"];

    /*Buscar Nombre del Usuario*/
    $sql = "SELECT id,carnet,matricula,nombre,genero,fecha_nacimiento,empresa,parentesco,regional
    from paciente 
    where (matricula='$usuario' or carnet='$usuario')
    and fecha_nacimiento='$contrasena';";
    $rs  = $db->Execute($sql);
    $arr = $rs->Getrows();

    $_SESSION['idusuario'] =  $arr[0]["id"];
    $_SESSION['usuario_sistema'] =  $arr[0]["matricula"];
    $tipouser = $arr[0]["parentesco"];
    $empresa = $arr[0]["empresa"];
    $tipoasegurado = $arr[0]["parentesco"];
    $matricula = $arr[0]["matricula"];
    $asegurado = $arr[0]["nombre"];
    $nomUser = $tipouser . ' :' . $arr[0]["nombre"];

    /*Buscar Modulos Habilitados para el Usuario*/
    $sql = "SELECT m.id as id,m.nombre as nombre,m.archivo as archivo,m.icono_archivo as icono_archivo 
                from mod_tipousuario as mc,modulos as m 
                where mc.id_tipousuario='$codGrupo' and m.id=mc.id_modulos ORDER BY 2";

    $rs  = $db->Execute($sql);
    $arr = $rs->Getrows();

    $menu = array();
    for ($i = 0; $i < count($arr); $i++) {
      /*Buscar Modulos Habilitados para el Usuario*/
      $codMod = $arr[$i]["id"];
      $sql = "SELECT a.descripcion as descripcion,a.parametros as parametros 
                    from acciones as a,modulos m  
                    where a.id_modulos=m.id and m.id='$codMod'";
      $rs  = $db->Execute($sql);
      $arr2 = $rs->Getrows();
      $subMenu = array();
      for ($j = 0; $j < count($arr2); $j++) {
        $link = chop(trim($arr[$i]["archivo"]) . '?' . trim($arr2[$j]["parametros"]), '');
        $subMenu[$j] = array('descripcion' => $arr2[$j]["descripcion"], 'parametro' => $arr2[$j]["parametros"], 'link' => $link);
      }
      $menu[$i] = array('descripcion' => $arr[$i]["nombre"], 'file' => $arr[$i]["archivo"], 'icono_archivo' => $arr[$i]["icono_archivo"], 'subMenu' => $subMenu);
    };

    $smarty_l = new Smarty;
    $smarty_l->compile_check = true;
    $smarty_l->debugging = false;
    $smarty_l->assign("tituloMenu", "Menu de Opciones del Usuario");
    $smarty_l->assign("nomGrupo", $nomGrupo);
    $smarty_l->assign("nomUser", $nomUser);
    $smarty_l->assign("msgUser", "Bienvenido a Cordes");
    $smarty_l->assign("menu", $menu);
    $val = $this->output_body;
    $Datos = "
    <div class=\"right_col\" role=\"main\">
      <div class=\"\">
        <div class=\"title_left\">
        <h3> ASEGURADO: " . $asegurado . "</h3>
        </div>
            <div class=\"clearfix\"></div>
              <div class=\"row\">
                <div class=\"col-md-12 col-sm-12\">
                  <div class=\"x_panel\">
                    <h2>PERTENECE A LA EMPRESA: " . $empresa . "
                    <br/>TIPO DE ASEGURADO: " . $tipoasegurado . "
                    <br/>MATRICULA: " . $matricula . "</h2>
                    <div class=\"x_content\">
                      <div class=\"col-md-8 col-lg-8 col-sm-7\">
                        <blockquote>
                        <p>Para el Registro de Ficha Presione el Boton de Registro de Ficha y Siga las siguientes Indicaciones.</p>
                        <span class=\"badge badge-danger\">Solo Puede Hacer Reserva de Fichas 1 por dia</span>
                        </blockquote>
                        <div class=\"col-md-8 col-lg-3 col-sm-7\">
                        <input type=\"button\" onClick=\"location.href='GestionFicha.php?opcion=1'\" class=\"btn btn-primary\" value=\"REGISTRAR FICHA\">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>
    </div>  
    ";
    if ($val ==  "<center><h1>BIENVENIDO A CAJA DE SALUD CORDES</h1></center>") {
      $smarty_l->assign("body", $Datos);
    } else {
      $smarty_l->assign("body", $this->output_body);
    }
    
    

    #Visualizar la informacion en el TEMPLATE
    $smarty_l->assign("nomGrupo", $nomGrupo);
    $smarty_l->assign("nomUser", $nomUser);
    $smarty_l->assign("msgUser", "Bienvenido a Caja de Salud de Cordes");
    $smarty_l->assign("menu", $menu);

    #Visualizar la informacion en el TEMPLATE
    $smarty_l->display('../templates/FrmOpcion.html');
  }

  //Cerrar Sesion del Sistema
  function Salir()
  {
    $msg = "<center>";
    $msg .= "AGRADECEMOS SU VISITA AL SITIO CAJA DE SALUD CORDES<br>";
    $msg .= "</center>";
    session_unset();
    session_destroy();
    $smarty4 = new Smarty;
    $smarty4->compile_check = true;
    $smarty4->debugging = false;
    $smarty4->display('../templates/Login.html');
  }
}
