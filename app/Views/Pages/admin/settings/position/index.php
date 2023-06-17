<button type="button" class="btn btn-default w-25 mt-3" data-bs-toggle="modal" data-bs-target="#insertPosition">New Position</button>
<section class="content mt-3">
    <?= view('Pages\message\index')?>
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
                              <button type="button" class='btn btn-second updatePosition' data-bs-toggle="modal" data-bs-target="#editPosition" data-id="<?= $d['id']?>">
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
<?php echo view('Pages/modals/position');?>
<script>
  $(document).ready(function(){

    $('.updatePosition').on('click', function(){
      id = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url('settings/position/data/')?>'+ id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
              $('#positionId').val(data.id);
              $('#positionName').val(data.name);
              $('#positionDepartment').val(data.department_id);
              $('#positionDescription').val(data.description);
              $('#positionSalaryStart').val(data.salary_start);
              $('#positionSalaryEnd').val(data.salary_end);
        }
      })
    })

    $('.deletePosition').on('click', function(){
      id = $(this).attr('data-id');
      $.ajax({
        url: '<?= site_url('settings/position/data/')?>'+ id,
        type: 'GET',
        success: function(hasil){
          var data = $.parseJSON(hasil);
            $('#positionid').val(data.id);
        }
      })
    })
    
  })
</script>