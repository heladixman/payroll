<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertLeave">New Leave</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Leave</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Employee Name</th>
                      <th>Leave Date</th>
                      <th>Reason</th>
                      <th>Total Leave </th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($leave as $d) {
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['user_name'] ?></td>
                        <td>
                            <div><span>Leave Start :</span> <?= $d['leave_start'] ?></div>
                            <div><span>Leave End :</span> <?= $d['leave_end'] ?></div>
                        </td>
                        <td><?= $d['reason'] ?></td>
                        <?php if($d['total_leave'] === '1'): ?>
                            <td><?= $d['total_leave'] ?> Day</td>
                        <?php else: ?>
                            <td><?= $d['total_leave'] ?> Days</td>
                        <?php endif?>
                        <td><?= $d['status_leave'] ?></td>
                        <?php if($d['status_leave'] === 'pending'): ?>
                        <td>
                            <button type="button" class='btn btn-second updateLeave' data-bs-toggle="modal" data-bs-target="#editLeave" data-id="<?= $d['id']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                            </button>
                            <button type="button" class="btn btn-third deleteLeave" data-bs-toggle="modal" data-bs-target="#deleteLeave" data-id="<?= $d['id']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-trash-can"></i></span><span>Delete</span>
                            </button>
                        </td>
                        <?php endif?> 
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php echo view('Pages/modals/leave.php');?>