 //<!-- Изменение данных пользователя: передать в input модального окна текущие значения полей -->

function editUserToModalInput(user_id, email, username, password, avatar, role) {
	
	// Передать id пользователя в скрытый input
	document.querySelector('#input_user_id').value = user_id;
	
	// Передать в поле email email
	document.querySelector('#input_user_email').value = email;
	
	// Передать в поле username username
	document.querySelector('#input_user_username').value = username;

	// Передать в поле пароль пароль пользователя
	document.querySelector('#input_user_password').value = password;

//TODO
	// Передать путь к файлу аватара
	document.querySelector('#input_user_avatar').value = avatar;

	// Передать в форму роль пользователя
	document.querySelector("#input_user_role").value = role;
}
