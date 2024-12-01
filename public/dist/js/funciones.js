//const BASE_URL = document.querySelector('meta[name="base_url"]').getAttribute('content');
const BASE_URL = document.getElementById("urlBase").value;


function saludo(datoId) {
    var dato = datoId;

    //console.log(BASE_URL);

    $.ajax({
        url: BASE_URL + '/updateU',
        type: 'POST',
        data: {
            idU: dato
        },
        success: function (resultado) {
            //console.log("Respuesta: " + resultado);

            resultado.forEach(function (item, index) {
                //(`Elemento ${index + 1}:`);
                document.getElementById("nombreMod").value = item.USU_NOMBRE;
                document.getElementById("apellidoMod").value = item.USU_APELLIDO;
                document.getElementById("cedulaMod").value = item.USU_IDENTIFICACION;
                document.getElementById("correoMod").value = item.USU_CORREO;
            });
        },
        error: function (xhr, status, error) {
            console.error("El error encontrado es: " + error);
        }
    });
}

function verificarnumCedula(){
    var cedula=document.getElementById("ingresoced").value;
    // console.log("hola : "+ingrso);
      
    $.ajax({
        url: BASE_URL + '/buscarU',
        type: 'POST',
        data: {
            cedU:cedula
        },
        success: function (resultado) {
            console.log("Respuesta: " + resultado);
            
            resultado.forEach(function (item, index) {
                //(`Elemento ${index + 1}:`);
                document.getElementById("mostrarDatosPersonales").innerHTML = item.USU_NOMBRE+" "+item.USU_APELLIDO;
               
            });

            
        },
        error: function (xhr, status, error) {
            console.error("El error encontrado es: " + error);
        }
    });

}


function actualizarU() {
    let nombre = document.getElementById("nombreMod").value;
    let apellido = document.getElementById("apellidoMod").value;
    let cedula = document.getElementById("cedulaMod").value;
    let correo = document.getElementById("correoMod").value;
    let rol = document.getElementById("rolU").value;


    let datos = {
        n: nombre,
        a: apellido,
        c: cedula,
        e: correo,
        r:rol
    }

    $.ajax({
        url: BASE_URL + '/actualizarU',
        type: 'POST',
        data: datos,
        success: function (resultado) {
            alert(resultado);
            window.location.href = BASE_URL

        },
        error: function (xhr, status, error) {
            console.error("El error encontrado es: " + error);
        }
    });

}




function eliminarU(usuId) {

    var dato = usuId;
    //  alert(dato);

    if (confirm("seguro de borrar ")) {



        $.ajax({
            url: BASE_URL + 'eliminarU',
            type: 'POST',
            data: {
                id: dato
            },

            success: function (resultado) {

                alert(resultado);
                window.location.href = BASE_URL
            },





        });
        alert("gracias amigo");



    } else {

        alert("no se borrara");


    }


}


function verificarText(input) {
    const valor = input.value;
    const ultimodig = valor[valor.length - 1];

    if (!isNaN(ultimodig)) {
        input.value = valor.slice(0, -1);

    }



}

function verificarNum(input) {
    const valor = input.value;
    const ultimodig = valor[valor.length - 1];

    if (isNaN(ultimodig)) {
        input.value = valor.slice(0, -1);

    }


    if (valor.length > 10) {
        input.value = valor.slice(0, 10);

    }


    if (valor.length == 10) {
        //input.value=valor.slice(0,10);
        // alert(valor);

        verificarCedula();
    }



}

function verificarCedula() {

    const cedula = document.getElementById('identificacion').value;
    // alert(cedula)

    const digitos = cedula.split('').map(Number);

    const coeficientes = [2, 1, 2, 1, 2, 1, 2, 1, 2];
    let suma = 0;
    for (let i = 0; i < 9; i++) {
        let prod = digitos[i] * coeficientes[i];
        if (prod > 9) {
            prod -= 9;
        }
        suma += prod;
    }

    const numVerificador = (10 - (suma % 10)) % 10;
    if (numVerificador == digitos[9]) {

        ///  alert(cedula);
        document.getElementById("btnGuardar").disabled = false;
    } else {
        // alert("no");
        document.getElementById("btnGuardar").disabled = true;



    }




}






