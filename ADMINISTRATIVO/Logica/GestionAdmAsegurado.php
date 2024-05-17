<?php

include('GestionLogin.php');

class CGestionAdmAsegurado
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

                    $sql = "SELECT * from empresa;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lempresa = $db->Execute($sql);

                    $sql ="SELECT * FROM parentesco where nombre!='TITULAR' order by nombre asc";
                    $lparentesco = $db->Execute($sql);
                    $db->Close();

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar Asegurado");
                    $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("lempresa", $lempresa->GetArray());
                    $smarty2->assign("lparentesco", $lparentesco->GetArray());
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmRegAsegurado.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //listar Todos Asegurado

                    $sql = "SELECT * FROM lista_afiliados";

                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lasegurado = $db->Execute($sql);
                    $db->Close();
                    //echo $sql;
                    $idusuario = $_SESSION['idusuarioadm'];

                    if ($lasegurado === false) {
                        return $this->showMensaje("Listar Asegurados", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Asegurado");
                        $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                        $smarty2->assign("lasegurado", $lasegurado->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "15");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListarAsegurado.html');
                    }
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------               
            case 3: { //Reporte

                    $idusuario = $_SESSION['idusuarioadm'];
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Reporte Afiliado");
                    $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "40");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmReporteAsegurado.html');
                }
                break;
            case 4: { //Buscar Estado Afiliado

                    $idusuario = $_SESSION['idusuarioadm'];
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Reporte Afiliado");
                    $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "40");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmReporteAsegurado.html');
                }
                break;
                
            case 5: { //Formulario Reg Horario

                    $idAsegurado = $_GET['id'];

                    $sql = "SELECT me.id,
                    CONCAT(case when me.genero='F' then 'Dra. ' else 'Dr. ' end ,me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombreAsegurado 
                    FROM Asegurado me
                    WHERE me.id=$idAsegurado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lAsegurado = $db->Execute($sql);
                    $db->Close();

                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $sql = "SELECT * from horario;";
                    $lhorario = $db->Execute($sql);
                    $db->Close();

                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($lAsegurado === false) {
                        return $this->showMensaje("Listar Asegurados", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Asegurado");
                        $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                        $smarty2->assign("lAsegurado", $lAsegurado->GetArray());
                        $smarty2->assign("lhorario", $lhorario->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("idAsegurado", $idAsegurado);
                        $smarty2->assign("opcion", "11");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegHorario.html');
                    }
                }
                break;
            case 6: { //Formulario Reg Dia

                    $idAsegurado = $_GET['id'];
                    $sql = "SELECT me.id as idAsegurado,
                    case when me.genero='F' then  CONCAT('Dra.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre))  
                    ELSE  CONCAT('Dr.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre))  end as nombre,
                    ds.id as idsemana,ds.nombre as nombredia,dm.estado FROM diaAsegurado dm
                    inner join Asegurado me on me.id=dm.idAsegurado
                    inner join diasemana ds on ds.id=dm.iddiasemana
                    where me.id=$idAsegurado
                    union all 
                    SELECT 0 as idAsegurado,'dia no seleccionado' as nombre,ds.id as idsemana,ds.nombre as nombredia,ds.estado
                    from diasemana ds
                    where ds.id not in ( select ds.id from Asegurado me 
                                       inner join diaAsegurado dm on dm.idAsegurado=me.id
                                       inner join diasemana ds on ds.id= dm.iddiasemana
                                       where me.id=$idAsegurado)
                    order by idsemana asc";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $ldiasemana = $db->Execute($sql);


                    $sql = "SELECT me.id,
                    CONCAT(case when me.genero='F' then 'Dra. ' else 'Dr. ' end ,me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombreAsegurado 
                    FROM Asegurado me
                    WHERE me.id=$idAsegurado;";
                    $lAsegurado = $db->Execute($sql);
                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($ldiasemana === false) {
                        return $this->showMensaje("Registrar Dia De Trabajo de los Asegurados", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar <BR>" . $sql, "ERROR al Registrar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Asegurado");
                        $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                        $smarty2->assign("ldiasemana", $ldiasemana->GetArray());
                        $smarty2->assign("lAsegurado", $lAsegurado->GetArray());
                        $smarty2->assign("idAsegurado", $idAsegurado);
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "12");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegDia.html');
                    }
                }
                break;
            case 7: {
                    try {

                        $idAsegurado = $_GET['id'];
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);

                        $sql = "SELECT me.*,es.id as idespecialidad,es.nombre as nombreespecialidad 
                            FROM Asegurado me
                            inner join Aseguradoespecialidad mes on mes.idAsegurado=me.id
                            inner join especialidad es on es.id=mes.idespecialidad
                            WHERE me.id=$idAsegurado;";
                        echo $sql;
                        $lAsegurado = $db->Execute($sql);

                        $sql = "SELECT * from especialidad;";
                        $lespecialidad = $db->Execute($sql);
                        echo $sql;
                        $db->Close();

                        $idusuario = $_SESSION['idusuarioadm'];




                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Modificar Asegurado");
                        $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                        $smarty2->assign("lAsegurado", $lAsegurado->GetArray());
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idAsegurado", $idAsegurado);
                        $smarty2->assign("opcion", "15");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmModAsegurado.html');
                    } catch (Exception $er) {
                        return $this->showMensaje("Modificiar Asegurados", "ERROR AL MODIFICAR", "Ocurrio un Error al modificar <BR>" . $er, "ERROR al Modificar...!!");
                    }
                }
                break;

            case 10: { //Registrar Asegurado
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $lgenero = $_POST['lgenero'];
                    $lespecialidad = $_POST['lespecialidad'];


                    $sql = "INSERT into Asegurado (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) 
                    values('$codigo','$nombre','$apellido_p','$apellido_m','$lgenero','ninguno',0) ";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $Asegurado = $nombre . " ";
                    $Asegurado = $Asegurado . $apellido_p . " ";
                    $Asegurado = $Asegurado . $apellido_m . " ";
                    if ($rs === false) {

                        return $this->showMensaje("Registrar Asegurado", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Asegurado : " . $Asegurado . "<BR>" . $sql, "ERROR al Registrar...!!");
                    } else {
                        $me = $db->Insert_ID();
                        $sql = "INSERT into Aseguradoespecialidad (idAsegurado,idespecialidad,estado) values('$me','$lespecialidad',0) ";
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Registrar Asegurado", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Asegurado : " . $Asegurado . "<BR>" . $sql, "ERROR al Registrar...!!");
                        } else {
                            return $this->showMensaje("Registrar Asegurado", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos del Asegurado : " . $Asegurado, "  Asegurado Asegurado  Registrado..!!!");
                        }
                    }
                    $db->Close();
                }
                break;

            case 11: { //Registro de Horario

                    $idAsegurado = $_POST['idAsegurado'];
                    $idhorario = $_POST['lhorario'];
                    $hora_inicio = $_POST['hora_inicio'];
                    $hora_final = $_POST['hora_final'];
                    $duracion = $_POST['duracion'];
                    $cupo = $_POST['cupo'];


                    $sql = "SELECT * FROM horarioAsegurado where idAsegurado=$idAsegurado and idhorario=$idhorario;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $arr = $rs->Getrows();
                    $resultado = $arr[0]["id"];
                    if (empty($resultado)) {
                        $sql = "INSERT INTO horarioAsegurado (idhorario,idAsegurado,estado) values ($idhorario,$idAsegurado,0);";
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                        } else {
                            $idhorarionuevo = $db->Insert_ID();
                            $sql = "INSERT INTO cupo (idhorarioAsegurado,horainicio,horafinal,timeconsulta,cupo,estado) values ($idhorarionuevo,'$hora_inicio','$hora_final',$duracion,$cupo,0);";
                            $rs = $db->Execute($sql);
                            $db->Close();
                            if ($rs === false) {
                                return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                            } else {
                                return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Horario Registrado...!!");
                            }
                        }
                    } else {
                        $sql = "INSERT INTO cupo (idhorarioAsegurado,horainicio,horafinal,timeconsulta,cupo,estado) values ($idhorario,'$hora_inicio','$hora_final',$duracion,$cupo,0);";
                        $rs = $db->Execute($sql);
                        $db->Close();
                        if ($rs === false) {
                            return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                        } else {
                            return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Horario Registrado...!!");
                        }
                    }
                }
                break;
            case 12: { //Regisro de dia de trabajo de Aseguradol

                    $idAsegurado = $_POST['idAsegurado'];
                    $ldias = $_POST['check_list'];

                    $sql = "UPDATE diaAsegurado SET estado=1 where idAsegurado=$idAsegurado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    foreach ($ldias as $iddiasemana) {
                        $sql = "SELECT * FROM diaAsegurado where idAsegurado=$idAsegurado and iddiasemana=$iddiasemana;";
                        $rs = $db->Execute($sql);
                        $arr = $rs->Getrows();
                        $resultado = $arr[0]["id"];
                        if (empty($resultado)) {
                            $sql = "INSERT INTO diaAsegurado (iddiasemana,idAsegurado,estado) values ($iddiasemana,$idAsegurado,0);";
                            $rs = $db->Execute($sql);
                        } else {
                            $sql = "UPDATE diaAsegurado set estado=0 where iddiasemana=$iddiasemana and idAsegurado=$idAsegurado;";
                            $rs = $db->Execute($sql);
                        }
                    }
                    $db->Close();
                    return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Dia de Trabajo del Asegurado Registrado...!!");
                }
                break;
            case 13: { //Regisro de dia de trabajo de Aseguradol

                    $idAsegurado = $_GET['id'];
                    $sql = "UPDATE Asegurado SET estado=1 where id=$idAsegurado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if (empty($rs)) {
                        $hiper = "<script>
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>

                        Swal.fire({
                            icon: 'error',
                            title: 'REGISTRADO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                              </script>";
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Asegurado Registrado...!!");
                    } else {
                        $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'REGISTRADO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>";
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Asegurado Registrado...!!");
                    }
                }
                break;
            case 14: { //Regisro de dia de trabajo de Asegurado

                    $idAsegurado = $_GET['id'];

                    $sql = "UPDATE Asegurado SET estado=0 where id=$idAsegurado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if (empty($rs)) {
                        $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        alert(\"este texto es el que modificas1\");
                        event.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Tiene que seleccionar el turno para el Registro de la Ficha!'
                        });
                              </script>";
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Asegurado Registrado...!!");
                    } else {
                        $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        alert(\"este texto es el que modificas1\");
                        Swal.fire({
                            icon: 'success',
                            title: 'REGISTRADO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>";
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Asegurado Registrado...!!");
                    }
                }
                break;
            case 15: { //Modificar Asegurado

                    $idAsegurado = $_POST['id'];
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $lgenero = $_POST['lgenero'];
                    $lespecialidad = $_POST['lespecialidad'];

                    $sql = "UPDATE Asegurado SET codigo='$codigo' ,nombre='$nombre',apellido_p='$apellido_p',apellido_m='$apellido_m',genero='$lgenero' where id=$idAsegurado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $db->BeginTrans();
                    $rs = $db->Execute($sql);
                    echo $sql;
                    if (!empty($rs)) {
                        $sql = "UPDATE Aseguradoespecialidad SET idespecialidad=$lespecialidad where idAsegurado=$idAsegurado";
                        $rs = $db->Execute($sql);
                        if (empty($rs)) {
                            $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        event.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error al Modificar!',
                            timer: 1500
                        });
                        </script>";
                            $db->RollbackTrans();
                            $db->Close();
                            return $this->showMensaje("Error al Modificar", "ERROR AL MODIFICAR", $hiper, "Error al modificado...!!");
                        } else {
                            $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        event.preventDefault();
                        Swal.fire({
                            icon: 'success',
                            title: 'MODIFICADO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>";
                            $db->CommitTrans();
                            $db->Close();
                            return $this->showMensaje("Exito al Modificar", "EXITO AL MODIFICAR", $hiper, "Asegurado modificado correctamente...!!");
                        }
                    } else {
                        $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        event.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Error al Modificar!',
                            timer: 1500
                        });
                        </script>";
                        $db->RollbackTrans();
                        $db->Close();
                        return $this->showMensaje("Error al Modificar", "ERROR AL MODIFICAR", $hiper, "Error al modificado...!!");
                    }
                }
                break;
                /***************Reporte de Afiliacion**************************/
            case 40: {

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmBuscarAfiliado.html');
                }
                break;
            case 41: {

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmVigenciaEmpresa.html');
                }
                break;
            case 42: {

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("gestor", "GestionAdmAsegurado.php");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListarEdad.html');
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


$oAdmUsr = new CGestionAdmAsegurado();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
