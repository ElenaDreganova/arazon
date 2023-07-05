

$(document).ready(function () {
    updateCartCount();
    //обработка клика на ссылке "delete-product"
    $(".delete-product").click(function (e) {
        e.preventDefault(); //отмена действия по умолчанию
        var id = $(this).data("id"); //получение id товара
        var element = $(this).closest(".single_product_item"); //получение элемента товара
        //AJAX запрос на удаление товара
        $.ajax({
            url: "/php_scripts/favorites/delete_favotiresProduct.php",
            type: "GET",
            data: { id: id },
            success: function (response) {
                if (response == "success") { //если удаление прошло успешно
                    element.remove(); //удаление элемента товара из DOM
                } else {
                    alert("Ошибка при удалении товара"); //вывод ошибки
                }
            }
        });
    });
    $(".deleteProductCart").click(function (e) {
        e.preventDefault(); //отмена действия по умолчанию
        var id = $(this).data("id"); //получение id товара
        var element = $(this).closest(".listCartProduct"); //получение элемента товара
        //AJAX запрос на удаление товара
        $.ajax({
            url: "/php_scripts/cart/delete_cartProduct.php",
            type: "GET",
            data: { id: id },
            success: function (response) {

                if (response == "success") { //если удаление прошло успешно
                    element.remove(); //удаление элемента товара из DOM
                    updateCartCount();
                } else {
                    alert("Ошибка при удалении товара"); //вывод ошибки
                }
            }
        });
    });
    $(".add_to_favorites").click(function (e) {
        e.preventDefault();
        var product_id = $(this).data("productid");

        $.post("/php_scripts/favorites/handler_favorites.php", { product_id: product_id })
            .done(function (data) {
                data = JSON.parse(data);
                if (data.status == "liked") {
                    $(".add_to_favorites[data-productid='" + product_id + "'] i").css("background-image", "url('/assets/img/icon/heart_liked.svg')");
                } else {
                    $(".add_to_favorites[data-productid='" + product_id + "'] i").css("background-image", "url('/assets/img/icon/heart.svg')");
                }
            });
    });

    $(".add_cart").click(function (event) {
        event.preventDefault();
        var productid = $(this).data("productid");
        $.ajax({
            url: "/php_scripts/cart/handler_cart.php",
            method: "POST",
            data: { productid: productid },
            success: function (data) {
                alert(data);
                updateCartCount();
            },

        });
    });

    $('.input-number-increment').click(function () {
        var id = $(this).data('id');
        var input = $('input[data-id="' + id + '"]');
        var value = parseInt(input.val());
        if (value < 30) {
            input.val(value + 1);
            updateTotal(id);
        }
    });

    $('.input-number-decrement').click(function () {
        var id = $(this).data('id');
        var input = $('input[data-id="' + id + '"]');
        var value = parseInt(input.val());
        if (value > 1) {
            input.val(value - 1);
            updateTotal(id);
        }
    });

    function updateTotal(id) {

        var input = $('input[data-id="' + id + '"]');
        var quantity = parseInt(input.val());
        var price = parseFloat($('h5[data-id="' + id + '"]').text());
        var total = quantity * price;

        $('h5[data-id="' + id + '_total"]').text(total + " uah");

    }

    $(".update_cart").click(function (event) {
        event.preventDefault();
        var productid = $(this).data("productid");
        var cartProducts = [];

        // Получаем данные для каждого продукта в корзине
        $('.listCartProduct').each(function () {
            var id = $(this).find('.input-number-increment').data('id');
            var quantity = $(this).find('.input-number2').val();
            var price = $(this).find('h5[data-id="' + id + '"]').text().trim().slice(0, -3); // Удаляем " uah" в конце и преобразуем в число
            var total = $(this).find('h5[data-id="' + id + '_total"]').text().trim().slice(0, -3); // Удаляем " uah" в конце и преобразуем в число

            cartProducts.push({
                id: id,
                quantity: quantity,
                price: price,
                total: total
            });
        });

        // Отправляем AJAX-запрос на сервер
        $.ajax({
            url: '/php_scripts/cart/update_cartTable.php',
            method: 'POST',
            data: {
                cartProducts: cartProducts
            },
            success: function (response) {
                $('h5[data-id="totalSum"]').text(response['totalSUM'] + " uah");
                // Обновляем данные на странице, если запрос выполнен успешно
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Обрабатываем ошибку, если запрос не выполнен
                console.log(xhr.responseText);
            }
        });
    });

    $("#confirmationOrder").click(function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();

        // Получаем значения полей формы
        var name = $("#first").val();
        var surname = $("#last").val();
        var phone = $("#number").val();
        var email = $("#email").val();
        var country = $("#country").val();
        var city = $("#city").val();
        var address = $("#add1").val();
        var postcode = $("#zip").val();

        // Проверяем, что все поля заполнены
        if (name && phone && email && country && city && address && postcode) {
            // Если все поля заполнены, отправляем форму
            $.ajax({
                url: "/php_scripts/confirmationOrder.php",
                method: "POST",
                data: {
                    name: name,
                    surname: surname,
                    phone: phone,
                    email: email,
                    country: country,
                    city: city,
                    address: address,
                    postcode: postcode
                },
                success: function (response) {
                    // перенаправляем пользователя на страницу PayPal
                    window.location.href = "/partials/cart/confirmation.php";
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        } else {
            // Если хоть одно поле не заполнено, выведем сообщение об ошибке
            alert("Please fill in all the fields.");
        }
    });

    $("#comment_submit").click(function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();

        // Получаем значения полей формы
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#number").val();
        var message = $("#message").val();
        var product_id = $("#product_id").val();

        // Проверяем, что все поля заполнены
        if (name && email && phone && message) {
            // Если все поля заполнены, отправляем форму
            $.ajax({
                url: "/php_scripts/insert_comment.php",
                method: "POST",
                data: {
                    name: name,
                    phone: phone,
                    email: email,
                    message: message,
                    product_id: product_id
                },
                success: function (response) {

                    $('#commentsList').prepend(response);
                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    });

    $("#btn-send-Contactform").click(function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();

        // Получаем значения полей формы
        var name = $("#name").val();
        var email = $("#email").val();
        var message = $("#message").val();
        var subject = $("#subject").val();

        // Проверяем, что все поля заполнены
        if (name && email && message && subject) {
            // Если все поля заполнены, отправляем форму
            $.ajax({
                url: "/php_scripts/form/contactForm.php",
                method: "POST",
                data: {
                    name: name,
                    email: email,
                    message: message,
                    subject: subject
                },
                success: function (response) {
                    alert("Your application has been sent!");

                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    });
    
    $("#basic-addon2").click(function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();

        // Получаем значения полей формы
        var email = $("#email").val();
        if (email) {

            $.ajax({
                url: "/php_scripts/form/newsletterForm.php",
                method: "POST",
                data: {
                    email: email,
                },
                success: function (response) {
                    alert("Thanks for subscribing!");

                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    });
    $("#basic-addon3").click(function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();
        // Получаем значения полей формы
        var email = $("#email2").val();
        if (email) {

            $.ajax({
                url: "/php_scripts/form/newsletterForm.php",
                method: "POST",
                data: {
                    email: email,
                },
                success: function (response) {
                    alert("Thanks for subscribing!");

                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    });
    $("#newsletter-submit").click(function (event) {
        // Предотвращаем отправку формы по умолчанию
        event.preventDefault();
        // Получаем значения полей формы
        var email = $("#newsletter-form-email").val();
        if (email) {

            $.ajax({
                url: "/php_scripts/form/newsletterForm.php",
                method: "POST",
                data: {
                    email: email,
                },
                success: function (response) {
                    alert("Thanks for subscribing!");

                },
                error: function (xhr, status, error) {
                    console.error("Error: " + error);
                }
            });
        }
    });


    $('#profile-form').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '/php_scripts/user_settings.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                response = JSON.parse(response);
                if (response.success) {
                    alert('Profile saved successfully!');
                    if(response.username){
                        $('#usernameSettings').text(response.username);
                    }
                    if (response.imageName) {
                        $('#ImageUser').attr('src', '/uploads/avatar/' + response.imageName);
                    }

                } else {
                    alert('An error occurred while saving profile!');
                    console.log(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert('An error occurred while saving profile!');
                console.log(error);
            }
        });
    });

    function updateCartCount() {
        $.ajax({
            url: '/php_scripts/cart/get_countCart.php', // путь к скрипту на сервере
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.cart_count > 0) {
                    $('#countCart').text(data.cart_count);
                }
            }
        });
    }

    $('#formTracking').submit(function(e){
        $('.tracking_box_inner p').text("");
        e.preventDefault(); 
        var form_data = $(this).serialize(); 
        $.ajax({
            type: "POST",
            url: "/php_scripts/form/trackingForm.php", 
            data: form_data,
            
            success: function (data) {   
                $('#resultSearchTracking').prepend(data);
            },

        });
    });
});
