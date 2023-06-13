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
                      <th>User</th>
                      <th>Gross Salary</th>
                      <th>Allowance</th>
                      <th>Deduction</th>
                      <th>Bonus</th>
                      <th>PPH 21</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($payrolldetail as $d) { 
                        $total = $d['gross_salary'] + $d['allowance_total'] + $d['bonus_total'] - $d['deduction_total'];
                        $pph = 21 / 100 * $total;
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['total_working_days'] ?> Days</td>
                        <td><?= $d['user_id'] ?></td>
                        <td><?= $d['gross_salary'] ?></td>
                        <td><?= $d['allowance_total'] ?></td>
                        <td><?= - $d['deduction_total'] ?></td>
                        <td><?= $d['bonus_total'] ?></td>
                        <td><?= $pph ?></td>
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