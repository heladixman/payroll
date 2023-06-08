<div class="modal fade" id="editSalary" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/salary/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="salaryId" name="salaryId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Position</label>
                <select name="salaryPositionId" id="salaryPositionId" class="form-select w-65" required>
                  <?php foreach($listPosition as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount Salary</label>
                <input type="number" class="form-control w-65 salaryFormat" name="salaryAmount" id="salaryAmount" oninput="annualCount()">
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

<div class="modal fade" id="insertSalary" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/salary/add'));?>
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
                  <label class="form-label align-self-center mb-0 w-50">Position</label>
                  <select name="salaryPositionId" id="salaryPositionId" class="form-select w-65" required>
                    <?php foreach($listPosition as $data){ ?>
                      <option value="<?= $data->id?>"><?= $data->name ?></option>
                    <?php }?>
                  </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount Salary</label>
                <input type="number" class="form-control w-65 salaryFormat" name="salaryAmount" id="salaryAmount" oninput="annualCount()">
                <input type="hidden" class="form-control w-65 salaryFormat" name="salaryAnnual" id="salaryAnnual">
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

<div class="modal fade" id="deleteSalary" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('settings/salary/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="salaryid" name="salaryId">
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