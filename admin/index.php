<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php'); ?>


<?php  
	if (isAdmin()) {
		header("Location: pages/tables.php");
	} else {
		header("Location: pages/sign-in.php");
		//header("Location: ../login.php");
	}

?>	


<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/footer.php'); ?>