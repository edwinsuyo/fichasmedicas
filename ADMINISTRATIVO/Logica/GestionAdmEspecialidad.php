<?php

include('GestionLogin.php');

class CGestionAdmEspecialidad
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

                    $idusuario = $_SESSION['idusuarioadm'];

                    $sql = "SELECT *
                    from especialidad
                    order by nombre asc;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lespecialidad = $db->Execute($sql);
                    $db->Close();

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar especialidad");
                    $smarty2->assign("gestor", "GestionAdmEspecialidad.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmRegEspecialidad.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------

            case 2: { //LISTAR


                    $sql = "SELECT *
                            from especialidad
                            order by nombre asc;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lespecialidad = $db->Execute($sql);
                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($lespecialidad === false) {
                        return $this->showMensaje("Listar Medicos", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar especialidad");
                        $smarty2->assign("gestor", "especialidad.php");
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idusuario", $idusuario);

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListarEspecialidad.html');
                    }
                }
                break;

            case 10: { //registrar

                    $especialidad = $_POST['especialidad'];


                    $sql = "INSERT INTO especialidad (nombre,estado) VALUES ('$especialidad',0)";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $especialidad = $especialidad . " ";

                    if ($rs === false) {
                        return $this->showMensaje("Registrar especialidad", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar  : " . $especialidad . "<BR>" . $sql, "ERROR al Registrar...!!");
                    } else {
                        return $this->showMensaje("Registrar especialidad", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos : " . $especialidad, "  Especialidad  Registrado..!!!");
                    }

                    $db->Close();
                }
                break;
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


$oAdmUsr = new CGestionAdmEspecialidad();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
