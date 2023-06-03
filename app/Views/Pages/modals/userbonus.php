<div class="modal fade" id="editUserBonus" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/bonus/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="bonusId" name="bonusId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">User</label>
                <select name="bonusUser" id="bonusUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">bonus</label>
                <select name="bonusAid" id="bonusAid" class="form-select w-65" required>
                <?php foreach($listbonus as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Effective Date</label>
                <input type="date" class="form-control w-65" name="bonusDate" id="bonusDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount</label>
                <input type="number" class="form-control w-65" name="bonusAmount" id="bonusAmount">
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

<div class="modal fade" id="insertUserBonus" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/bonus/add'));?>
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
                <select name="bonusUser" id="bonusUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">bonus</label>
                <select name="bonusBid" id="bonusBid" class="form-select w-65" required>
                <?php foreach($listbonus as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Effective Date</label>
                <input type="date" class="form-control w-65" name="bonusDate" id="bonusDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Amount</label>
                <input type="number" class="form-control w-65" name="bonusAmount" id="bonusAmount">
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

<div class="modal fade" id="deleteUserBonus" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/bonus/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="bonusid" name="bonusId">
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