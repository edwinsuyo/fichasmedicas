<?php

require '../Smarty/Smarty.class.php';
require 'conexion.php';

$valorp = $_GET['valorp'];
$valorm = $_GET['valorm'];
$valor = $_GET['opcion'];
$fechaficha = $_GET['fecha'];
$especialidad = $_GET['especialidad'];
$fechainicio = $_GET['fechainicio'];
$fechafinal = $_GET['fechafinal'];


switch ($valor) {
    case 1: {
            try {
                //VERIFICAR SI TIENE FICHA ESE DIA
                $data = $_GET['data'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,pa.nombre as nombrepaciente,re.idmedico,me.nombre as nombremedico,me.especialidad
                FROM reserva re 
                inner join medico me on me.id=re.idmedico
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
                $arrayinsert = array($_GET['fecha'], $_GET['color'], $_GET['turno'], $_GET['cupo'], $_GET['idpaciente'], $_GET['idmedico']);
                $idpaciente = $_GET['idpaciente'];
                $idmedico = $_GET['idmedico'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "INSERT INTO reserva (fecha,color,turno,cupo,idpaciente,idmedico) values (?,?,?,?,?,?);";

                $rs = $db->Execute($sql, $arrayinsert);
                if ($rs === false) {
                    $db->Close();
                    echo json_encode($rs);
                    //echo json_encode($rs);
                } else {
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
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

                    $db->Close();
                    echo json_encode($arr);
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
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico,
                me.nombre as nombremedico, me.especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
                WHERE re.idpaciente=$valorp;";
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
    case 6: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA X MEDICO Y PACIENTE
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico,
                me.nombre as nombremedico, me.especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
                WHERE re.idpaciente=$valorp
                AND me.id=$valorm;";
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
    case 7: {
            try {
                //SACAR HISTORIAL DE FICHA MEDICA COMPLETA
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT re.id,re.fecha,re.color,re.turno,re.cupo,re.idpaciente,re.idmedico,
                me.nombre as nombremedico, me.especialidad,pa.nombre as nombrepaciente,pa.matricula,pa.empresa,pa.parentesco
                from reserva re
                inner join medico me on me.id=re.idmedico
                inner join paciente pa on pa.id=re.idpaciente
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
                $sql = "SELECT re.id,re.fecha,re.turno,re.horareserva
                ,pa.carnet,pa.matricula,pa.nombre,pa.empresa,pa.parentesco,me.codigo
                ,CONCAT (case when me.genero='F' then 'Dra. ' else 'Dr. ' end,' ',me.nombre,' ',me.apellido_p,' ',me.apellido_m) as nombremedico
                ,es.nombre as especialidad 
                FROM reserva re
                inner join paciente  pa on pa.id=re.idpaciente
                inner join medico me on me.id=re.idmedico
                inner join medicoespecialidad mees on mees.idmedico=me.id
                inner join especialidad es on es.id=mees.idespecialidad
                WHERE (re.idmedico=$valorm or 0=$valorm)
                and (re.fecha>='$fechainicio' and re.fecha<='$fechafinal')
                and (es.id=$especialidad or 0=$especialidad)
                order by re.fecha DESC,re.id asc,re.horareserva asc;";
                $rs = $db->Execute($sql);
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'fecha' => $array[$j]["fecha"], 'horareserva' => $array[$j]["horareserva"], 'turno'  => $array[$j]["turno"], 'carnet' => $array[$j]["carnet"], 'matricula' => $array[$j]["matricula"]
                        , 'nombre' => $array[$j]["nombre"], 'empresa'  => $array[$j]["empresa"], 'parentesco' => $array[$j]["parentesco"], 'codigo' => $array[$j]["codigo"], 'nombremedico'  => $array[$j]["nombremedico"]
                        , 'especialidad' => $array[$j]["especialidad"]
                    );
                }
                $db->Close();
                //echo $sql;
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
