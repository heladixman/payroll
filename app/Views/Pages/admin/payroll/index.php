<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertPayroll">New Payroll</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Salary</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Reff No</th>
                      <th>From - To</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($payroll as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['reff_no'] ?></td>
                        <td><span><?= $d['date_from']?></span> - <span><?= $d['date_to']?></span></td>
                        <td><?= $d['status'] ?></td>
                        <?php if($d['status'] == 'Pending'): ?>
                            <td>
                                <button type="button" class='btn btn-sixth calculatePayroll' data-id="<?= $d['id']?>" data-from="<?= $d['date_from']?>" data-to="<?= $d['date_to']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-calculator"></i></span><span>Calculate</span>
                                </button>
                                <button type="button" class='btn btn-second editPayroll' data-bs-toggle="modal" data-bs-target="#editPayroll" data-id="<?= $d['id']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                                </button>
                                <button type="button" class="btn btn-third deletePayroll" data-bs-toggle="modal" data-bs-target="#deletePayroll" data-id="<?= $d['id']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-trash-can"></i></span><span>Delete</span>
                                </button>
                            </td>
                        <?php else: ?>
                            <td>
                                <button type="button" class='btn btn-sixth viewPayroll' data-id="<?= $d['id']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-eye"></i></span><span>View</span>
                                </button>
                                <button type="button" class="btn btn-third deletePayroll" data-bs-toggle="modal" data-bs-target="#deletePayroll" data-id="<?= $d['id']?>">
                                    <span class="align-items-center me-1"><i class="fa-solid fa-trash-can"></i></span><span>Delete</span>
                                </button>
                            </td>
                        <?php endif ?>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php echo view('Pages/modals/payroll');?>
<script>
  $(document).ready(function(){
    
    $('#insertDataPayroll').submit(function(e){
      e.preventDefault();
      $.ajax({
        url: '<?= site_url('payroll/data')?>',
        method: 'POST',
        success: function(hasil){
          console.log(hasil)
        }
      })
    })

    $('.calculatePayroll').on('click', function(){
      $.ajax({
        url: '<?= site_url('payroll/calculate/')?>',
        type: 'POST',
        data:{id:$(this).attr('data-id'),dateFrom:$(this).attr('data-dateFrom'), dateTo:$(this).attr('data-id')},
        success: function(hasil){
            console.log(data)
        }
      })
    })
    
  })
</script>