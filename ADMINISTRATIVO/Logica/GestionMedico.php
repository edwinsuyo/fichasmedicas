<?php

include('GestionLogin.php');

class CGestionMedico
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
                    try {
                        $sql = "SELECT * from medico;";
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                        $lmedico = $db->Execute($sql);
                        $db->Close();

                        if ($lmedico === false) {
                            return $this->showMensaje("Listar Fichas Medica", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                        } else {
                            $smarty2 = new Smarty;
                            $smarty2->compile_check = true;
                            $smarty2->debugging = false;
                            $smarty2->assign("titulo", "Registrar Ficha");
                            $smarty2->assign("gestor", "GestionHorario.php");
                            $smarty2->assign("lmedico", $lmedico->GetArray());
                            $smarty2->assign("opcion", "1");
                            #Visualizar la informacion en el TEMPLATE
                            return $smarty2->fetch('../templates/FrmListarMedico.html');
                        }
                    } catch (Exception $e) {
                        return $this->showMensaje("Listar Fichas Medicas", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql . ' ' . $e, "ERROR al Listar...!!");
                    }
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //LISTAR

                    $sql = "SELECT especialidad as nombre
                from medico
                group by especialidad;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lespecialidad = $db->Execute($sql);
                    $db->Close();


                    $fechaActual = date('d-m-Y');
                    $idusuario = $_SESSION['idusuarioadm'];

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
            case 3: { //LISTAR

                    $sql = "SELECT * from Ficha_lista;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if ($rs === false) {
                        return $this->showMensaje("Listar Fichas Asegurado", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {
                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("listaasegurado", $rs->GetArray());
                        $smarty2->assign("titulo", "Listado de Ficha Asegurado");
                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListaFicha.html');
                    }
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


$oAdmUsr = new CGestionMedico();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
