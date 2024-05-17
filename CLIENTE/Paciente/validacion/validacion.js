//Validacion de Paciente
function valida_registrar_Paciente() {


    if (document.vvalida.nombre.value.length == 0) {
        alert("El nombre del asegurado no puede estar vacio");
        document.vvalida.nombre.focus();
        return 0;
    }

    if (document.vvalida.apellido_p.value.length == 0) {
        alert("El apellido paterno del asegurado no puede estar vacio");
        document.vvalida.apellido_p.focus();
        return 0;
    }

    if (document.vvalida.apellido_m.value.length == 0) {
        alert("El apellido materno del asegurado no puede estar vacio");
        document.vvalida.apellido_m.focus();
        return 0;
    }

    if (document.vvalida.genero.value == 0) {
        alert("Tiene que Seleccionar el genero del asegurado");
        document.vvalida.genero.focus();
        return 0;
    }

    if (document.vvalida.fecha_nacimiento.value.length == 0) {
        alert("Tiene que escribir la fecha de nacimiento");
        document.vvalida.fecha_nacimiento.focus();
        return 0;
    }
    if (document.vvalida.titular.value.length == 0) {
        alert("Tiene que escribir la matricula del asegurado");
        document.vvalida.titular.focus();
        return 0;
    }

    if (document.vvalida.beneficiario.value.length == 0) {
        alert("Tiene que escribir la matricula del beneficiario");
        document.vvalida.beneficiario.focus();
        return 0;
    }

    if (document.vvalida.lasegurado.value.length == 0) {
        alert("Tiene que Seleccionar el Tipo de Asegurado");
        document.vvalida.lasegurado.focus();
        return 0;
    }
    if (document.vvalida.lasegurado.value == 0) {
        alert("Tiene que Seleccionar el Tipo de Asegurado");
        document.vvalida.lasegurado.focus();
        return 0;
    }

    if (document.vvalida.lregional.value.length == 0) {
        alert("Tiene que Seleccionar la Regional del Asegurado");
        document.vvalida.lregional.focus();
        return 0;
    }

    if (document.vvalida.lregional.value == 0) {
        alert("Tiene que Seleccionar la Regional del Asegurado");
        document.vvalida.lregional.focus();
        return 0;
    }

    if (document.vvalida.empresa.value.length == 0) {
        alert("Tiene que escribir la empresa");
        document.vvalida.empresa.focus();
        return 0;
    }

    if (document.vvalida.motivo_consulta.value.length == 0) {
        alert("Tiene que escribir el motivo de la consulta");
        document.vvalida.motivo_consulta.focus();
        return 0;
    }

    if (document.vvalida.diagnostico_descrip.value.length == 0) {
        alert("Tiene que escribir la descripcion del diagnostico");
        document.vvalida.diagnostico_descrip.focus();
        return 0;
    }

    if (document.vvalida.fecha_ingreso.value.length == 0) {
        alert("Tiene que escribir la fecha de recepcion del documento");
        document.vvalida.fecha_ingreso.focus();
        return 0;
    }

    if (document.vvalida.fecha_inicio.value.length == 0) {
        alert("Tiene que escribir la fecha de validacion de inicio del documento");
        document.vvalida.fecha_inicio.focus();
        return 0;
    }

    if (document.vvalida.fecha_final.value.length == 0) {
        alert("Tiene que escribir la fecha de validacion de final del documento");
        document.vvalida.fecha_final.focus();
        return 0;
    }

    //el formulario se envia 
    alert("Los Datos del Formulario se ha rellenado Exitosamente");
    document.vvalida.submit();
}
//Validacion de Registro de recepcion

function valida_registrar_recepcion() {

    event.preventDefault();

    if (document.vvalidarecepcion.nro.value.length == 0) {
        //alert("El nombre del remitente no puede estar vacio");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El numero no puede estar vacio!'
        });
        document.vvalidarecepcion.nombre.focus();
        return 0;
    }

    if (document.vvalidarecepcion.nombre.value.length == 0) {
        //alert("El nombre del remitente no puede estar vacio");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El nombre del remitente no puede estar vacio!'
        });
        document.vvalidarecepcion.nombre.focus();
        return 0;
    }

    if (document.vvalidarecepcion.empresa.value.length == 0) {
        //alert("Tiene que escribir la empresa");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la empresa!'
        });
        document.vvalidarecepcion.empresa.focus();
        return 0;
    }


    if (document.vvalidarecepcion.referencia.value.length == 0) {
        //alert("Tiene que escribir la referencia");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la referencia!'
        });
        document.vvalidarecepcion.referencia.focus();
        return 0;
    }
/*
    var a = document.vvalidarecepcion['hobbies[]'];
    //alert("Tamaño del array" + a.length);
    var p = 0;
    for (i = 0; i < a.length; i++) {
        if (a[i].checked) {
            //alert(a[i].value);
            p = 1;
        }
    }
    if (p == 0) {
        //alert('Seleccione por lo menos 1 casilla');
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Seleccione por lo menos 1 casilla!'
        });
        return false;
    }
*/
    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalidarecepcion.submit();
        }
        return false;
    })
    /*
        Swal.fire({
            title: '¿Seguro de enviar el formulario?',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si',
            cancelButtonText: "No",
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.value) {
                document.vvalidarecepcion.submit();
            }
            return false;
        })
    */
    //vvalidarecepcion.submit();
    //document.vvalidarecepcion.submit();
    //alert("Los Datos del Formulario se ha rellenado Exitosamente");
}



function valida_registrar_cite() {

    if (document.vvalidacite.cite.value.length == 0) {
        //alert("El nombre del remitente no puede estar vacio");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'El CITE no puede estar vacio!'
        });
        document.vvalidacite.cite.focus();
        return 0;
    }

    if (document.vvalidacite.fecha.value.length == 0) {
        //alert("El nombre del remitente no puede estar vacio");
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La fecha no puede estar vacio!'
        });
        document.vvalidacite.fecha.focus();
        return 0;
    }

    if (document.vvalidacite.hora.value.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que colocar la hora!'
        });
        document.vvalidacite.hora.focus();
        return 0;
    }


    if (document.vvalidacite.ldestinatario.value.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que selecionar destinatario!'
        });
        document.vvalidacite.ldestinatario.focus();
        return 0;
    }

    if (document.vvalidacite.referencia.value.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir la referencia!'
        });
        document.vvalidacite.referencia.focus();
        return 0;
    }

    if (document.vvalidacite.remitente.value.length == 0) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tiene que escribir el remitente!'
        });
        document.vvalidacite.remitente.focus();
        return 0;
    }

    event.preventDefault();
    Swal.fire(
        'SE RELLENO CORRECTAMENTE!',
        'EL FORMULARIO SE ENVIADO AL SERVIDOR!',
        'success'
    ).then((result) => {
        if (result.value) {
            document.vvalidacite.submit();
        }
        return false;
    })
   
}



function showAlertTopEnd() {
    Swal.fire({
        icon: 'success',
        title: 'LOS DATOS HAN SIDO ENVIADOS AL SERVIDOR',
        showConfirmButton: false,
        timer: 2500
    })
}

//////////////////////////Validar solo Letras/////////////////////////////////////////////
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}


//////////////////////////Validar solo Numeros/////////////////////////////////////////////

function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;

    return true;
}

function NumCheck(e, field) {
    key = e.keyCode ? e.keyCode : e.which
    // backspace
    if (key == 8) return true
    // 0-9
    if (key > 47 && key < 58) {
        if (field.value == "") return true
        regexp = /.[0-9]{2}$/
        return !(regexp.test(field.value))
    }
    // .
    if (key == 46) {
        if (field.value == "") return false
        regexp = /^[0-9]+$/
        return regexp.test(field.value)
    }
    // other key
    return false
}

function filterFloat(evt, input) {
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value + chark;
    if (key >= 48 && key <= 57) {
        if (filter(tempValue) === false) {
            return false;
        } else {
            return true;
        }
    } else {
        if (key == 8 || key == 13 || key == 0) {
            return true;
        } else if (key == 46) {
            if (filter(tempValue) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }
}
function filter(__val__) {
    var preg = /^([0-9]+\.?[0-9]{0,2})$/;
    if (preg.test(__val__) === true) {
        return true;
    } else {
        return false;
    }

}

//copia el valor de chekbox de titular a beneficiario
function myFunction2() {
    var checkBox = document.getElementById("myCheck");
    var textbeneficiario = document.getElementById("beneficiario");
    var texttitular = document.getElementById("titular");
    if (checkBox.checked == true) {
        texttitular.value = texttitular.value.toUpperCase();
        textbeneficiario.value = texttitular.value;
    } else {
        textbeneficiario.value = "";
    }
}


function addTable() {


    var myTableDiv = document.getElementById("metric_results");
    var table = document.getElementById('tabladestino');
    var tableBody = document.createElement('TBODY');
    var lpersonal = document.getElementById("lpersonal");
    var valor = lpersonal.value;
    var nombreDestinatario = lpersonal.options[lpersonal.selectedIndex].text;
    var fecha = document.getElementById('fechadestino');
    var proveido = document.getElementById('proveido');
    var listaid = document.getElementById("listaid");

    table.border = '1';
    table.appendChild(tableBody);
    var campo4 = document.createElement("a");
    campo4.type = "button";
    campo4.innerText.type = "i";
    campo4.style.background = 'Red';
    campo4.style.color = 'white';
    campo4.innerText.className = "fa fa-trash-o";
    campo4.innerText = "Eliminar";
    campo4.id = valor;
    campo4.className = "btn btn-danger btn-xs";
    campo4.onclick = function () {

        let row = this.parentNode.parentNode;
        let table = document.getElementById("tabladestino");

        var td = this.parentNode;
        var tr = td.parentNode;
        var tbody = tr.parentNode;
        var table2 = tbody.parentNode;

        //var rowId = row.id;
        //this gives id of tr whose button was clicked
        //var data = document.getElementById(rowId).querySelectorAll(".row-data");
        let message = table.removeChild(row);
        var data = message.document.getElementById("row-dat");
        /*returns array of all elements with
        "row-data" class within the row with given id*/

        var name = data[0].innerHTML;
        var age = data[1].innerHTML;

        alert("Name: " + name + "\nAge: " + age);

        //table.deleteRow(row.rowIndex);
        //var elemento = this.parentNode.parentNode.rowIndex;
        //let obtenerDato = document.getElementsByTagName(row.parentNode);
        //alerta(obtenerDato[2].innerHTML);

        //td = $(this).parent().parent().find(':first-child');
        //Luego en ese primer td buscas el input con la clase .id y tomas el valor

        //var rowsubtotals = row.getElementById('rowsubtotal');
        //getElementsByClassName('rowsubtotal');
        //var row2 = a.parentNode.parentNode;
        //row2.parentNode.removeChild(row);
        //var sTotal = sumsubtotal()
        //var datos=rowsubtotals[0].innerHTML;
        window.alert("hola mundo");
        alert(data);


        //  var dataId = td2.find('input.id').val();
        //  window.alert("Texto a mostrar");
        //  alert(dataId);
        //console.log(td, tr, tbody, table2);
        //alerta(td);
        //alerta(obtenerDato[2].innerHTML);
        //tbody.removeChild(fila);
    }

    var stock = new Array()
    listaid.value = listaid.value + valor + '-';
    stock[0] = new Array(valor, nombreDestinatario, proveido.value, fecha.value);

    var tr = document.createElement('TR');
    //tableBody.appendChild(tr);

    //FILAS DE LA TABLA
    for (i = 0; i < stock.length; i++) {
        var tr = document.createElement('TR');
        for (j = 0; j < stock[i].length; j++) {
            var td = document.createElement('TD');
            td.className = "row-data";
            td.id = "row-data";
            td.appendChild(document.createTextNode(stock[i][j]));
            tr.appendChild(td);
            tr.id = "row-data";
        }
        tr.appendChild(td);
        tr.appendChild(campo4);
        tableBody.appendChild(tr);
    }
    proveido.value = "";
    myTableDiv.appendChild(table)
}

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    var valor = document.getElementById("tabladestino").rows[i].cells[0].innerHTML;
    //alert(valor);
    var resume_table = document.getElementById("tabladestino");
    resume_table.deleteRow(i);

    var valor = "";
    var listaid2 = document.getElementById("listaid");
    listaid2.value = "";
    for (var i = 1, row; row = resume_table.rows[i]; i++) {
        //alert(cell[i].innerText);
        //alert(col[j].innerText);
        // $valor=  $[j].innerText;
        valor = valor + row.cells[0].innerText + "-";
        alert(valor);

    }
    if (valor === undefined || valor === null) {
        // do something 
        listaid2.value = "";
    }
    else {
        listaid2.value = listaid2.value + valor;
    }


}

//for insert row

function insRow() {
    var x = document.getElementById('tabladestino').insertRow(document.getElementById('tabladestino').rows.length);
    var y = x.insertCell(0);
    var z = x.insertCell(1);
    var o = x.insertCell(2);
    var w = x.insertCell(3);
    var p = x.insertCell(4);
    var listaid = document.getElementById("listaid");
    var lpersonal = document.getElementById("lpersonal");
    var valor = lpersonal.value;
    var nombreDestinatario = lpersonal.options[lpersonal.selectedIndex].text;
    var fecha = document.getElementById('fechadestino');
    var proveido = document.getElementById('proveido');
    var listaid = document.getElementById("listaid");
    y.innerHTML = valor;
    z.innerHTML = nombreDestinatario;
    o.innerHTML = proveido.value;
    w.innerHTML = fecha.value;
    p.innerHTML = '<a onclick="deleteRow(this)" class="btn btn-danger btn-xs"><font color="white"><i class="fa fa-trash-o"></i> Delete</font> </a>';
    listaid.value = listaid.value + valor + '-';

}


//for get value from row
function myFunction() {
    //for <td>
    var x = document.getElementById("tabladestino").rows[0].cells.length;
    document.getElementById("demo").innerHTML = "Found " + x + " cells in the first td element.";
    var arr = new Array();
    //for <tr>
    //var x = document.getElementById("tabladestino").rows.length;
    //document.getElementById("demo").innerHTML=document.getElementById("tabladestino").rows[0].cells[1].innerHTML;
    //alert(document.getElementById("tabladestino").rows[0].cells[1].innerHTML);
    for (i = 0; i < document.getElementById("tabladestino").rows.length; i++) {
        //s = "test-"+i;
        arr[i] = { "cell1": document.getElementById("tabladestino").rows[i].cells[0].innerHTML, "cell2": document.getElementById("tabladestino").rows[i].cells[1].innerHTML };
    }

    var answer = confirm("Are you sure?")
    var json = { errorCode: 1000, message: 'success', data: arr };
    if (answer) {
        alert(JSON.stringify(json));
    }
    else {

    }
}

