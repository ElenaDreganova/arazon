<div class="row">
  <div class="col-12">
    <div class="card border shadow-xs mb-4">
      <div class="card-header border-bottom pb-0">
        <div class="d-sm-flex align-items-center">
          <div>
            <h6 class="font-weight-semibold text-lg mb-0">Aranoz newsletters</h6>
            <p class="text-sm">Information about all newsletters</p>
          </div>
          <div class="ms-auto d-flex">
            <button type="button" class="btn btn-sm btn-white me-2">
              View all
            </button>

            <!-- Button trigger modal Add user -->
            <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#users_add_modal">
              <span class="btn-inner--icon">
                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                  <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                </svg>
              </span>
              <span class="btn-inner--text">Add newsletter</span>
            </button>
          </div>
        </div>
      </div>
      <div class="card-body px-0 py-0">
        <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
          <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
            <label class="btn btn-white px-3 mb-0" for="btnradiotable1">All</label>
            <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
            <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Processing</label>
            <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
            <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Processed</label>
          </div>
          <div class="input-group w-sm-25 ms-auto">
            <span class="input-group-text text-body">
              <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
              </svg>
            </span>
            <input type="text" class="form-control" placeholder="Search">
          </div>
        </div>

        <!-- Users Table -->
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead class="bg-gray-100">
              <tr>
                <th class="text-secondary text-xs font-weight-semibold opacity-7">№</th>
                <th class="text-secondary text-xs font-weight-semibold opacity-7">Email</th>
                <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Status application</th>
                <th class="text-center opacity-7">Operation</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $newsletterList = getNewsletter();
              $i = 0;
              while ($newsletter = $newsletterList->fetch_assoc()) : $i++;?>
                <tr>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center ms-1">
                        <h6 class="mb-0 text-sm font-weight-semibold"><?= $i; ?></h6>
                      </div>
                    </div>
                  </td>
                  <td>
                  <div class="d-flex px-2 py-1">
                      <div class="d-flex flex-column justify-content-center ms-1">
                        <p class="text-sm text-secondary mb-0"><?= $newsletter['email']  ?></p>
                      </div>
                    </div>
                    
                  </td>
                  <td class="align-middle text-center text-sm">
                    <span class="badge badge-sm border border-success text-success bg-success">Processing</span>
                  </td>


                  <td class="align-middle text-center text-sm">
                    <!-- DELETE button -->
                    <a href="/admin/modules/users/delete.php?id=<?= $newsletter['id'] ?>" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Delete user">
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
                    <!-- Button trigger modal Edit user -->
                    <a type="button" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#users_edit_modal" id="users_edit_modal_id" data-bs-title="Edit user" data-user_id="<? $newsletter['id']; ?>" onclick="editUserToModalInput (
                                        '<?php echo $newsletter['id']; ?>', 
                                        '<?php echo $newsletter['email']; ?>', 
                                      )">

                      <span class="btn-innoer--icon">
                        <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                        </svg>
                      </span>
                    </a>

                  </td>
                </tr>
              <?php endwhile ?>
            </tbody>
          </table>
          <!-- End Users Table -->
        </div>
        <!-- pages -->
        <div class="border-top py-3 px-3 d-flex align-items-center">
          <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 10</p>
          <div class="ms-auto">
            <button class="btn btn-sm btn-white mb-0">Previous</button>
            <button class="btn btn-sm btn-white mb-0">Next</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Modal user add_modal  -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/add_modal.php'); ?>

<!-- Modal users edit_modal  -->
<?php require($_SERVER['DOCUMENT_ROOT'] . '/admin/modules/users/edit_modal.php'); ?>