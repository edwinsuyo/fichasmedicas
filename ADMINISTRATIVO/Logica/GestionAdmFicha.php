<?php

include('GestionLogin.php');

class CGestionAdmFicha
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

                    $sql = "SELECT re.id,re.fecha
                    ,re.turno
                    ,re.horareserva
                    ,pa.carnet,pa.matricula
                    ,pa.nombre,pa.empresa
                    ,pa.parentesco,me.codigo
                    ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                    ,es.nombre as especialidad 
                    FROM reserva re
                    inner join paciente  pa on pa.id=re.idpaciente
                    inner join medico me on me.id=re.idmedico
                    inner join medicoespecialidad mees on mees.idmedico=me.id
                    inner join especialidad es on es.id= mees.idespecialidad
                    order by re.fecha DESC,re.id asc,re.horareserva asc;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lficha = $db->Execute($sql);

                    $sql = "SELECT id,UPPER(nombre) as nombre
                    from especialidad
                    order by nombre asc;";
                    $lespecialidad = $db->Execute($sql);

                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar Ficha");
                    $smarty2->assign("gestor", "Ficha.php");
                    $smarty2->assign("lficha", $lficha->GetArray());
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListarFicha.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //LISTAR

                    $sql = "SELECT re.id,re.fecha
                            ,re.turno
                            ,re.horareserva
                            ,pa.carnet,pa.matricula
                            ,pa.nombre,pa.empresa
                            ,pa.parentesco,me.codigo
                            ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                            ,es.nombre as especialidad 
                            FROM reserva re
                            inner join paciente  pa on pa.id=re.idpaciente
                            inner join medico me on me.id=re.idmedico
                            inner join medicoespecialidad mees on mees.idmedico=me.id
                inner join especialidad es on es.id= mees.idespecialidad
                order by re.fecha DESC,re.id asc,re.horareserva asc;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lficha = $db->Execute($sql);

                    $sql = "SELECT id,UPPER(nombre) as nombre
                from especialidad
                order by nombre asc;";
                    $lespecialidad = $db->Execute($sql);

                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar Ficha");
                    $smarty2->assign("gestor", "Ficha.php");
                    $smarty2->assign("lficha", $lficha->GetArray());
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListarFicha.html');
                }
                break;
            case 3: {

                    try {
                        $sql = "SELECT re.id,re.fecha
                    ,re.turno
                    ,re.horareserva
                    ,pa.carnet,pa.matricula
                    ,pa.nombre,pa.empresa
                    ,pa.parentesco,me.codigo
                    ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                    ,es.nombre as especialidad 
                    FROM reserva re
                    inner join paciente  pa on pa.id=re.idpaciente
                    inner join medico me on me.id=re.idmedico
                    inner join medicoespecialidad mees on mees.idmedico=me.id
                    inner join especialidad es on es.id= mees.idespecialidad
                    order by re.fecha DESC,re.id asc,re.horareserva asc;";
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                        $lficha = $db->Execute($sql);

                        $sql = "SELECT id,UPPER(nombre) as nombre
                    from especialidad
                    order by nombre asc;";
                        $lespecialidad = $db->Execute($sql);

                        $db->Close();



                        $idusuario = $_SESSION['idusuarioadm'];

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Ficha");
                        $smarty2->assign("gestor", "Ficha.php");
                        $smarty2->assign("lficha", $lficha->GetArray());
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "10");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListarFicha.html');
                    } catch (Exception $ex) {

                        $hiper = "<script>      
                        Swal.fire({
                            icon: 'success',
                            title: 'MODIFICADO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>";

                        return $this->showMensaje("Error al Listar las Fichas Medicas", "ERROR AL LISTAR", $hiper . $ex . "<BR>", "Listar...!!");
                    }
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


$oAdmUsr = new CGestionAdmFicha();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
