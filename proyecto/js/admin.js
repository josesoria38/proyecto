/* Carga */
$(document).ready( () => {

    $('#crear').click( () => {
        crearProducto();
    })

    cargarProductos();





})

/* Funciones */

function crearProducto() {
    const create_nombre = $('#nombre').val();
    const create_tipo = $('#tipo').val();
    const create_precio = $('#precio').val();


    $.ajax({
        url: 'api/create.php',
        dataType: 'json',
        type: 'POST',
        data: {
            product_name: create_nombre,
            product_desc: create_tipo,
            product_code: create_precio,
            product_image: null
        }, success: function (respuesta) {
            console.log("Se ha enviao")
        }, error: function (xhr) {
            console.log("No se ha enviao")
        }, complete: function () {
            console.log("XD")
        }
    })
}

function cargarProductos() {

    $.ajax({
        url: 'api/read.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            response['body'].forEach(p => {

                const id = p.id

                let item = `
                <li>
                <h5>${p.product_name}</h5>
				<div><img src="images/tshirt-${p.id}.jpg" width="80px"></div>
                <div>Produto ID: <input name="product_code" value="${p.product_code}" id="codigo${p.id}"><br>
				<div>Producto: <input type="text" value="${p.product_name}" id="producto${p.id}"/></div>
                <div>Descripición: <input type="text" value="${p.product_desc}" size="100" id="descripcion${p.id}"/></div>
				<div>Precio : <input type="text" value="${p.product_price}" size="6" id="precio${p.id}"> &euro;</div>
				<br>
                <button id="editar${p.id}">Editar producto</button>
                <button id="eliminar${p.id}">Eliminar producto</button>
                <hr>
			    </li>
                `
                
                $('#list_edit').append(item)


                $('#eliminar' + id).click( () => {
                    $.ajax({
                        url: 'api/delete.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id
                        },
                        success: function (response) {
                            console.log("producto eliminado")
                        }
                    })
                })

                $('#editar' + id).click( () => {


                    const editar_nombre = $('#nombre' + id).val();
                    const editar_tipo = $('#tipo' + id).val();
                    const editar_precio = $('#precio' + id).val();

                    $.ajax({
                        url: 'api/update.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id,
                            product_name: editar_nombre,
                            product_desc: editar_tipo,
                            product_price: editar_precio,
                            product_image: null
                        },
                        success: function (response) {
                            console.log("producto editado")
                        }, error: function (xhr) {
                            console.log(xhr.responseText)
                        }
                    })
                })



                
            });

        }
    })
    
}