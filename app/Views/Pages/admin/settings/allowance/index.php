<section class="content mt-3">
    <div class="card">
    <div type="button" class="btn btn-primary w-100 p-2">Allowance</div>
    <button type="button" class="btn btn-primary align-items-center w-25 p-2 my-2" data-bs-toggle="modal" data-bs-target="#insert">New Data</button>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="table">
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
                        <td><div class="fw-bold fs-bold"><?= $d['name'] ?></div><div><p>description: <?= $d['description'] ?></p></div></td>
                        <td>
                              <button type="button" class='btn btn-icon btn-success' data-bs-toggle="modal" data-bs-target="#edit" data-id="<?= $d['id']?>">
                                <ion-icon name="pencil-outline"></ion-icon>
                              </button>
                              <button type="button" class="btn btn-icon btn-outline-danger" data-bs-toggle="modal" data-bs-target="#delete" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/template/modals/admin/allowance.php');?>