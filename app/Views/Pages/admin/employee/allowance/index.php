<button type="button" class="btn btn-default w-25 mt-3" data-bs-toggle="modal" data-bs-target="#insertAllowance">New Allowance</button>
<section class="content mt-3">
    <?= view('Pages\message\index')?>
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Allowance</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Employee Name</th>
                      <th>Allowance Name</th>
                      <th>Amount</th>
                      <th>Type</th>
                      <th>Effective Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    $types = [1=> "Monthly", 0=> "Once"];
                    foreach($allowance as $d) {
                        $allowanceType =  isset($types[$d['type']]) ? $types[$d['type']]: "Unknown"; 
                    ?>
                    <tr class="text-center">
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['user_name'] ?></td>
                        <td><?= $d['allowance_name'] ?></td>
                        <td><?= $d['amount'] ?></td>
                        <?php if($allowanceType == "Monthly"):?>
                            <td><?= $allowanceType ?></td>
                            <td>-</td>
                        <?php else :?>
                            <td><?= $allowanceType ?></td>
                            <td><?= $d['effective_date'] ?></td>
                        <?php endif ?>
                        <td>
                            <button type="button" class="btn btn-third deleteUserAllowance" data-bs-toggle="modal" data-bs-target="#deleteAllowance" data-id="<?= $d['id']?>" data-nama="<?= $d['user_name']?>">
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
<?php echo view('Pages/modals/userallowance');?>