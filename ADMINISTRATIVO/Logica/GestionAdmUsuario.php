<?php

include('GestionLogin.php');

class CGestionAdmUsuario
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
            case 1: { //REGISTRAR

                    try {
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);

                        //Traer el Tipo de Usuario
                        $sql = "SELECT id
                                ,UPPER(nombre) as nombre
                                ,descripcion,estado 
                                from tipousuario
                                where estado=0;";

                        $ltipousuario = $db->Execute($sql);
                        $db->Close();

                        //Id del usuario Login
                        $idusuario = $_SESSION['idusuarioadm'];

                        //Mostrar formulario de registro de usuario 
                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Usuario");
                        $smarty2->assign("gestor", "GestionAdmUsuario.php");
                        $smarty2->assign("ltipousuario", $ltipousuario->GetArray());
                        $smarty2->assign("idusuario", $idusuario);
                        $smarty2->assign("opcion", "10");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmRegUsuario.html');
                    } catch (Exception $ex) {
                        $hiper = "<script>
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>

                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'No Cargo la Pagina de Registro Ingrese a la opcion de nuevo',
                            showConfirmButton: false,
                            timer: 1500
                        });
                              </script>";
                        return $this->showMensaje("Registrar Usuarios", "ERROR AL INGRESAR AL REGISTRAR", $hiper . '<BR>' . $ex, "ERROR al Ingresar a Registrar...!!");
                    }
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------
            case 2: { //MODIFICAR

                    // Trae a los usuarios
                    $sql = "SELECT 
                    u.*
                    ,tu.nombre as tipousuario 
                    FROM usuario u
                    inner join tipousuario tu on tu.id=u.id_tipousuario;";

                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lUsuario = $db->Execute($sql);
                    $db->Close();


                    $fechaActual = date('d-m-Y');
                    //Id del Usuario Logeado
                    $idusuario = $_SESSION['idusuarioadm'];

                    //Mostrar la Lista de Usuario
                    $smarty2 = new Smarty;
                    $smarty2->compile_check = true;
                    $smarty2->debugging = false;
                    $smarty2->assign("titulo", "Modificar Usuario");
                    $smarty2->assign("gestor", "GestionAdmUsuario.php");
                    $smarty2->assign("idpaciente", $idusuario);
                    $smarty2->assign("lusuario", $lUsuario->GetArray());
                    $smarty2->assign("opcion", "5");

                    #Visualizar la informacion en el TEMPLATE
                    return $smarty2->fetch('../templates/FrmModificarUsuario.html');
                }
                break;
                //------------------------------------------------------------------------------------------------------------------------------------------               
            case 3: { //LISTAR

                    //Trae la Lista de Usuario 
                    $sql = "SELECT 
                    u.*
                    ,tu.nombre as tipousuario 
                    FROM usuario u
                    inner join tipousuario tu on tu.id=u.id_tipousuario;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $lUsuario = $db->Execute($sql);

                    $db->Close();
                    //Id del usuario Logeado
                    $idusuario = $_SESSION['idusuarioadm'];

                    if ($lUsuario === false) {
                        return $this->showMensaje("Listar Usuarios", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Registrar Usuario");
                        $smarty2->assign("gestor", "GestionAdmUsuario.php");
                        $smarty2->assign("lusuario", $lUsuario->GetArray());
                        $smarty2->assign("idusuario", $idusuario);
                        $smarty2->assign("opcion", "10");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmListarUsuario.html');
                    }
                }
                break;
            case 4: { //ELIMINAR

                    //Trae La Lista de Usuario
                    $sql = "SELECT 
                    u.*
                    ,tu.nombre as tipousuario 
                    FROM usuario u
                    inner join tipousuario tu on tu.id=u.id_tipousuario;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    $db->Close();

                    if ($rs === false) {
                        return $this->showMensaje("Listar Usuarios ", "ERROR AL LISTAR", "Ocurrio un Error al listar <BR>" . $sql, "ERROR al Listar...!!");
                    } else {
                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("gestor", "GestionAdmUsuario.php");
                        $smarty2->assign("opcion", "13");
                        $smarty2->assign("habilitar", "14");
                        $smarty2->assign("lusuario", $rs->GetArray());
                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmEliminarUsuario.html');
                    }
                }
                break;
            case 5: { //TRAER USUARIO PARA MODIFICAR DATOS      
                    try {
                        $idmodificar = $_GET['id'];
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);

                        //Trae la lista de Tipo de Usuario
                        $sql = "SELECT id
                                ,UPPER(nombre) as nombre
                                ,descripcion,estado 
                                from tipousuario
                                where estado=0;";
                        $ltipousuario = $db->Execute($sql);

                        //Trae la Lista de Usuario Seleccionado 
                        $sql = "SELECT 
                                u.*
                                ,tu.nombre as tipousuario 
                                FROM usuario u
                                inner join tipousuario tu on tu.id=u.id_tipousuario
                                where u.id=$idmodificar;";
                        $lUsuario = $db->Execute($sql);
                        $db->Close();

                        //Id del usuario Logeado
                        $idusuario = $_SESSION['idusuarioadm'];

                        $smarty2 = new Smarty;
                        $smarty2->compile_check = true;
                        $smarty2->debugging = false;
                        $smarty2->assign("titulo", "Modificar Usuario");
                        $smarty2->assign("gestor", "GestionAdmUsuario.php");
                        $smarty2->assign("ltipousuario", $ltipousuario->GetArray());
                        $smarty2->assign("lusuario", $lUsuario->GetArray());
                        $smarty2->assign("idusuario", $idusuario);
                        $smarty2->assign("opcion", "11");

                        #Visualizar la informacion en el TEMPLATE
                        return $smarty2->fetch('../templates/FrmModUsuario.html');
                    } catch (Exception $ex) {
                        $hiper = "<script>
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>

                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'No Cargo la Pagina de Registro Ingrese a la opcion de nuevo',
                            showConfirmButton: false,
                            timer: 1500
                        });
                              </script>";
                        return $this->showMensaje("Registrar Usuarios", "ERROR AL INGRESAR AL REGISTRAR", $hiper . '<BR>' . $ex, "ERROR al Ingresar a Registrar...!!");
                    }
                }
                break;
            case 10: { //Registrar Usuario
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $id_tipousuario = $_POST['ltipousuario'];
                    $username = $_POST['usuario'];
                    $password = $_POST['password'];
                    $estado = 0;

                    $passwordencrytado = password_hash($password, PASSWORD_BCRYPT);

                    $sql = "INSERT into Usuario (nombre,apellido,username,password,estado,fecha,id_tipousuario) 
                    values('$nombre','$apellido','$username','$passwordencrytado','$estado',now(),$id_tipousuario) ";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);

                    $Usuario = $nombre . " ";
                    $Usuario = $Usuario . $apellido . " ";
                    $Usuario = $Usuario . $username . " ";
                    $db->Close();
                    if ($rs === false) {
                        return $this->showMensaje("Registrar Usuario", "ERROR AL REGISTRAR", "Ocurrio un Error al Registrar el Asegurado : " . $Usuario . "<BR>" . $sql, "ERROR al Registrar...!!");
                    } else {
                        return $this->showMensaje("Registrar Usuario", "EXITO AL REGISTRAR", "Se Registro Exitosamente los datos del Asegurado : " . $Usuario, "  Usuario Asegurado  Registrado..!!!");
                    }
                }
                break;

            case 11: { //Modificar Usuario
                    try {
                        $idmodificaruser = $_POST['idmodificar'];

                        $nombre = $_POST['nombre'];
                        $apellido = $_POST['apellido'];
                        $id_tipousuario = $_POST['ltipousuario'];
                        $username = $_POST['usuario'];
                        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

                        $sql = "UPDATE usuario SET nombre='$nombre',apellido='$apellido',username='$username',password='$password',id_tipousuario=$id_tipousuario WHERE id=$idmodificaruser;";
                        $db = ADONewConnection($GLOBALS["driver"]);
                        $db->debug = false;
                        $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                        $rs = $db->Execute($sql);
                        if ($rs === false) {
                            $hiper = "<script>
                            <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
    
                            Swal.fire({
                                icon: 'error',
                                title: 'ERROR',
                                text: 'No Se Modifico los Datos',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            </script>";
                            return $this->showMensaje("Error Modificar", "ERROR AL MODIFICAR", $hiper . "Ocurrio un Error al Modificar : <BR>" . $sql, "ERROR al Modificar...!!");
                        } else {
                            $hiper = "<script>
                            
                            Swal.fire({
                                icon: 'success',
                                title: 'MODIFICADO',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            </script>";
                            
                            return $this->showMensaje("Exito al Modifcar", "EXITO AL MODIFICAR", $hiper."Se Inserto Correctamente los datos : <BR>", "Modificar...!!");
                        }
                    } catch (Exception $ex) {

                        $hiper = "<script>
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>

                        Swal.fire({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'No Cargo la Pagina de Registro Ingrese a la opcion de nuevo',
                            showConfirmButton: false,
                            timer: 1500
                        });
                              </script>";
                        return $this->showMensaje("Modficar Usuarios", "ERROR AL INGRESAR PARA MODIFICAR", $hiper . '<BR>' . $ex, "ERROR al Modificar a Registrar...!!");
                    }
                }
                break;
            case 12: { //Regisro de dia de trabajo de Usuariol

                    $idUsuario = $_POST['idUsuario'];
                    $ldias = $_POST['check_list'];

                    $sql = "UPDATE diaUsuario SET estado=1 where idUsuario=$idUsuario;";
                    $db = ADONewConnection($GLOBALS["driver"]);
                    $db->debug = false;
                    $db->Connect($GLOBALS["server"], $GLOBALS["user"], $GLOBALS["password"], $GLOBALS["database"]);
                    $rs = $db->Execute($sql);
                    foreach ($ldias as $iddiasemana) {
                        $sql = "SELECT * FROM diaUsuario where idUsuario=$idUsuario and iddiasemana=$iddiasemana;";
                        $rs = $db->Execute($sql);
                        $arr = $rs->Getrows();
                        $resultado = $arr[0]["id"];
                        if (empty($resultado)) {
                            $sql = "INSERT INTO diaUsuario (iddiasemana,idUsuario,estado) values ($iddiasemana,$idUsuario,0);";
                            $rs = $db->Execute($sql);
                        } else {
                            $sql = "UPDATE diaUsuario set estado=0 where iddiasemana=$iddiasemana and idUsuario=$idUsuario;";
                            $rs = $db->Execute($sql);
                        }
                    }
                    $db->Close();
                    return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", "Se Inserto Correctamente los datos : <BR>", "Dia de Trabajo del Usuario Registrado...!!");
                }
                break;
            case 13: { //Regisro de dia de trabajo de Usuariol

                    $idUsuario = $_GET['id'];
                    $sql = "UPDATE usuario SET estado=1 where id=$idUsuario;";
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
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Usuario Registrado...!!");
                    } else {
                        $hiper = "
                        <script src=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\"></script>
                        <script>
                        alert(\"este texto es el que modificas\");
                        Swal.fire({
                            icon: 'success',
                            title: 'REGISTRADO',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        </script>";
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Usuario Registrado...!!");
                    }
                }
                break;
            case 14: { //Regisro de dia de trabajo de Usuariol

                    $idUsuario = $_GET['id'];

                    $sql = "UPDATE usuario SET estado=0 where id=$idUsuario;";
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
                        return $this->showMensaje("Error al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Usuario Registrado...!!");
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
                        return $this->showMensaje("Exito al Insertar", "EXITO AL INSERTAR", $hiper, "Dia de Trabajo del Usuario Registrado...!!");
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


$oAdmUsr = new CGestionAdmUsuario();
$html_out = $oAdmUsr->ejecutar($_REQUEST['opcion']);
$oLogin = new CLogin();
$oLogin->setOutputBody($html_out);
$oLogin->generarOpciones($_SESSION['usuarioadm'], $_SESSION['contrasenaadm']);
