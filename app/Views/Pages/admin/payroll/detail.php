<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Payroll Details</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Working Days</th>
                      <th>Employee</th>
                      <th>Present</th>
                      <th>Absent</th>
                      <th>Leave</th>
                      <th>Net Salary</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($payrolldetail as $d) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['total_working_days'] ?> Days</td>
                        <td><?= $d['user_name'] ?></td>
                        <?php if($d['present'] > 1) : ?>
                          <td><?= $d['present'] ?> Days</td>
                          <?php else : ?>
                          <td><?= $d['present'] ?> Day</td>
                        <?php endif?>
                        <?php if($d['absent'] > 1) : ?>
                          <td><?= $d['absent'] ?> Days</td>
                          <?php else : ?>
                          <td><?= $d['absent'] ?> Day</td>
                        <?php endif?>
                        <?php if($d['leave'] > 1) : ?>
                          <td><?= $d['leave'] ?> Days</td>
                          <?php else : ?>
                          <td><?= $d['leave'] ?> Day</td>
                        <?php endif?>
                        <td>Rp<?= number_format($d['net_salary'], 0, '', '.') ?></td>
                        <td>
                            <a href="<?= site_url('payroll/data/'. $d['reff_no'] . '/' .$d['id'])?>" target="_blank" class="btn btn-sixth" data-id="<?= $d['id']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-print"></i></span><span>Print</span>
                            </a>
                        </td>
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

    $('.calculatePayroll').click(function(){
      var id = $(this).attr('data-id');
      var dateFrom = $(this).attr('data-from');
      var dateTo = $(this).attr('data-to');
      $.ajax({
        url: '<?= site_url('payroll/calculate/')?>' + id + '/' + dateFrom + '/' + dateTo,
        method: 'POST',
        data: {id: id, dateFrom: dateFrom, dateTo: dateTo},
        // error:err=>console.log(err),
        success: function(hasil){
            console.log('data berhasil dikirim')
        }
      })
    })
    
  })
</script>