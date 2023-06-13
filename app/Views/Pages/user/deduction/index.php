<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Allowance</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="deduction_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Deduction</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Effective Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($deduction as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['deduction_name'] ?></div></td>                             
                        <td><div><?= $d['amount'] ?></div></td>                             
                        <td><div><?= $d['effective_date'] ?></div></td>                             
                        <?php if($d['type'] == '1'): ?>
                            <td><p>Monthly</p></td>
                        <?php else: ?>
                            <td><p>Once</p></td>
                        <?php endif ?>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php echo view('Pages/modals/allowance.php');?>