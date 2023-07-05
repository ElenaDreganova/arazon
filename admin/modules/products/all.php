<style>
  .btn {
     margin-bottom: 0;
  }

</style> 
 
 <div class="row">
   <div class="col-12">
     <div class="card border shadow-xs mb-4">
       <div class="card-header border-bottom pb-0">
         <div class="d-sm-flex align-items-center mb-3">
           <div>
             <h6 class="font-weight-semibold text-lg mb-0">Aranoz products</h6>
             <p class="text-sm mb-sm-0">These are details about Aranoz products</p>
           </div>
           <div class="ms-auto d-flex">
             <div class="input-group input-group-sm ms-auto me-2">
               <span class="input-group-text text-body">
                 <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                 </svg>
               </span>
               <input type="text" class="form-control form-control-sm" placeholder="Search">
             </div>

             <!-- Button trigger modal Add product -->
             <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#products_add_modal">
               <span class="btn-inner--text">Add_product</span>
             </button>

           </div>
         </div>
       </div>

       <!-- Product Table -->
       <div class="card-body px-0 py-0">
         <div class="table-responsive p-0">
           <table class="table align-items-center justify-content-center mb-0">
             <thead class="bg-gray-100">
               <tr>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7">Product</th>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Category</th>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Price</th>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Quantity</th>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Availability</th>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Who_added</th>
                 <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Created</th>
                 <th class="text-center text-secondary text-xs font-weight-semibold opacity-7"></th>
               </tr>
             </thead>
             <tbody>
               <?php
                $products = getAllProducts(true);
                while ($product = $products->fetch_assoc()) : ?>
                 <tr>
                   <td> <!-- avatar + ProductName -->
                     <div class="d-flex px-2">
                       <div class="avatar avatar-sm rounded-circle bg-gray-100 me-2 my-2">
                         <img src="/assets/img/product/chairs/<?= $product['image']; ?>" class="w-80" alt="spotify">
                       </div>
                       <div class="my-auto"> <!-- ProductName -->
                         <h6 class="mb-0 text-sm"><?= $product['productname']; ?></h6>
                       </div>
                     </div>
                   </td>
                   <td> <!-- Category -->
                     <p class="text-sm font-weight-normal mb-0"><?= getCategoryByID($product['category_id']); ?></p>
                   </td>
                   <td> <!-- Price -->
                     <span class="text-sm font-weight-normal"><?= $product['price']; ?></span>
                   </td>
                   <td> <!-- Quantity -->
                     <span class="text-sm font-weight-normal"><?= $product['quantity']; ?></span>
                   </td>
                   <td> <!-- Availability -->
                     <?= getAvailabilityByID($product['availibility_id']);  ?>
                   </td>

                   <td> <!-- Who added the product -->
                     <span class="text-sm font-weight-normal"><?= getUserNameByID($product['user_id']); ?></span>
                   </td>
                   <td> <!-- When the product was added -->
                     <span class="text-sm font-weight-normal"><?= $product['created']; ?></span>
                   </td>

                   <td class="align-middle">
                     <!-- DELETE button -->
                     <a href="/admin/modules/products/delete.php?id=<?= $product['id'] ?>;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Delete product">
                       <svg width="14" height="14" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                         <g>
                           <g>
                             <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                                L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                                c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                                l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                                L284.286,256.002z" />
                           </g>
                         </g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                         <g></g>
                       </svg>
                     </a>

                     <!-- EDIT button -->
                     <!-- <a href="javascript:;" class="text-secondary font-weight-bold text-xs" 
                        data-bs-toggle="tooltip" data-bs-title="Edit product" -->
                     <a type="button" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#products_edit_modal" id="products_edit_modal_id" data-bs-title="Edit product" onclick="editProductToModalInput (
                                        '<?php echo $product['id']; ?>', 
                                        '<?php echo $product['productname']; ?>', 
                                        '<?php echo $product['category_id']; ?>', 
                                        '<?php echo $product['price']; ?>', 
                                        '<?php echo $product['quantity']; ?>', 
                                        '<?php echo $product['availibility_id']; ?>', 
                                        '<?php echo $product['rating']; ?>', 
                                        '<?php echo $product['image']; ?>', 
                                        '<?php echo $product['user_id']; ?>', 
                                      )">

                       <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                       </svg>
                     </a>
                   </td>
                 </tr>
               <?php endwhile ?>
             </tbody>
           </table>
         </div>

         <div class="border-top py-3 px-3 d-flex align-items-center">
           <button class="btn btn-sm btn-white d-sm-block d-none mb-0">Previous</button>
           <nav aria-label="..." class="ms-auto">
             <ul class="pagination pagination-light mb-0">
               <li class="page-item active" aria-current="page">
                 <span class="page-link font-weight-bold">1</span>
               </li>
               <li class="page-item"><a class="page-link border-0 font-weight-bold" href="javascript:;">2</a></li>
               <li class="page-item"><a class="page-link border-0 font-weight-bold d-sm-inline-flex d-none" href="javascript:;">3</a></li>
               <li class="page-item"><a class="page-link border-0 font-weight-bold" href="javascript:;">...</a></li>
               <li class="page-item"><a class="page-link border-0 font-weight-bold d-sm-inline-flex d-none" href="javascript:;">8</a></li>
               <li class="page-item"><a class="page-link border-0 font-weight-bold" href="javascript:;">9</a></li>
               <li class="page-item"><a class="page-link border-0 font-weight-bold" href="javascript:;">10</a></li>
             </ul>
           </nav>
           <button class="btn btn-sm btn-white d-sm-block d-none mb-0 ms-auto">Next</button>
         </div>
       </div>
       <!-- End Product Table -->
     </div>
   </div>
 </div>

 <!-- Modal product -->
 <?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/add_modal.php'); ?>

 <!-- Modal product edit_modal  -->
 <?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/products/edit_modal.php'); ?>