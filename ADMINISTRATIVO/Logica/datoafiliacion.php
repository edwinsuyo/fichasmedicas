<?php
require '../Smarty/Smarty.class.php';
require 'conexion.php';

$matricula = $_GET['matricula'];
$valor = $_GET['opcion'];

switch ($valor) {
    case 1: {
            try {
                //VERIFICAR SI TIENE BENEFICIARIO
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,matricula_titular, matricula_beneficiario, nombre, apellido_pat, apellido_mat
                ,fecha_nacimiento,
                TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edadactual,
                case when ci IS NULL or ci = '' then 'NO INGRESADO'else ci end as ci, 
                expirado, genero,
                case when factorrh IS NULL or factorrh = '' then 'NO INGRESADO'else factorrh end as factorrh,
                case when grupo IS NULL or grupo = '' then 'NO INGRESADO'else grupo end as grupo,
                puntocardinal, zona, calle, nro, localidad, telefono, correo, empresa, numeropatronal, nroempleador,
                ocupacion, fecha_ingreso, salario, categoria, UPPER(parentesco) as parentesco, fecha_presentacion, fecha_recepcion, recepcion,
                regional, baja, fecha_baja, fecha_limite, fecha_extincion, vivo, cotiza, edad, fecha_verificacion
                FROM afiliado
                where matricula_titular='$matricula'
                and matricula_titular!=matricula_beneficiario;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'ci' => $array[$j]["ci"], 'edad' => $array[$j]["edadactual"], 'apellido_pat' => $array[$j]["apellido_pat"], 'apellido_mat'  => $array[$j]["apellido_mat"], 'nombre'  => $array[$j]["nombre"], 'fecha_nacimiento'  => $array[$j]["fecha_nacimiento"], 'parentesco'  => $array[$j]["parentesco"], 'genero'  => $array[$j]["genero"], 'fecha_extincion'  => $array[$j]["fecha_extincion"], 'matricula_beneficiario'  => $array[$j]["matricula_beneficiario"], 'factorrh'  => $array[$j]["factorrh"], 'grupo'  => $array[$j]["grupo"]
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
                $idempresa = $_GET['empresa'];
                //VERIFICAR DATOS DE LA EMPRESA
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,UPPER(NOMBRE) as nombre, UPPER(codigoempleador) as codigoempleador,UPPER(numeropatronal) as numeropatronal 
                FROM empresa
                where id=$idempresa;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'nombre' => $array[$j]["nombre"], 'codigoempleador' => $array[$j]["codigoempleador"], 'numeropatronal' => $array[$j]["numeropatronal"]
                    );
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 3: {
            try {
                //VERIFICAR DATOS DEL AFILIADO
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,
                UPPER(matricula_titular) as matricula_titular,
                UPPER(matricula_beneficiario) as matricula_beneficiario,	
                case when nombre is null then '' else UPPER(nombre) end as nombre,
                case when apellido_pat is null then '' else UPPER(apellido_pat) end as apellido_pat,
                case when apellido_mat is null then '' else UPPER(apellido_mat) end as apellido_mat,
                DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as fecha_nacimiento,
                case when ci is null or ci = '' then 'NO INGRESADO' else  UPPER(ci) end as ci, 	
                case when expirado is null or expirado = '' then 'NO INGRESADO' else UPPER(expirado) end as expirado,
                case when genero is null or genero = '' then 'NO INGRESADO' else  UPPER(genero) end as genero,	
                case when factorrh is null or factorrh = '' then 'NO INGRESADO' else UPPER(factorrh) end as factorrh,
                case when grupo is null or grupo = '' then 'NO INGRESADO' else UPPER(grupo) end as grupo,
                case when puntocardinal is null or puntocardinal = '' then 'NO INGRESADO' else UPPER(puntocardinal) end as puntocardinal,
                case when zona is null or zona = '' then 'NO INGRESADO' else UPPER(zona) end as zona,
                case when calle is null or calle = '' then 'NO INGRESADO' else UPPER(calle) end as calle,
                case when nro is null or nro = '' then 'NO INGRESADO' else UPPER(nro) end as nro,
                case when localidad is null or localidad = '' then 'NO INGRESADO' else UPPER(localidad) end as localidad,
                case when telefono is null or telefono = '' then 'NO INGRESADO' else UPPER(telefono) end as telefono,
                case when correo is null or correo = '' then 'NO INGRESADO' else UPPER(correo) end as correo,
                case when empresa is null or empresa = '' then 'NO INGRESADO' else UPPER(empresa) end as empresa,
                case when numeropatronal is null or numeropatronal = '' then 'NO INGRESADO' else UPPER(numeropatronal) end as numeropatronal,
                case when nroempleador is null or nroempleador = '' then 'NO INGRESADO' else UPPER(nroempleador) end as nroempleador,
                case when ocupacion is null or ocupacion = '' then 'NO INGRESADO' else UPPER(ocupacion) end as ocupacion,
                DATE_FORMAT(fecha_ingreso,'%d/%m/%Y') as fecha_ingreso,
                case when salario is null or salario = '' then '0.0' else salario end as salario,	
                case when categoria is null or categoria = '' then 'NO INGRESADO' else UPPER(categoria) end as categoria,	
                case when parentesco is null or parentesco = '' then 'NO INGRESADO' else UPPER(parentesco) end as parentesco,
                DATE_FORMAT(fecha_presentacion,'%d/%m/%Y') as fecha_presentacion,
                DATE_FORMAT(fecha_recepcion,'%d/%m/%Y') as fecha_recepcion,
                case when recepcion is null or recepcion = '' then 'NO INGRESADO' else UPPER(recepcion) end as recepcion,
                case when regional is null or regional ='' then 'NO INGRESADO' else UPPER(regional) end as regional,	
                UPPER(baja) as baja,	
                DATE_FORMAT(fecha_baja,'%d/%m/%Y') as fecha_baja,
                DATE_FORMAT(fecha_limite,'%d/%m/%Y') as fecha_limite,
                DATE_FORMAT(fecha_extincion,'%d/%m/%Y') as fecha_extincion,
                UPPER(vivo) as vivo,
                UPPER(cotiza) as cotiza,
                UPPER(edad) as edadi,
                TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
                DATE_FORMAT(fecha_verificacion,'%d/%m/%Y') as fecha_verificacion,
                CONCAT(apellido_pat,' ',apellido_mat,' ',nombre) AS nombrecompleto
                FROM afiliado
                where matricula_titular='$matricula' and matricula_beneficiario='$matricula';";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'matricula_titular' => $array[$j]["matricula_titular"], 'matricula_beneficiario' => $array[$j]["matricula_beneficiario"], 'nombre' => $array[$j]["nombre"], 'apellido_pat' => $array[$j]["apellido_pat"], 'apellido_mat' => $array[$j]["apellido_mat"], 'fecha_nacimiento' => $array[$j]["fecha_nacimiento"], 'ci' => $array[$j]["ci"], 'expirado' => $array[$j]["expirado"], 'genero' => $array[$j]["genero"], 'factorrh' => $array[$j]["factorrh"], 'grupo' => $array[$j]["grupo"], 'puntocardinal' => $array[$j]["puntocardinal"], 'zona' => $array[$j]["zona"], 'calle' => $array[$j]["calle"], 'nro' => $array[$j]["nro"], 'localidad' => $array[$j]["localidad"], 'telefono' => $array[$j]["telefono"], 'correo' => $array[$j]["correo"], 'empresa' => $array[$j]["empresa"], 'numeropatronal' => $array[$j]["numeropatronal"], 'nroempleador' => $array[$j]["nroempleador"], 'ocupacion' => $array[$j]["ocupacion"], 'fecha_ingreso' => str_replace('\'', '', $array[$j]["fecha_ingreso"]), 'salario' => $array[$j]["salario"], 'categoria' => $array[$j]["categoria"], 'parentesco' => $array[$j]["parentesco"], 'fecha_presentacion' => $array[$j]["fecha_presentacion"], 'fecha_recepcion' => str_replace("" + "\"", '', $array[$j]["fecha_recepcion"]), 'recepcion' => $array[$j]["recepcion"], 'regional' => $array[$j]["regional"], 'baja' => $array[$j]["baja"], 'fecha_baja' => $array[$j]["fecha_baja"], 'fecha_limite' => $array[$j]["fecha_limite"], 'fecha_extincion' => $array[$j]["fecha_extincion"], 'vivo' => $array[$j]["vivo"], 'cotiza' => $array[$j]["cotiza"], 'edad' => $array[$j]["edad"], 'fecha_verificacion' => $array[$j]["fecha_verificacion"], 'nombrecompleto' => $array[$j]["nombrecompleto"]
                    );
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
    case 4: {
            try {
                //IMPRESION DE TODOS LOS AFILIADOS
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,
                UPPER(matricula_titular) as matricula_titular,
                UPPER(matricula_beneficiario) as matricula_beneficiario,	
                case when nombre is null then '' else UPPER(nombre) end as nombre,
                case when apellido_pat is null then '' else UPPER(apellido_pat) end as apellido_pat,
                case when apellido_mat is null then '' else UPPER(apellido_mat) end as apellido_mat,
                DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as fecha_nacimiento,
                case when ci is null or ci = '' then 'NO INGRESADO' else  UPPER(ci) end as ci, 	
                case when expirado is null or expirado = '' then 'NO INGRESADO' else UPPER(expirado) end as expirado,
                case when genero is null or genero = '' then 'NO INGRESADO' else  UPPER(genero) end as genero,	
                case when factorrh is null or factorrh = '' then 'NO INGRESADO' else UPPER(factorrh) end as factorrh,
                case when grupo is null or grupo = '' then 'NO INGRESADO' else UPPER(grupo) end as grupo,
                case when puntocardinal is null or puntocardinal = '' then 'NO INGRESADO' else UPPER(puntocardinal) end as puntocardinal,
                case when zona is null or zona = '' then 'NO INGRESADO' else UPPER(zona) end as zona,
                case when calle is null or calle = '' then 'NO INGRESADO' else UPPER(calle) end as calle,
                case when nro is null or nro = '' then 'NO INGRESADO' else UPPER(nro) end as nro,
                case when localidad is null or localidad = '' then 'NO INGRESADO' else UPPER(localidad) end as localidad,
                case when telefono is null or telefono = '' then 'NO INGRESADO' else UPPER(telefono) end as telefono,
                case when correo is null or correo = '' then 'NO INGRESADO' else UPPER(correo) end as correo,
                case when empresa is null or empresa = '' then 'NO INGRESADO' else UPPER(empresa) end as empresa,
                case when numeropatronal is null or numeropatronal = '' then 'NO INGRESADO' else UPPER(numeropatronal) end as numeropatronal,
                case when nroempleador is null or nroempleador = '' then 'NO INGRESADO' else UPPER(nroempleador) end as nroempleador,
                case when ocupacion is null or ocupacion = '' then 'NO INGRESADO' else UPPER(ocupacion) end as ocupacion,
                DATE_FORMAT(fecha_ingreso,'%d/%m/%Y') as fecha_ingreso,
                case when salario is null or salario = '' then '0.0' else salario end as salario,	
                case when categoria is null or categoria = '' then 'NO INGRESADO' else UPPER(categoria) end as categoria,	
                case when parentesco is null or parentesco = '' then 'NO INGRESADO' else UPPER(parentesco) end as parentesco,
                DATE_FORMAT(fecha_presentacion,'%d/%m/%Y') as fecha_presentacion,
                DATE_FORMAT(fecha_recepcion,'%d/%m/%Y') as fecha_recepcion,
                case when recepcion is null or recepcion = '' then 'NO INGRESADO' else UPPER(recepcion) end as recepcion,
                case when regional is null or regional ='' then 'NO INGRESADO' else UPPER(regional) end as regional,	
                UPPER(baja) as baja,	
                DATE_FORMAT(fecha_baja,'%d/%m/%Y') as fecha_baja,
                DATE_FORMAT(fecha_limite,'%d/%m/%Y') as fecha_limite,
                DATE_FORMAT(fecha_extincion,'%d/%m/%Y') as fecha_extincion,
                UPPER(vivo) as vivo,
                UPPER(cotiza) as cotiza,
                UPPER(edad) as edadi,
                TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
                DATE_FORMAT(fecha_verificacion,'%d/%m/%Y') as fecha_verificacion
                FROM afiliado;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'matricula_titular' => $array[$j]["matricula_titular"], 'matricula_beneficiario' => $array[$j]["matricula_beneficiario"], 'nombre' => $array[$j]["nombre"], 'apellido_pat' => $array[$j]["apellido_pat"], 'apellido_mat' => $array[$j]["apellido_mat"], 'fecha_nacimiento' => $array[$j]["fecha_nacimiento"], 'ci' => $array[$j]["ci"], 'expirado' => $array[$j]["expirado"], 'genero' => $array[$j]["genero"], 'factorrh' => $array[$j]["factorrh"], 'grupo' => $array[$j]["grupo"], 'puntocardinal' => $array[$j]["puntocardinal"], 'zona' => $array[$j]["zona"], 'calle' => $array[$j]["calle"], 'nro' => $array[$j]["nro"], 'localidad' => $array[$j]["localidad"], 'telefono' => $array[$j]["telefono"], 'correo' => $array[$j]["correo"], 'empresa' => $array[$j]["empresa"], 'numeropatronal' => $array[$j]["numeropatronal"], 'nroempleador' => $array[$j]["nroempleador"], 'ocupacion' => $array[$j]["ocupacion"], 'fecha_ingreso' => str_replace('\'', '', $array[$j]["fecha_ingreso"]), 'salario' => $array[$j]["salario"], 'categoria' => $array[$j]["categoria"], 'parentesco' => $array[$j]["parentesco"], 'fecha_presentacion' => $array[$j]["fecha_presentacion"], 'fecha_recepcion' => str_replace("" + "\"", '', $array[$j]["fecha_recepcion"]), 'recepcion' => $array[$j]["recepcion"], 'regional' => $array[$j]["regional"], 'baja' => $array[$j]["baja"], 'fecha_baja' => $array[$j]["fecha_baja"], 'fecha_limite' => $array[$j]["fecha_limite"], 'fecha_extincion' => $array[$j]["fecha_extincion"], 'vivo' => $array[$j]["vivo"], 'cotiza' => $array[$j]["cotiza"], 'edad' => $array[$j]["edad"], 'fecha_verificacion' => $array[$j]["fecha_verificacion"]
                    );
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
        case 5: {
            try {
                //CARGAR DATOS DE LA COLUMNA DE LA MATRICULA TITULAR
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,
                UPPER(matricula_titular) as matricula_titular,
                UPPER(matricula_beneficiario) as matricula_beneficiario,	
                case when nombre is null then '' else UPPER(nombre) end as nombre,
                case when apellido_pat is null then '' else UPPER(apellido_pat) end as apellido_pat,
                case when apellido_mat is null then '' else UPPER(apellido_mat) end as apellido_mat,
                DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as fecha_nacimiento,
                case when ci is null or ci = '' then 'NO INGRESADO' else  UPPER(ci) end as ci, 	
                case when expirado is null or expirado = '' then 'NO INGRESADO' else UPPER(expirado) end as expirado,
                case when genero is null or genero = '' then 'NO INGRESADO' else  UPPER(genero) end as genero,	
                case when factorrh is null or factorrh = '' then 'NO INGRESADO' else UPPER(factorrh) end as factorrh,
                case when grupo is null or grupo = '' then 'NO INGRESADO' else UPPER(grupo) end as grupo,
                case when puntocardinal is null or puntocardinal = '' then 'NO INGRESADO' else UPPER(puntocardinal) end as puntocardinal,
                case when zona is null or zona = '' then 'NO INGRESADO' else UPPER(zona) end as zona,
                case when calle is null or calle = '' then 'NO INGRESADO' else UPPER(calle) end as calle,
                case when nro is null or nro = '' then 'NO INGRESADO' else UPPER(nro) end as nro,
                case when localidad is null or localidad = '' then 'NO INGRESADO' else UPPER(localidad) end as localidad,
                case when telefono is null or telefono = '' then 'NO INGRESADO' else UPPER(telefono) end as telefono,
                case when correo is null or correo = '' then 'NO INGRESADO' else UPPER(correo) end as correo,
                case when empresa is null or empresa = '' then 'NO INGRESADO' else UPPER(empresa) end as empresa,
                case when numeropatronal is null or numeropatronal = '' then 'NO INGRESADO' else UPPER(numeropatronal) end as numeropatronal,
                case when nroempleador is null or nroempleador = '' then 'NO INGRESADO' else UPPER(nroempleador) end as nroempleador,
                case when ocupacion is null or ocupacion = '' then 'NO INGRESADO' else UPPER(ocupacion) end as ocupacion,
                DATE_FORMAT(fecha_ingreso,'%d/%m/%Y') as fecha_ingreso,
                case when salario is null or salario = '' then '0.0' else salario end as salario,	
                case when categoria is null or categoria = '' then 'NO INGRESADO' else UPPER(categoria) end as categoria,	
                case when parentesco is null or parentesco = '' then 'NO INGRESADO' else UPPER(parentesco) end as parentesco,
                DATE_FORMAT(fecha_presentacion,'%d/%m/%Y') as fecha_presentacion,
                DATE_FORMAT(fecha_recepcion,'%d/%m/%Y') as fecha_recepcion,
                case when recepcion is null or recepcion = '' then 'NO INGRESADO' else UPPER(recepcion) end as recepcion,
                case when regional is null or regional ='' then 'NO INGRESADO' else UPPER(regional) end as regional,	
                UPPER(baja) as baja,	
                DATE_FORMAT(fecha_baja,'%d/%m/%Y') as fecha_baja,
                DATE_FORMAT(fecha_limite,'%d/%m/%Y') as fecha_limite,
                DATE_FORMAT(fecha_extincion,'%d/%m/%Y') as fecha_extincion,
                UPPER(vivo) as vivo,
                UPPER(cotiza) as cotiza,
                UPPER(edad) as edadi,
                TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
                DATE_FORMAT(fecha_verificacion,'%d/%m/%Y') as fecha_verificacion
                FROM afiliado
                WHERE matricula_titular like '%$matricula%' or matricula_beneficiario like '%$matricula%' or matricula_titular in (select matricula_titular from afiliado where matricula_beneficiario like '%$matricula%')
                order by categoria asc;";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'matricula_titular' => $array[$j]["matricula_titular"], 'matricula_beneficiario' => $array[$j]["matricula_beneficiario"], 'nombre' => $array[$j]["nombre"], 'apellido_pat' => $array[$j]["apellido_pat"], 'apellido_mat' => $array[$j]["apellido_mat"], 'fecha_nacimiento' => $array[$j]["fecha_nacimiento"], 'ci' => $array[$j]["ci"], 'expirado' => $array[$j]["expirado"], 'genero' => $array[$j]["genero"], 'factorrh' => $array[$j]["factorrh"], 'grupo' => $array[$j]["grupo"], 'puntocardinal' => $array[$j]["puntocardinal"], 'zona' => $array[$j]["zona"], 'calle' => $array[$j]["calle"], 'nro' => $array[$j]["nro"], 'localidad' => $array[$j]["localidad"], 'telefono' => $array[$j]["telefono"], 'correo' => $array[$j]["correo"], 'empresa' => $array[$j]["empresa"], 'numeropatronal' => $array[$j]["numeropatronal"], 'nroempleador' => $array[$j]["nroempleador"], 'ocupacion' => $array[$j]["ocupacion"], 'fecha_ingreso' => str_replace('\'', '', $array[$j]["fecha_ingreso"]), 'salario' => $array[$j]["salario"], 'categoria' => $array[$j]["categoria"], 'parentesco' => $array[$j]["parentesco"], 'fecha_presentacion' => $array[$j]["fecha_presentacion"], 'fecha_recepcion' => str_replace("" + "\"", '', $array[$j]["fecha_recepcion"]), 'recepcion' => $array[$j]["recepcion"], 'regional' => $array[$j]["regional"], 'baja' => $array[$j]["baja"], 'fecha_baja' => $array[$j]["fecha_baja"], 'fecha_limite' => $array[$j]["fecha_limite"], 'fecha_extincion' => $array[$j]["fecha_extincion"], 'vivo' => $array[$j]["vivo"], 'cotiza' => $array[$j]["cotiza"], 'edad' => $array[$j]["edad"], 'fecha_verificacion' => $array[$j]["fecha_verificacion"]
                    );
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
        case 6: {
            try {
                //CARGAR DATOS DE LA COLUMNA DE LA MATRICULA 
                $id = $_GET['id'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,
                UPPER(matricula_titular) as matricula_titular,
                UPPER(matricula_beneficiario) as matricula_beneficiario,	
                case when nombre is null then '' else UPPER(nombre) end as nombre,
                case when apellido_pat is null then '' else UPPER(apellido_pat) end as apellido_pat,
                case when apellido_mat is null then '' else UPPER(apellido_mat) end as apellido_mat,
                DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as fecha_nacimiento,
                case when ci is null or ci = '' then 'NO INGRESADO' else  UPPER(ci) end as ci, 	
                case when expirado is null or expirado = '' then 'NO INGRESADO' else UPPER(expirado) end as expirado,
                case when genero is null or genero = '' then 'NO INGRESADO' else  UPPER(genero) end as genero,	
                case when factorrh is null or factorrh = '' then 'NO INGRESADO' else UPPER(factorrh) end as factorrh,
                case when grupo is null or grupo = '' then 'NO INGRESADO' else UPPER(grupo) end as grupo,
                case when puntocardinal is null or puntocardinal = '' then 'NO INGRESADO' else UPPER(puntocardinal) end as puntocardinal,
                case when zona is null or zona = '' then 'NO INGRESADO' else UPPER(zona) end as zona,
                case when calle is null or calle = '' then 'NO INGRESADO' else UPPER(calle) end as calle,
                case when nro is null or nro = '' then 'NO INGRESADO' else UPPER(nro) end as nro,
                case when localidad is null or localidad = '' then 'NO INGRESADO' else UPPER(localidad) end as localidad,
                case when telefono is null or telefono = '' then 'NO INGRESADO' else UPPER(telefono) end as telefono,
                case when correo is null or correo = '' then 'NO INGRESADO' else UPPER(correo) end as correo,
                case when empresa is null or empresa = '' then 'NO INGRESADO' else UPPER(empresa) end as empresa,
                case when numeropatronal is null or numeropatronal = '' then 'NO INGRESADO' else UPPER(numeropatronal) end as numeropatronal,
                case when nroempleador is null or nroempleador = '' then 'NO INGRESADO' else UPPER(nroempleador) end as nroempleador,
                case when ocupacion is null or ocupacion = '' then 'NO INGRESADO' else UPPER(ocupacion) end as ocupacion,
                DATE_FORMAT(fecha_ingreso,'%d/%m/%Y') as fecha_ingreso,
                case when salario is null or salario = '' then '0.0' else salario end as salario,	
                case when categoria is null or categoria = '' then 'NO INGRESADO' else UPPER(categoria) end as categoria,	
                case when parentesco is null or parentesco = '' then 'NO INGRESADO' else UPPER(parentesco) end as parentesco,
                DATE_FORMAT(fecha_presentacion,'%d/%m/%Y') as fecha_presentacion,
                DATE_FORMAT(fecha_recepcion,'%d/%m/%Y') as fecha_recepcion,
                case when recepcion is null or recepcion = '' then 'NO INGRESADO' else UPPER(recepcion) end as recepcion,
                case when regional is null or regional ='' then 'NO INGRESADO' else UPPER(regional) end as regional,	
                UPPER(baja) as baja,	
                case when fecha_baja is null or fecha_baja='' then '00/00/0000' else DATE_FORMAT(fecha_baja,'%d/%m/%Y') end as fecha_baja,
                case when fecha_limite is null or fecha_limite='' then '00/00/0000' else DATE_FORMAT(fecha_limite,'%d/%m/%Y') end as fecha_limite,
                case when fecha_extincion is null or fecha_extincion='' then '00/00/0000'  else DATE_FORMAT(fecha_extincion,'%d/%m/%Y') end as fecha_extincion,
                UPPER(vivo) as vivo,
                UPPER(cotiza) as cotiza,
                UPPER(edad) as edadi,
                TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
                DATE_FORMAT(fecha_verificacion,'%d/%m/%Y') as fecha_verificacion
                FROM afiliado
                WHERE id='$id';";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'matricula_titular' => $array[$j]["matricula_titular"], 'matricula_beneficiario' => $array[$j]["matricula_beneficiario"], 'nombre' => $array[$j]["nombre"], 'apellido_pat' => $array[$j]["apellido_pat"], 'apellido_mat' => $array[$j]["apellido_mat"], 'fecha_nacimiento' => $array[$j]["fecha_nacimiento"], 'ci' => $array[$j]["ci"], 'expirado' => $array[$j]["expirado"], 'genero' => $array[$j]["genero"], 'factorrh' => $array[$j]["factorrh"], 'grupo' => $array[$j]["grupo"], 'puntocardinal' => $array[$j]["puntocardinal"], 'zona' => $array[$j]["zona"], 'calle' => $array[$j]["calle"], 'nro' => $array[$j]["nro"], 'localidad' => $array[$j]["localidad"], 'telefono' => $array[$j]["telefono"], 'correo' => $array[$j]["correo"], 'empresa' => $array[$j]["empresa"], 'numeropatronal' => $array[$j]["numeropatronal"], 'nroempleador' => $array[$j]["nroempleador"], 'ocupacion' => $array[$j]["ocupacion"], 'fecha_ingreso' => str_replace('\'', '', $array[$j]["fecha_ingreso"]), 'salario' => $array[$j]["salario"], 'categoria' => $array[$j]["categoria"], 'parentesco' => $array[$j]["parentesco"], 'fecha_presentacion' => $array[$j]["fecha_presentacion"], 'fecha_recepcion' => str_replace("" + "\"", '', $array[$j]["fecha_recepcion"]), 'recepcion' => $array[$j]["recepcion"], 'regional' => $array[$j]["regional"], 'baja' => $array[$j]["baja"], 'fecha_baja' => $array[$j]["fecha_baja"], 'fecha_limite' => $array[$j]["fecha_limite"], 'fecha_extincion' => $array[$j]["fecha_extincion"], 'vivo' => $array[$j]["vivo"], 'cotiza' => $array[$j]["cotiza"], 'edad' => $array[$j]["edad"], 'fecha_verificacion' => $array[$j]["fecha_verificacion"]
                    );
                }
                echo json_encode($arr);
            } catch (Exception $ex) {
                echo "Error de Conexion! " . $ex;
            }
        }
        break;
        case 7: {
            try {
                //CARGAR DATOS DE LA COLUMNA DE LA MATRICULA 
                $nombre = $_GET['nombre'];
                $db = ADONewConnection($GLOBALS["driver"]);
                $db->debug = false;
                $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                $sql = "SELECT id,
                UPPER(matricula_titular) as matricula_titular,
                UPPER(matricula_beneficiario) as matricula_beneficiario,	
                case when nombre is null then '' else UPPER(nombre) end as nombre,
                case when apellido_pat is null then '' else UPPER(apellido_pat) end as apellido_pat,
                case when apellido_mat is null then '' else UPPER(apellido_mat) end as apellido_mat,
                DATE_FORMAT(fecha_nacimiento,'%d/%m/%Y') as fecha_nacimiento,
                case when ci is null or ci = '' then 'NO INGRESADO' else  UPPER(ci) end as ci, 	
                case when expirado is null or expirado = '' then 'NO INGRESADO' else UPPER(expirado) end as expirado,
                case when genero is null or genero = '' then 'NO INGRESADO' else  UPPER(genero) end as genero,	
                case when factorrh is null or factorrh = '' then 'NO INGRESADO' else UPPER(factorrh) end as factorrh,
                case when grupo is null or grupo = '' then 'NO INGRESADO' else UPPER(grupo) end as grupo,
                case when puntocardinal is null or puntocardinal = '' then 'NO INGRESADO' else UPPER(puntocardinal) end as puntocardinal,
                case when zona is null or zona = '' then 'NO INGRESADO' else UPPER(zona) end as zona,
                case when calle is null or calle = '' then 'NO INGRESADO' else UPPER(calle) end as calle,
                case when nro is null or nro = '' then 'NO INGRESADO' else UPPER(nro) end as nro,
                case when localidad is null or localidad = '' then 'NO INGRESADO' else UPPER(localidad) end as localidad,
                case when telefono is null or telefono = '' then 'NO INGRESADO' else UPPER(telefono) end as telefono,
                case when correo is null or correo = '' then 'NO INGRESADO' else UPPER(correo) end as correo,
                case when empresa is null or empresa = '' then 'NO INGRESADO' else UPPER(empresa) end as empresa,
                case when numeropatronal is null or numeropatronal = '' then 'NO INGRESADO' else UPPER(numeropatronal) end as numeropatronal,
                case when nroempleador is null or nroempleador = '' then 'NO INGRESADO' else UPPER(nroempleador) end as nroempleador,
                case when ocupacion is null or ocupacion = '' then 'NO INGRESADO' else UPPER(ocupacion) end as ocupacion,
                DATE_FORMAT(fecha_ingreso,'%d/%m/%Y') as fecha_ingreso,
                case when salario is null or salario = '' then '0.0' else salario end as salario,	
                case when categoria is null or categoria = '' then 'NO INGRESADO' else UPPER(categoria) end as categoria,	
                case when parentesco is null or parentesco = '' then 'NO INGRESADO' else UPPER(parentesco) end as parentesco,
                DATE_FORMAT(fecha_presentacion,'%d/%m/%Y') as fecha_presentacion,
                DATE_FORMAT(fecha_recepcion,'%d/%m/%Y') as fecha_recepcion,
                case when recepcion is null or recepcion = '' then 'NO INGRESADO' else UPPER(recepcion) end as recepcion,
                case when regional is null or regional ='' then 'NO INGRESADO' else UPPER(regional) end as regional,	
                UPPER(baja) as baja,	
                case when fecha_baja is null or fecha_baja='' then '00/00/0000' else DATE_FORMAT(fecha_baja,'%d/%m/%Y') end as fecha_baja,
                case when fecha_limite is null or fecha_limite='' then '00/00/0000' else DATE_FORMAT(fecha_limite,'%d/%m/%Y') end as fecha_limite,
                case when fecha_extincion is null or fecha_extincion='' then '00/00/0000'  else DATE_FORMAT(fecha_extincion,'%d/%m/%Y') end as fecha_extincion,
                UPPER(vivo) as vivo,
                UPPER(cotiza) as cotiza,
                UPPER(edad) as edadi,
                TIMESTAMPDIFF(YEAR,fecha_nacimiento,CURDATE()) AS edad,
                case when fecha_verificacion is null or fecha_verificacion='' then  '00/00/0000' else DATE_FORMAT(fecha_verificacion,'%d/%m/%Y') end as fecha_verificacion,
                CONCAT(apellido_pat,' ',apellido_mat,' ',nombre) AS nombrecompleto
                FROM afiliado
                HAVING nombrecompleto like '%$nombre%';";
                $rs = $db->Execute($sql);
                $db->Close();
                $array = $rs->Getrows();
                $arr = array();
                for ($j = 0; $j < count($array); $j++) {
                    $arr[$j] = array(
                        'id' => $array[$j]["id"], 'matricula_titular' => $array[$j]["matricula_titular"], 'matricula_beneficiario' => $array[$j]["matricula_beneficiario"], 'nombre' => $array[$j]["nombre"], 'apellido_pat' => $array[$j]["apellido_pat"], 'apellido_mat' => $array[$j]["apellido_mat"], 'fecha_nacimiento' => $array[$j]["fecha_nacimiento"], 'ci' => $array[$j]["ci"], 'expirado' => $array[$j]["expirado"], 'genero' => $array[$j]["genero"], 'factorrh' => $array[$j]["factorrh"], 'grupo' => $array[$j]["grupo"], 'puntocardinal' => $array[$j]["puntocardinal"], 'zona' => $array[$j]["zona"], 'calle' => $array[$j]["calle"], 'nro' => $array[$j]["nro"], 'localidad' => $array[$j]["localidad"], 'telefono' => $array[$j]["telefono"], 'correo' => $array[$j]["correo"], 'empresa' => $array[$j]["empresa"], 'numeropatronal' => $array[$j]["numeropatronal"], 'nroempleador' => $array[$j]["nroempleador"], 'ocupacion' => $array[$j]["ocupacion"], 'fecha_ingreso' => str_replace('\'', '', $array[$j]["fecha_ingreso"]), 'salario' => $array[$j]["salario"], 'categoria' => $array[$j]["categoria"], 'parentesco' => $array[$j]["parentesco"], 'fecha_presentacion' => $array[$j]["fecha_presentacion"], 'fecha_recepcion' => str_replace("" + "\"", '', $array[$j]["fecha_recepcion"]), 'recepcion' => $array[$j]["recepcion"], 'regional' => $array[$j]["regional"], 'baja' => $array[$j]["baja"], 'fecha_baja' => $array[$j]["fecha_baja"], 'fecha_limite' => $array[$j]["fecha_limite"], 'fecha_extincion' => $array[$j]["fecha_extincion"], 'vivo' => $array[$j]["vivo"], 'cotiza' => $array[$j]["cotiza"], 'edad' => $array[$j]["edad"], 'fecha_verificacion' => $array[$j]["fecha_verificacion"]
                    );
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
