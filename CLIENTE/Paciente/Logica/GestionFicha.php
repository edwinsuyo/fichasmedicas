<?php

include('GestionLogin.php');

class CGestionFicha
{
    function showMensaje($titulo, $msg, $hiper, $pie)
    {
        //echo "showMensaje($titulo,$msg,$hiper,$pie)<br>";
        $smarty_msg = new Smarty;
        $smarty_msg->compile_check = true;
        $smarty_msg->debugging = false;
        $smarty_msg->assign("tituloMensaje", $titulo);
        $smarty_msg->assign("Mensaje", $pie);
        $smarty_msg->assign("detalle", $msg);
        $smarty_msg->assign("enlaceback", $hiper);
        #Visualizar la informacion en el TEMPLATE
        return $smarty_msg->fetch('../templates/FrmMensaje.html');
    }
    function ejecutar($op)
    {
        switch ($op) {
            case 1: { //registrar

                    $sql = "SELECT id,UPPER(nombre) as nombre
                            from especialidad
                            group by nombre;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lespecialidad = $db->Execute($sql);
                    $db->Close();


                    $fechaActual = date('d-m-Y');
                    $idusuario = $_SESSION['idusuario'];

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar Ficha");
                    $smarty2->assign("gestor", "Ficha.php");
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("fechaActual", $fechaActual);
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmRegFicha.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //LISTAR

                $sql = "SELECT id,UPPER(nombre) as nombre
                from especialidad
                group by nombre;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lespecialidad = $db->Execute($sql);
                    $db->Close();


                    $fechaActual = date('d-m-Y');
                    $idusuario = $_SESSION['idusuario'];

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar Ficha");
                    $smarty2->assign("gestor", "Ficha.php");
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("fechaActual", $fechaActual);
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListaFicha.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------ 
                              
            default: {
                    print "<pre>";
                    print_r($GLOBALS['_REQUEST']);
                    print "</pre>";
                    $msg = "Fallo en la peticion  ..." . $op;
                    return $msg;
                }
        }
    }
};


$oAdmUsr = new CGestionFicha();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuario'], $_SESSION['contrasena']);
