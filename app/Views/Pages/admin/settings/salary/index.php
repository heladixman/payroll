<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertSalary">New Data</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Salary</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Position</th>
                      <th>Amount</th>
                      <th>Annual</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($salary as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['position_name'] ?></div><div><p>from: <?= $d['department_name'] ?></p></div></td>
                        <td><?= $d['amount'] ?></td>
                        <td><?= $d['annual'] ?></td>
                        <td>
                              <button type="button" class='btn btn-icon btn-success updateSalary' data-bs-toggle="modal" data-bs-target="#editSalary" data-id="<?= $d['id']?>" data-name="<?= $d['position_id']?>" data-amount="<?= $d['amount']?>" data-annual="<?= $d['annual']?>">
                                <ion-icon name="pencil-outline"></ion-icon>
                              </button>
                              <button type="button" class="btn btn-icon btn-outline-danger deleteSalary" data-bs-toggle="modal" data-bs-target="#deleteSalary" data-id="<?= $d['id']?>">
                                <ion-icon name="trash-outline"></ion-icon>
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
<?php echo view('Pages/modals/salary.php');?>