$(document).ready(() => {


    $.ajax({
        url: 'api/read.php',
        type: 'GET',
        dataType: 'json',
        success: (response) => {
            const productos = response['body']
           
            productos.forEach(camiseta=> {
                let tarea = `
                <li>
				<form class="form-item">
				<h4>${camiseta.product_name}</h4>
				<div><img src="images/${camiseta.product_image}" title="${camiseta.product_desc}"></div>
				<div>Precio : &euro;  ${camiseta.product_price}<div>
				<div class="item-box">
					<div>
						Color :
						<select name="product_color">
							<option value="Rojo">Rojo</option>
							<option value="Azul">Azul</option>
							<option value="Naranja">Naranja</option>
						</select>
					</div>
					
					<div>
						Cantidad :
						<select name="product_qty">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
					
					<div>
						Tamaño :
						<select name="product_size">
							<option value="M">M</option>
							<option value="XL">XL</option>
							<option value="XXL">XLL</option>
						</select>
					</div>
					
					<input name="product_code" type="hidden" value="${camiseta.product_code}">
					<button type="submit">Añadir al carrito</button>
				</div>
				</form>
			</li>
                `;
            $('#products-wrp').append(tarea);

        });
        }
    })


   
   
})