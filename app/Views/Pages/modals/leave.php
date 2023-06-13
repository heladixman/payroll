<div class="modal fade" id="editLeave" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/leave/update'));?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Edit Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="leaveId" name="leaveId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">User</label>
                <select name="leaveUser" id="leaveUser" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Start Leave</label>
                <input type="date" class="form-control w-65" name="leaveDate" id="leaveDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">End Leave</label>
                <input type="date" class="form-control w-65" name="leaveDate" id="leaveDate">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Reason</label>
                <input type="text" class="form-control w-65" name="leaveAmount" id="leaveAmount">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Prove</label>
                <input type="text" class="form-control w-65" name="leaveAmount" id="leaveAmount">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Status</label>
                <input type="text" class="form-control w-65" name="leaveAmount" id="leaveAmount">
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

<div class="modal fade" id="insertLeave" tabindex="-1" role="dialog" aria-hidden="true">
  <?php echo form_open(site_url('employee/leave/add'), ['enctype' => 'multipart/form-data']);?>
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel1">Insert Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input type="hidden" id="leaveId" name="leaveId">
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">User</label>
                <select name="leaveUserId" id="leaveUserId" class="form-select w-65" required>
                <?php foreach($listuser as $data){ ?>
                    <option value="<?= $data->id?>"><?= $data->name ?> - <?= $data->email ?></option>
                <?php }?>
                </select>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Start Leave</label>
                <input type="date" class="form-control w-65" name="leaveStart" id="leaveStart">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">End Leave</label>
                <input type="date" class="form-control w-65" name="leaveEnd" id="leaveEnd">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Reason</label>
                <textarea class="form-control w-65" id="leaveReason" name="leaveReason" rows="5"></textarea>
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Prove</label>
                <input type="file" class="form-control w-65" accept=".png, .jpg, .jpeg"name="leaveProve" id="leaveProve">
              </div>
              <div class="d-flex justify-content-between mb-3">
                <label class="form-label align-self-center mb-0 w-50">Status</label>
                <select class="form-select w-65" name="leaveStatus" id="leaveStatus" required>
                  <option value="Pending">Pending</option>
                  <option value="Approve">Approve</option>
                </select>
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

<div class="modal fade" id="ApproveLeave" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/leave/approve'));?>
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="approveidLeave" name="approveidLeave">
          <p class="modal-title" id="exampleModalLabel1">Approve Leave?</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">No</button>
          <button type="submit" class="btn btn-primary">Yes</button>
        </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>

<div class="modal modal-lg fade" id="declineLeave" tabindex="-1" role="dialog" aria-labelledby="Modal Delete" aria-hidden="false">
  <?php echo form_open(site_url('employee/leave/decline'));?>
    <div class="modal-dialog  modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <p class="modal-title" id="exampleModalLabel1">Decline</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <input type="hidden" id="declineidLeave" name="declineidLeave">
              <div class="d-flex justify-content-between mb-3">
                <textarea class="form-control w-65" id="commentLeave" name="commentLeave" rows="5" placeholder="Reason"></textarea>
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-third w-100">Decline</button>
        </div>
      </div>
    </div>
  <?php echo form_close();?>
</div>