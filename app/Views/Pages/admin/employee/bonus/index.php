<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertAllowance">New Bonus</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Bonus</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Employee Name</th>
                      <th>Bonus Name</th>
                      <th>Amount</th>
                      <th>Effective Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    foreach($attendance as $d) {
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['user_name'] ?></td>
                        <td><?= $d['bonus_name'] ?></td>
                        <td><?= $d['amount'] ?></td>
                        <td><?= $d['effective_date'] ?></td>
                        <td>
                            <button type="button" class='btn btn-icon btn-success updateAllowance' data-bs-toggle="modal" data-bs-target="#editAllowance" data-id="<?= $d['id']?>">
                                <i class="fa-solid fa-pencil"></i>
                            </button>
                            <button type="button" class="btn btn-icon btn-outline-danger deleteAllowance" data-bs-toggle="modal" data-bs-target="#deleteAllowance" data-id="<?= $d['id']?>">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>