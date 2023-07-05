<?php 				
	require ($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php");
	require($_SERVER['DOCUMENT_ROOT'] . '/admin/configs/helpers.php');


	// Предотвратить удаление последнего админа
	$sql_countADM = "";
	$result_countADM = "";

	$deletedUser = "";

	if (empty($_GET)) { // Если GET запрос пустой
		$message = "GET is empty!";
		echo "<script>alert('$message');
			location.href='/admin/pages/tables.php';</script>";

	} else if (!empty($_GET)) { // Если GET запрос не пустой
		$sql_countADM = "SELECT * FROM users WHERE role = 'admin'";
		$result_countADM = mysqli_query($conn, $sql_countADM);

		$deletedUser = getUserByID($_GET['id']);

		if (getCurrentUser()['id'] == $_GET['id']) { // Если текущий пользователь
			$message = "You cannnot delete the current user!";
			echo "<script>alert('$message');
			setTimeout(function () {
				history.go(-1);
			}, 50);</script>";

		} elseif ($result_countADM->num_rows <= 1 
			&& $deletedUser['role'] == "admin") { // Если удаляемый юзер админ и количество админов 1 и меньше
			$message = "You cannnot delete the last administrator!";
			echo "<script>alert('$message');
			setTimeout(function () {
				history.go(-1);
			}, 50);</script>";

		} else {
			$sql = 'DELETE FROM `users` WHERE `id` = ' . $_GET['id'];

			if (mysqli_query($conn, $sql)) {
				$message = "DELETED successfully";
				echo "<script> setTimeout(function () {
					history.go(-1);
				}, 50);</script>";
			} else {
				$message =  "Error: " . $sql . "<br>" . mysqli_error($conn);
				echo "<script>alert('$message');
				setTimeout(function () {
					history.go(-1);
				}, 50);</script>";
			}
		}
	}
?>