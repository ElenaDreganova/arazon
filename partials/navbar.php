  <header class="main_menu home_menu">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                      <a class="navbar-brand" href="/index.php"> <img src="/assets/img/logo.png" alt="logo"> </a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="menu_icon"><i class="fas fa-bars"></i></span>
                      </button>

                      <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link" href="/index.php">Home</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="/partials/pages/category.php"> Shop category </a>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="/partials/pages/contacts.php" id="navbarDropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Help
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                      <a class="dropdown-item" href="/partials/pages/tracking.php">Tracking </a>
                                      <a class="dropdown-item" href="/partials/pages/contacts.php">Contact</a>
                                  </div>
                              </li>

                              <!-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_2"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        blog
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                        <a class="dropdown-item" href="blog.html"> blog</a>
                                        <a class="dropdown-item" href="single-blog.html">Single blog</a>
                                    </div>
                                </li> -->

                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdown_2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Account
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                      <?php
                                        if ($is_session || $is_cookie) { ?>
                                          <a class="dropdown-item" href="/partials/pages/user.php"> My account</a>
                                          <a class="dropdown-item" href="/php_scripts/logout.php"> Logout</a>
                                      <?php } else { ?>
                                          <a class="dropdown-item" href="/login-form.php"> login</a>
                                          <a class="dropdown-item" href="/register-form.php"> Registration</a>
                                      <?php } ?>
                                  </div>
                              </li>
                          </ul>
                      </div>
                      <div class="hearer_icon d-flex">
                          <a id="search_1"><i class="ti-search"></i></a>
                          <a href="/partials/pages/user.php?p=like" id="favorites"><i class="ti-heart"></i></a>
                          <div class="dropdown cart">
                              <a class="dropdown-toggle" href="/partials/cart/cart.php">
                                  <i class="fas fa-cart-plus" ><span id="countCart"></span></i>
                              </a>
                              <!-- <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="single_product">
    
                                    </div>
                                </div> -->
                          </div>
                      </div>
                  </nav>
              </div>
          </div>
      </div>
      <div class="search_input" id="search_input_box">
          <div class="container ">
              <form action="/partials/pages/search.php" method="post" class="d-flex justify-content-between search-inner" style="align-items: center;">
                  <input type="text" class="form-control searchInput" name="search" id="search_input" placeholder="Search Here">
                  <button type="submit" class="search-btn">Search</button>
                  <span class="ti-close" id="close_search" title="Close Search"></span>
              </form>
          </div>
      </div>
  </header>