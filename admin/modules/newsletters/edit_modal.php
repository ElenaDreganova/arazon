<!-- Users -> edit_modal user -->

<!-- Modal EDIT the user's information -->
<div class="modal fade" id="users_edit_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit the user's information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/admin/modules/users/edit.php" method="POST" enctype="multipart/form-data">
             <!-- Служит для передачи id пользователя в запрос -->
            <input id="input_user_id" name="user_id" type="text" style="display: none;">

             <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="input_user_email" type="email" name="email" class="form-control" placeholder="Enter user's email">
            </div>

             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Edit user</button>
             </div>
        </form>
      </div>
    </div>
  </div>
</div>

