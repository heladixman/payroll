<div class="modal fade" id="editDepartment" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/department/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="departmentId" name="departmentId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Department Name</label>
                <input type="text" class="form-control w-65" name="departmentName" id="departmentName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Contact</label>
                <input type="text" class="form-control w-65" name="departmentContact" id="departmentContact">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Vision</label>
                <textarea class="form-control w-65" id="departmentVision" name="departmentVision" rows="5"></textarea>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Mission</label>
                <textarea class="form-control w-65" id="departmentMission" name="departmentMission" rows="5"></textarea>
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

<div class="modal fade" id="insertDepartment" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/department/add'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Insert Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
            <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Department Name</label>
                <input type="text" class="form-control w-65" name="departmentName" id="departmentName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Contact</label>
                <input type="text" class="form-control w-65" name="departmentContact" id="departmentContact">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Vision</label>
                <textarea class="form-control w-65" id="departmentVision" name="departmentVision" rows="5"></textarea>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Mission</label>
                <textarea class="form-control w-65" id="departmentMission" name="departmentMission" rows="5"></textarea>
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

<div class="modal fade" id="deleteDepartment" tabindex="-1" role="dialog" aria-labelledby="Modal Delete Jurusan" aria-hidden="false">
  <?php echo form_open(site_url('settings/department/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="departmentid" name="departmentId">
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