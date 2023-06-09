<div class="modal fade" id="editPayroll" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('payroll/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="payrollId" name="payrollId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Position</label>
                <select name="payrollPositionId" id="payrollPositionId" class="form-select w-65" required>
                  <?php foreach($listPayment as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                  <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount payroll</label>
                <input type="number" class="form-control w-65 payrollFormat" name="payrollAmount" id="payrollAmount" oninput="annualCount()">
              </div>
              <div class="d-flex justify-content-between mb-3">
               <label class="form-label align-self-center mb-0 w-50">Amount payroll</label>
               <input type="number" class="form-control w-65 payrollFormat" name="payrollAnnual" id="payrollAnnual">
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

<div class="modal fade" id="insertPayroll" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('payroll/add'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Insert Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="idPayroll" name="idPayroll">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Date From</label>
                <input type="date" class="form-control w-65 salaryFormat" name="payrollDateFrom" id="payrollDateFrom">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Date To</label>
                <input type="date" class="form-control w-65 salaryFormat" name="payrollDateTo" id="payrollDateTo">
              </div>
              <div class="d-flex justify-content-between mb-3">
                  <label class="form-label align-self-center mb-0 w-50">Payment Method</label>
                  <select class="form-select w-65" name="payrollPaymentMethod" id="payrollPaymentMethod" required>
                    <?php foreach($listPayment as $data){ ?>
                      <option value="<?= $data->id?>"><?= $data->name ?> <?= $data->number ?></option>
                    <?php }?>
                  </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label for="allowanceDescription" class="form-label align-self-center mb-0 w-50">Comment</label>
                <textarea class="form-control w-65" id="payrollComment" name="payrollComment" rows="5"></textarea>
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

<div class="modal fade" id="deletePayroll" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('payroll/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="payrollid" name="payrollId">
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