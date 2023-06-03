<div class="modal fade" id="editAllowance" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/allowance/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="allowanceId" name="allowanceId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">User</label>
                <select name="allowanceUser" id="allowanceUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Allowance</label>
                <select name="allowanceAid" id="allowanceAid" class="form-select w-65" required>
                <?php foreach($listallowance as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Type</label>
                <select class="form-select w-65" required>
                    <option value="1">Montly</option>
                    <option value="2">Once</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Effective Date</label>
                <input type="date" class="form-control w-65" name="allowanceDate" id="allowanceDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount</label>
                <input type="number" class="form-control w-65" name="allowanceAmount" id="allowanceAmount">
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

<div class="modal fade" id="insertAllowance" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/allowance/add'));?>
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
                <label class="form-label align-self-center mb-0 w-50">User</label>
                <select name="allowanceUser" id="allowanceUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Allowance</label>
                <select name="allowanceAid" id="allowanceAid" class="form-select w-65" required>
                <?php foreach($listallowance as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Type</label>
                <select name="allowanceType" id="allowanceType" class="form-select w-65" required>
                    <option value="1">Montly</option>
                    <option value="2">Once</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3 d-none" id="effectiveDate">
                <label class="form-label align-self-center mb-0 w-50">Effective Date</label>
                <input type="date" class="form-control w-65" name="allowanceDate" id="allowanceDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount</label>
                <input type="number" class="form-control w-65" name="allowanceAmount" id="allowanceAmount">
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

<div class="modal fade" id="deleteAllowance" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/allowance/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="allowanceid" name="allowanceId">
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