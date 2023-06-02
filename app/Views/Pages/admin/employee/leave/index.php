<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertDeduction">New Deduction</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Deduction</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
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
                    <tr>
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
                            <button type="button" class='btn btn-icon btn-success updateDeduction' data-bs-toggle="modal" data-bs-target="#editDeduction" data-id="<?= $d['id']?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-outline-danger deleteDeduction" data-bs-toggle="modal" data-bs-target="#deleteDeduction" data-id="<?= $d['id']?>">
                                <i class="fa-solid fa-trash"></i>
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