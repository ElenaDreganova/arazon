<!-- Products -> Add Products -->
<?php require($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php");
require($_SERVER['DOCUMENT_ROOT'] . '/admin/configs/helpers.php');
if (!empty($_POST)) {
  if (!empty($_FILES['image']['name'])) {
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/product/chairs/';
    $imageName = generateRandomString(64) . time() . "." . pathinfo($_FILES['image']['name'])['extension'];
    $uploadfile = $uploaddir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);

    $sql = "INSERT INTO product (productname, category_id, price, quantity, availibility_id, image, user_id) 
              VALUES ( '" . $_POST['productname'] . "',
                       '" . $_POST['category_id'] . "',
                       '" . $_POST['price'] . "',
                       '" . $_POST['quantity'] . "',
                       '" . $_POST['availability_id'] . "',
                       '" . $imageName . "',
                       '" . $_POST['user_id'] . "' 
                     )";

    if (mysqli_query($conn, $sql)) {
      $message = "The new product" . $_POST['productname'] . " added successfully!";
      echo "<script>
                setTimeout(function () {
                  history.go(-1);
              }, 50);
              </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    $sql = "INSERT INTO product (productname, category_id, price, quantity, availibility_id, user_id) 
              VALUES ( '" . $_POST['productname'] . "',
                       '" . $_POST['category_id'] . "',
                       '" . $_POST['price'] . "',
                       '" . $_POST['quantity'] . "',
                       '" . $_POST['availability_id'] . "',
                       '" . $_POST['user_id'] . "' 
                     )";

    if (mysqli_query($conn, $sql)) {
      $message = "The new product" . $_POST['productname'] . " added successfully!";
      echo "<script>
                setTimeout(function () {
                  history.go(-1);
              }, 50);
              </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  }
}
?>