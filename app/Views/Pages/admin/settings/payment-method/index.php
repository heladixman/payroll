<button type="button" class="btn btn-default w-25 mt-3" data-bs-toggle="modal" data-bs-target="#insertPaymentMethod">New Payment Method</button>
<section class="content mt-3">
    <?= view('Pages\message\index')?>
    <div class="card">
    <div class="btn-first rounded-se w-100 p-2">Payment Method</div>
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
                          <button type="button" class='btn btn-second updatePaymentMethod' data-bs-toggle="modal" data-bs-target="#editPaymentMethod" data-id="<?= $d['id']?>">
                            <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                          </button>
                          <button type="button" class="btn btn-third deletePaymentMethod" data-bs-toggle="modal" data-bs-target="#deletePaymentMethod" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/paymentmethod');?>
<script>
  $(document).ready(function(){

    $('.updatePaymentMethod').on('click', function(){
      id = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url('settings/payment-method/data/')?>'+ id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
              $('#paymentMethodId').val(data.id);
              $('#paymentMethodName').val(data.name);
              $('#paymentMethodNumber').val(data.number);
              $('#paymentMethodDescription').val(data.description);
        }
      })
    })

    $('.deletePaymentMethod').on('click', function(){
      id = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url('settings/payment-method/data/')?>'+ id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
            $('#paymentMethodid').val(data.id);
        }
      })
    })
    
  })
</script>