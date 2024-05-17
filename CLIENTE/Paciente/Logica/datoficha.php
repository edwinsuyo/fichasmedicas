<?php

require '../Smarty/Smarty.class.php';
require 'conexion.php';

$valorp = $_GET['valorp'];
$valorm = $_GET['valorm'];
$valor = $_GET['opcion'];
$fechaficha = $_GET['fecha'];
$especialidad = $_GET['especialidad'];
$data = $_GET['data'];

switch ($valor) {
    case 1: {
            try {
                //VERIFICAR SI TIENE FICHA ESE DIA
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,pa.nombre as nombrepaciente,re.idmedico
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m)  as nombremedico
                ,es.nombre as especialidad
                FROM reserva re 
                inner join medico me on me.id=re.idmedico
                inner join medicoespecialidad mees on mees.idmedico=me.id
                INNER join especialidad es on es.id=mees.idespecialidad
                inner join paciente pa on pa.id=re.idpaciente
                where re.idpaciente=$valorp
                and re.fecha='$fechaficha';";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'fecha' => $array[$j]["fecha"], 'color'  => $array[$j]["color"], 'turno'  => $array[$j]["turno"], 'cupo'  => $array[$j]["cupo"], 'idpaciente'  => $array[$j]["idpaciente"], 'nombrepaciente'  => $array[$j]["nombrepaciente"], 'idmedico'  => $array[$j]["idmedico"], 'nombremedico'  => $array[$j]["nombremedico"], 'especialidad'  => $array[$j]["especialidad"]
                    );
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 2: {
            try {
                //REGISTRAR FICHA SI NO TIENE
                $idcupo = $_GET['idcupo'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                //inicia la transaccion
                $db->BeginTrans();
                //verifica de nuevo si tiene cupo de nuevo al momento de insertar
                $fechareserva = $_GET['fecha'];
                $datamedico = $_GET['idmedico'];
                $sql = "SELECT me.id as idmedico 
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombre
                ,es.nombre as especialidad,me.codigo
                ,cu.id as idcupo
                ,case when hr.id is not null then hr.id else 'No tiene Horario' end  as id
                ,case when (cu.horainicio is not null and cu.horafinal is not null) then CONCAT(time_format(cu.horainicio, '%H:%i'),'-',time_format(cu.horafinal, '%H:%i')) 
                else 'No tiene Horario' end  as horario 
                ,case when hr.turno is not null then hr.turno else 'No tiene Horario' end  as turno 
                ,case when hr.estado is not null then hr.estado else 'No tiene Horario' end  as estado
                ,cu.cupo
                ,cu.cupo - (select COUNT(re.idmedico) as cantidad from reserva re
                                            where re.idmedico=$datamedico and re.fecha='$fechareserva'
                                               and cu.id=re.idturno)  as cupototal
                from medico  me 
                left join horariomedico hrm on hrm.idmedico=me.id
                left join cupo cu on cu.idhorariomedico=hrm.id 
                left join horario hr on hr.id= hrm.idhorario
                left join medicoespecialidad mees on mees.idmedico=me.id
                left join especialidad es on es.id=mees.idespecialidad
                where me.id=$datamedico and me.estado=0 
                and (hr.estado=0 or hr.estado is null) 
                and (mees.estado=0 or mees.estado is null) 
                and (es.estado=0 or es.estado is null)
                HAVING cupototal>0;";
                $rs = $db->Execute($sql);
                if ($rs === false) {
                    $db->RollbackTrans();
                    $db->Close();
                    echo json_encode($rs) . "error 1";
                    //echo json_encode($rs);
                } else {
                    $array = $rs->Getrows();
                    $arr = array();
                    $haycupo = "NO";
                    for ($j = 0; $j < count($array); $j++) {
                        $idcupoexistente = $array[$j]["idcupo"];
                        if ($idcupoexistente === $idcupo) {
                            $haycupo = "SI";
                        }                        
                    }
                    if ($haycupo == "SI") {
                        $sql = "SELECT cu.id,CONCAT(h.turno,' ',time_format(cu.horainicio, '%H:%i'),'-',time_format(cu.horafinal, '%H:%i')) as horario 
                            from cupo cu
                            inner join horariomedico hm on hm.id=cu.idhorariomedico
                            inner join horario h on h.id=hm.idhorario
                            where cu.id=$idcupo;";
                        $rs = $db->Execute($sql);
                        $array = $rs->Getrows();
                        $horario =  $array[0]["horario"];

                        $arrayinsert = array($_GET['fecha'], $_GET['color'], $horario, $_GET['horaficha'], $_GET['cupo'], $idcupo, $_GET['idpaciente'], $_GET['idmedico']);
                        $idpaciente = $_GET['idpaciente'];
                        $idmedico = $_GET['idmedico'];

                        $sql = "INSERT INTO reserva (fecha,color,turno,horareserva,cupo,idturno,idpaciente,idmedico) values (?,?,?,?,?,?,?,?);";
                        $rs = $db->Execute($sql, $arrayinsert);
                        if ($rs === false) {
                            $db->RollbackTrans();
                            $db->Close();
                            echo $sql;
                            echo json_encode($rs)  . "error 3";;
                            //echo json_encode($rs);
                        } else {
                            $sql = "SELECT re.id,pa.nombre,pa.matricula,pa.empresa,pa.parentesco 
                                from reserva re
                                inner join paciente pa on pa.id=re.idpaciente
                                inner join medico me on me.id=re.idmedico
                                where pa.id=$idpaciente and me.id=$idmedico
                                order by re.id DESC 
                                LIMIT 1;";
                            $rs = $db->Execute($sql);
                            $array = $rs->Getrows();
                            $arr = array();
                            for ($j = 0; $j < count($array); $j++) {
                                $arr[$j] = array(
                                    'id' => $array[$j]["id"], 'nombre' => $array[$j]["nombre"], 'matricula'  => $array[$j]["matricula"], 'empresa' => $array[$j]["empresa"], 'parentesco'  => $array[$j]["parentesco"]
                                );
                            }
                            $db->CommitTrans();
                            $db->Close();
                            echo json_encode($arr);
                        }
                    } else {
                        $db->RollbackTrans();
                        echo "NO HAY CUPO POR FAVOR CIERRE LA VENTANA Y HABRA DE NUEVO";
                        //echo json_encode($rs)  . "error 4";;
                    }
                }
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 3: {
            try {
                //SACAR CUPOS
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT cu.id,cu.idmedico,cu.cantidad,cu.estado 
                from cupo cu 
                inner join medico me on me.id=cu.idmedico
                WHERE me.id=$valorm;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();

                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('id' => $array[$j]["id"], 'idmedico' => $array[$j]["idmedico"], 'cantidad'  => $array[$j]["cantidad"], 'estado'  => $array[$j]["estado"]);
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 4: {
            try {
                //CONTADOR DE RESERVAS CUPOS
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT  * from medico;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('idmedico' => $array[$j]["idmedico"], 'nombre' => $array[$j]["nombre"], 'cupo'  => $array[$j]["cupo"]);
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 5: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA COMPLETA
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico,re.horareserva
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                , es.nombre as especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
                inner join medicoespecialidad mees on mees.idmedico=me.id
                INNER join especialidad es on es.id=mees.idespecialidad
                WHERE re.idpaciente=$valorp;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'fecha' => $array[$j]["fecha"], 'color'  => $array[$j]["color"], 'horareserva'  => $array[$j]["horareserva"], 'turno' => $array[$j]["turno"], 'cupo' => $array[$j]["cupo"], 'idpaciente' => $array[$j]["idpaciente"], 'idmedico'  => $array[$j]["idmedico"], 'nombremedico' => $array[$j]["nombremedico"], 'especialidad' => $array[$j]["especialidad"], 'nombrepaciente'  => $array[$j]["nombrepaciente"], 'matricula' => $array[$j]["matricula"], 'empresa' => $array[$j]["empresa"], 'parentesco'  => $array[$j]["parentesco"]
                    );
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 6: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA X MEDICO Y PACIENTE
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico,re.horareserva
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                , es.nombre as especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
                inner join medicoespecialidad mees on mees.idmedico=me.id
                INNER join especialidad es on es.id=mees.idespecialidad
                WHERE re.idpaciente=$valorp
                AND me.id=$valorm;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'fecha' => $array[$j]["fecha"], 'horareserva'  => $array[$j]["horareserva"], 'color'  => $array[$j]["color"], 'turno' => $array[$j]["turno"], 'cupo' => $array[$j]["cupo"], 'idpaciente' => $array[$j]["idpaciente"], 'idmedico'  => $array[$j]["idmedico"], 'nombremedico' => $array[$j]["nombremedico"], 'especialidad' => $array[$j]["especialidad"], 'nombrepaciente'  => $array[$j]["nombrepaciente"], 'matricula' => $array[$j]["matricula"], 'empresa' => $array[$j]["empresa"], 'parentesco'  => $array[$j]["parentesco"]
                    );
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 7: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA COMPLETA
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                , es.nombre as especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
                inner join medicoespecialidad mees on mees.idmedico=me.id
                INNER join especialidad es on es.id=mees.idespecialidad
                WHERE re.idpaciente=$valorp
                and ((me.especialidad LIKE '%$especialidad%') or '0'='$especialidad' );";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'fecha' => $array[$j]["fecha"], 'color'  => $array[$j]["color"], 'turno' => $array[$j]["turno"], 'cupo' => $array[$j]["cupo"], 'idpaciente' => $array[$j]["idpaciente"], 'idmedico'  => $array[$j]["idmedico"], 'nombremedico' => $array[$j]["nombremedico"], 'especialidad' => $array[$j]["especialidad"], 'nombrepaciente'  => $array[$j]["nombrepaciente"], 'matricula' => $array[$j]["matricula"], 'empresa' => $array[$j]["empresa"], 'parentesco'  => $array[$j]["parentesco"]
                    );
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 8: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA COMPLETA
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT cu.id
                ,cu.horainicio
                ,cu.horafinal
                ,cu.cupo
                ,cu.timeconsulta
                ,(select distanciaconsulta  from consultavirtual where estado=0) as diferenciaficha
                ,(select COUNT(*) from reserva re
                inner join cupo cu on cu.id=re.idturno
                where re.idmedico=$valorm and re.fecha='$fechaficha'
                and cu.id=$data) as cantidad
                , time_format(cu.horainicio + INTERVAL ((select case when COUNT(*)=0 then 1 else (COUNT(*)+1) end from reserva re
                inner join cupo cu on cu.id=re.idturno
                where re.idmedico=$valorm and re.fecha='$fechaficha'
                and cu.id=$data)*cu.timeconsulta* (select distanciaconsulta  from consultavirtual where estado=0)) MINUTE , '%H:%i') as horaficha
                from cupo cu
                inner join horariomedico hm on hm.id=cu.idhorariomedico
                inner join medico me on me.id=hm.idmedico
                where me.id=$valorm and cu.id=$data;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'horainicio' => $array[$j]["horainicio"], 'horafinal'  => $array[$j]["horafinal"], 'cupo' => $array[$j]["cupo"], 'timeconsulta' => $array[$j]["timeconsulta"], 'diferenciaficha' => $array[$j]["diferenciaficha"], 'cantidad'  => $array[$j]["cantidad"], 'horaficha' => $array[$j]["horaficha"]
                    );
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 9: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA COMPLETA X Especialidad
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico,re.horareserva
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                , es.nombre as especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
                inner join medicoespecialidad mees on mees.idmedico=me.id
                INNER join especialidad es on es.id=mees.idespecialidad
                WHERE re.idpaciente=$valorp
                and (es.id=$especialidad or 0=$especialidad);";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'fecha' => $array[$j]["fecha"], 'horareserva'  => $array[$j]["horareserva"], 'color'  => $array[$j]["color"], 'turno' => $array[$j]["turno"], 'cupo' => $array[$j]["cupo"], 'idpaciente' => $array[$j]["idpaciente"], 'idmedico'  => $array[$j]["idmedico"], 'nombremedico' => $array[$j]["nombremedico"], 'especialidad' => $array[$j]["especialidad"], 'nombrepaciente'  => $array[$j]["nombrepaciente"], 'matricula' => $array[$j]["matricula"], 'empresa' => $array[$j]["empresa"], 'parentesco'  => $array[$j]["parentesco"]
                    );
                }
                $db->Close();
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    default: {
            echo "Error de Conexion sintaxis! " . $ex;
        }
}
