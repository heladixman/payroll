<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Payslip</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="payslip_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Reff No</th>
                      <th>Net Salary</th>
                      <th>Date Create</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($payslip as $d) {
                        $date = date("Y-m-d", strtotime($d['dateCreate'])); 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div><?= $d['reff_no'] ?></div></td>
                        <td><div>Rp<?= number_format($d['net_salary'], 0, '', '.') ?></div></td>
                        <td><div><?= $date ?></div></td>
                        <td>
                            <a href="<?= site_url('payroll/data/'. $d['reff_no'] . '/' .$d['id'])?>" class="btn btn-sixth" data-id="<?= $d['id']?>">
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