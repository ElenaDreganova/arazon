

<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/header.php'); ?>

<?php 
  // Если с юзер с правами админа - перевести сразу в таблицы
  if(isAdmin()) {
    header("Location: tables.php");
  } else {

   if(!empty($_POST)) {
      // создать запрос
      $sql = "SELECT * FROM `users` WHERE `email` = '" . $_POST['email'] . "' AND `password` = '" . $_POST['password'] . "'";
      // выполнить запрос
      $result = mysqli_query($conn, $sql);

      // возвращает ассоциативный массив по выбранному запросу
      $user = $result->fetch_assoc();
      //echo "User: ";

       if($user) {        
          //redirect to the main admin page
          if($user['role'] === 'admin') {
            //задать куки
            setcookie('user_id', // название функции
              $user['id'], // значение, которое мы получаем
              time()+60*60*24*14, // сколько времени будет работать, т.е. через сколько срок действия истекает.
              '/'// путь к дериктории на сервере, на котором будут установлены куки
            ); 

            // пертейти к таблицам
            header("Location: tables.php");
          } else {
            //echo "You are not an admin! id=";
          }

          //echo $user['id'];

        } else {
          //echo "sign-in: user undefined";
          // unset($_SESSION['user_id']); // удалить переменную
          $_SESSION['user_id'] = null; // или так удалить переменную
          setcookie('user_id', '', 0, '/'); // удаление куки
        }
      }
    }


 ?>


<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8" style="margin-top: 1rem !important;">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-black text-dark display-6">Welcome to <br> admin panel</h3>
                  <p class="mb-0">Please enter your administraror's details.</p>

 <!-- PHP -->     <?php if (!empty($_POST)): ?> 
                    <p class="mb-0" style="color: red;">Invalid administrator's login or password</p>
                  <?php endif ?>
                
                </div>
                <div class="card-body">
                  <form role="form" action="#" method="POST">
                    <label>Email Address</label>
                    <div class="mb-3">
                      <input type="email" name="email" class="form-control" placeholder="Enter your email address" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label>Password</label>
                    <div class="mb-3">
                      <input type="password" name="password" class="form-control" placeholder="Enter password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="form-check form-check-info text-left mb-0" style="display: none;">
                        <input class="form-check-input" type="checkbox" name="remember" value="1" id="flexCheckDefault">
                        <label class="font-weight-normal text-dark mb-0" for="flexCheckDefault">
                          Remember for 14 days
                        </label>
                      </div>
                      <a href="javascript:;" class="text-xs font-weight-bold ms-auto">Forgot password</a>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Sign in</button>
                      <!-- <button type="button" class="btn btn-white btn-icon w-100 mb-3">
                        <span class="btn-inner--icon me-1">
                          <img class="w-5" src="../assets/img/logos/google-logo.svg" alt="google-logo" />
                        </span>
                        <span class="btn-inner--text">Sign in with Google</span>
                      </button> -->
                      <a href="../../index.php"><button type="button" class="btn btn-dark w-100 mt-4 mb-3">Back to the aranoz-master site</button></a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="position-absolute w-40 top-0 end-0 h-100 d-md-block d-none">
                <div class="oblique-image position-absolute fixed-top ms-auto h-100 z-index-0 bg-cover ms-n8" style="background-image:url('../assets/img/image-sign-in.jpg')">
                  <div class="blur mt-12 p-4 text-center border border-white border-radius-md position-absolute fixed-bottom m-4">
                    <h2 class="mt-3 text-dark font-weight-bold">Enter our global community of developers.</h2>
                    <h6 class="text-dark text-sm mt-5">Copyright © 2022 Corporate UI Design System by Creative Tim.</h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
 
 <?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/partials/footer.php'); ?>