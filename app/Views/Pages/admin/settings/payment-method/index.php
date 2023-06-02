<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertPaymentMethod">New Data</button>
<section class="content mt-3">
    <div class="card">
    <div type="button" class="btn btn-primary w-100 p-2">Payment Method</div>
        <div class="card-body"> 
          <div class="table-responsive text-nowrap">
                <table class="table" id="payment_table">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Account Number</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php if (isset($content))
                    $no = 1;
                    foreach($payment as $d) { 
                    ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><div class="fw-bold fs-bold"><?= $d['name'] ?></div><div>Description: <?= $d['description'] ?></div></td>
                        <?php if ($d['number'] === null): ?>
                            <td>-</td>
                        <?php else: ?>
                            <td><?= $d['number'] ?></td>
                        <?php endif; ?>
                        <td>
                          <button type="button" class='btn btn-icon btn-success updatePaymentMethod' data-bs-toggle="modal" data-bs-target="#editPaymentMethod" data-id="<?= $d['id']?>" data-name="<?= $d['name']?>" data-number="<?= $d['number']?>" data-description="<?= $d['description']?>" >
                            <ion-icon name="pencil-outline"></ion-icon>
                          </button>
                          <button type="button" class="btn btn-icon btn-outline-danger deletePaymentMethod" data-bs-toggle="modal" data-bs-target="#deletePaymentMethod" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/paymentmethod.php');?>