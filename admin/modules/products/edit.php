<!-- Products -> Edit Products -->

<?php require($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php");
require($_SERVER['DOCUMENT_ROOT'] . '/admin/configs/helpers.php');
$imageName = '';
if (!empty($_POST)) {
  //var_dump($_POST);
  if (!empty($_FILES['image']['name'])) {
    $uploaddir = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/product/chairs/';
    $imageName = generateRandomString(64) . time() . "." . pathinfo($_FILES['image']['name'])['extension'];
    $uploadfile = $uploaddir . $imageName;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
    $sql = "UPDATE product
    SET productname = '" . $_POST['productname'] . "', 
        category_id = '" . $_POST['category_id'] . "', 
        price = '" . $_POST['price'] . "', 
        quantity = '" . $_POST['quantity'] . "',
        availibility_id = '" . $_POST['availability_id'] . "',
        image = '" . $imageName . "',
        user_id = '" . $_POST['user_id'] . "'
    WHERE id = '" . $_POST['product_id'] . "'";


    if (mysqli_query($conn, $sql)) {
      $message = $_POST['productname'] . " edited successfully!";
      echo "<script>
      /*alert('$message');*/
      setTimeout(function () {
        history.go(-1);
    }, 50);
    </script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
  } else {
    $sql = "UPDATE product
              SET productname = '" . $_POST['productname'] . "', 
                	category_id = '" . $_POST['category_id'] . "', 
                	price = '" . $_POST['price'] . "', 
                	quantity = '" . $_POST['quantity'] . "',
                  availibility_id = '" . $_POST['availability_id'] . "',
                  user_id = '" . $_POST['user_id'] . "'
              WHERE id = '" . $_POST['product_id'] . "'";


    if (mysqli_query($conn, $sql)) {
      $message = $_POST['productname'] . " edited successfully!";
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
}


?>