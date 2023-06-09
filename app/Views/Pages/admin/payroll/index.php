<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertPayroll">New Payroll</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Salary</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="salary_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Reff No</th>
                      <th>From - To</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?var_dump($payroll)?>
                  <?php
                    $no = 1;
                    foreach($payroll as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $d['reff_no'] ?></td>
                        <td><span><?= $d['date_from']?></span> - <span><?= $d['date_to']?></span></td>
                        <td><?= $d['status'] ?></td>
                        <?php if($d['status'] == 'pending'): ?>
                            <td>
                            <button type="button" class='btn btn-icon btn-success updateSalary' data-bs-toggle="modal" data-bs-target="#editSalary" data-id="<?= $d['id']?>">
                                    <i class="fa-solid fa-calculator"></i>
                                </button>
                                <button type="button" class='btn btn-icon btn-success updateSalary' data-bs-toggle="modal" data-bs-target="#editSalary" data-id="<?= $d['id']?>">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-outline-danger deleteSalary" data-bs-toggle="modal" data-bs-target="#deleteSalary" data-id="<?= $d['id']?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        <?php else: ?>
                            <td>
                                <button type="button" class='btn btn-icon btn-success updateSalary' data-bs-toggle="modal" data-bs-target="#editSalary" data-id="<?= $d['id']?>">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                <button type="button" class='btn btn-icon btn-success updateSalary' data-bs-toggle="modal" data-bs-target="#editSalary" data-id="<?= $d['id']?>">
                                    <i class="fa-solid fa-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-icon btn-outline-danger deleteSalary" data-bs-toggle="modal" data-bs-target="#deleteSalary" data-id="<?= $d['id']?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        <?php endif ?>
                    </tr>
                  <?php }?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php echo view('Pages/modals/payroll');?>