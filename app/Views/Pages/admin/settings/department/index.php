<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertDepartment">New Data</button>
<section class="content mt-3">
    <div class="card">
    <div type="button" class="btn btn-primary w-100 p-2">Department</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="department_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Department</th>
                      <th>Vision</th>
                      <th>Mision</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($department as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['name'] ?></div><div><p>Contact: <?= $d['contact'] ?></p></div></td>
                        <td><?= $d['vision'] ?></td>
                        <td><?= $d['mission'] ?></td>
                        <td>
                              <button type="button" class='btn btn-icon btn-success updateDepartment' data-bs-toggle="modal" data-bs-target="#editDepartment" data-id="<?= $d['id']?>" data-name="<?= $d['name']?>" data-contact="<?= $d['contact']?>" data-vision="<?= $d['vision']?>" data-mission="<?= $d['mission']?>">
                                <ion-icon name="pencil-outline"></ion-icon>
                              </button>
                              <button type="button" class="btn btn-icon btn-outline-danger deleteDepartment" data-bs-toggle="modal" data-bs-target="#deleteDepartment" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/department.php');?>