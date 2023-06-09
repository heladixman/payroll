<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Profile</div>
        <div class="card-body"> 
          <?php if (isset($user_name)) { ?>
            <div class="row">
              <div class="col-3">
                <div class="mb-3">
                  <label for="userIdInput" class="form-label">User Id</label>
                  <input class="form-control" id="userIdInput" type="text" value="<?=$user_id ?>" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="userNameInput" class="form-label">Name</label>
                  <input class="form-control" id="userNameInput" type="text" value="<?=$user_name ?>" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="userPositionInput" class="form-label">Position</label>
                  <input class="form-control" id="userPositionInput" type="text" value="<?=$user_position['name'] ?>" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                </div>
              </div>
              <div class="col-3">
                <div class="mb-3">
                  <label for="userGenderInput" class="form-label">Gender</label>
                  <input class="form-control" id="userGenderInput" type="text" value="<?=$user_sex ?>" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                </div>
              </div>
  
              <div class="col-6">
                <div class="mb-3">
                  <label for="userEmailInput" class="form-label">Email</label>
                  <input class="form-control" id="userEmailInput" type="text" value="<?=$user_email ?>" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                </div>
              </div>
              <div class="col-6">
                <div class="mb-3">
                  <label for="userPhoneInput" class="form-label">Phone</label>
                  <input class="form-control" id="userPhoneInput" type="text" value="<?=$user_phone ?>" placeholder="Disabled input" aria-label="Disabled input example" disabled>
                </div>
              </div>
  
              <div class="col-12">
                <div class="mb-3">
                  <label for="userPhoneInput" class="form-label">Address</label>
                  <textarea class="form-control" value="<?= $user_address ?>" aria-label="textarea" disabled></textarea>
                </div>
              </div>
            </div>
          <?php }?>

        </div>
    </div>
</section>