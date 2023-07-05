<!-- Products -> add_modal Products -->

<?php require ($_SERVER['DOCUMENT_ROOT'] . "/configs/db.php"); ?>

<!-- Modal Add a new Product -->
<div class="modal fade" id="products_add_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add a new product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/modules/products/add.php" method="POST" enctype="multipart/form-data">
             
             <div class="mb-3">
                <label for="productname" class="form-label">Product name</label>
                <input type="text" name="productname" class="form-control" placeholder="Enter product's name">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" class="form-control">
                  <?php 
                      $sql_categories = "SELECT * FROM categories";
                      $result_categories = mysqli_query($conn, $sql_categories);
                      while( $category = $result_categories->fetch_assoc() ):
                   ?>
                      <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                  <?php endwhile ?>
                </select>
            </div>

             <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Enter product's price">
            </div>

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="text" name="quantity" class="form-control" placeholder="Enter product's quantity">
            </div>

            <div class="mb-3">
                <label for="availability_id" class="form-label">Availability</label>
                <select name="availability_id" class="form-control">
                  <?php 
                      $sql_availability = "SELECT * FROM availibility";
                      $result_availability = mysqli_query($conn, $sql_availability);
                      while( $availability = $result_availability->fetch_assoc() ):
                   ?>
                      <option value="<?= $availability['id'] ?>"><?= $availability['title'] ?></option>
                  <?php endwhile ?>
                </select>
            </div>

    
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            
              <div class="mb-3">
                <input type="text" name="user_id" class="form-control" style="display: none;"
                        value="<?= getUserID() ?>" placeholder="<?= getUserID() ?>">
            </div>


             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add the new product</button>
             </div>

        </form>
      </div>
    </div>
  </div>
</div>

