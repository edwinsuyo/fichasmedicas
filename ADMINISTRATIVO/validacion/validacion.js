//Validacion de vacio en Registro de Usuario
function valida_registrar_usuario() {

    event.preventDefault();

    if (document.vvalida.nombre.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el nombre del usuario!'
        });
        document.vvalida.nombre.focus();
        return 0;
    }


    if (document.vvalida.apellido.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el apellido!'
        });
        document.vvalida.apellido.focus();
        return 0;
    }

    if (document.vvalida.ltipousuario.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar el tipo de Usuario!'
        });
        document.vvalida.ltipousuario.focus();
        return 0;
    }

    if (document.vvalida.ltipousuario.value == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar el tipo de Usuario!'
        });
        document.vvalida.ltipousuario.focus();
        return 0;
    }

    if (document.vvalida.usuario.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el usuario para la cuenta!'
        });
        document.vvalida.usuario.focus();
        return 0;
    }

    if (document.vvalida.password.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el password del usuario!'
        });
        document.vvalida.password.focus();
        return 0;
    }

    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalida.submit();
        }
        return false;
    })

}

//Validacion de vacio en Registro de Especialidad
function valida_registrar_especialidad() {

    event.preventDefault();

    if (document.vvalidaespecialidad.especialidad.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la especialidad!'
        });
        document.vvalidaespecialidad.especialidad.focus();
        return 0;
    }

    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalidaespecialidad.submit();
        }
        return false;
    })

}

//Validacion de vacio en Registro de Medico
function valida_registrar_medico() {

    event.preventDefault();

    if (document.vvalida.codigo.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el codigo!'
        });
        document.vvalida.codigo.focus();
        return 0;
    }

    if (document.vvalida.nombre.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el nombre del medico!'
        });
        document.vvalida.nombre.focus();
        return 0;
    }


    if (document.vvalida.apellido_p.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el apellido paterno!'
        });
        document.vvalida.apellido_p.focus();
        return 0;
    }

    if (document.vvalida.apellido_m.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el apellido materno!'
        });
        document.vvalida.apellido_m.focus();
        return 0;
    }

    if (document.vvalida.lgenero.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar un genero!'
        });
        document.vvalida.lgenero.focus();
        return 0;
    }

    if (document.vvalida.lgenero.value == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar un genero!'
        });
        document.vvalida.lgenero.focus();
        return 0;
    }

    if (document.vvalida.lespecialidad.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar una especialidad!'
        });
        document.vvalida.lespecialidad.focus();
        return 0;
    }

    if (document.vvalida.lespecialidad.value == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar una especialidad!'
        });
        document.vvalida.lespecialidad.focus();
        return 0;
    }

    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalida.submit();
        }
        return false;
    })

}


//Validacion de vacio en Horario Registro de Medico
function valida_registrar_hora_medico() {

    event.preventDefault();

    if (document.vvalida.lhorario.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar un turno del medico!'
        });
        document.vvalida.lhorario.focus();
        return 0;
    }

    if (document.vvalida.lhorario.value == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que seleccionar un turno del medico!'
        });
        document.vvalida.lhorario.focus();
        return 0;
    }

    if (document.vvalida.hora_inicio.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la hora de inicio del medico!'
        });
        document.vvalida.hora_inicio.focus();
        return 0;
    }

    if (document.vvalida.hora_inicio.value === "") {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la hora de inicio del medico!'
        });
        document.vvalida.hora_inicio.focus();
        return 0;
    }


    if (document.vvalida.hora_final.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la hora final del medico!'
        });
        document.vvalida.hora_final.focus();
        return 0;
    }

    if (document.vvalida.hora_final.value === "") {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la hora final del medico!'
        });
        document.vvalida.hora_final.focus();
        return 0;
    }

    if (document.vvalida.duracion.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que colocar la duracion de la consulta del medico!'
        });
        document.vvalida.duracion.focus();
        return 0;
    }

    if (document.vvalida.duracion.value == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que colocar la duracion de la consulta del medico!'
        });
        document.vvalida.duracion.focus();
        return 0;
    }

    if (document.vvalida.duracion.value >= 30) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La consulta no puede pasar mas de 30 min. del medico!'
        });
        document.vvalida.duracion.focus();
        return 0;
    }

    if (document.vvalida.cupo.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que colocar los cupos del medico!'
        });
        document.vvalida.cupo.focus();
        return 0;
    }

    if (document.vvalida.cupo.value == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que colocar los cupos del medico!'
        });
        document.vvalida.cupo.focus();
        return 0;
    }



    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalida.submit();
        }
        return false;
    })

}
///////

//Validacion de vacio en Dia de Trabajo Registro de Medico
function valida_registrar_dia_medico() {

    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalida.submit();
        }
        return false;
    })

}
///////

function EspecialidadChange(selectObj) {
    if ($('#lespecialidad').val() == "0") {
        document.getElementById("lmedico").disabled = false;
        document.getElementById("lmedico").selectedIndex = 1;
    } else {
        var medicos = "datomedico.php?data=" + $('#lespecialidad').val() + "&valor=1";
        $.ajax({
            url: medicos,
            dataType: 'json',
            success: recargarlistamedico
        });
    }
}


function recargarlistamedico(json) {
    $("#lmedico").find('option').not(':first').remove();
    var $select = $('#lmedico');
    var l = json.length;
    $select.append('<option ' + 'selected="selected"' + 'value=' + '0' + '>' + 'TODOS' + '</option>');
    for (i = 0; i < l; i++) {
        $select.append('<option value=' + json[i].id + '>' + json[i].nombre + '</option>');
    }
}
//buscar fichas por parametros del combobox
function BuscarFicha() {
    var fechainicio = $('#single_cal1').val();
    var fechafinal = $('#single_cal2').val();
    fechainicio = fechainicio.replace("/", "-");
    fechainicio = fechainicio.replace("/", "-");
    fechainicio = fechainicio.substring(6, 10) + "-" + fechainicio.substring(3, 5) + "-" + fechainicio.substring(0, 2);
    fechafinal = fechafinal.replace("/", "-");
    fechafinal = fechafinal.replace("/", "-");
    fechafinal = fechafinal.substring(6, 10) + "-" + fechafinal.substring(3, 5) + "-" + fechafinal.substring(0, 2);

    // Custom filtering function which will search data in column four between two values



    var fichas = "datoficha.php?opcion=8&especialidad=" + $('#lespecialidad').val() + "&valorm=" + $('#lmedico').val() + "&fechainicio=" + fechainicio + "&fechafinal=" + fechafinal;
    alert(fichas);
    $.ajax({
        url: fichas,
        dataType: 'json',
        success: recargarlistaficha
    });
}


function recargarlistaficha(json) {

    var table2 = $('#example').DataTable();
    table2.clear().draw();



    var l = json.length;
    var table = $('#example').DataTable();

    for (i = 0; i < l; i++) {
        var cell1 = json[i].id;
        var cell2 = json[i].fecha;
        var cell3 = json[i].turno;
        var cell4 = json[i].horareserva;
        var cell5 = json[i].carnet;
        var cell6 = json[i].matricula;
        var cell7 = json[i].nombre;
        var cell8 = json[i].empresa;
        var cell9 = json[i].parentesco;
        var cell10 = json[i].codigo;
        var cell11 = json[i].nombremedico;
        var cell12 = json[i].especialidad;
        table
            .row.add(
                [
                    cell1,
                    cell2,
                    cell3,
                    cell4,
                    cell5,
                    cell6,
                    cell7,
                    cell8,
                    cell9,
                    cell10,
                    cell11,
                    cell12
                ])
            .draw()
    }

}
function exportTableToExcel(tableID, filename = '') {
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename ? filename + '.xls' : 'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if (navigator.msSaveOrOpenBlob) {
        var blob = new Blob(['ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}

function CargarAsegurado() {
    //var txtmatricula = document.querySelector('#matricula').innerText;
    var txtmatricula = document.getElementById("matricula").value;
    var mapObj = {
        _: "",
    };
    txtmatricula = txtmatricula.replace(/_/g, function (matched) {
        return mapObj[matched];
    });
    alert(txtmatricula.length);
    if (txtmatricula.trim() === "" || txtmatricula === undefined || txtmatricula.length < 11) {

        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La matricula Esta Incorrecto!'
        });

    }
    else {
        var afiliadosbenef = "datoafiliacion.php?opcion=1&matricula=" + txtmatricula;
        $.ajax({
            url: afiliadosbenef,
            dataType: 'json',
            success: recargarlistabeneficiario
        });

        var afiliado = "datoafiliacion.php?opcion=3&matricula=" + txtmatricula;
        $.ajax({
            url: afiliadosbenef,
            dataType: 'json',
            success: recargarafiliado
        });
    }
}

function recargarlistabeneficiario(json) {

    var table2 = $('#example').DataTable();
    table2.clear().draw();



    var l = json.length;
    var table = $('#example').DataTable();

    for (i = 0; i < l; i++) {
        var cell1 = json[i].id;
        var cell2 = json[i].matricula_beneficiario;
        var cell3 = json[i].parentesco;
        var cell4 = json[i].apellido_pat;
        var cell5 = json[i].apellido_mat;
        var cell6 = json[i].nombre;
        var cell7 = json[i].fecha_nacimiento;
        var cell8 = json[i].edad;
        var cell9 = json[i].genero;
        var cell10 = json[i].ci;
        var cell11 = json[i].factorrh;
        var cell12 = json[i].grupo;
        var cell13 = json[i].fecha_extincion;
        table
            .row.add(
                [
                    cell1,
                    cell2,
                    cell3,
                    cell4,
                    cell5,
                    cell6,
                    cell7,
                    cell8,
                    cell9,
                    cell10,
                    cell11,
                    cell12,
                    cell13
                ])
            .draw()
    }
}


function recargarafiliado(json) {

    var table2 = $('#example').DataTable();
    table2.clear().draw();



    var l = json.length;
    var table = $('#example').DataTable();

    for (i = 0; i < l; i++) {
        var cell1 = json[i].id;
        var cell2 = json[i].matricula_beneficiario;
        var cell3 = json[i].parentesco;
        var cell4 = json[i].apellido_pat;
        var cell5 = json[i].apellido_mat;
        var cell6 = json[i].nombre;
        var cell7 = json[i].fecha_nacimiento;
        var cell8 = json[i].edad;
        var cell9 = json[i].genero;
        var cell10 = json[i].ci;
        var cell11 = json[i].factorrh;
        var cell12 = json[i].grupo;
        var cell13 = json[i].fecha_extincion;
        table
            .row.add(
                [
                    cell1,
                    cell2,
                    cell3,
                    cell4,
                    cell5,
                    cell6,
                    cell7,
                    cell8,
                    cell9,
                    cell10,
                    cell11,
                    cell12,
                    cell13
                ])
            .draw()
    }
}

// SOLO LETRAS PARA LA INSERCION DE DATOS CON LETRAS
function soloLetras(e) {

    //letras = " áéíóúabcdefghijklmnñopqrstuvwxSyz",
    var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
    }
}

// SOLO LETRAS PARA LA INSERCION DE DATOS CON NUMEROS   
function soloNumeros(event) {
    if (event.charCode >= 48 && event.charCode <= 57) {
        return true;
    }
    return false;
}


document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input[type=text]').forEach(node => node.addEventListener('keypress', e => {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
    }))
});
function nextFocus(inputF, inputS) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.keyCode == 13) {
            document.getElementById(inputS).focus();
        }
    });
}

//exportar a EXCEL

function exportToExcel(tableId) {
    let tableData = document.getElementById(tableId).outerHTML;
    tableData = tableData.replace(/<A[^>]*>|<\/A>/g, ""); //remove if u want links in your table
    tableData = tableData.replace(/<input[^>]*>|<\/input>/gi, ""); //remove input params
    //tableData = tableData + '<br /><br />Code witten By sudhir K gupta.<br />My Blog - https://comedymood.com'

    let a = document.createElement('a');
    a.href = `data:application/vnd.ms-excel, ${encodeURIComponent(tableData)}`
    a.download = 'downloaded_file_' + getRandomNumbers() + '.xls'
    a.click()
}
function getRandomNumbers() {
    let dateObj = new Date()
    let dateTime = `${dateObj.getHours()}${dateObj.getMinutes()}${dateObj.getSeconds()}`

    return `${dateTime}${Math.floor((Math.random().toFixed(2) * 100))}`
}


function PantallaBeneficiario() {
    
    var txtmatricula = document.getElementById("matricula").value;
    var mapObj = {
        _: "",
    };
    txtmatricula = txtmatricula.replace(/_/g, function (matched) {
        return mapObj[matched];
    });
    alert(txtmatricula.length);
    if (txtmatricula.trim() === "" || txtmatricula === undefined || txtmatricula.length < 11) {

        event.preventDefault();
        Swal.fire({
            icon: 'error',
            title:'Oops...',
            text: 'La matricula Esta Incorrecto!'
        });

    }
    else {
        var afiliadosbenef = "datoafiliacion.php?opcion=1&matricula=" + txtmatricula;
        $.ajax({
            url: afiliadosbenef,
            dataType: 'json',
            success: recargarlistabeneficiario
        });

        var afiliado = "datoafiliacion.php?opcion=3&matricula=" + txtmatricula;
        $.ajax({
            url: afiliadosbenef,
            dataType: 'json',
            success: recargarafiliado
        });
    }

    $('#BeneficiarioModal').modal();
    
}

// Para buscar al momento de registrar un afiliado
function BusquedaEmpresa() {
    var val = document.getElementById("empresa").value;
    var pos = "";
    var opts = document.getElementById('dlist').children;
    for (var i = 0; i < opts.length; i++) {
        if (opts[i].value === val) {
            var dato = opts[i].textContent;
            pos = opts[i].value;
            document.getElementById("empresa").value = dato;
            break;
        }
    }
    if (pos != "") {
        var empresa = "datoafiliacion.php?opcion=2&empresa=" + pos;
        $.ajax({
            url: empresa,
            dataType: 'json',
            success: cargardatoempresa
        });
    }
}
// Para buscar al momento de registrar un afiliado
function BusquedaRegional() {
    var val = document.getElementById("empresa").value;
    var pos = "";
    var opts = document.getElementById('dlist').children;
    for (var i = 0; i < opts.length; i++) {
        if (opts[i].value === val) {
            var dato = opts[i].textContent;
            pos = opts[i].value;
            document.getElementById("empresa").value = dato;
            break;
        }
    }
    if (pos != "") {
        var empresa = "datoafiliacion.php?opcion=2&empresa=" + pos;
        $.ajax({
            url: empresa,
            dataType: 'json',
            success: cargardatoempresa
        });
    }
}


function cargardatoempresa(json) {
    var nroempleador = document.getElementById("numeroempleador").value;
    var l = json.length;
    for (i = 0; i < l; i++) {
        document.getElementById("numeroempleador").value = json[i].numeropatronal;
    }

}

function FunctionMatriculaTitular() {

}

function FunctionMatriculaBeneficiario() {
    const apellidopatbenef = document.getElementById("apellidopaternobeneficiario").value;
    const apellidomatbenef = document.getElementById("apellidomaternobeneficiario").value;
    const nombrebenef = document.getElementById("nombrebeneficiario").value;
    const fechanacido = document.getElementById("fechanacimientobeneficiario").value;
    var lgenero = document.getElementById("lgenerobeneficiario").value;
    var nombre = "";
    var matriculabeneficiario = "";
    if (lgenero == "F") {
        const partes = fechanacido.split("-");
        var anio = parseInt(partes[0], 10).toString();
        var mes = parseInt(partes[1], 10).toString(); // Los meses en JavaScript son 0-indexados
        var dia = parseInt(partes[2], 10).toString();
        if (mes < 10) {
            mes = '5' + mes.substr(0, 1);
        }
        else {
            mes = '6' + mes.substr(1, 2);
        }
        if (dia < 10) { dia = '0' + dia; }
        // Expresión regular para verificar si el valor contiene solo letras
        var regex = /^[A-Za-z]+$/;
        // Verificar si el valor contiene solo letras
        if (regex.test(apellidopatbenef)) {
            // Si solo contiene letras, mostrar un mensaje de éxito
            nombre = apellidopatbenef.substr(0, 1); // La cadena no está vacía y no contiene espacios
            if (regex.test(apellidomatbenef)) {
                // Si solo contiene letras, mostrar un mensaje de éxito
                nombre = nombre + apellidomatbenef.substr(0, 1);; // La cadena no está vacía y no contiene espacios
            } else {
                nombre = nombre + apellidopatbenef.substr(1, 2);
            }
            if (regex.test(nombrebenef)) {
                // Si solo contiene letras, mostrar un mensaje de éxito
                nombre = nombre + nombrebenef.substr(0, 1); // La cadena no está vacía y no contiene espacios
            } else {
                // Si contiene otros caracteres, mostrar un mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tiene que colocar el nombre por lo menos!'
                });
            }
        } else {
            if (regex.test(apellidomatbenef)) {
                // Si solo contiene letras, mostrar un mensaje de éxito
                nombre = nombre + apellidomatbenef.substr(0, 2); // La cadena no está vacía y no contiene espacios
            } else {
                // Si contiene otros caracteres, mostrar un mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tiene que colocar un apellido por lo menos!'
                });
            }
            if (regex.test(nombrebenef)) {
                // Si solo contiene letras, mostrar un mensaje de éxito
                nombre = nombre + nombrebenef.substr(0, 1); // La cadena no está vacía y no contiene espacios
            } else {
                // Si contiene otros caracteres, mostrar un mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Tiene que colocar el nombre por lo menos!'
                });
            }
        }
        matriculabeneficiario = anio.substr(2, 3) + '-' + mes + dia + '-' + nombre;
        document.getElementById("matriculabeneficiario").value = matriculabeneficiario;
    }
    else {
        if (lgenero == "M") {
            const partes = fechanacido.split("-");
            var anio = parseInt(partes[0], 10).toString();
            var mes = parseInt(partes[1], 10).toString(); // Los meses en JavaScript son 0-indexados
            var dia = parseInt(partes[2], 10).toString();
            if (mes < 10) { mes = '0' + mes; }
            if (dia < 10) { dia = '0' + dia; }
            // Expresión regular para verificar si el valor contiene solo letras
            var regex = /^[A-Za-z]+$/;
            // Verificar si el valor contiene solo letras
            if (regex.test(apellidopatbenef)) {
                // Si solo contiene letras, mostrar un mensaje de éxito
                nombre = apellidopatbenef.substr(0, 1); // La cadena no está vacía y no contiene espacios
                if (regex.test(apellidomatbenef)) {
                    // Si solo contiene letras, mostrar un mensaje de éxito
                    nombre = nombre + apellidomatbenef.substr(0, 1);; // La cadena no está vacía y no contiene espacios
                } else {
                    nombre = nombre + apellidopatbenef.substr(1, 2);
                }
                if (regex.test(nombrebenef)) {
                    // Si solo contiene letras, mostrar un mensaje de éxito
                    nombre = nombre + nombrebenef.substr(0, 1); // La cadena no está vacía y no contiene espacios
                } else {
                    // Si contiene otros caracteres, mostrar un mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tiene que colocar el nombre por lo menos!'
                    });
                }
            } else {
                if (regex.test(apellidomatbenef)) {
                    // Si solo contiene letras, mostrar un mensaje de éxito
                    nombre = nombre + apellidomatbenef.substr(0, 2); // La cadena no está vacía y no contiene espacios
                } else {
                    // Si contiene otros caracteres, mostrar un mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tiene que colocar un apellido por lo menos!'
                    });
                }
                if (regex.test(nombrebenef)) {
                    // Si solo contiene letras, mostrar un mensaje de éxito
                    nombre = nombre + nombrebenef.substr(0, 1); // La cadena no está vacía y no contiene espacios
                } else {
                    // Si contiene otros caracteres, mostrar un mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tiene que colocar el nombre por lo menos!'
                    });
                }
            }
            matriculabeneficiario = anio.substr(2, 3) + '-' + mes + dia + '-' + nombre;
            document.getElementById("matriculabeneficiario").value = matriculabeneficiario;
        }
        else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Tiene que seleccionar un genero para el beneficiario!'
            });
        }
    }
}


function CalculoFechaExtincion(inputF, inputS) {
    document.getElementById(inputF).addEventListener('keydown', function (event) {
        if (event.keyCode == 13) {

            var fechanacido = document.getElementById("fechanacimientobeneficiario").value;
            // Convertir la fecha de nacimiento a objeto Date
            const partes = fechanacido.split("-");
            const anio = parseInt(partes[0], 10);
            const mes = parseInt(partes[1], 10) - 1; // Los meses en JavaScript son 0-indexados
            const dia = parseInt(partes[2], 10);
            const fechaObj = new Date(anio, mes, dia);

            // Sumar años y días
            fechaObj.setFullYear(fechaObj.getFullYear() + 19);
            fechaObj.setDate(fechaObj.getDate() + (-1));

            // Convertir de nuevo a dd/mm/yyyy
            const diaFinal = ("0" + fechaObj.getDate()).slice(-2);
            const mesFinal = ("0" + (fechaObj.getMonth() + 1)).slice(-2); // Ajustar por meses 0-indexados
            const anioFinal = fechaObj.getFullYear();

            //document.getElementById("fechaextincion").value = diaFinal + '/' + mesFinal + '/' + anioFinal;
            document.getElementById("fechaextincion").value = anioFinal + "-" + mesFinal + "-" + diaFinal;
            document.getElementById(inputS).focus();
        }
    });
}

//validacion de fecha completa
function ValidarFecha() {
    var fecha = "13/09/1985";
    if (validarFormatoFecha(fecha)) {
        if (existeFecha(fecha)) {
            alert("La fecha introducida es correcta.");
        } else {
            alert("La fecha introducida no existe.");
        }
    } else {
        alert("El formato de la fecha es incorrecto.");
    }
}
//validar fecha 
function validarFormatoFecha(campo) {
    var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
    if ((campo.match(RegExPattern)) && (campo != '')) {
        return true;
    } else {
        return false;
    }
}
// Existe Fecha	
function existeFecha(fecha) {
    var fechaf = fecha.split("/");
    var day = fechaf[0];
    var month = fechaf[1];
    var year = fechaf[2];
    var date = new Date(year, month, '0');
    if ((day - 0) > (date.getDate() - 0)) {
        return false;
    }
    return true;
}

function existeFecha2(fecha) {
    var fechaf = fecha.split("/");
    var d = fechaf[0];
    var m = fechaf[1];
    var y = fechaf[2];
    return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
}


function CargarDatosAfiliados(event) {
    let tecla = (document.all) ? event.keyCode : event.which;
    if (tecla == 13) {
        // Llamar a la función que deseas ejecutar
        CargarDatosAfiliadosBuscar();
    }
}

function CargarDatosAfiliadosBuscar() {
    var txtmatricula = document.getElementById("matriculabuscar").value;
    var mapObj = {
        _: "",
    };
    txtmatricula = txtmatricula.replace(/_/g, function (matched) {
        return mapObj[matched];
    });
    var afiliadosbenef = "datoafiliacion.php?opcion=5&matricula=" + txtmatricula;
    $.ajax({
        url: afiliadosbenef,
        dataType: 'json',
        success: recargarlistabuscarafiliado
    });
}

function recargarlistabuscarafiliado(json) {

    var table2 = $('#tablaafiliado').DataTable();
    table2.clear().draw();



    var l = json.length;
    var table = $('#tablaafiliado').DataTable();

    for (i = 0; i < l; i++) {
        var cell1 = json[i].id;
        var cell2 = json[i].apellido_pat + ' ' + json[i].apellido_mat + ' ' + json[i].nombre;
        var cell3 = json[i].matricula_beneficiario;
        var cell4 = json[i].edad;
        var cell5 = json[i].genero;
        var cell6 = json[i].parentesco;
        var cell7 = json[i].empresa;
        var cell8 = json[i].baja;
        table
            .row.add(
                [
                    cell1,
                    cell2,
                    cell3,
                    cell4,
                    cell5,
                    cell6,
                    cell7,
                    cell8
                ])
            .draw()
    }
}

function BuscarPorNombreAsegurado() {
    var txtnombre = document.getElementById("nombrebuscar").value;
    
    if (txtnombre.trim() != "" & txtnombre != undefined & txtnombre.length > 1 & txtnombre.includes(" ")) {

        var afiliadosdatos = "datoafiliacion.php?opcion=7&nombre=" + txtnombre;
        $.ajax({
            url: afiliadosdatos,
            dataType: 'json',
            success: recargarbusquedaxnombreafiliado
        });
    }
}

function recargarbusquedaxnombreafiliado(json)
{
    var table2 = $('#tablaafiliado').DataTable();
    table2.clear().draw();



    var l = json.length;
    var table = $('#tablaafiliado').DataTable();

    for (i = 0; i < l; i++) {
        var cell1 = json[i].id;
        var cell2 = json[i].apellido_pat + ' ' + json[i].apellido_mat + ' ' + json[i].nombre;
        var cell3 = json[i].matricula_beneficiario;
        var cell4 = json[i].edad;
        var cell5 = json[i].genero;
        var cell6 = json[i].parentesco;
        var cell7 = json[i].empresa;
        var cell8 = json[i].baja;
        table
            .row.add(
                [
                    cell1,
                    cell2,
                    cell3,
                    cell4,
                    cell5,
                    cell6,
                    cell7,
                    cell8
                ])
            .draw()
    }
}

