<button type="button" class="btn btn-default w-25 my-3" data-bs-toggle="modal" data-bs-target="#insertAllowance">New Allowance</button>
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
                              <button type="button" class='btn btn-second updateAllowance' data-bs-toggle="modal" data-bs-target="#editAllowance" data-id="<?= $d['id']?>">
                                <span class="align-items-center me-1"><i class="fa-solid fa-pencil fa-xs"></i></span><span>Edit</span>
                              </button>
                              <button type="button" class="btn btn-third deleteAllowance" data-bs-toggle="modal" data-bs-target="#deleteAllowance" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/allowance');?>

<script>
  $(document).ready(function(){
    let id = $('.updateAllowance').attr('data-id');

    $('.updateAllowance').on('click', function(){
      $.ajax({
        url: '<?= site_url('settings/allowance/data/')?>'+ id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
            $('#allowanceId').val(data.id);
            $('#allowanceName').val(data.name);
            $('#allowanceDescription').val(data.description);
        }
      })
    })

    $('.deleteAllowance').on('click', function(){
      $.ajax({
        url: '<?= site_url('settings/allowance/data/')?>'+ id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
            $('#allowanceid').val(data.id);
        }
      })
    })
    
  })
</script>