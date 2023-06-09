<div class="modal modal-xl fade" id="editUser" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label align-self-center mb-2 w-50 fw-bold fs-5">Account</label>
              <div class="d-flex justify-content-between mb-3">
                <input type="hidden" id="userId" name="userId">
                <label class="form-label align-self-center mb-0 w-50">Username</label>
                <input type="text" class="form-control w-65" name="userName" id="userName" disabled>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Email</label>
                <input type="email" class="form-control w-65" name="userEmail" id="userEmail" disabled>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Password</label>
                <input type="password" class="form-control w-65" name="userPassword" id="userPassword">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Status</label>
                <select class="form-select w-65" name="userStatus" id="userStatus" required>
                  <option value="1">Active</option>
                  <option value="0">Non-active</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Role</label>
                <select class="form-select w-65" name="userRole" id="userRole" required>
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label align-self-center mb-2 w-50 fw-bold fs-5">Employee</label>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Number</label>
                <input type="text" class="form-control w-65" name="userNumber" id="userNumber">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Name</label>
                <input type="text" class="form-control w-65" name="userNames" id="userNames">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Phone Number</label>
                <input type="text" class="form-control w-65" name="userPhoneNumber" id="userPhoneNumber">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Gender</label>
                <select class="form-select w-65" name="userGender" id="userGender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Position</label>
                <select name="userPosition" id="userPosition" class="form-select w-65" required>
                  <?php foreach($listposition as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                    <?php }?>
                </select>
              </div>
            </div>
            <div class="col mb-3">
              <div class="d-flex justify-content-between mb-3">
                <textarea class="form-control w-65" id="userAddress" name="userAddress" rows="1" placeholder="Address"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Updated</button>
        </div>
      </div>
    </div>
    <?php echo form_close();?>
</div>

<div class="modal modal-xl fade" id="insertUser" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/add'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Insert Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label align-self-center mb-2 w-50 fw-bold fs-5">Account</label>
              <div class="d-flex justify-content-between mb-3">
                <input type="hidden" id="userId" name="userId">
                <label class="form-label align-self-center mb-0 w-50">Username</label>
                <input type="text" class="form-control w-65" name="userName" id="userName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Email</label>
                <input type="email" class="form-control w-65" name="userEmail" id="userEmail">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Password</label>
                <input type="password" class="form-control w-65" name="userPassword" id="userPassword">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Status</label>
                <select class="form-select w-65" name="userStatus" id="userStatus" required>
                  <option value="1">Active</option>
                  <option value="0">Non-active</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Role</label>
                <select class="form-select w-65" name="userRole" id="userRole" required>
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label align-self-center mb-2 w-50 fw-bold fs-5">Employee</label>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Number</label>
                <input type="text" class="form-control w-65" name="userNumber" id="userNumber" value="Auto Generate" disabled>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Name</label>
                <input type="text" class="form-control w-65" name="userNames" id="userNames">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Phone Number</label>
                <input type="text" class="form-control w-65" name="userPhoneNumber" id="userPhoneNumber">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Gender</label>
                <select class="form-select w-65" name="userGender" id="userGender" required>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Position</label>
                <select name="userPosition" id="userPosition" class="form-select w-65" required>
                  <?php foreach($listposition as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                    <?php }?>
                </select>
              </div>
            </div>
            <div class="col mb-3">
              <div class="d-flex justify-content-between mb-3">
                <textarea class="form-control w-65" id="userAddress" name="userAddress" rows="1" placeholder="Address"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>

<div class="modal modal-xl fade" id="infoUser" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/add'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Info</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label align-self-center mb-2 w-50 fw-bold fs-5">Account</label>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Username :</label>
                <label class="form-label w-25 fw-bold" name="iuserName" id="iuserName"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Email :</label>
                <label class="form-label w-25 fw-bold" name="iuserEmail" id="iuserEmail"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Status :</label>
                <label class="form-label w-25 fw-bold" name="iuserStatus" id="iuserStatus"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Role :</label>
                <label class="form-label w-25 fw-bold" name="iuserRole" id="iuserRole"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Position :</label>
                <label class="form-label w-50 fw-bold" name="iuserPosition" id="iuserPosition"></label>
              </div>
            </div>
            <div class="col-md-6">
              <label class="form-label align-self-center mb-2 w-50 fw-bold fs-5">Employee</label>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Number :</label>
                <label class="form-label w-25 fw-bold" name="iuserNumber" id="iuserNumber"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Name :</label>
                <label class="form-label w-25 fw-bold" name="iuserNames" id="iuserNames"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Phone Number :</label>
                <label class="form-label w-25 fw-bold" name="iuserPhoneNumber" id="iuserPhoneNumber"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Gender :</label>
                <label class="form-label w-25 fw-bold" name="iuserGender" id="iuserGender"></label>
              </div>
              <div class="d-flex mb-3">
                <label class="form-label w-25">Address :</label>
                <label class="form-label w-50 fw-bold" name="iuserAddress" id="iuserAddress"></label>
              </div>
          </div>
        </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>

<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="userid" name="userId">
          <p class="modal-title" id="exampleModalLabel1">Yakin ingin menghapus?</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Hapus</button>
        </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>