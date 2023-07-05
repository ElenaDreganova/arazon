<?php 

//========================== CCURRENT USERS ===================

	// Авторизирован ли пользователь
	function isLogin() {
		//echo "FUNCTION isLogin returns: ";
		if (isset($_COOKIE) || isset($_SESSION)) {
			$is_session = null;
			if(isset($_SESSION['user_id']))
				$is_session = $_SESSION['user_id'] != null && isset($_SESSION['user_id']);

			$is_cookie = null;
			if(isset($_COOKIE['user_id']))
				$is_cookie = $_COOKIE['user_id'] != null && isset($_COOKIE['user_id']);

			if( $is_session != null || $is_cookie != null && $is_session || $is_cookie) {
				//echo "true";
				return true;
			} else {
				//echo "false";
				return false;
			}

		} else {
			echo "Error SESSION: " . var_dump($_SESSION);
			echo  "Error COOKIE: " . var_dump($_COOKIE);
		}
	} 

	// Текущий пользователь
	function getCurrentUser() {
		//echo "FUNCTION getCurrentUser returns: ";
		global $conn;

		if(isLogin()) {
			if(isset($_SESSION['user_id'])) {
				$is_session = $_SESSION['user_id'] != null && isset($_SESSION['user_id']);
			} else {
				$is_session = '';
			}

			$userID = $is_session ? $_SESSION['user_id'] : $_COOKIE['user_id'];
			$sql = "SELECT * FROM users WHERE id=" . $userID;

			$result = mysqli_query($conn, $sql);

			return $result->fetch_assoc();
			
		} else {
			return null;
		}
	}

	function isAdmin() {
		//echo "FUNCTION isAdmin returns: ";
		if(getCurrentUser() != null && getCurrentUser()['role'] == 'admin') 
			return true;

		return false;
	}

	// Получить ID текущего юзера Юзера
	function getUserID() {
		//echo "FUNCTION getUserID returns: ";

		$is_session = isset($_SESSION["user_id"]) && $_SESSION["user_id"] != null; // true/false
		$is_cookie = isset($_COOKIE["user_id"]) && $_COOKIE["user_id"] != null; // true/false

		if($is_session || $is_cookie) {
			return $is_session ? $_SESSION["user_id"] : $_COOKIE["user_id"];
		} else {
			return 0;
		}
	}


//========================== DATABASE ===================

//========================== USERS ===================

	// Получить всех пользователей + сортировка $boolean_val: true - asc, false - desc
	function getAllUsers($boolean_val) {
		global $conn;

		// ASC  - сотрировка по возрастанию
		// DESC - сортировка по убыванию
		if ($boolean_val)
			$sql = "SELECT * FROM users ORDER BY id ASC"; 
		else
			$sql = "SELECT * FROM users ORDER BY id DESC"; 

		return mysqli_query($conn, $sql);
	}

	// Получить пользователя по ID
	function getUserByID($user_id) {
		global $conn;

		$sql = "SELECT * FROM users WHERE id=" . $user_id;
		$result = mysqli_query($conn, $sql)->fetch_assoc();

		return $result;
	}

	function getUserNameByID($user_id) {
		global $conn;

		if (null !== $user_id) {

			$sql = "SELECT * FROM users WHERE id=" . $user_id;
			$result = mysqli_query($conn, $sql);
			$result_UserName = $result->fetch_assoc();

			return $result_UserName !== null ? $result_UserName['username'] : "user deleted";
		} else {
			return "Unknown user";
		}
	}

//========================== PRODUCTS ===================
	// Получить все продукты + сортировка $boolean_val: true - asc, false - desc
	function getAllProducts($boolean_val) {
		global $conn;

		if ($boolean_val)
			$sql = "SELECT * FROM product ORDER BY id ASC"; 
		else
			$sql = "SELECT * FROM product ORDER BY id DESC"; 

		return mysqli_query($conn, $sql);
	}

	// Получить продукт по его ID 
	function getProductByID($productID) {
		global $conn;
		$sql = "SELECT * FROM product WHERE id=" . $productID;
		$result = mysqli_query($conn, $sql);

		return $result->fetch_assoc();
	}

	// Получить категорию продукта по его ID
	function getCategoryByID($category_id){
		global $conn;

		$sql = "SELECT * FROM categories WHERE id=" . $category_id;
		$result = mysqli_query($conn, $sql);

		return $result->fetch_assoc()['title'];
	}

	// Получить наличие продукта по его ID
	function getAvailabilityByID($availability_id){
		global $conn;

		$in_stock = '<span class="badge badge-sm border border-success text-success bg-success">
                          <svg width="9" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor" class="me-1">
                            <path d="M1 4.42857L3.28571 6.71429L9 1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                          In stock
                        </span>';
		$not_available = '<span class="badge badge-sm border border-danger text-danger bg-danger">
                          <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="me-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Not available
                        </span>';
		$ready_to_ship = '<span class="badge badge-sm border border-warning text-warning bg-warning">
                          <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-1ca">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                          </svg>
                          Ready to ship
                        </span>';
		$expected = '<span class="badge badge-sm border border-warning text-warning bg-warning">
                          <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="me-1ca">
                            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zM12.75 6a.75.75 0 00-1.5 0v6c0 .414.336.75.75.75h4.5a.75.75 0 000-1.5h-3.75V6z" clip-rule="evenodd" />
                          </svg>
                          Expected
                        </span>';

      switch ($availability_id) {
      	case 1:
      		return $in_stock;
      	case 2:
      		return $not_available;
      	case 3:
      		return $ready_to_ship;
      	case 4:
      		return $expected;
      }
	}


	// PHP random string generator
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[random_int(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	function getNewsletter()
	{
		global $conn;
	
		$sql = "SELECT * FROM `newsletter`";
		$result = mysqli_query($conn, $sql);
		return $result;
	}

 ?>