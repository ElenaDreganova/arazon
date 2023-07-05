<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/header.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/navbar.php');
if (isset($_GET['id'])) {
  $product_id = $_GET['id'];
  $product = getProduct($product_id);

  $prev = $product_id - 1;
  if ($prev == 0) {
    $prev = 1;
  }

  $next = $product_id + 1;
  $last = getLastIdProduct();

  if ($last < $next) {
    $next = getLastIdProduct();
  }
}
?>
<style>
  .ti-heart_custom {
    margin-top: 34%;
    display: inline-block;
  }
</style>
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="breadcrumb_iner">
          <div class="breadcrumb_iner_item">
            <h2>Shop Single</h2>
            <p>Home <span>-</span> Shop Single</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area section_padding">
  <div class="container">
    <div class="row s_product_inner justify-content-between">
      <div class="col-lg-7 col-xl-7">
        <div class="product_slider_img">
          <div id="vertical">
            <div data-thumb="/assets/img/product/chairs/<?php echo $product['image'] ?>">
              <img style="object-fit:contain;" src="/assets/img/product/chairs/<?php echo $product['image'] ?>" alt="">
            </div>
            <div data-thumb="/assets/img/product/chairs/<?php echo $product['image'] ?>">
              <img style="object-fit:contain;" src="/assets/img/product/chairs/<?php echo $product['image'] ?>" />
            </div>
            <div data-thumb="/assets/img/product/chairs/<?php echo $product['image'] ?>">
              <img style="object-fit:contain;" src="/assets/img/product/chairs/<?php echo $product['image'] ?>" />
            </div>
            <div data-thumb="/assets/img/product/chairs/<?php echo $product['image'] ?>">
              <img style="object-fit:contain;" src="/assets/img/product/chairs/<?php echo $product['image'] ?>" />
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 col-xl-4">
        <div class="s_product_text">
          <h5> <a href="/partials/pages/product.php?id=<?php echo $prev; ?>">previous</a> <span>|</span> <a href="/partials/pages/product.php?id=<?php echo $next; ?>">next</a> </h5>
          <h3><?php echo $product['productname']; ?></h3>
          <h2><?php echo $product['price'] . " uah" ?></h2>
          <ul class="list">
            <li>
              <span>Category</span> : <a class="active" href="#">
                <?php
                $category = getCategorybyProduct($product['category_id']);
                echo  $category['title'];
                ?></a>
            </li>
            <li>
              <span>Availibility</span> :<a class="active" href="#">
                <?php
                $availibility = getAvailibilitybyProduct($product['availibility_id']);
                echo  $availibility['title'];
                ?> </a>
            </li>
          </ul>
          <p>
            First replenish living. Creepeth image image. Creeping can't, won't called.
            Two fruitful let days signs sea together all land fly subdue
          </p>
          <div class="card_area d-flex justify-content-between align-items-center">

            <a href="" class="btn_3 add_cart" data-productid="<?php echo $product_id ?>"> add to cart</a>
            <a href="" class="like_us add_to_favorites" data-productid="<?php echo $product_id ?>">
              <?php if (isset($user['id'])) {
                $liked = getLiked($user['id'], $product['id']);
              } ?>
              <i class=" ti-heart_custom" <?php if ($liked == true) : ?>style="background-image: url('/assets/img/icon/heart_liked.svg')" <?php endif; ?>></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
  <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Description</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Specification</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Comments</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
        <p>
          Beryl Cook is one of Britain’s most talented and amusing artists
          .Beryl’s pictures feature women of all shapes and sizes enjoying
          themselves .Born between the two world wars, Beryl Cook eventually
          left Kendrick School in Reading at the age of 15, where she went
          to secretarial school and then into an insurance office. After
          moving to London and then Hampton, she eventually married her next
          door neighbour from Reading, John Cook. He was an officer in the
          Merchant Navy and after he left the sea in 1956, they bought a pub
          for a year before John took a job in Southern Rhodesia with a
          motor company. Beryl bought their young son a box of watercolours,
          and when showing him how to use it, she decided that she herself
          quite enjoyed painting. John subsequently bought her a child’s
          painting set for her birthday and it was with this that she
          produced her first significant work, a half-length portrait of a
          dark-skinned lady with a vacant expression and large drooping
          breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
        </p>
        <p>
          It is often frustrating to attempt to plan meals that are designed
          for one. Despite this fact, we are seeing more and more recipe
          books and Internet websites that are dedicated to the act of
          cooking for one. Divorce and the death of spouses or grown
          children leaving for college are all reasons that someone
          accustomed to cooking for more than one would suddenly need to
          learn how to adjust all the cooking practices utilized before into
          a streamlined plan of cooking that is more efficient for one
          person creating less
        </p>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <?php
              $specification = getSpecificationbyProduct($product_id);
              ?>
              <tr>
                <td>
                  <h5>Width</h5>
                </td>
                <td>
                  <h5><?php echo $specification['width'] ?> mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Height</h5>
                </td>
                <td>
                  <h5><?php echo $specification['height'] ?>mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Depth</h5>
                </td>
                <td>
                  <h5><?php echo $specification['depth'] ?> mm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Weight</h5>
                </td>
                <td>
                  <h5><?php echo $specification['max_weight'] ?> gm</h5>
                </td>
              </tr>
              <tr>
                <td>
                  <h5>Color</h5>
                </td>
                <td>
                  <h5><?php echo $specification['color'] ?></h5>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        <div class="row">
          <div class="col-lg-6">
            <div class="comment_list">
              <?php
              $comments = getCommentsofProduct($product['id']);
              while ($row = mysqli_fetch_assoc($comments)) :
                $userComment = getNameUser($row['user_id']);
              ?>
                <div class="review_item" id="commentsList">
                  <div class="media">
                    <div class="d-flex">
                      <img style="object-fit:cover;width:50px;height:50px;border-radius:50%;" src="/uploads/avatar/<?php echo $userComment['avatar'] ?>" alt="" />
                    </div>
                    <div class="media-body">
                      <h4><?php echo $userComment['username']; ?></h4>
                      <h5><?php echo date('jS M, Y \a\t h:i a', strtotime($row['created'])); ?></h5>
                    </div>
                  </div>
                  <p>
                    <?php echo $row['text']; ?>
                  </p>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="review_box">
              <h4>Post a comment</h4>
              <form class="row contact_form" action="#" method="post" id="CommentForm">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" hidden id="product_id" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="text" readonly class="form-control" id="name" value="<?php echo $user['username']; ?>" name="name" placeholder="Your Full name" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="email" readonly class="form-control" id="email" value="<?php echo $user['email']; ?>" name="email" placeholder="Email Address" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" readonly class="form-control" id="number" value="<?php echo "+" . $user['telephone']; ?>" name="number" placeholder="Phone Number" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="col-md-12 text-right">
                  <button type="submit" value="submit" id="comment_submit">
                    Submit Now
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
<!--================End Product Description Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="section_tittle text-center">
          <h2>Best Sellers <span>shop</span></h2>
        </div>
      </div>
    </div>
    <div class="row align-items-center justify-content-between">
      <div class="col-lg-12">
        <div class="best_product_slider owl-carousel">
          <?php $products = getProducts(0, 5);
          while ($row = mysqli_fetch_assoc($products)) : ?>

            <div class="single_product_item ">
              <img class="card-img" style="background-image:url(/assets/img/product/chairs/<?php echo $row['image'] ?>)" alt="">
              <div class="single_product_text">
                <h4><?php echo $row['productname'] ?></h4>
                <h3><?php echo $row['price'] . " uah" ?></h3>
              </div>
            </div>

          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- product_list part end-->

<?php
require($_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php');
require($_SERVER['DOCUMENT_ROOT'] . '/partials/scripts.php');
?>