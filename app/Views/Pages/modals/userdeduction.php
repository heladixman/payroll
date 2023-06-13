<div class="modal fade" id="editUserDeduction" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/deduction/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="deductionId" name="deductionId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">User</label>
                <select name="deductionUser" id="deductionUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">deduction</label>
                <select name="deductionAid" id="deductionAid" class="form-select w-65" required>
                <?php foreach($listdeduction as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Type</label>
                <select class="form-select w-65" name="deductionUId" id="deductionUId" required>
                    <option value="1">Montly</option>
                    <option value="0">Once</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Effective Date</label>
                <input type="date" class="form-control w-65" name="deductionDate" id="deductionDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount</label>
                <input type="number" class="form-control w-65" name="deductionAmount" id="deductionAmount">
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

<div class="modal fade" id="insertUserDeduction" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/deduction/add'));?>
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
                <select name="deductionUser" id="deductionUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">deduction</label>
                <select name="deductionDid" id="deductionDid" class="form-select w-65" required>
                <?php foreach($listdeduction as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Type</label>
                <select name="deductionType" id="deductionType" class="form-select w-65" required>
                    <option value="1">Montly</option>
                    <option value="0">Once</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3 d-none" id="deductionEffectiveDate">
                <label class="form-label align-self-center mb-0 w-50">Effective Date</label>
                <input type="date" class="form-control w-65" name="deductionDate" id="deductionDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount</label>
                <input type="number" class="form-control w-65" name="deductionAmount" id="deductionAmount">
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

<div class="modal fade" id="deleteDeduction" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/deduction/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="deductionid" name="deductionId">
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