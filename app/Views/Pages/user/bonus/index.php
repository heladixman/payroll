<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Bonus</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="bonus_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Bonus Name</th>
                      <th>Amount</th>
                      <th>Effective Date</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($bonus as $d) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['bonus_name'] ?></td>
                        <td><?= $d['amount'] ?></td>
                        <td><?= $d['effective_date'] ?></td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>