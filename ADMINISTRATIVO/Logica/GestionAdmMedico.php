<?php

include('GestionLogin.php');

class CGestionAdmMedico
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


                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);

                    $sql = "SELECT id,UPPER(nombre) as nombre
                    from especialidad
                    order by nombre asc;";
                    $lespecialidad = $db->Execute($sql);

                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar Medico");
                    $smarty2->assign("gestor", "GestionAdmMedico.php");
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("idusuario", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmRegMedico.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //MODIFICAR MEDICO


                    $sql = "SELECT me.id,UPPER(me.codigo) as codigo, case when me.genero='F' then CONCAT('Dra.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre)) ELSE CONCAT('Dr.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre)) end as nombre, UPPER(es.nombre) as especialidad,UPPER(me.direccion),me.estado
                    , case when ds.nombre is not null then GROUP_CONCAT(DISTINCT (ds.nombre) order by ds.id ASC SEPARATOR ' | ') else 'No tiene Dias de Trabajo' end as diasemana
                    , case when (h.turno is not null) or (cu.horainicio is not null) then GROUP_CONCAT(DISTINCT (CONCAT('Turno:',h.turno,',',cu.horainicio,' a ',cu.horafinal)) SEPARATOR ' | ') else 'No tiene Horario' end as horarioturno
                    , case when cu.timeconsulta is not null then GROUP_CONCAT(DISTINCT (CONCAT(cu.timeconsulta, ' min.')) SEPARATOR ' | ')  else 'No tiene Duracion ' end as duracionconsulta 
                    , case when me.genero='F' then 'FEMENINO' else 'MASCULINO' end as genero  
                    , case when (cu.cupo is not null) then GROUP_CONCAT(DISTINCT (CONCAT('Turno:',h.turno,', Cupo: ',cu.cupo)) SEPARATOR ' | ') else 'No tiene Cupo Asignado' end as cupo
                    from medico me
                    left JOIN medicoespecialidad mp on mp.idmedico=me.id 
                    left JOIN especialidad es on es.id=mp.idespecialidad 
                    left join diamedico dm on dm.idmedico=me.id 
                    left join diasemana ds on ds.id=dm.iddiasemana
                    left join horariomedico hm on hm.idmedico=me.id
                    left join horario h on h.id=hm.idhorario
                    left join cupo cu on cu.idhorariomedico=hm.id 
                    where me.estado=0 and es.estado=0 and (dm.estado=0 or dm.estado is null) and (cu.estado=0 or cu.estado is null) and (hm.estado=0 or hm.estado is null)and (cu.estado=0 or cu.estado is null)
                    group by me.id,me.codigo,me.apellido_p,me.apellido_m,me.nombre,es.nombre,me.estado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lMedico = $db->Execute($sql);

                    $sql = "SELECT id,UPPER(nombre) as nombre
                    from especialidad
                    group by nombre
                    order by nombre asc;";
                    $lespecialidad = $db->Execute($sql);

                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($lespecialidad === false) {
                        return $this->showMensaje("Listar Medicos", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Medico");
                        $smarty2->assign("gestor", "GestionAdmMedico.php");
                        $smarty2->assign("lmedico", $lMedico->GetArray());
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "15");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmModificarMedico.html');
                    }
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------               
            case 3: { //LISTAR


                    $sql = "SELECT me.id,UPPER(me.codigo) as codigo, case when me.genero='F' then CONCAT('Dra.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre)) ELSE CONCAT('Dr.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre)) end as nombre, UPPER(es.nombre) as especialidad,UPPER(me.direccion),me.estado
                    , case when ds.nombre is not null then GROUP_CONCAT(DISTINCT (ds.nombre) order by ds.id ASC SEPARATOR ' | ') else 'No tiene Dias de Trabajo' end as diasemana
                    , case when (h.turno is not null) or (cu.horainicio is not null) then GROUP_CONCAT(DISTINCT (CONCAT('Turno:',h.turno,',',cu.horainicio,' a ',cu.horafinal)) SEPARATOR ' | ') else 'No tiene Horario' end as horarioturno
                    , case when cu.timeconsulta is not null then GROUP_CONCAT(DISTINCT (CONCAT(cu.timeconsulta, ' min.')) SEPARATOR ' | ')  else 'No tiene Duracion ' end as duracionconsulta 
                    , case when (cu.cupo is not null) then GROUP_CONCAT(DISTINCT (CONCAT('Turno:',h.turno,', Cupo: ',cu.cupo)) SEPARATOR ' | ') else 'No tiene Cupo Asignado' end as cupo
                    from medico me
                    left JOIN medicoespecialidad mp on mp.idmedico=me.id 
                    left JOIN especialidad es on es.id=mp.idespecialidad 
                    left join diamedico dm on dm.idmedico=me.id 
                    left join diasemana ds on ds.id=dm.iddiasemana
                    left join horariomedico hm on hm.idmedico=me.id
                    left join horario h on h.id=hm.idhorario
                    left join cupo cu on cu.idhorariomedico=hm.id 
                    where me.estado=0 and es.estado=0 and (dm.estado=0 or dm.estado is null) and (cu.estado=0 or cu.estado is null) and (hm.estado=0 or hm.estado is null)and (cu.estado=0 or cu.estado is null)
                    group by me.id,me.codigo,me.apellido_p,me.apellido_m,me.nombre,es.nombre,me.estado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lMedico = $db->Execute($sql);

                    $sql = "SELECT id,UPPER(nombre) as nombre
                    from especialidad
                    group by nombre
                    order by nombre asc;";
                    $lespecialidad = $db->Execute($sql);

                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($lespecialidad === false) {
                        return $this->showMensaje("Listar Medicos", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Medico");
                        $smarty2->assign("gestor", "GestionAdmMedico.php");
                        $smarty2->assign("lmedico", $lMedico->GetArray());
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "10");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListarMedico.html');
                    }
                }
                break;
            case 4: { //ELIMINAR

                    $sql = "SELECT me.id,UPPER(me.codigo) as codigo, 
                    case when me.genero='F' then CONCAT('Dra.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre)) ELSE CONCAT('Dr.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre)) end as nombre
                    , UPPER(es.nombre) as especialidad,UPPER(me.direccion),me.estado
                    from medico me
                    left JOIN medicoespecialidad mp on mp.idmedico=me.id 
                    left JOIN especialidad es on es.id=mp.idespecialidad;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if ($rs === false) {
                        return $this->showMensaje("Listar Medicos Asegurado", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {
                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("gestor", "GestionAdmMedico.php");
                        $smarty2->assign("opcion", "13");
                        $smarty2->assign("habilitar", "14");
                        $smarty2->assign("lmedico", $rs->GetArray());
                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmEliminarMedico.html');
                    }
                }
                break;
            case 5: { //Formulario Reg Horario

                    $idmedico = $_GET['id'];

                    $sql = "SELECT me.id,
                    CONCAT(case when me.genero='F' then 'Dra. ' else 'Dr. ' end ,me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombremedico 
                    FROM medico me
                    WHERE me.id=$idmedico;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lmedico = $db->Execute($sql);
                    $db->Close();

                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $sql = "SELECT * from horario;";
                    $lhorario = $db->Execute($sql);
                    $db->Close();

                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($lmedico === false) {
                        return $this->showMensaje("Listar Medicos", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Medico");
                        $smarty2->assign("gestor", "GestionAdmMedico.php");
                        $smarty2->assign("lmedico", $lmedico->GetArray());
                        $smarty2->assign("lhorario", $lhorario->GetArray());
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("idmedico", $idmedico);
                        $smarty2->assign("opcion", "11");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegHorario.html');
                    }
                }
                break;
            case 6: { //Formulario Reg Dia

                    $idmedico = $_GET['id'];
                    $sql = "SELECT me.id as idmedico,
                    case when me.genero='F' then  CONCAT('Dra.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre))  
                    ELSE  CONCAT('Dr.',' ',UPPER(me.apellido_p), ' ',UPPER(me.apellido_m) ,' ' , UPPER(me.nombre))  end as nombre,
                    ds.id as idsemana,ds.nombre as nombredia,dm.estado FROM diamedico dm
                    inner join medico me on me.id=dm.idmedico
                    inner join diasemana ds on ds.id=dm.iddiasemana
                    where me.id=$idmedico
                    union all 
                    SELECT 0 as idmedico,'dia no seleccionado' as nombre,ds.id as idsemana,ds.nombre as nombredia,ds.estado
                    from diasemana ds
                    where ds.id not in ( select ds.id from medico me 
                                       inner join diamedico dm on dm.idmedico=me.id
                                       inner join diasemana ds on ds.id= dm.iddiasemana
                                       where me.id=$idmedico)
                    order by idsemana asc";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $ldiasemana = $db->Execute($sql);


                    $sql = "SELECT me.id,
                    CONCAT(case when me.genero='F' then 'Dra. ' else 'Dr. ' end ,me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombremedico 
                    FROM medico me
                    WHERE me.id=$idmedico;";
                    $lmedico = $db->Execute($sql);
                    $db->Close();



                    $idusuario = $_SESSION['idusuarioadm'];


                    if ($ldiasemana === false) {
                        return $this->showMensaje("Registrar Dia De Trabajo de los Medicos", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar <BR>" . $sql, "ERROR al Registrar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Medico");
                        $smarty2->assign("gestor", "GestionAdmMedico.php");
                        $smarty2->assign("ldiasemana", $ldiasemana->GetArray());
                        $smarty2->assign("lmedico", $lmedico->GetArray());
                        $smarty2->assign("idmedico", $idmedico);
                        $smarty2->assign("idpaciente", $idusuario);
                        $smarty2->assign("opcion", "12");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegDia.html');
                    }
                }
                break;
            case 7: {
                    try {

                        $idmedico = $_GET['id'];
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);

                        $sql = "SELECT me.*,es.id as idespecialidad,es.nombre as nombreespecialidad 
                            FROM medico me
                            inner join medicoespecialidad mes on mes.idmedico=me.id
                            inner join especialidad es on es.id=mes.idespecialidad
                            WHERE me.id=$idmedico;";
                        echo $sql;
                        $lmedico = $db->Execute($sql);

                        $sql = "SELECT * from especialidad;";
                        $lespecialidad = $db->Execute($sql);
                        echo $sql;
                        $db->Close();

                        $idusuario = $_SESSION['idusuarioadm'];




                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Modificar Medico");
                        $smarty2->assign("gestor", "GestionAdmMedico.php");
                        $smarty2->assign("lmedico", $lmedico->GetArray());
                        $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                        $smarty2->assign("idmedico", $idmedico);
                        $smarty2->assign("opcion", "15");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmModMedico.html');
                    } catch (Exception $er) {
                        return $this->showMensaje("Modificiar Medicos", "ERROR AL MODIFICAR", "Ocurrio un Error al modificar <BR>" . $er, "ERROR al Modificar...!!");
                    }
                }
                break;

            case 10: { //Registrar Medico
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $lgenero = $_POST['lgenero'];
                    $lespecialidad = $_POST['lespecialidad'];


                    $sql = "INSERT into medico (codigo,nombre,apellido_p,apellido_m,genero,direccion,estado) 
                    values('$codigo','$nombre','$apellido_p','$apellido_m','$lgenero','ninguno',0) ";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $Medico = $nombre . " ";
                    $Medico = $Medico . $apellido_p . " ";
                    $Medico = $Medico . $apellido_m . " ";
                    if ($rs === false) {

                        return $this->showMensaje("Registrar Medico", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Asegurado : " . $Medico . "<BR>" . $sql, "ERROR al Registrar...!!");
                    } else {
                        $me = $db->Insert_ID();
                        $sql = "INSERT into medicoespecialidad (idmedico,idespecialidad,estado) values('$me','$lespecialidad',0) ";
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Registrar Medico", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Asegurado : " . $Medico . "<BR>" . $sql, "ERROR al Registrar...!!");
                        } else {
                            return $this->showMensaje("Registrar Medico", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos del Asegurado : " . $Medico, "  Medico Asegurado  Registrado..!!!");
                        }
                    }
                    $db->Close();
                }
                break;

            case 11: { //Registro de Horario

                    $idmedico = $_POST['idmedico'];
                    $idhorario = $_POST['lhorario'];
                    $hora_inicio = $_POST['hora_inicio'];
                    $hora_final = $_POST['hora_final'];
                    $duracion = $_POST['duracion'];
                    $cupo = $_POST['cupo'];


                    $sql = "SELECT * FROM horariomedico where idmedico=$idmedico and idhorario=$idhorario;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $arr = $rs->Getrows();
                    $resultado = $arr[0]["id"];
                    if (empty($resultado)) {
                        $sql = "INSERT INTO horariomedico (idhorario,idmedico,estado) values ($idhorario,$idmedico,0);";
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                        } else {
                            $idhorarionuevo = $db->Insert_ID();
                            $sql = "INSERT INTO cupo (idhorariomedico,horainicio,horafinal,timeconsulta,cupo,estado) values ($idhorarionuevo,'$hora_inicio','$hora_final',$duracion,$cupo,0);";
                            $rs = $db->Execute($sql);
                            $db->Close();
                            if ($rs === false) {
                                return $this->showMensaje("Error Insertar", "ERROR AL INSERTAR", "Ocurrio un Error al Insertar : <BR>" . $sql, "ERROR al Insertar...!!");
                            } else {
                                return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Horario Registrado...!!");
                            }
                        }
                    } else {
                        $sql = "INSERT INTO cupo (idhorariomedico,horainicio,horafinal,timeconsulta,cupo,estado) values ($idhorario,'$hora_inicio','$hora_final',$duracion,$cupo,0);";
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
            case 12: { //Regisro de dia de trabajo de medicol

                    $idmedico = $_POST['idmedico'];
                    $ldias = $_POST['check_list'];

                    $sql = "UPDATE diamedico SET estado=1 where idmedico=$idmedico;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    foreach ($ldias as $iddiasemana) {
                        $sql = "SELECT * FROM diamedico where idmedico=$idmedico and iddiasemana=$iddiasemana;";
                        $rs = $db->Execute($sql);
                        $arr = $rs->Getrows();
                        $resultado = $arr[0]["id"];
                        if (empty($resultado)) {
                            $sql = "INSERT INTO diamedico (iddiasemana,idmedico,estado) values ($iddiasemana,$idmedico,0);";
                            $rs = $db->Execute($sql);
                        } else {
                            $sql = "UPDATE diamedico set estado=0 where iddiasemana=$iddiasemana and idmedico=$idmedico;";
                            $rs = $db->Execute($sql);
                        }
                    }
                    $db->Close();
                    return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Dia de Trabajo del Medico Registrado...!!");
                }
                break;
            case 13: { //Regisro de dia de trabajo de medicol

                    $idmedico = $_GET['id'];
                    $sql = "UPDATE medico SET estado=1 where id=$idmedico;";
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
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Medico Registrado...!!");
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
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Medico Registrado...!!");
                    }
                }
                break;
            case 14: { //Regisro de dia de trabajo de medico

                    $idmedico = $_GET['id'];

                    $sql = "UPDATE medico SET estado=0 where id=$idmedico;";
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
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Medico Registrado...!!");
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
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Medico Registrado...!!");
                    }
                }
                break;
            case 15: { //Modificar Medico

                    $idmedico = $_POST['id'];
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $lgenero = $_POST['lgenero'];
                    $lespecialidad = $_POST['lespecialidad'];

                    $sql = "UPDATE medico SET codigo='$codigo' ,nombre='$nombre',apellido_p='$apellido_p',apellido_m='$apellido_m',genero='$lgenero' where id=$idmedico;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $db->BeginTrans();
                    $rs = $db->Execute($sql);
                    echo $sql;
                    if (!empty($rs)) {
                        $sql = "UPDATE medicoespecialidad SET idespecialidad=$lespecialidad where idmedico=$idmedico";
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
                            return $this->showMensaje("Exito al Modificar", "EXITO AL MODIFICAR", $hiper, "Medico modificado correctamente...!!");
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


$oAdmUsr = new CGestionAdmMedico();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
