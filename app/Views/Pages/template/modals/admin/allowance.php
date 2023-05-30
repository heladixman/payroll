<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-hidden="true">
  <form action="<?= base_url()?>akunperkiraan/newAkunPerkiraan" method="post">
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
                <label for="allowancename" class="form-label align-self-center mb-0 w-50">Allowance Name</label>
                <input type="text" id="allowancename" class="form-control w-65" name="allowancename" placeholder="Masukan kode akun perkiraan...">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label for="description" class="form-label align-self-center mb-0 w-50">Description</label>
                <textarea class="form-control w-65" id="description" name="description" rows="5"></textarea>
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
  </form>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
  <form action="<?= base_url()?>akunperkiraan/newAkunPerkiraan" method="post">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <div class="d-flex justify-content-between mb-3">
                <label for="allowancename" class="form-label align-self-center mb-0 w-50">Allowance Name</label>
                <input type="text" id="allowancename" class="form-control w-65" name="allowancename" placeholder="Masukan kode akun perkiraan...">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label for="description" class="form-label align-self-center mb-0 w-50">Description</label>
                <textarea class="form-control w-65" id="description" name="description" rows="5"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Modified</button>
        </div>
      </div>
    </div>
  </form>
</div>