<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertPosition">New Position</button>
<section class="content mt-3">
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Position</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="position_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Position</th>
                      <th>Description</th>
                      <th>Salary Range</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($position as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['position_name'] ?></div><div><p>From: <?= $d['department_name'] ?></p></div></td>
                        <td><?= $d['description'] ?></td>
                        <td><span>Rp<?= number_format($d['salary_start'], 0, '', '.') ?></span> - <span>Rp<?= number_format($d['salary_end'], 0, '', '.') ?></span></td>
                        <td>
                              <button type="button" class='btn btn-second updatePosition' data-bs-toggle="modal" data-bs-target="#editPosition" data-id="<?= $d['id']?>" data-name="<?= $d['position_name']?>" data-department="<?= $d['position_department']?>" data-description="<?= $d['description']?>" data-start="<?= $d['salary_start']?>" data-end="<?= $d['salary_end']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                              </button>
                              <button type="button" class="btn btn-third deletePosition" data-bs-toggle="modal" data-bs-target="#deletePosition" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/position.php');?>