<!-- Users -> edit user -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php");
	require($_SERVER['DOCUMENT_ROOT'] . '/admin/configs/helpers.php');

$imageName = '';
if (!empty($_POST)) {
  if (!empty($_FILES['image']['name'])) {
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/uploads/avatar/';
    $imageName = generateRandomString(64) . time() . "." . pathinfo($_FILES['image']['name'])['extension'];
    $uploadfile = $uploaddir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
    $sql = "UPDATE users SET email = '" . $_POST['email'] . "', username = '" . $_POST['username'] . "', password = '" . $_POST['password'] . "',
   role = '" . $_POST['role'] . "',`avatar` = '$imageName' WHERE id = '" . $_POST['user_id'] . "'";

    if (mysqli_query($conn, $sql)) {
      echo "<script>
                setTimeout(function () {
                  history.go(-1);
              }, 50);
        			</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    $sql = "UPDATE users SET email = '" . $_POST['email'] . "', username = '" . $_POST['username'] . "', password = '" . $_POST['password'] . "', role = '" . $_POST['role'] . "' WHERE id = '" . $_POST['user_id'] . "'";
    if (mysqli_query($conn, $sql)) {
      echo "<script>
      setTimeout(function () {
        history.go(-1);
    }, 50);
    </script>";
    } else {
      echo "Error:" . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>