$(document).ready(()=>{
    
    $('#crear').click(() =>{
        crearcamiseta();
    })

    cargacamiseta();


})

function crearcamiseta(){
    const crear_codigo = $('#crear_codigo').val();
    const crear_titulo = $('#crear_titulo').val();
    const crear_descripcion = $('#crear_descripcion').val();
    const crear_precio = $('#crear_precio').val();


    $.ajax({
        url: 'api/create.php',
        dataType: 'json',
        type: 'POST',
        data:{
            product_name: crear_titulo,
            product_desc: crear_descripcion,
            product_code: crear_codigo,
            product_price: crear_precio,
            product_image: null
        }, success: function(respuesta){
            console.log("se ha enviado");
        
        }
    })
}   

function cargacamiseta(){
    $.ajax({
        url: 'api/read.php',
        type: 'GET',
        dataType: 'json',
        success: (response) =>{
            response['body'].forEach(producto => {
                const id = producto.id;
                let item = `
                <li>
                <h5>${producto.product_name}</h5>
				<div><img src="images/${producto.product_image}" width="80px"></div>
                <div>Produto ID: <input name="product_code" value="${producto.product_code}" id="codigo${producto.id}><br>
				<div>Producto: <input type="text" value="${producto.product_name}" id="nombre${producto.id}/></div>
                <div>Descripición: <input type="text" value="${producto.product_desc}" id="descripcion${producto.id} size="100"/></div>
				<div>Precio : <input type="text" value="${producto.product_price}" id="precio${producto.id} size="6"> &euro;</div>
				<br>
                <button id="editar${producto.id}" class="editar">Editar producto</button>
                <button id="eliminar${producto.id}">Eliminar producto</button>
                <hr>
			    </li>
                `
                $('#list_edit').append(item);

                $('#eliminar' + id).click( () =>{
                    $.ajax({
                        url: 'api/delete.php',
                        type: 'POST',
                        dataType: 'json',
                        data:{
                            id: id
                        },
                        success: function(respone){
                            console.log("la camiseta ha sido eliminada");
                        }
                    })
                })

                $('#editar' + id).click( () =>{
                    
                    const editar_codigo = $('#codigo' + id).val();
                    const editar_nombre = $('#nombre' + id).val();
                    const editar_descripcion = $('#descripcion' + id).val();
                    const editar_precio = $('#precio' + id).val();


                    $.ajax({
                        url: 'api/update.php',
                        type: 'POST',
                        dataType: 'json',
                        data:{
                            id: id,
                            product_name: editar_nombre,
                            product_desc: editar_descripcion,
                            product_code: editar_codigo,
                            product_price: editar_precio,
                            product_image: null
                        },
                        success: function(respone){
                            console.log(response);
                        }, 
                        error: function (xhr) {
                            console.log(xhr.responseText)
                        }
                    })



                })
            });
        }
    })
}