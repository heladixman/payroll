<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertAllowance">New Data</button>
<section class="content mt-2">
  <div class="card">
  <div class="btn-first rounded-se w-100 p-2">Allowance</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="allowance_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Allowance</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($allowance as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['name'] ?></div><div><p>Description: <?= $d['description'] ?></p></div></td>
                        <td>
                              <button type="button" class='btn btn-icon btn-success updateAllowance' data-bs-toggle="modal" data-bs-target="#editAllowance" data-id="<?= $d['id']?>" data-name="<?= $d['name']?>" data-description="<?= $d['description']?>">
                                <ion-icon name="pencil-outline"></ion-icon>
                              </button>
                              <button type="button" class="btn btn-icon btn-outline-danger deleteAllowance" data-bs-toggle="modal" data-bs-target="#deleteAllowance" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/allowance.php');?>