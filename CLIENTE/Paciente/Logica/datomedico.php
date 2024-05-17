<?php

require '../Smarty/Smarty.class.php';
require 'conexion.php';


$valor = $_GET["valor"];
$fechareserva = $_GET["fecha"];
switch ($valor) {
    case 1: {
            try {
                //SACAR MEDICO
                $data = $_GET["data"];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT me.id,me.codigo,CONCAT(me.apellido_p,' ',me.apellido_m,' ',me.nombre) as nombre,me.estado,es.nombre as especialidad
                from medico me 
                inner join medicoespecialidad mees on mees.idmedico=me.id
                INNER join especialidad es on es.id=mees.idespecialidad
                where es.id=$data;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();

                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('id' => $array[$j]["id"], 'codigo' => $array[$j]["codigo"], 'nombre'  => $array[$j]["nombre"], 'especialidad'  => $array[$j]["especialidad"], 'estado'  => $array[$j]["estado"]);
                }

                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 2: {
            try {
                //SACAR HORARIO
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT me.id as idmedico
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombre
                ,es.nombre as especialidad,me.codigo
                ,cu.id as idcupo
                ,case when hr.id is not null then hr.id else 'No tiene Horario' end  as id
                ,case when (cu.horainicio is not null and cu.horafinal is not null) then CONCAT(time_format(cu.horainicio, '%H:%i'),'-',time_format(cu.horafinal, '%H:%i')) 
                else 'No tiene Horario' end  as horario 
                ,case when hr.turno is not null then hr.turno else 'No tiene Horario' end  as turno 
                ,case when hr.estado is not null then hr.estado else 'No tiene Horario' end  as estado 
                from medico  me 
                left join horariomedico hrm on hrm.idmedico=me.id
                left join cupo cu on cu.idhorariomedico=hrm.id 
                left join horario hr on hr.id= hrm.idhorario
                left join medicoespecialidad mees on mees.idmedico=me.id
                left join especialidad es on es.id=mees.idespecialidad
                where me.id=$data and me.estado=0 
                and (hr.estado=0 or hr.estado is null) 
                and (mees.estado=0 or mees.estado is null) 
                and (es.estado=0 or es.estado is null);";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('idmedico' => $array[$j]["idmedico"], 'nombre' => $array[$j]["nombre"], 'especialidad'  => $array[$j]["especialidad"], 'codigo'  => $array[$j]["codigo"], 'idcupo'  => $array[$j]["idcupo"], 'idhorario'  => $array[$j]["id"], 'horario'  => $array[$j]["horario"], 'turno'  => $array[$j]["turno"]);
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 3: {
            try {
                //SACAR DIAS DE TRABAJO
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT me.id as idmedico
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombre
                ,es.nombre as especialidad,me.codigo
                ,case when ds.id is not null then ds.id else 'No tiene dia trabajo' end  as id
                ,case when ds.nro is not null then ds.nro else 'No tiene dia trabajo' end  as nro
                ,case when ds.nombre is not null then ds.nombre else 'No tiene dia trabajo' end  as nombredia
                ,case when ds.estado is not null then ds.estado else 'No tiene dia trabajo' end as estado 
                from medico me 
                left join diamedico dm on dm.idmedico=me.id
                left join diasemana ds on ds.id= dm.iddiasemana
                left join medicoespecialidad mees on mees.idmedico=me.id
                left join especialidad es on es.id=mees.idespecialidad
                where me.id=$data and me.estado=0 
                and (dm.estado=0 or dm.estado is null) 
                and (mees.estado=0 or mees.estado is null) 
                and (es.estado=0 or es.estado is null)
                order by ds.id asc;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();

                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('idmedico' => $array[$j]["idmedico"], 'nombre' => $array[$j]["nombre"], 'especialidad'  => $array[$j]["especialidad"], 'codigo'  => $array[$j]["codigo"], 'nro'  => $array[$j]["nro"], 'nombredia'  => $array[$j]["nombredia"]);
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
                //SACAR CUPO Existente
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT me.id as idmedico
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombre
                ,me.codigo
                ,(Select sum(cu.cupo) from cupo cu inner join horariomedico hm on hm.id=cu.idhorariomedico where cu.estado=0 and hm.idmedico=$data GROUP by cu.cupo) as cupo
                ,re.fecha
                ,(Select sum(cu.cupo) from cupo cu inner join horariomedico hm on hm.id=cu.idhorariomedico where cu.estado=0 and hm.idmedico=$data GROUP by cu.cupo)  - (select COUNT(re.idmedico) as cantidad from reserva re
							where re.idmedico=$data and re.fecha='$fechareserva') as total 
                FROM medico me
                inner join horariomedico hm on hm.idmedico=me.id
                inner join cupo cu on cu.idhorariomedico=hm.id
                inner join reserva re on re.idmedico= me.id  
                where me.id=$data
                and re.fecha='$fechareserva'
                group by me.id,me.nombre,re.fecha";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('idmedico' => $array[$j]["idmedico"], 'nombre' => $array[$j]["nombre"], 'cupo'  => $array[$j]["cupo"], 'fecha'  => $array[$j]["fecha"], 'total'  => $array[$j]["total"]);
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
                //SACAR CUPO 
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT  GROUP_CONCAT(DISTINCT (cu.id))  as id 
                ,hm.idmedico
                ,sum(cu.cupo) - (select count(*) as cantidad from reserva re where re.idmedico=$data and re.fecha='$fechareserva') as cantidad 
                ,cu.estado 
                from cupo cu
                inner join horariomedico hm on hm.id= cu.idhorariomedico
                where hm.idmedico=$data
                group by hm.idmedico;";
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
    case 6: {
            try {
                //SACAR CUPO EXISTENTES POR TURNO
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT cu.id
                ,cu.horainicio
                ,cu.horafinal
                ,h.turno
                ,cu.cupo - (select COUNT(re.idmedico) as cantidad from reserva re
                                            where re.idmedico=$data and re.fecha='$fechareserva'
                                               and cu.id=re.idturno) as cupo
                from cupo cu
                inner join horariomedico hm on hm.id=cu.idhorariomedico
                inner join horario h on h.id=hm.idhorario
                where hm.idmedico=$data and cu.estado=0 
                and hm.estado=0 and h.estado=0
                order by cu.id asc;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('id' => $array[$j]["id"], 'horainicio' => $array[$j]["horainicio"], 'horafinal'  => $array[$j]["horafinal"], 'turno'  => $array[$j]["turno"], 'cupo'  => $array[$j]["cupo"]);
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
                //SACAR HORARIO 
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
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
                                            where re.idmedico=$data and re.fecha='$fechareserva'
                                               and cu.id=re.idturno)  as cupototal
                from medico  me 
                left join horariomedico hrm on hrm.idmedico=me.id
                left join cupo cu on cu.idhorariomedico=hrm.id 
                left join horario hr on hr.id= hrm.idhorario
                left join medicoespecialidad mees on mees.idmedico=me.id
                left join especialidad es on es.id=mees.idespecialidad
                where me.id=$data and me.estado=0 
                and (hr.estado=0 or hr.estado is null) 
                and (mees.estado=0 or mees.estado is null) 
                and (es.estado=0 or es.estado is null)
                HAVING cupototal>0;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('idmedico' => $array[$j]["idmedico"], 'nombre' => $array[$j]["nombre"], 'especialidad'  => $array[$j]["especialidad"], 'codigo'  => $array[$j]["codigo"], 'idcupo'  => $array[$j]["idcupo"], 'idhorario'  => $array[$j]["id"], 'horario'  => $array[$j]["horario"], 'turno'  => $array[$j]["turno"]);
                }
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
