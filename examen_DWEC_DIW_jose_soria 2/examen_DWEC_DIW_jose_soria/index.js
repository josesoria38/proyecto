//primero metemos las constantes de formulario y los inputs

const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');



//aqui vamos a poner las expresiones regularias necesarias que va a validar nuestro formulario
const expresiones = {
    nombre: /^[A-Za-zÁ-ÿ\s]{2,50}$/, //solo se van a admitir palabras
    apellido:/^[A-Za-zÁ-ÿ\s]{2,50}$/, //solo se van a admitir palabras
    telefono:/\d{9}$/,//solo admite 9 numeros
    movil:/\d{9}$/, //solo admite 9 numeros
    email:/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/,
    email2:/[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/
}


//iniciaremos las variables en true para cuando validemos todos los campos nos cambie a true
const campos = {
    nombre: false,
    apellido: false,
    telefono: false,
    movil: false,
    email: false,
    email2: false
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

        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
        break;

        case "movil":
            validarCampo(expresiones.movil, e.target, 'movil');
        break;

        case "email":
            validarCampo(expresiones.email, e.target, 'email');
        break;

        case "email2":
            validarEmail2(expresiones.email2, e.target, 'email2');
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

//si da fallo el email en minusculas y cambiar los booleanos puede ser la solucion
//campo para validar el segundo email que mediante dos constantes que nos coje el elemento que hay en el id que hemos puesto abajo
//con un condicional decimos que si el valor de nuestras dos constantes es el mismo decimos que nos quite el recuadro rojo y el texto y viceversa
const validarEmail2 = () => {
    const inpEmail = document.getElementById("email");
    const inpEmail2 = document.getElementById("email2");
    if(inpEmail.value == inpEmail2.value){
        document.getElementById(`grupo__email2`).classList.add('formulario__grupo-bien');
        document.getElementById(`grupo__email2`).classList.remove('formulario__grupo-mal');
        document.querySelector(`#grupo__email2 p`).classList.remove('formulario__input-mal-activo');
        campos['email2'] = false;
    } else {
        document.getElementById(`grupo__email2`).classList.remove('formulario__grupo-bien');
        document.getElementById(`grupo__email2`).classList.add('formulario__grupo-mal');
        document.querySelector(`#grupo__email2 p`).classList.add('formulario__input-mal-activo');
        campos['email2'] = true;
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

    //aqui le decimos que ejecute de primeras el obtenertask para que siempre se vean los datos que tenemos dentro de la base de datos 
    //obtenerTasks();
    

    // boton de buscar
    //hacemos que cuando estemos en el campo con id buscar, soltemos una tecla nos entre a la funcion que declarando la variable search decimos que coja el valor de lo que haya dentro del id search
    //y mediante ajax llamamos a nuestra url que sera el buscar.php que nos seleccionara una fila entera peero con el foreach lo que hacemos es solo coger un campo que en nuestro caso es el apellido
    $('#search').keyup(function (e) {
        e.preventDefault();
        //if($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: 'buscar.php',
                type: 'POST',
                data: {search},
                success: function (response) {
                //if(!response.error) {
                    let tareas = JSON.parse(response);
                    let template = '';
                    tareas.forEach(tarea => {
                        console.log(tarea);
                        template += `<table class="col-md-12 table table-bordered table-sm">
							            <thead>
								            <tr>
                                                <td>id</td>
                                                <td>Nombre</td>
                                                <td>Apellido</td>
                                                <td>telefono</td>
                                                <td>movil</td>
                                                <td>Email</td>
                                                <td>Email2</td>
                                                <td>observaciones</td>
								            </tr>
							            </thead>
							            <tbody>
                                            <tr>
                                                <td>${tarea.id}</td>
                                                <td>${tarea.nombre}</td>
                                                <td>${tarea.apellido}</td>
                                                <td>${tarea.telefono}</td>
                                                <td>${tarea.movil}</td>
                                                <td>${tarea.email}</td>
                                                <td>${tarea.email2}</td>
                                                <td>${tarea.observaciones}</td>
                                            </tr>
                                        </tbody>
						            </table>`
                    });
                    $('#task-result').show();
                    $('#containerTarea').html(template);
                //}
                
                }
            });
        //}
    });


    //queremos que cuando hagamos submit donde este el id formulario, lo primero de todo hacemos que con el preventdefault al acabar no se actualice la pagina, aqui hemos creado una constante
    //que no guarde los datos que hemos introducido en los campos que tegn la misma id y nos lo ponga en nuesttra base de datos llamando a cada una de las columnas de la tabla
    //despues mediante via post queremos enviar esos datos al formulario por eso esta la url añadir.php que nos lleva al fchero que tendra dentro el insert into, enviara lo que tengamos en la constante
    //y nos devuelve la funcion respuesta y ademas con el trigger y reset hacemos que el formulario se resetee
    $('#formulario').submit(e => {
        e.preventDefault();
        const enviarDatos = {
            nombre: $('#nombre').val(),
            apellido: $('#apellido').val(),
            telefono: $('#telefono').val(),
            movil: $('#movil').val(),
            email: $('#email').val(),
            email2: $('#email2').val(),
            observaciones: $('#observaciones').val(),
            id: $('#taskId').val()
        };
        $.post('añadir.php', enviarDatos, (response) => {
            console.log(response);
            $('#formulario').trigger('reset'); //resetea el formulario al acabar
            obtenerTasks();
        });
    });

    // obtener tareas
    //hemos hecho la funcion obtener task para que nos muestre los datos que hemos introducido en el formulario hacia la base de datos en forma de tabla mediante codigo html
    //para ello utilizamos ajax para que la informacion llegue al servidor, por eso ponemos que nuestra url a la que mandamos los datos sea lista.php que nos va a devolver los datos en forma de string de json
    //que lo leeremos mediante el json parse, haremos un bucle foreach para que en cada vuelta que de nos imprima los datos y no se quede solo en los primeros datos introducidos
    function obtenerTasks() {
        $.ajax({
            url: 'lista.php',
            type: 'GET',
            success: function(response) {
                const tareas = JSON.parse(response);
                let template = '';
                tareas.forEach(task => {
                    template += `
                            <tr taskId="${task.id}">
                            <td>${task.id}</td>
                            <td>${task.nombre}</td>
                            <td>${task.apellido}</td>
                            <td>${task.telefono}</td>
                            <td>${task.movil}</td>
                            <td>${task.email}</td>
                            <td>${task.email2}</td>
                            <td>${task.observaciones}</td>
                            </tr>
                        `
                });
                $('#tareas').html(template);//esto genera lo que tenemos en template a codigo html donde se encuentre el id tareas
            }
        });
    }
});
