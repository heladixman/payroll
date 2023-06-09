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
                      <th>Total Leave</th>
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
                            <div><?= date('d M, Y', strtotime($d['leave_start']))  ?> <span>Until</span> <?= date('d M, Y', strtotime($d['leave_end'])) ?></div>
                        </td>
                        <td><?= $d['reason'] ?></td>
                        <?php if($d['total_leave'] === '1'): ?>
                            <td><?= $d['total_leave'] ?> Day</td>
                        <?php else: ?>
                            <td><?= $d['total_leave'] ?> Days</td>
                        <?php endif?>
                        <?php if($d['status_leave'] === 'Pending'): ?>
                            <td> <span class="bg-forth p-1 px-2 rounded"><?= $d['status_leave'] ?></span></td>
                            <td>
                                <a href="<?= base_url().$d['prove']?>" target="_blank">
                                    <button type="button" class='btn btn-sixth'>
                                        <span class="align-items-center me-1"></span><span>Prove</span>
                                    </button>                    
                                </a>
                                <button type="button" class='btn btn-second approveLeave' data-bs-toggle="modal" data-bs-target="#approveLeave" data-id="<?= $d['id']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-check"></i></span><span>Approve</span>
                                </button>
                                <button type="button" class="btn btn-third declineLeave" data-bs-toggle="modal" data-bs-target="#declineLeave" data-id="<?= $d['id']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-xmark"></i></span><span>Decline</span>
                                </button>
                            </td>
                        <?php elseif($d['status_leave'] === 'Decline'): ?>
                            <td> <span class="bg-sixth p-1 px-2 rounded"><?= $d['status_leave'] ?></span></td>
                        <td>
                            <span>No Action</span>
                        </td>
                        <?php else: ?>
                            <td> <span class="bg-third p-1 px-2 rounded"><?= $d['status_leave'] ?></span></td>
                        <td>
                            <span>No Action</span>
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
<?php echo view('Pages/modals/leave');?>
<script>
  $(document).ready(function(){

    $('.approveLeave').on('click', function(){
      var id = $(this).attr('data-id');
      console.log(id);
      $('#leaveid').val(id);
    })
    
    $('.declineLeave').on('click', function(){
      var id = $(this).attr('data-id');
      console.log(id)
      $('#leaveid').val(id);
    })
    
  })
</script>