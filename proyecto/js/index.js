/* Cuando el documento esté listo */
$(document).ready(() => {

    cargarProductos();
   
})

function cargarProductos(){
    jQuery.ajax({
        url: 'api/read.php',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            const productos = response['body']
    
            productos.forEach(producto => {
    
                let item = `
                <li>
                    <form class="form-item">
                        <h4>${producto.nombre}</h4>
                        <div>Tipo: ${producto.tipo}</div>
                        <div>Precio : &euro; ${producto.precio}<div>
                                <div class="item-box">
                                    <input name="product_code" type="hidden" value="${producto.id}">
                                </div>
                    </form>
                </li>
        `;
    
                $('#products-wrp').append(item);
    
            });
    
        }
    })
}





