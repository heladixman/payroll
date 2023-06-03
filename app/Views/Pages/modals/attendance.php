<div class="modal fade" id="editAttendance" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/attendance/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="attendanceId" name="attendanceId">
              <div class="d-flex justify-content-between mb-3">
                    <label class="form-label align-self-center mb-0 w-50">User</label>
                    <select name="attendanceUser" id="attendanceUser" class="form-select w-65" required>
                    <?php foreach($listuser as $data){ ?>
                        <option value="<?= $data->id?>"><?= $data->name ?></option>
                    <?php }?>
                    </select>
                </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Time</label>
                <select name="attendanceType" id="attendanceType" class="form-select w-65" required>
                    <option value="1">Time In</option>
                    <option value="2">Break Out</option>
                    <option value="3">Break In</option>
                    <option value="4">Time Out</option>
                    <option value="5">Overtime In</option>
                    <option value="6">Overtime Out</option>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Time</label>
                <input type="datetime-local" class="form-control w-65" name="attendanceTime" id="attendanceTime">
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

<div class="modal fade" id="insertAttendance" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/attendance/add'));?>
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
                    <select name="attendanceUser" id="attendanceUser" class="form-select w-65" required>
                    <?php foreach($listuser as $data){ ?>
                        <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                    <?php }?>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <label class="form-label align-self-center mb-0 w-50">Type</label>
                    <select name="attendanceType" id="attendanceType" class="form-select w-65" required>
                        <option value="1">Time In</option>
                        <option value="2">Break Out</option>
                        <option value="3">Break In</option>
                        <option value="4">Time Out</option>
                        <option value="5">Overtime In</option>
                        <option value="6">Overtime Out</option>
                    </select>
                </div>
                <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Time</label>
                <input type="datetime-local" class="form-control w-65" name="attendanceTime" id="attendanceTime">
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

<div class="modal fade" id="deleteAttendance" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/attendance/delete'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="attendanceid" name="attendanceId">
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