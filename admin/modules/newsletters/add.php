<!-- Users -> add user -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php"); 

if (!empty($_POST)) {
  $password=md5($_POST['password']);
  $sql = "INSERT INTO users (email, username, password, /*avatar,*/ role) 
              VALUES ('" . $_POST['email'] . "', '" . $_POST['username'] . "',
              '" . $password . "', '" . $_POST['role'] . "')";

  if (mysqli_query($conn, $sql)) {
    $message = "New user " . $_POST['username'] . " added successfully!";
    echo "<script>
        /*alert('$message');*/
        setTimeout(function () {
          history.go(-1);
      }, 50);
        </script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

?>