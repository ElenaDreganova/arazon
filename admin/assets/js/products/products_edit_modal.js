 //<!-- Изменение данных продукта: передать в input модального окна текущие значения полей -->

function editProductToModalInput(product_id, productname, category_id, price, quantity, availability_id, rating, image, user_id) {
	
	// Передать product_id продукта в скрытый input
	document.querySelector('#input_product_id').value = product_id;
	console.dir("product_id: " + product_id);
	
	// Передать в поле productname productname
	document.querySelector('#input_product_productname').value = productname;
	console.dir("productname: " + productname);
	
	// Передать в поле category_id category_id
	document.querySelector('#input_product_category_id').value = category_id;
	console.dir("category_id: " + category_id);
	
	// Передать в поле price price
	document.querySelector('#input_product_price').value = price;
	console.dir("price: " + price);

	// Передать в поле quantity quantity продукта
	document.querySelector('#input_product_quantity').value = quantity;
	console.dir("quantity: " + quantity);

	// Передать в поле availability_id availability_id 
	document.querySelector('#input_product_availability_id').value = availability_id;
	console.dir("availability_id: " + availability_id);

	// Передать в форму rating rating
	document.querySelector("#input_product_rating").value = rating;
	console.dir("rating: " + rating);
	
	// Передать в форму image продукта
	document.querySelector("#input_product_image").value = image;
	console.dir("image: " + image);
	
	// Передать в форму user_id (пользователя, который добавил)
	document.querySelector("#input_product_user_id").value = user_id;
	console.dir("user_id: " + user_id);
}
