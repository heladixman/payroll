<div class="modal fade" id="editPosition" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/position/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="positionId" name="positionId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Position Name</label>
                <input type="text" class="form-control w-65" name="positionName" id="positionName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Department</label>
                <select name="positionDepartment" id="positionDepartment" class="form-select w-65" required>
                  <?php foreach($listDepartment as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Salary Start</label>
                <input type="number" class="form-control w-65 salaryFormat" name="positionSalaryStart" id="positionSalaryStart">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Salary End</label>
                <input type="number" class="form-control w-65 salaryFormat" name="positionSalaryEnd" id="positionSalaryEnd">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Description</label>
                <textarea class="form-control w-65" id="positionDescription" name="positionDescription" rows="5"></textarea>
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

<div class="modal fade" id="insertPosition" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/position/add'));?>
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
                <label class="form-label align-self-center mb-0 w-50">Position Name</label>
                <input type="text" class="form-control w-65" name="positionName" id="positionName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Department</label>
                <select name="positionDepartment" id="positionDepartment" class="form-select w-65" required>
                  <?php foreach($listDepartment as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Salary Start</label>
                <input type="number" class="form-control w-65 salaryFormat" name="positionSalaryStart" id="positionSalaryStart">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Salary End</label>
                <input type="number" class="form-control w-65 salaryFormat" name="positionSalaryEnd" id="positionSalaryEnd">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Description</label>
                <textarea class="form-control w-65" id="positionDescription" name="positionDescription" rows="5"></textarea>
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

<div class="modal fade" id="deletePosition" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('settings/position/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="positionid" name="positionId">
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