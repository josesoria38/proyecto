//primero metemos las constantes de formulario y los inputs

const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');



//aqui vamos a poner las expresiones regularias necesarias que va a validar nuestro formulario
const expresiones = {
    nombre: /^[A-Za-zÁ-ÿ\s]{2,50}$/, //solo se van a admitir palabras
    apellido:/^[A-Za-zÁ-ÿ\s]{2,50}$/, //solo se van a admitir palabras
    telefono:/\d{9}$/,//solo admite 9 numeros
    fecha:/^(?:3[01]|[12][0-9]|0?[1-9])([\-/.])(0?[1-9]|1[1-2])\1\d{4}$/ //solo admite 9 numeros
}


//iniciaremos las variables en true para cuando validemos todos los campos nos cambie a true
const campos = {
    nombre: false,
    apellido: false,
    mesa: false,
    fecha: false
}


//hacemos un switch para que segun la opcion en la que estemos nos cvalide ese campo llamando a la funcion de validar
const validarFormulario = (e) => {
    switch(e.target.name) {
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
        break;

        case "apellido":

            validarCampo(expresiones.apellido, e.target, 'apellido');
        break;

        case "mesa":
            validarCampo(expresiones.mesa, e.target, 'mesa');
        break;

        case "fecha":
            validarCampo(expresiones.fecha, e.target, 'fecha');
        break;

        

    }
}

//creamos una constante y usaremos una funcion flecha que validara el campo en el que nos situemos
const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)) {
      document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-mal');//nos quita el borde rojo que señala que esta mal
      document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-bien');//nos añade el borde verde para decirnos que esta bien
      document.querySelector(`#grupo__${campo} p`).classList.remove('formulario__input-mal-activo');//nos va a mostrar un texto que nos dira que hemos introducido algo mal por eso quita la clase formulario mal
      campos[campo] = true;
    } 
    else {
      document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-bien');//nos quita el borde verde porque esta mal 
      document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-mal');//nos añade el borde rojo porque se ha introducido un fallo   
      document.querySelector(`#grupo__${campo} p`).classList.add('formulario__input-mal-activo');//nos va a mostrar un texto que nos dira que hemos introducido algo mal por eso añade la clase formulario mal
      campos[campo] = false;
    }
}


observaciones.addEventListener('keyup', function(e) {
    const target = e.target;
    const longitudmax = target.getAttribute('maxlength');
    const longitudActual = target.value.length;
    contador.innerHTML = `${longitudActual}/${longitudmax}`;
});



inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});




$(document).ready(function() {

    // prueba de que funciona el jquery
    console.log('jquery funciona bro');
    $('#task-result').hide();


    //queremos que cuando hagamos submit donde este el id formulario, lo primero de todo hacemos que con el preventdefault al acabar no se actualice la pagina, aqui hemos creado una constante
    //que no guarde los datos que hemos introducido en los campos que tegn la misma id y nos lo ponga en nuesttra base de datos llamando a cada una de las columnas de la tabla
    //despues mediante via post queremos enviar esos datos al formulario por eso esta la url añadir.php que nos lleva al fchero que tendra dentro el insert into, enviara lo que tengamos en la constante
    //y nos devuelve la funcion respuesta y ademas con el trigger y reset hacemos que el formulario se resetee
    $('#formulario').submit(e => {
        e.preventDefault();
        const enviarDatos = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            mesa: $('#mesa').val(),
            fecha: $('#fecha').val(),
            observaciones: $('#observaciones').val(),
            id: $('#taskId').val()
        };
        $.post('añadirMesa.php', enviarDatos, (response) => {
            console.log(response);
            $('#formulario').trigger('reset'); //resetea el formulario al acabar

        });
    });
});