<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Allowance</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="allowance_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Allowance</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Effective Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($allowance as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['allowance_name'] ?></div></td>
                        <td><div><?= $d['amount'] ?></div></td>
                        <?php if($d['type'] == '1'): ?>
                            <td><p>Monthly</p></td>
                            <td><p>-</p></td>
                        <?php else: ?>
                            <td><p>Once</p></td>
                            <td><p><?= $d['effective_date']?></p></td>
                        <?php endif ?>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php echo view('Pages/modals/allowance');?>