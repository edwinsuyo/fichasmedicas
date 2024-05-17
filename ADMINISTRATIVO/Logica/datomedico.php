<?php

require '../Smarty/Smarty.class.php';
require 'conexion.php';

$valor = $_GET['valor'];
$fechareserva = $_GET['fecha'];

switch ($valor) {
    case 1: {
            try {
                //SACAR MEDICO
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT me.id,me.codigo
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombre
                ,UPPER(es.nombre) as especialidad,me.estado 
                from medico me
                inner join medicoespecialidad mees on mees.idmedico=me.id
                inner join especialidad es on es.id=mees.idespecialidad
                where me.estado=0 and
                es.id=$data;";
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
                $sql = "SELECT me.id as idmedico,me.nombre,me.especialidad,me.codigo,hr.id,hr.horario,hr.turno,hr.estado from horario hr
                inner join horariomedico hrm on hrm.idhorario=hr.id
                inner join medico me on me.id= hrm.idmedico
                where me.id=$data;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array('idmedico' => $array[$j]["idmedico"], 'nombre' => $array[$j]["nombre"], 'especialidad'  => $array[$j]["especialidad"], 'codigo'  => $array[$j]["codigo"], 'idhorario'  => $array[$j]["id"], 'horario'  => $array[$j]["horario"], 'turno'  => $array[$j]["turno"]);
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
                $sql = "SELECT me.id as idmedico,me.nombre,me.especialidad,me.codigo,ds.id,ds.nro,ds.nombre as nombredia,ds.estado 
                from diasemana ds
                inner join diamedico dm on dm.iddiasemana=ds.id
                inner join medico me on me.id= dm.idmedico
                where me.id=$data;";
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
                $sql = "SELECT me.id as idmedico,me.nombre,cu.cantidad as cupo,re.fecha,cu.cantidad - COUNT(*) as total FROM medico me
                inner join cupo cu on cu.idmedico=me.id
                inner join reserva re on re.idmedico= me.id 
                where me.id=$data
                and re.fecha='$fechareserva'
                group by me.id,me.nombre,cu.cantidad,re.fecha;";
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
                $sql = "SELECT * from cupo 
                where idmedico=$data";
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
    default: {
            echo "Error de Conexion sintaxis! " . $ex;
        }
}
