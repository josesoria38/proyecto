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
            const producto = response['body']
    
            producto.forEach(productos => {
    
                let item = `
                <li>
                    <form class="form-item">
                        <h4>${productos.nombre}</h4>
                        <div>Tipo: ${productos.tipo}</div>
                        <div>Precio : &euro; ${productos.precio}<div>
                                <div class="item-box">
                                    <input name="product_code" type="hidden" value="${productos.id}">
                                </div>
                    </form>
                </li>
        `;
    
                $('#products-wrp').append(item);
    
            });
    
        }
    })
}





