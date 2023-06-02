<div class="modal fade" id="editBonus" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/bonus/update'));?>
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
                <label class="form-label align-self-center mb-0 w-50">Bonus Name</label>
                <input type="text" class="form-control w-65" name="bonusName" id="bonusName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Description</label>
                <textarea class="form-control w-65" id="bonusDescription" name="bonusDescription" rows="5"></textarea>
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

<div class="modal fade" id="insertBonus" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('settings/bonus/add'));?>
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
                <label for="bonusName" class="form-label align-self-center mb-0 w-50">Bonus Name</label>
                <input type="text" id="bonusName" class="form-control w-65" name="bonusName">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label for="bonusDescription" class="form-label align-self-center mb-0 w-50">Description</label>
                <textarea class="form-control w-65" id="bonusDescription" name="bonusDescription" rows="5"></textarea>
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

<div class="modal fade" id="deleteBonus" tabindex="-1" role="dialog" aria-labelledby="Modal Delete Jurusan" aria-hidden="false">
  <?php echo form_open(site_url('settings/bonus/delete'));?>
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