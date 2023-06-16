<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertUserBonus">New Bonus</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Bonus</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr class="text-center">
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
                    foreach($bonus as $d) {
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['user_name'] ?></td>
                        <td><?= $d['bonus_name'] ?></td>
                        <td><?= $d['amount'] ?></td>
                        <td><?= $d['effective_date'] ?></td>
                        <td>
                            <button type="button" class="btn btn-third deleteBonus" data-bs-toggle="modal" data-bs-target="#deleteUserBonus" data-id="<?= $d['id']?>">
                            <span class="align-items-center me-1"><i class="fa-solid fa-trash-can"></i></span><span>Delete</span>
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
<?php echo view('Pages/modals/userbonus');?>