<?php 				
	require ($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php");

	if(!empty($_GET)) {
		//echo $_GET['user_id'];
		$sql = 'DELETE FROM `product` WHERE `id` = ' . $_GET['id'];

		if (mysqli_query($conn, $sql)) {
			// Перенаправить пользователя на другую страницу
			echo "<script>
			setTimeout(function () {
				history.go(-1);
			}, 50);</script>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		//mysqli_close($conn);
	}
