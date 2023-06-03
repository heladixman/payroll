<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/user/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="userId" name="userId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Start user</label>
                <input type="date" class="form-control w-65" name="userDate" id="userDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">End user</label>
                <input type="date" class="form-control w-65" name="userDate" id="userDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Reason</label>
                <input type="text" class="form-control w-65" name="userAmount" id="userAmount">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Prove</label>
                <input type="text" class="form-control w-65" name="userAmount" id="userAmount">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Status</label>
                <input type="text" class="form-control w-65" name="userAmount" id="userAmount">
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

<div class="modal fade" id="insertUser" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/user/add'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Insert Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
            <input type="hidden" id="userId" name="userId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Employee Number</label>
                <input type="text" class="form-control w-65" name="userDate" id="userDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Employee Name</label>
                <input type="text" class="form-control w-65" name="userDate" id="userDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Phone Number</label>
                <input type="text" class="form-control w-65" name="userDate" id="userDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Gender</label>
                <select class="form-select w-65" name="allowanceUId" id="allowanceUId" required>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Position</label>
                <select name="allowanceAid" id="allowanceAid" class="form-select w-65" required>
                  <?php foreach($listposition as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                  <label class="form-label align-self-center mb-0 w-50">Role</label>
                  <select class="form-select w-65" name="allowanceUId" id="allowanceUId" required>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                  </select>
                </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Address</label>
                <textarea class="form-control w-65" id="allowanceDescription" name="allowanceDescription" rows="5"></textarea>
              </div>
            <input type="hidden" class="form-control w-65" name="userTotaluser" id="userTotaluser">
            <input type="hidden" class="form-control w-65" name="userStatus" id="userStatus">
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

<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/user/delete'));?>
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