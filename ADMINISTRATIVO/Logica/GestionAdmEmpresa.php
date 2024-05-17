<?php

include('GestionLogin.php');

class CGestionAdmEmpresa
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
            case 1: { //MENU

                    $idusuario = $_SESSION['idusuarioadm'];
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Reporte Afiliado");
                    $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "40");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmMenuEmpresa.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //listar Todos Empresa

                    $sql = "SELECT * FROM lista_afiliados";

                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lEmpresa = $db->Execute($sql);
                    $db->Close();
                    //echo $sql;
                    $idusuario = $_SESSION['idusuarioadm'];

                    if ($lEmpresa === false) {
                        return $this->showMensaje("Listar Empresas", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Empresa");
                        $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                        $smarty2->assign("lEmpresa", $lEmpresa->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "15");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListarEmpresa.html');
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
                    $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "40");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmReporteEmpresa.html');
                }
                break;
            case 4: { //Buscar Estado Afiliado

                    $idusuario = $_SESSION['idusuarioadm'];
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Reporte Afiliado");
                    $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "40");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmReporteEmpresa.html');
                }
                break;

            case 5: { //Formulario Reg Horario

                    $idEmpresa = $_GET['id'];

                    $sql = "SELECT me.id,
                    CONCAT(case when me.genero='F' then 'Dra. ' else 'Dr. ' end ,me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombreEmpresa 
                    FROM Empresa me
                    WHERE me.id=$idEmpresa;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lEmpresa = $db->Execute($sql);
                    $db->Close();

                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $sql = "SELECT * from horario;";
                    $lhorario = $db->Execute($sql);
                    $db->Close();

                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($lEmpresa === false) {
                        return $this->showMensaje("Listar Empresas", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Empresa");
                        $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                        $smarty2->assign("lEmpresa", $lEmpresa->GetArray());
                        $smarty2->assign("lhorario", $lhorario->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("idEmpresa", $idEmpresa);
                        $smarty2->assign("opcion", "11");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegHorario.html');
                    }
                }
                break;
            case 6: { //Formulario Reg Dia

                    $idEmpresa = $_GET['id'];
                    $sql = "SELECT me.id as idEmpresa,
                    case when me.genero='F' then  CONCAT('Dra.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre))  
                    ELSE  CONCAT('Dr.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre))  end as nombre,
                    ds.id as idsemana,ds.nombre as nombredia,dm.estado FROM diaEmpresa dm
                    inner join Empresa me on me.id=dm.idEmpresa
                    inner join diasemana ds on ds.id=dm.iddiasemana
                    where me.id=$idEmpresa
                    union all 
                    SELECT 0 as idEmpresa,'dia no seleccionado' as nombre,ds.id as idsemana,ds.nombre as nombredia,ds.estado
                    from diasemana ds
                    where ds.id not in ( select ds.id from Empresa me 
                                       inner join diaEmpresa dm on dm.idEmpresa=me.id
                                       inner join diasemana ds on ds.id= dm.iddiasemana
                                       where me.id=$idEmpresa)
                    order by idsemana asc";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $ldiasemana = $db->Execute($sql);


                    $sql = "SELECT me.id,
                    CONCAT(case when me.genero='F' then 'Dra. ' else 'Dr. ' end ,me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombreEmpresa 
                    FROM Empresa me
                    WHERE me.id=$idEmpresa;";
                    $lEmpresa = $db->Execute($sql);
                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($ldiasemana === false) {
                        return $this->showMensaje("Registrar Dia De Trabajo de los Empresas", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar <BR>" . $sql, "ERROR al Registrar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Empresa");
                        $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                        $smarty2->assign("ldiasemana", $ldiasemana->GetArray());
                        $smarty2->assign("lEmpresa", $lEmpresa->GetArray());
                        $smarty2->assign("idEmpresa", $idEmpresa);
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "12");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegDia.html');
                    }
                }
                break;
            case 7: {
                    try {

                        $idEmpresa = $_GET['id'];
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);

                        $sql = "SELECT me.*,es.id as idespecialidad,es.nombre as nombreespecialidad 
                            FROM Empresa me
                            inner join Empresaespecialidad mes on mes.idEmpresa=me.id
                            inner join especialidad es on es.id=mes.idespecialidad
                            WHERE me.id=$idEmpresa;";
                        echo $sql;
                        $lEmpresa = $db->Execute($sql);

                        $sql = "SELECT * from especialidad;";
                        $lespecialidad = $db->Execute($sql);
                        echo $sql;
                        $db->Close();

                        $idusuario = $_SESSION['idusuarioadm'];




                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Modificar Empresa");
                        $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                        $smarty2->assign("lEmpresa", $lEmpresa->GetArray());
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idEmpresa", $idEmpresa);
                        $smarty2->assign("opcion", "15");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmModEmpresa.html');
                    } catch (Exception $er) {
                        return $this->showMensaje("Modificiar Empresas", "ERROR AL MODIFICAR", "Ocurrio un Error al modificar <BR>" . $er, "ERROR al Modificar...!!");
                    }
                }
                break;

            case 10: { //Registrar Empresa
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $lgenero = $_POST['lgenero'];
                    $lespecialidad = $_POST['lespecialidad'];


                    $sql = "INSERT into Empresa (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) 
                    values('$codigo','$nombre','$apellido_p','$apellido_m','$lgenero','ninguno',0) ";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $Empresa = $nombre . " ";
                    $Empresa = $Empresa . $apellido_p . " ";
                    $Empresa = $Empresa . $apellido_m . " ";
                    if ($rs === false) {

                        return $this->showMensaje("Registrar Empresa", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Empresa : " . $Empresa . "<BR>" . $sql, "ERROR al Registrar...!!");
                    } else {
                        $me = $db->Insert_ID();
                        $sql = "INSERT into Empresaespecialidad (idEmpresa,idespecialidad,estado) values('$me','$lespecialidad',0) ";
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Registrar Empresa", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Empresa : " . $Empresa . "<BR>" . $sql, "ERROR al Registrar...!!");
                        } else {
                            return $this->showMensaje("Registrar Empresa", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos del Empresa : " . $Empresa, "  Empresa Empresa  Registrado..!!!");
                        }
                    }
                    $db->Close();
                }
                break;

            case 11: { //Registro de Horario

                    $idEmpresa = $_POST['idEmpresa'];
                    $idhorario = $_POST['lhorario'];
                    $hora_inicio = $_POST['hora_inicio'];
                    $hora_final = $_POST['hora_final'];
                    $duracion = $_POST['duracion'];
                    $cupo = $_POST['cupo'];


                    $sql = "SELECT * FROM horarioEmpresa where idEmpresa=$idEmpresa and idhorario=$idhorario;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $arr = $rs->Getrows();
                    $resultado = $arr[0]["id"];
                    if (empty($resultado)) {
                        $sql = "INSERT INTO horarioEmpresa (idhorario,idEmpresa,estado) values ($idhorario,$idEmpresa,0);";
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                        } else {
                            $idhorarionuevo = $db->Insert_ID();
                            $sql = "INSERT INTO cupo (idhorarioEmpresa,horainicio,horafinal,timeconsulta,cupo,estado) values ($idhorarionuevo,'$hora_inicio','$hora_final',$duracion,$cupo,0);";
                            $rs = $db->Execute($sql);
                            $db->Close();
                            if ($rs === false) {
                                return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                            } else {
                                return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Horario Registrado...!!");
                            }
                        }
                    } else {
                        $sql = "INSERT INTO cupo (idhorarioEmpresa,horainicio,horafinal,timeconsulta,cupo,estado) values ($idhorario,'$hora_inicio','$hora_final',$duracion,$cupo,0);";
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
            case 12: { //Regisro de dia de trabajo de Empresal

                    $idEmpresa = $_POST['idEmpresa'];
                    $ldias = $_POST['check_list'];

                    $sql = "UPDATE diaEmpresa SET estado=1 where idEmpresa=$idEmpresa;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    foreach ($ldias as $iddiasemana) {
                        $sql = "SELECT * FROM diaEmpresa where idEmpresa=$idEmpresa and iddiasemana=$iddiasemana;";
                        $rs = $db->Execute($sql);
                        $arr = $rs->Getrows();
                        $resultado = $arr[0]["id"];
                        if (empty($resultado)) {
                            $sql = "INSERT INTO diaEmpresa (iddiasemana,idEmpresa,estado) values ($iddiasemana,$idEmpresa,0);";
                            $rs = $db->Execute($sql);
                        } else {
                            $sql = "UPDATE diaEmpresa set estado=0 where iddiasemana=$iddiasemana and idEmpresa=$idEmpresa;";
                            $rs = $db->Execute($sql);
                        }
                    }
                    $db->Close();
                    return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Dia de Trabajo del Empresa Registrado...!!");
                }
                break;
            case 13: { //Regisro de dia de trabajo de Empresal

                    $idEmpresa = $_GET['id'];
                    $sql = "UPDATE Empresa SET estado=1 where id=$idEmpresa;";
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
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Empresa Registrado...!!");
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
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Empresa Registrado...!!");
                    }
                }
                break;
            case 14: { //Regisro de dia de trabajo de Empresa

                    $idEmpresa = $_GET['id'];

                    $sql = "UPDATE Empresa SET estado=0 where id=$idEmpresa;";
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
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Empresa Registrado...!!");
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
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Empresa Registrado...!!");
                    }
                }
                break;
            case 15: { //Modificar Empresa

                    $idEmpresa = $_POST['id'];
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $lgenero = $_POST['lgenero'];
                    $lespecialidad = $_POST['lespecialidad'];

                    $sql = "UPDATE Empresa SET codigo='$codigo' ,nombre='$nombre',apellido_p='$apellido_p',apellido_m='$apellido_m',genero='$lgenero' where id=$idEmpresa;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $db->BeginTrans();
                    $rs = $db->Execute($sql);
                    echo $sql;
                    if (!empty($rs)) {
                        $sql = "UPDATE Empresaespecialidad SET idespecialidad=$lespecialidad where idEmpresa=$idEmpresa";
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
                            return $this->showMensaje("Exito al Modificar", "EXITO AL MODIFICAR", $hiper, "Empresa modificado correctamente...!!");
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
                /***************MENU DE EMPRESA**************************/
            case 40: {
                    //FORMULARIO DE REGISTRO DE EMPRESA
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                    $smarty2->assign("opcion", "50");
                    $smarty2->assign("mensaje", "");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmRegEmpresa.html');
                }
                break;
            case 41: {
                    //MODIFICAR EMPRESA
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                    $smarty2->assign("opcion", "51");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmModEmpresa.html');
                }
                break;
            case 42: {

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListarEdad.html');
                }
                break;
            case 50: {
                    try {
                        //FORMULARIO DE REGISTRO DE EMPRESA
                        $nombre = $_POST['empresa'];
                        $codigoempleador = $_POST['nropatronal'];
                        $representante = $_POST['representante'];
                        $telefono = $_POST['telefono'];
                        $direccion = $_POST['direccion'];
                        $regional = $_POST['regional'];
                        $fechainicio = $_POST['fechainicio'];
                        $fechafinal = $_POST['fechafinal'];
                        //$fechaingreso = "";
                        $estado = 0;

                        $sql = "INSERT into empresa (nombre,codigoempleador,representante,telefono,direccion,regional,fechainicio,fechafinal,fechaingreso,estado) 
                        values('$nombre','$codigoempleador','$representante','$telefono','$direccion','$regional','$fechainicio','$fechafinal',now(),$estado) ";
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                        $rs = $db->Execute($sql);
                        $db->Close();
                        $Empresa = $nombre . " ";
                        if ($rs === false) {
                            return $this->showMensaje("Registrar Empresa", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Empresa : " . $Empresa . "<BR>" . $sql, "ERROR al Registrar...!!");
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

                            $smarty2 = new Smarty;
                            $smarty2->compile_check = true;
                            $smarty2->debugging = false;
                            $smarty2->assign("gestor", "GestionAdmEmpresa.php");
                            $smarty2->assign("opcion", "50");
                            #Visualizar la informacion en el TEMPLATE
                            $smarty2->assign("mensaje", $hiper);
                            return $smarty2->fetch('../templates/FrmRegEmpresa.html');
                            //return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Empresa Registrado...!!");
                            //return $this->showMensaje("Registrar Empresa", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos del Empresa : " . $Empresa, "  Empresa Empresa  Registrado..!!!");                            
                        }
                    } catch (Exception $ex) {
                        return $this->showMensaje("Error Empresas", "ERROR AL MODIFICAR", "Ocurrio un Error al modificar <BR>" . $ex, "ERROR al Modificar...!!");
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


$oAdmUsr = new CGestionAdmEmpresa();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
