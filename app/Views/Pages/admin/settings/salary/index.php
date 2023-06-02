<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertSalary">New Salary</button>
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
                        <td><span>Rp<?= number_format($d['amount'], 0, '', '.') ?></span></td>
                        <td><span>Rp<?= number_format($d['annual'], 0, '', '.') ?></span></td>
                        <td>
                              <button type="button" class='btn btn-second updateSalary' data-bs-toggle="modal" data-bs-target="#editSalary" data-id="<?= $d['id']?>" data-name="<?= $d['position_id']?>" data-amount="<?= $d['amount']?>" data-annual="<?= $d['annual']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                              </button>
                              <button type="button" class="btn btn-third deleteSalary" data-bs-toggle="modal" data-bs-target="#deleteSalary" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/salary.php');?>