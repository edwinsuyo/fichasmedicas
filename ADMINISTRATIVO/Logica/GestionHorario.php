<?php

include('GestionLogin.php');

class CGestionHorario
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

                    $sql = "SELECT re.id,re.fecha,re.turno,pa.carnet,pa.matricula,pa.nombre,pa.empresa,pa.parentesco,me.codigo,me.nombre as nombremedico,me.especialidad 
                    FROM reserva re
                    inner join paciente  pa on pa.id=re.idpaciente
                    inner join medico me on me.id=re.idmedico
                    order by re.fecha DESC;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lhorario = $db->Execute($sql);

                    $sql = "SELECT UPPER(especialidad) as nombre
                    from medico
                    group by especialidad
                    order by especialidad asc;";
                    $lespecialidad = $db->Execute($sql);

                    $db->Close();


                  
                    $idusuario = $_SESSION['idusuarioadm'];

                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Registrar horario");
                    $smarty2->assign("gestor", "GestionHorario.php");
                    $smarty2->assign("lhorario", $lhorario->GetArray());
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListarHorario.html');
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
                    $smarty2->assign("titulo", "Registrar horario");
                    $smarty2->assign("gestor", "horario.php");
                    $smarty2->assign("lespecialidad", $lespecialidad->GetArray());
                    $smarty2->assign("fechaActual", $fechaActual);
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("opcion", "10");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmListahorario.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------               
            case 3: { //LISTAR

                    $sql = "SELECT * from horario_lista;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if ($rs === false) {
                        return $this->showMensaje("Listar horarios Asegurado", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {
                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("listaasegurado", $rs->GetArray());
                        $smarty2->assign("titulo", "Listado de horario Asegurado");
                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListahorario.html');
                    }
                }
                break;
            case 4: { //ELIMINAR

                    $sql = "SELECT * from horario_lista;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if ($rs === false) {
                        return $this->showMensaje("Listar horarios Asegurado", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {
                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("gestor", "GestionAdmhorario.php");
                        $smarty2->assign("opcion", "12");
                        $smarty2->assign("listaasegurado", $rs->GetArray());
                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmEliminarhorario.html');
                    }
                }
                break;
            case 5: { //Modificar Datos

                    $sql = "SELECT * from asegurado;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lasegurado = $db->Execute($sql);


                    $sql = "SELECT * from regional;";
                    $lregional = $db->Execute($sql);


                    $horario_id = $_GET['id'];
                    $sql = "SELECT * from horario where id =$horario_id;";
                    $lhorario = $db->Execute($sql);
                    $db->Close();



                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Modificar horario");
                    $smarty2->assign("gestor", "GestionAdmhorario.php");
                    $smarty2->assign("lasegurado", $lasegurado->GetArray());
                    $smarty2->assign("lregional", $lregional->GetArray());
                    $smarty2->assign("lhorario", $lhorario->GetArray());
                    $smarty2->assign("opcion", "11");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmModhorario.html');
                }
                break;
            case 10: { //registrar

                    $nombre = $_POST['nombre'];
                    $apellido_p = $_POST['apellido_p'];
                    $apellido_m = $_POST['apellido_m'];
                    $genero = $_POST['genero'];
                    $titular = $_POST['titular'];
                    $beneficiario = $_POST['beneficiario'];
                    $empresa = $_POST['empresa'];
                    $fecha_nacimiento = $_POST['fecha_nacimiento'];
                    $fecha_ingreso = $_POST['fecha_ingreso'];
                    $fecha_inicio = $_POST['fecha_inicio'];
                    $fecha_final = $_POST['fecha_final'];
                    $motivo_consulta = $_POST['motivo_consulta'];
                    $diagnostico_descrip = $_POST['diagnostico_descrip'];
                    $file = $_FILES['uploadedfile']['name'];
                    $estado = 0;
                    $regional_id = $_POST['lregional'];
                    $tipo_asegurado_id = $_POST['lasegurado'];

                    $target_path = "../img/";
                    $target_path = $target_path . basename($_FILES['uploadedfile']['name']);
                    if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                        // echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
                    } else {
                        //echo "Ha ocurrido un error, trate de nuevo!";
                    }

                    $sql = "CALL horarioInsert('$nombre','$apellido_p','$apellido_m','$genero','$titular','$beneficiario','$empresa','$fecha_nacimiento'
                    ,'$fecha_ingreso','$fecha_inicio','$fecha_final','$motivo_consulta','$diagnostico_descrip','$file','$estado','$regional_id','$tipo_asegurado_id')";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $horario = $nombre . " ";
                    $horario = $horario . $apellido_p . " ";
                    $horario = $horario . $apellido_m . " ";

                    if ($rs === false) {
                        return $this->showMensaje("Registrar horario", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Asegurado : " . $horario . "<BR>" . $sql, "ERROR al Registrar...!!");
                    } else {
                        return $this->showMensaje("Registrar horario", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos del Asegurado : " . $horario, "  horario Asegurado  Registrado..!!!");
                    }

                    $db->Close();
                }
                break;

            case 11: { //Modificar

                    $ci = $_GET['ci'];
                    $nombre = $_GET['nombre'];
                    $apellido = $_GET['apellido'];
                    $genero = $_GET['genero'];
                    $edad = $_GET['edad'];
                    $telefono = $_GET['telefono'];
                    $direccion = $_GET['direccion'];
                    $correo = $_GET['correo'];
                    $password = $_GET['password'];
                    $username = $_GET['username'];
                    $latitud = $_GET['latitud'];
                    $longitud = $_GET['longitud'];
                    $Empleado_id = $_GET['idcliente'];
                    $persona_id = $_GET['id'];

                    $sql = "UPDATE persona set ci='$ci', nombre='$nombre',apellido='$apellido',edad='$edad',direccion='$direccion',correo='$correo'
                ,telefeno='$telefono',latitud='$latitud',longitud='$longitud' where id='$persona_id'";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);


                    $usuario = $_GET['nombre'] . " ";
                    $usuario = $usuario . $_GET['apellido'] . " ";
                    if ($rs === false) {
                        return $this->showMensaje("Modificar Empleado", "ERROR AL MODIFICAR", "Ocurrio un Error al Modificar : " . $usuario . "<BR>" . $sql, "ERROR al Modificar...!!");
                    } else {

                        $sql = "UPDATE Empleado set username='$username', password='$password' where id='$Empleado_id'";
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            return $this->showMensaje("Modificar Empleado", "ERROR AL MODIFICAR", "Ocurrio un Error al Modificar : " . $usuario . "<BR>" . $sql, "ERROR al Modificar...!!");
                        } else {
                            return $this->showMensaje("Modificar Usuario", "EXITO AL MODIFICAR", "Se Modifico Exitosamente los datos de : " . $usuario, "Empleado  Modificado..!!!");
                        }
                    }

                    $db->Close();
                }
                break;
            case 12: { //eliminar

                    $horario_id = $_GET['id'];
                    $sql = "UPDATE  horario set estado=1 where id=$horario_id";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $horario = $_GET['nombre'] . " ";
                    $horario = $horario . $_GET['apellido_P'] . " ";
                    if ($rs === false) {
                        return $this->showMensaje("Eliminar horario", "ERROR AL ELIMINAR", "Ocurrio un Error al dar de baja al Asegurado : " . $horario . "<BR>" . $sql, "ERROR al Eliminar...!!");
                    } else {
                        return $this->showMensaje("Eliminar horario", "EXITO AL ELIMINAR", "Se dio de Baja Exitosamente al Asegurado : " . $horario, "  horario Asegurado Eliminado..!!!");
                    }

                    $db->Close();
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


$oAdmUsr = new CGestionHorario();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
